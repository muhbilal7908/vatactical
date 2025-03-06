<?php

namespace App\Http\Controllers;

use App\Models\CardVariation;
use App\Models\GiftCard;
use App\Models\MemberShip;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Models\Cart;
use App\Events\SendNotification;
use App\Mail\GiftMail;
use App\Models\MainMembership;


class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=GiftCard::paginate(21);
        return view('backend_app.gift_card.all_giftcards',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend_app.gift_card.add_gift_card');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function generateGiftCardNumber($prefix = 'VTSA', $length = 12) {
        $characters = '0123456789';
        $numbersLength = strlen($characters);
        $cardNumber = $prefix;

        // Calculate the remaining length after the prefix
        $remainingLength = $length - strlen($prefix);

        for ($i = 0; $i < $remainingLength; $i++) {
            $cardNumber .= $characters[rand(0, $numbersLength - 1)];
        }

        return $cardNumber;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

    
        $data = new GiftCard;
        $data->name=$request->name;
        $url = $request->name;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug);
        $data->slug = $hyphenatedUrl;
        $giftCardNumber = $this->generateGiftCardNumber('VTSA', 12); // Call the function within the class using $this
        $data->gift_no = $giftCardNumber;
        $data->discount=$request->discount;
        $data->price=$request->price;
        $data->sale_price=$request->sale_price;
        $data->expire_date=$request->expire_date;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->description=$request->description;
        $data->sku=$request->sku;
        $data->stock=$request->stock;
        $data->firearms=$request->firearms;
        $data->ammunation=$request->ammunation;
        $data->accessories=$request->accessories;
        $data->courses=$request->courses;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();
            $destinationpath=public_path('assets/gift_cards/');
            $image->move($destinationpath,$imgname);
            $data->img=$imgname;

        }
        $data->save();
        if (!empty($request->variation_names) && !empty($request->variation_price)) {
            foreach ($request->variation_names as $key => $value) {
                if (!empty($value) && !empty($request->variation_price[$key])) {
                    $variation = new CardVariation;
                    $variation->card_id = $data->id;
                    $variation->variation_name = $value;
                    $variation->price = $request->variation_price[$key];
                    $variation->members= $request->members[$key];
                    $variation->save();
                }
            }
        }
        return back()->with('success','New gift card Has been added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=GiftCard::all();
        return view('front-app.gift_card.all_gifts',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=GiftCard::with('variations')->where('id',$id)->first();
        return view('backend_app.gift_card.edit_gift_card',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $request->validate([
            'name'=>'required',
        ]);

        $data = GiftCard::find($id);
        $data->name=$request->name;
        $url = $request->name;
        $slug = Str::slug($url, '-'); // Slugify the URL
        $hyphenatedUrl = str_replace(' ', '-', $slug);
        $data->slug = $hyphenatedUrl;

        $giftCardNumber = $this->generateGiftCardNumber('VTSA', 12); // Call the function within the class using $this
        $data->gift_no = $giftCardNumber;
        $data->discount=$request->discount;
        $data->price=$request->price;
        $data->sale_price=$request->sale_price;
        $data->expire_date=$request->expire_date;
        $data->meta_title=$request->meta_title;
        $data->meta_description=$request->meta_description;
        $data->description=$request->description;
        $data->sku=$request->sku;
        $data->stock=$request->stock;
        if ($request->hasFile('img')) {
            $image=$request->file('img');
            $imgname=$request->file('img')->getClientOriginalName();

            $destinationpath=public_path('assets/gift_cards/');
            $image->move($destinationpath,$imgname);

            $data->img=$imgname;

        }
        $data->save();

        if (!empty($request->variation_names) && !empty($request->variation_price)) {

            CardVariation::where('card_id',$id)->delete();

            foreach ($request->variation_names as $key => $value) {
                if (!empty($value) && !empty($request->variation_price[$key])) {
                    $variation = new CardVariation;
                    $variation->card_id = $data->id;
                    $variation->variation_name = $value;
                    $variation->price = $request->variation_price[$key];
                    $variation->members= $request->members[$key];
                    $variation->save();
                }
            }
        }
        return back()->with('success','New gift card Has been added successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CardVariation::where('card_id',$id)->delete();
        GiftCard::destroy($id);
        return back()->with("success",'Your Gift Has been deleted successfully');
    }
    public function giftDetail($slug){

        try{
            $data=GiftCard::with('variations')->where('slug',$slug)->first();

            SEOMeta::setTitle($data->meta_title);
            SEOMeta::setDescription($data->homepage_meta_description);
            SEOMeta::setCanonical('http://vatactical.com/assets/featured_images/'.$data->slug);

            OpenGraph::setDescription($data->meta_description);
            OpenGraph::setTitle($data->meta_title);
            $pageUrl = 'http://vatactical.com/assets/featured_images/';
            OpenGraph::setUrl($pageUrl);
            OpenGraph::addProperty('type', 'articles');
            OpenGraph::addImage('http://vatactical.com/assets/featured_images/'.$data->img);

            TwitterCard::setTitle($data->meta_title);
            TwitterCard::setSite('@YourTwitterHandle');
            TwitterCard::setImage('http://vatactical.com/assets/featured_images/'.$data->meta_title);

            JsonLd::setTitle($data->meta_title);
            JsonLd::setDescription($data->meta_description);
            JsonLd::addImage('http://vatactical.com/assets/featured_images/'.$data->img);

            return view('front-app.gift_card.gift_detail',compact('data'));
         } catch (\Throwable $th) {
             return back()->with('error','Something Went Wrong');
         }
     }

     public function purchaseGift(Request $request,$slug){

            $quantity=1;
            $data=GiftCard::where('slug',$slug)->first();
            $variation=CardVariation::find($request->variation_id);
            return view('front-app.gift_card.gift-checkout',compact('quantity','data','variation'));
     }

     public function gift_payment(Request $request,$slug){


        $request->validate([
            'first_name'=>'required',
            'country'=>'required',
            'address'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

            $images_path="";
            if($request->images){
            $img_arr=[];
            foreach ($request->images as $image) {
                // Get the original filename
                $imgname = $image->getClientOriginalName();
            $img_arr[]=$imgname;

                // Set the destination path
                $destinationPath = public_path('assets/member_ships/');
                // Move the image to the destination path
                $image->move($destinationPath, $imgname);
            }
            $images_path=$img_arr;
        }
        $shipping=$request->all();
        $data=GiftCard::where('slug',$slug)->first();
        $quantity=1;
        $variation=CardVariation::find($request->variation_id);
        return view('front-app.gift_card.gift_payment',compact('shipping','data','quantity','variation','images_path'));
     }

     public function giftOrderSubmit(Request $request,$id){

      
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

           $user=Auth::user();
           $data= new MainMembership;
           $data->membership_id=$id;
           $data->user_id=$user->id;
           $data->first_name=$request->first_name;
           $data->last_name=$request->last_name;
           $data->company_name=$request->company;
           $data->email=$request->email ;
           $data->phone_no=$request->phone;
           $data->address=$request->address;
           $data->province=$request->state;
           $data->city=$request->city;
           $data->country=$request->country;
           $data->postal_code=$request->postal_code;
           $sub_total=trim($request->sub_total);
           $data->total=$sub_total;
           $data->bank_status="paid";
           $data->save();

           if(!empty($shipping->member_name)){
           foreach($request->member_name  as $key=>$item){
            MemberShip::create([
                'parent_membership_id'=>$data->id,
                'member_name'=>$item,
                'img'=>$request->images[$key]
               ]);
           }
        }

            $productItem = GiftCard::where('id', $id)->first();

            $quantity=$request->quantity;

            $notification_data=[
                'product'=>$productItem,
                'user'=>$data,
            ];

            event(new SendNotification($notification_data));



           $admin_mail=SettingModel::find(1);
           mail::to($request->email)->send(new GiftMail($data,$productItem,$quantity));


           Cart::where('user_id',$user->id)->delete();

            $gift_card=GiftCard::find($id);

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

public function confirmation(Request $request){
    $order=Order::with('order_items','membershipUsers')->where('id',$request->order_id)->first();
   return view('front-app.gift_card.gift_confirm',compact('order'));
}

public function update_status(Request $request){

    try {
        $giftcard=GiftCard::findOrFail($request->id);
        $giftcard->navbar= $request->status;
        $giftcard->save();
        $response=[
            'status'=>200,
            'message'=>"Status has been updated successfully",
        ];
        return response()->json($response);
    } catch (\Throwable $th) {
        $response=[
            'status'=>200,
            'message'=>$th->getMessage(),
        ];
        return response()->json($response);
    }

}

}
