<?php

namespace App\Http\Controllers;
use App\CPU\LotteryManager;
use App\Events\SendNotification;
use App\Models\LotteryOrder;
use App\Models\Popup;
use App\Models\SettingModel;
use Illuminate\Support\Facades\Http;
use App\Models\Course;
use App\Models\GiftCard;
use App\Models\Lottery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LotteryMail;
use App\Mail\LotteryWinner;
use App\Models\LotteryWinners;
use Carbon\Carbon;


use App\Events\LotteryEvent;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Lottery::latest()->get();
        return view('backend_app.lottery.all_lotteries',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        $courses=Course::all();
        $giftcards=GiftCard::all();

        return view('backend_app.lottery.add_lottery',compact('products','courses','giftcards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',

            'price'=>'required',
        ]);
        $data=new Lottery;
        $data->name=$request->name;
        $url = $request->name;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug);
        $data->slug = $hyphenatedUrl;
        $data->expire_date=$request->date;
        $data->discount=$request->discount_price;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->product_id=$request->product_id;
        $data->gift_id=$request->gift_card_id;
        $data->course_id=$request->course_id;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/lottery/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;

        }
        $data->save();

        return back()->with('success',"New lottery has been added");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products=Product::all();
        $courses=Course::all();
        $giftcards=GiftCard::all();
        $data=Lottery::find($id);
        return view('backend_app.lottery.edit_lottery',compact('data','products','courses','giftcards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data=Lottery::find($id);
        $data->name=$request->name;
        $url = $request->name;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug);
        $data->slug = $hyphenatedUrl;
        $data->expire_date=$request->date;
        $data->price=$request->price;
        $data->discount=$request->discount_price;
        $data->description=$request->description;
        $data->product_id=$request->product_id;
        $data->gift_id=$request->gift_card_id;
        $data->course_id=$request->course_id;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/lottery/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;
        }
        $data->save();
        return redirect(route('all-lottery'))->with('success',"lottery has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LotteryOrder::where("lottery_id",$id)->delete();
        Lottery::destroy($id);
        return back()->with('success','Lottery has been deleted successfully');
    }
    public function allLottery(){
        $data=Lottery::all();
        return view('front-app.lottery.all_lottery',compact('data'));
    }
    public function lotteryDetail($slug){
        $data=Lottery::where('slug',$slug)->first();
        return view('front-app.lottery.lottery_detail',compact('data'));
    }

    public function lotteryCheckout(Request $request,$slug){

        $data=Lottery::with('product','giftcard','course')->where('slug',$slug)->first();

        if ($data) {
            $expireDate = Carbon::parse($data->expire_date);

            if ($expireDate->isPast()) {
                return back()->with("error", "Lottery has expired");
            }
        } else {
            return back()->with("error", "Lottery not found");
        }

        $quantity=$request->quantity;
        $price=$request->price;
        return view('front-app.lottery.lottery_checkout',compact('data','quantity','price'));
    }
    public function store_payment(Request $request,$id){



            $expire=$request->expire_month."/20".$request->expire_year;

            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'cache-control' => 'no-cache',
            ];

            $data = [
            'req_username' => config('bankful.username'), // Access the username from the .env file
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
            $lottery_ids=[];
            $i=0;
              do{
                $i++;

               $user=Auth::user();
               $lottery_no = 1000 + LotteryOrder::count() + 1;

               $data= new LotteryOrder;
               $data->user_id=$user->id;
               $data->lottery_no=$lottery_no;
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
               $data->lottery_id=$id;;
               $data->save();
               $lottery_ids[]=$data->id;
            }while($i < $request->quantity);

                $Lotteris = LotteryOrder::whereIn('id', $lottery_ids)->get();

                $Lotteris_count = LotteryOrder::whereIn('id', $lottery_ids)->get()->count();
                $lottery_name=Lottery::find($id);
                //Transection
                $user_id=$user->id;
                $amount=$request->sub_total;
                $payment_method="Bankful";
                $msg=$lottery_name->name.' Lottery Has Been Booked';
                $transection_data=insertTransection($user_id,$amount,$payment_method,$msg);

                //

                $admin_mail=SettingModel::find(1);
                mail::to($data->email)->send(new LotteryMail($data,$Lotteris_count,$Lotteris));

                $response=[
                    'status'=>200,
                    'message'=>"Your Lottery has been Subscribed",
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
        public function Spinner(){
            $lottery=Lottery::all();
            return view('backend_app.lottery.spinner',compact('lottery'));
        }
        public function LotteryUser(Request $request){

            $lottery_winner = LotteryOrder::where('lottery_id', $request->lottery_id)->inRandomOrder()->first();
            $lottery_start=[
                'status'=>"On",
            ];

            event(new LotteryEvent($lottery_start));
        }
        public function get_winner() {
            // Sleep for 6 seconds
            sleep(30);

            // Retrieve the latest lottery winner
            $lotteryWinner = LotteryWinners::latest()->first();
            dd($lotteryWinner);
            // Return the lottery winner as a JSON response
            return response()->json($lotteryWinner);
        }

        public function front_lottery_winner(Request $request){
            $lottery_winner=LotteryOrder::where('lottery_no',$request->lottery_id)->first();
            $data=new LotteryWinners;
            $data->winner_name=$lottery_winner->first_name .''.$lottery_winner->last_name ;
            $data->email=$lottery_winner->email;
            $lottery_name=Lottery::find($lottery_winner->lottery_id);
            $data->lottery_name=$lottery_name->name;
            $data->phone_no=$lottery_winner->phone_no;
            $data->lottery_img=$lottery_name->img;
            $data->save();
            $response=[
                'status'=>200,
                'message'=>"".$lottery_winner->first_name .' '. $lottery_winner->last_name." is the Winner of ".$lottery_name->name. 'Lottery Game',
            ];
            mail::to($lottery_winner->email)->send(new LotteryWinner($lottery_winner));
            LotteryOrder::where('lottery_id',$lottery_winner->lottery_id)->delete();
            Lottery::destroy($lottery_winner->lottery_id);
            return response()->json($response);
        }

        public function LotteryParticipents(){
            $data=LotteryOrder::with('lottery')->latest()->paginate(21);
            $lottery=Lottery::all();
            return view('backend_app.lottery.lottery_participants',compact('data','lottery'));

        }
        public function lottery_event(){
            $data=LotteryOrder::with('user')->get();
            return view('front-app.lottery.lottery_event',compact('data'));
        }
        public function LotteryOrderDelete($id){
            if(Popup::where('lottery_id',$id)){
                LotteryOrder::where('lottery_id',$id)->delete();
                Popup::where('lottery_id',$id)->delete();
            }
            LotteryOrder::destroy($id);
            return back()->with('success','Lottery Participant has been deleted successfully');
        }
        public function lottery_payment(Request $request,$slug){


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
        $shipping=$request->all();
        $data=Lottery::where('slug',$slug)->first();
        return view('front-app.lottery.lottery_payment',compact('shipping','data'));
        }

        public function add_lottery_member(){
            $data=Lottery::all();
            return view('backend_app.lottery.add_lottery_participent',compact('data'));
        }
        public function store_lottery_participent(Request $request){

            try {

                $request->validate([
                    'first_name'=>"required",
                    'email'=>"required",
                    'address'=>"required",
                    'country'=>"required",
                    'city'=>"required",
                    'phone_no'=>"required",
                ]);


            $data=new LotteryOrder;
            $data->first_name=$request->first_name;
            $data->last_name=$request->last_name;
            $data->user_id=0;
            $data->email=$request->email;
            $data->company_name=$request->company_name;
            $data->address=$request->address;
            $data->appartment=$request->appartment;
            $data->city=$request->city;
            $data->province=$request->province;
            $data->postal_code=$request->postal_code;
            $data->country=$request->country;
            $data->bank_status="paid";
            $data->delivery_status="none";
            $data->payment_method=$request->payment_method;

            $lottery=Lottery::find($request->lottery_id);
            $data->lottery_no = 1000 + LotteryOrder::count() + 1;
            $data->phone_no=$request->phone_no;
            $data->total= $lottery->price;
            $data->save();
            return back()->with("success","Your Lottery Participent has been added successfully");
                 //code...
                } catch (\Throwable $th) {
                    return back()->with("error",$th->getMessage());
                }
        }

        public function winners(){
            $data=LotteryWinners::latest()->paginate(21);
            return view('backend_app.lottery.lottery_winners',compact('data'));
        }
        public function delete_winner($id){
            LotteryWinners::destroy($id);
            return back()->with('success','Lottery Winner has been deleted successfully');
        }
        public function search_participents(Request $request){
            $query=LotteryOrder::query();

            if($request->filled('user_name')){
                $query->where('first_name','LIKE',$request->user_name.'%');
            }
            if($request->filled('lottery_id')){
                $query->where('first_name','LIKE',$request->user_name.'%');
            }
            if($request->filled('lottery_no')){
                $query->where('lottery_no',$request->lottery_no);
            }

            $data=$query->paginate(21);
            $lottery=Lottery::all();
            return view('backend_app.lottery.lottery_participants',compact('data','lottery'));
        }

        public function add_discount(Request $request){

            try {

            $data=Lottery::where('id',$request->id)->first();
            $response=[
                'status'=>200,
                'message'=>"Discount has been added successfully",
                'data'=>$data->discount,
            ];

            return response()->json($response);

            } catch (\Throwable $th) {

                return response()->json($th->getMessage());
            }


        }


    }

