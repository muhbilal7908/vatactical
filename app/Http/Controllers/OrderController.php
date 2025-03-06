<?php

namespace App\Http\Controllers;
use App\Models\GiftCard;
use App\Models\SettingModel;
use App\Models\ShippingPayment;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use App\Mail\GiftMail;
use App\Mail\OrderAdmin;
use App\Events\SendNotification;
use App\Models\Product;
use App\Models\Notification;
class OrderController extends Controller
{
    public function allOrders(){
        try {
            $data=Order::paginate(16);
            $count=Order::all()->count();
            return view('backend_app.orders.orders',compact('data','count'));
        } catch (\Throwable $th) {
            return back()->with('error','Something went wrong');
        }
    }


    public function OrderPayment(Request $request){
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
        $data=Cart::where('user_id',$user->id)->get();
        $shipping_taxes=ShippingPayment::find(1);
        return view('front-app.payment',compact('data','shipping','shipping_taxes'));
    }
    public function OrderSubmit(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'appartment' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required',
            'state'=>'required',
        ]);


        $expire=$request->expiration_month.'/'.$request->expiration_year;

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache',
        ];
        $expire=$request->expire_month."/20".$request->expire_year;

        $data = [
            'req_username' =>config('bankful.username'), // Access the username from the .env file
            'req_password' => config('bankful.password'),
            'amount' => $request->sub_total,
            'request_currency' => 'USD',
            'cust_phone' => $request->phone,
            'transaction_type' => 'CAPTURE',
            'pmt_key' => $request->cvv,
            'pmt_numb' => $request->cardnumber,
            'pmt_expiry' => $expire,
            'bill_addr' => $request->address,
            'bill_addr_city' => $request->city,
            'bill_addr_country' => $request->country,
            'bill_addr_state' => $request->state,
            'bill_addr_zip' => $request->postal_code,
            'cust_email' => $request->email,
            'cust_fname' => $request->first_name,
            'cust_lname' => $request->last_name,
        ];

        $response = Http::post('https://api.paybybankful.com/api/transaction/api',$data);


        $responseData = $response->json();

        $transactionStatus = $responseData['TRANS_STATUS_NAME'];
      // Assuming the response is in JSON format
        if ($transactionStatus==="APPROVED"){

           $user=Auth::user();
           $data= new Order;
           $data->user_id=$user->id;
           $data->first_name=$request->first_name;
           $data->last_name=$request->last_name;
           $data->company_name=$request->company;
           $data->email=$request->email ;
           $data->phone_no=$request->phone;
           $data->address=$request->address;
           $data->appartment=$request->address_2;
           $data->province=$request->state;
           $data->city=$request->city;
           $data->country=$request->country;
           $data->postal_code=$request->postal_code;
           $sub_total=trim($request->sub_total);

           $data->total=$sub_total;

           $data->bank_status="paid";
           $data->payment_method="Bankful";
           $data->delivery_status="pending";
           $data->pickup=$request->pickup;
           $data->promocode=$request->promocode_val;
           $data->save();

           $cart=Cart::where('user_id',$user->id)->get();
           $product_pack = [];
           $msg = '';
           foreach ($cart as $item) {
            $product=Product::where('id',$item->product_id)->first();
            $orderitem=new OrderItem;
            $orderitem->order_id=$data->id;
            $orderitem->product_id=$item->product_id;
            $orderitem->quantity=$item->quantity;
            $orderitem->sub_total=$item->sub_total;
            $orderitem->save();
            $productItem = Product::where('id', $item->product_id)->first();
            $product_pack[] = $productItem->name;
            $productItem->stock-=$item->quantity;
            $productItem->save();
            $notification_data=[
                'product'=>$productItem,
                'user'=>$data,
            ];

            event(new SendNotification($notification_data));

           }
           //Transection
           $user_id=$user->id;
           $amount=$request->sub_total;
           $payment_method="Bankful";
           $product="Course";
           $msg = implode(', ', $product_pack) . ' have been ordered';
           insertTransection($user_id,$amount,$payment_method,$msg);
           //
           $shipping=ShippingPayment::find(1);

           $sales_tax=$request->sales_tax;
           mail::to($request->email)->send(new OrderEmail($data,$cart,$shipping,$sales_tax));

           $admin_mail=SettingModel::find(1);
           mail::to($admin_mail->mailer_email_id)->send(new OrderAdmin($data,$cart,$shipping,$sales_tax));

           Cart::where('user_id',$user->id)->delete();
           $notifications = new Notification;
           $notifications->mark = 0;
           $notifications->msg = "New Order has been placed with the name of " . $data->first_name;
           $notifications->save();


           $response=[
            'status'=>200,
            'order_id'=>$data->id,
            'message'=>"Your Order has been Booked Successfully",
           ];
           return response()->json($response);
        }else{
            $response=[
                'status'=>500,
                'message'=>"Please enter correct card details",

            ];
               return response()->json($response);

        }

    }

    public function updateStatus(Request $request){
        try {
            $data=Order::find($request->id);
            $data->delivery_status=$request->status;
            $data->save();
        return back()->with('success','Your Status has been updated');
        } catch (\Throwable $th) {
          return back()->with('Something went wrong');
        }
    }

    public function deleteOrder($id){
        try {
            $data=Order::find($id);
            OrderItem::where('order_id',$id)->delete();
            Order::destroy($id);
            return back()->with('success','Product has been deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }
    }
    public function OrderDetail($id){
        try {
            $data=OrderItem::with('products','orders','gift_card')->where('order_id',$id)->get();
            $order_detail=Order::with('membershipUsers')->where('id',$id)->first();
            $shipping=ShippingPayment::where('id',1)->first();
            return view('backend_app.orders.order_detail',compact('data','order_detail','shipping'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }

    }

    public function filterOrder(Request $request){

        $query = Order::query();

        if ($request->filled('order_id')) {
            $query->where('id', $request->order_id);
        }

        if ($request->filled('status')) {
            $query->where('delivery_status', $request->status);
        }

        if ($request->filled('customer_name')) {
            $query->where('first_name', 'like', $request->customer_name.'%');
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        $data = $query->paginate(21);
        $count=$query->count();
        return view('backend_app.orders.orders',compact('data','count'));

    }
    public function Statusorder($status){
        $data=Order::where('delivery_status',$status)->get();

        $count=Order::where('delivery_status',$status)->get()->count();

        return view('backend_app.orders.orders',compact('data','count'));
    }
    public function generatePDF(){
        $data=Order::latest()->get();

        $dompdf = new Dompdf();

        // Load HTML content from a blade view
        $html = view('backend_app.pdf_template.pdf_orders',compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save the PDF to a file instead of outputting it directly)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream('all_orders.pdf');
    }

    public function confirmation(Request $request){
        $order=Order::with('order_items')->where('id',$request->order_id)->first();
        $tax_fee=$request->sales_tax;
        $shipping_taxes=ShippingPayment::find(1);
       return view('front-app.products.order_confirm',compact('order','shipping_taxes','tax_fee'));
    }

    }
