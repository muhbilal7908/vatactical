<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripe(Request $request)
    // {

    //     $data=$request->all();
    //     // return view('front-app.stripe',compact('data'));
    // }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripePost(Request $request)
    // {

    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create ([
    //             "amount" => $request->sub_total * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "The Order Has Been Placed From Laneway"
    //     ]);


    //      $user=Auth::user();

    //        $data= new Order;
    //        $data->user_id=$user->id;
    //        $data->first_name=$request->first_name;
    //        $data->last_name=$request->last_name;
    //        $data->company_name=$request->company_name;
    //        $data->country=$request->country ;
    //        $data->address=$request->address;
    //        $data->address_2=$request->address_2;
    //        $data->city=$request->city;
    //        $data->state=$request->state;
    //        $data->postal_code=$request->postal_code;
    //        $data->phone=$request->phone;
    //        $data->email=$request->email;
    //         $data->bank_status="paid";

    //        $data->save();

    //        $cart=Cart::where('user_id',$user->id)->get();

    //        foreach ($cart as $item) {
    //         $orderitem=new OrderItem;
    //         $orderitem->order_id=$data->id;
    //         $orderitem->product_id=$item->product_id;
    //         $orderitem->product_variation_id=$item->product_variation_id;
    //         $orderitem->quantity=$item->quantity;
    //         $orderitem->sub_total=$item->sub_total;
    //         $orderitem->delivery_status="pending";
    //         $orderitem->save();

    //        }
    //        Cart::where('user_id',$user->id)->delete();
    //     //    return back()->with('success','Payment successful!');


    // }
}
