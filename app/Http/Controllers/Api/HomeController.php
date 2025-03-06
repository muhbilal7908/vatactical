<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try {
            $categories=Category::all();
            $brands=Brand::all();
            return response()->json([
                'categories'=>$categories,
                'brands'=>$brands,
            ]);

        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()],500);
        }
    }

    public function BrandData($slug){
        try {
            $databrand=Brand::where('slug',$slug)->first();
            $data=$databrand->Products;
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()],500);
        }

    }

    public function CategoryData($slug){

        try {

            $datacategory=Category::where('slug',$slug)->first();
            $data=$datacategory->products;
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

        }


    public function ProductDetail($slug){
        try{
           $data=Product::where('slug',$slug)->first();
           return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    public function Shop(){
        try {
            $data=Product::paginate(18);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }

    }

}
