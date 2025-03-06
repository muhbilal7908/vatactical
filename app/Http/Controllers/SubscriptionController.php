<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\SettingModel;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Course;
use App\Models\CourseSubscribe;
use Illuminate\Support\Facades\Mail;
use App\Mail\Subscribe;
use App\Mail\SubscribeAdmin;
use App\Models\Slots;
use Stripe\Subscription;
use Illuminate\Support\Facades\DB;
use App\Service\BankfulService;




class SubscriptionController extends Controller
{

    protected $bankful;
    public function __construct(BankfulService $bankful)
    {
        $this->bankful = $bankful;
    }

    public function allSubscripitons(Request $request){
        $data=CourseSubscribe::with('users','courses')->latest()->paginate(10);
        $count=CourseSubscribe::with('users','courses')->get()->count();
        $courses=Course::all();
        return view('backend_app.subscriptions.all_subscriptions',compact('data','count','courses'));
    }
    public function SubscribeCourse(Request $request){

        try {
            $seat=CourseSubscribe::where('date',$request->date)->get()->count();
            $seat_names=$request->names;


            if($request->seats > $request->remaining_seats){
                return back()->with('error','Not enough seats are available');
            }

            $start_time = $request->start_time;
            $date_new = $request->date;
            $course=Course::where('id',$request->course_id)->first();
            if($seat === "0"){
                return back()->with('error','There are no seats available in this slot');
            }


            $formattedDate = date("Y-m-d", strtotime($date_new));
            $date=$formattedDate;

            $currentdate=today()->format('Y-m-d');

            $current_time = date('H:i:s');

            if ($date_new < $currentdate && $start_time < $current_time) {
                return back()->with('error', 'Course has been expired');
            }
            $end_time = $request->end_time;
            $seat=$request->seats;
            $repeat=$request->repeat;
            $location=$request->location;
            $slot_id=$request->slot_id;

        return view('front-app.courses.course_subscription',compact('start_time','end_time','course','date','seat','repeat','seat_names','location','slot_id'));
        //code...
    } catch (\Throwable $th) {
        return back()->with('error','Something went wrong');
    }

    }


    public function CoursePayment(Request $request){


        $request->validate([
            'first_name'=>'required',
            'country'=>'required',
            'address'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'state'=>'required',
        ]);
        $user=Auth::user();
        $shipping=$request->all();
        $course=Course::where('id',$request->course_id)->first();
        $start_time=$request->start_time;
        $end_time=$request->end_time;
        $date=$request->date;
        $seat=$request->seats;
        $repeat=$request->repeat;
        $seat_names=$request->seat_names;
        $slot_id=$request->slot_id;
        return view('front-app.courses.coursepayment',compact('shipping','start_time','end_time','course','date','seat','repeat','seat_names','slot_id'));
    }

