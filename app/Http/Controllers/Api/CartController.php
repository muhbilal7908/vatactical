<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function ShowCart(Request $request){
        try{
        $data=Cart::where('user_id',$request->user_id)->get();

        return response()->json($data);
        }
        catch(\Throwable $th){
        return response()->json($th->getMessage());
        }
    }
    public function AddToCart(Request $request){

            try {

                if (Cart::where('product_id',$request->id)->first()) {
                    return response()->json('Your item has been already added in the cart');
                }
                Cart::create([
                    'product_id'=>$request->id,
                    'user_id'=>$request->user_id,
                    'quantity'=>$request->quantity,
                    'sub_total'=>$request->sub_total,
                ]);
                return response()->json('Your item has been added to cart');
            } catch (\Throwable $th) {
                return response()->json('Your item cannot be added to cart');
            }

    }
}
