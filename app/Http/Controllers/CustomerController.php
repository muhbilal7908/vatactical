<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CourseSubscribe;
use App\Models\Course;
class CustomerController extends Controller
{

    public function CustomerDashboard(){
        $user=Auth::user();
        $orders=Order::where('id',$user->id)->get()->count();
        $subscription=CourseSubscribe::where('user_id',$user->id)->get()->count();
        $fav = Favourite::where('user_id',$user->id)->get()->count();
        $cart = Cart::where('user_id',$user->id)->get()->count();
        return view('backend_app.customer.dashboard', compact('orders','subscription','fav','cart'));
    }
    public function UpdateProfile($id){
        try {

            $data=User::find($id);
        return view('backend_app.customer.profile',compact('data'));
        } catch (\Throwable $th) {
         return back()->with('Something went wrong');
        }

    }
    public function SubmitProfile(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required|min:6', // You can adjust the minimum length as needed
            'confirm_password' => 'required|same:password',
        ]);

            $data=User::find($request->id);
            $data->name=$request->name;
            $data->email=$request->email;
            $data->password=hash::make($request->password);
            $data->save();
            return back()->with('success','your setting has been updated');
    }

    public function AddToFav($id){

        try {

            $user = Auth::user();
            $existingFavorite = Favourite::where('user_id', $user->id)
            ->where('product_id', $id)
            ->first();

        if ($existingFavorite) {
            Favourite::destroy($existingFavorite->id);
            return back()->with('error', 'Product removed from the favorities');
        }
            $data= new Favourite;
            $data->user_id=$user->id;
            $data->product_id=$id;
            $data->save();

            return back()->with('success','Your product has been added to Favorites');

        } catch (\Throwable $th) {
            return back()->with('success',$th->getMessage());

        }

    }

    public function Orders(){
        $user=Auth::user();
        $data=Order::where('user_id',$user->id)->paginate(21);
        $count=Order::where('user_id',$user->id)->get()->count();
        return view('backend_app.customer.orders.all_orders',compact('data','count'));
    }
    public function filterOrder(Request $request){

        $user=Auth::user();
        $query = Order::query();

        if ($request->filled('order_id')) {
            $query->where('id', $request->order_id)->where('user_id',$user->id);
        }

        if ($request->filled('status')) {
            $query->where('delivery_status', $request->status)->where('user_id',$user->id);
        }



        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to])->where('user_id',$user->id);
        }

        $data = $query->get();
        $count=$query->count();

        return view('backend_app.customer.orders.all_orders',compact('data','count'));

    }

    public function showFavourites(){
       try {
        $user=Auth::user();
        $data=Favourite::where('user_id',$user->id)->get();
        return view('front-app.favourites',compact('data'));
       } catch (\Throwable $th) {
        return back()->with('error',$th->getMessage());
       }
    }
    public function DeleteFavourites($id){
        try {
            Favourite::destroy($id);
        return back()->with('success','Product has been removed from Favorites');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }

    }
    public function FavtoCart(Request $request){
        try {
            $user=Auth::user();
            $data=new Cart;
            $data->product_id=$request->product_id;
            $data->user_id=$user->id;
            $data->quantity=$request->quantity;
            $data->save();
            Favourite::destroy($request->id);
        return back()->with('success','Product has been moved to cart');
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }
    }

    public function AllFav(){
        try {
            $user=Auth::user();
            $data=Favourite::where('user_id',$user->id)->get();
            return view('backend_app.customer.favourite',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
    public function customer_cart(){
        try {
            $user=Auth::user();
            $data=Cart::where('user_id',$user->id)->get();
            return view('backend_app.customer.cart',compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }

    public function CustomerSubscription(){
        try {
            $user=Auth::user();
            $data=CourseSubscribe::with('users','courses')->where('user_id',$user->id)->get();
            $count=CourseSubscribe::with('users','courses')->where('user_id',$user->id)->get()->count();
            $courses=Course::all();
            return view('backend_app.customer.subscriptions.all_subscriptions',compact('data','count','courses'));
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());

        }
    }
    public function filter_subscription(Request $request){
        $user=Auth::user();
        $query = CourseSubscribe::query();

        if ($request->filled('order_id')) {
            $query->where('id', $request->order_id)->where('user_id',$user->id);
        }

        if ($request->filled('courses')) {
            $query->where('course_id', $request->courses)->where('user_id',$user->id);
        }

        if ($request->filled('first_name')) {
            $query->where('first_name', $request->customer_name)->where('user_id',$user->id);
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $query->whereBetween('created_at', [$request->date_from, $request->date_to])->where('user_id',$user->id);
        }

        $data = $query->get();
        $count=$query->count();
        $courses=Course::all();

        return view('backend_app.customer.subscriptions.all_subscriptions',compact('data','count','courses'));

    }
}