    public function SubscriptionDetail($id){

        try {

            $data=CourseSubscribe::with('users','courses')->where('id',$id)->first();
            return view('backend_app.subscriptions.subscription_detail',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

    }



    public function SubscriptionPayment(Request $request)
    {
        DB::beginTransaction();
    
        try {
            
            $alldata = $request->input();
            $course = Course::where('id', $request->course_id)->first();
            $user = Auth::user();
            $expire = $request->expire_month . "/20" . $request->expire_year;
            $card_token=$this->bankful->createToken($alldata);
            $slot=Slots::where('id',$request->slot_id)->first();
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'cache-control' => 'no-cache',
            ];
    
            $data = [
                'req_username' => config('bankful.username'), // Your Bankful username from config
                'req_password' => config('bankful.password'), // Your Bankful password from config
                'amount' => $request->sub_total, // Amount for the transaction
                'request_currency' => 'USD', // Currency
                'transaction_type' => 'CAPTURE', // Transaction type
                'customer_vault_id' => $card_token, // Use the customer vault ID from the token
                'bill_addr' => $request->address, // Billing address
                'bill_addr_city' => $request->city, // Billing city
                'bill_addr_state' => $request->state, // Billing state
                'bill_addr_zip' => $request->postal_code, // Billing postal code
                'bill_addr_country' => $request->country, // Billing country
                'cust_email' => $request->email, // Customer email
                'cust_fname' => $request->first_name, // Customer first name
                'cust_lname' => $request->last_name, // Customer last name
                'cust_phone' => $request->phone, // Customer phone number
            ];
    
            $response = Http::post('https://api.paybybankful.com/api/transaction/api', $data);
            $responseData = $response->json();
            
            $transactionStatus = $responseData['TRANS_STATUS_NAME'];
    
            if ($transactionStatus === "APPROVED") {
                $val = new CourseSubscribe;
                $val->user_id = $user->id;
                $val->course_id = $request->course_id;
                $val->start_time = $request->start_time;
                $val->end_time = $request->end_time;
                $val->date = $request->date;
                $val->paid = $request->sub_total;
                $val->first_name = $request->first_name;
                $val->last_name = $request->last_name;
                $val->company_name = $request->company;
                $val->email = $request->email;
                $val->phone_no = $request->phone;
                $val->address = $request->address;
                $val->appartment = $request->address_2;
                $val->province = $request->state;
                $val->city = $request->city;
                $val->country = $request->country;
                $val->postal_code = $request->postal_code;
                $val->total = $request->sub_total;
                $val->bank_status = "paid";
                $val->payment_method = "Bankful";
                $val->delivery_status = "pending";
                $val->seats = $request->seats;
                $val->names = $request->seat_names;
                $val->promocode = $request->promocode_val;
                $val->location = $request->location;
                $val->session_id=$slot->id;
                $val->token=$card_token;
                $val->repeat=$slot->repeat;
                $val->slot_date=$slot->date;
                $val->save();
    
                $course_name = Course::where('id', $request->course_id)->first();
    
                // Transection
                $user_id = $user->id;
                $amount = $request->sub_total;
                $payment_method = "Bankful";
                $product = "Course";
                $msg = $course_name->name . ' Has Been Subscribed';
                insertTransection($user_id, $amount, $payment_method, $msg);
                // Send emails
                Mail::to($request->email)->send(new Subscribe($alldata, $course_name));
                $admin_mail = SettingModel::find(1);
                Mail::to($admin_mail->mailer_email_id)->send(new SubscribeAdmin($alldata, $course_name));
    
                // Notifications
                $notifications = new Notification;
                $notifications->mark = 0;
                $notifications->msg = $course_name->name . " Course has been subscribed by " . $val->first_name;
                $notifications->save();
    
                DB::commit();
    
                $response = [
                    'status' => 200,
                    'order_id' => $val->id,
                    'message' => "Your Course has been Subscribed",
                ];
                return response()->json($response);
            } else {
                DB::rollBack();
    
                $response = [
                    'status' => 500,
                    'message' => "Please enter correct card details",
                ];
                return response()->json($response);
            }
        } catch (\Exception $e) {
            DB::rollBack();
    
            $response = [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
            return response()->json($response);
        }
    }
    


    public function DestroySubscription($id){
        try {
            CourseSubscribe::destroy($id);
            return back()->with('success','you have successfully deleted the record');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }
    }

    public function CustomerSubscription(){
        try {
           $user =Auth::user();
           $data=CourseSubscribe::where('user_id',$user->id)->get();
           return view('backend_app.subscriptions.all_subscriptions',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }
    }
    public function filter_subscription(Request $request){
        $query = CourseSubscribe::query();

        if ($request->filled('order_id')) {
            $query->where('id', $request->order_id);
        }

        if ($request->filled('courses')) {
            $query->where('course_id', $request->courses);
        }

        if ($request->filled('customer_name')) {
        $query->where('first_name', 'like' ,$request->customer_name.'%');

        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        $data = $query->paginate(21);
        $count=$query->count();
        $courses=Course::all();
        return view('backend_app.subscriptions.all_subscriptions',compact('data','count','courses'));
    }

    public function confirmation(Request $request){
        $order_id=CourseSubscribe::with('courses')->where('id',$request->order_id)->first();
       return view('front-app.courses.subscription_confirm',compact('order_id'));
    }

    public function generatePDF(){
        $data=CourseSubscribe::latest()->get();
        // Create an instance of the Dompdf class
        $dompdf = new Dompdf();

        // Load HTML content from a blade view
        $html = view('backend_app.pdf_template.pdf_subscriptions',compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save the PDF to a file instead of outputting it directly)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream('all_subscriptions.pdf');

    }



}
