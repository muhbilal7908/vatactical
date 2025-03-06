<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::latest()->paginate(24);

        return view('backend_app.products.products',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:products,slug',
            'price'=>'required',
        ]);



            $data= new Product;
            $data->name=$request->name;
            $url = $request->slug;
            $slug = Str::slug($url, '-'); // Slugify the URL
            $hyphenatedUrl = str_replace(' ', '-', $slug);
            $data->slug = $hyphenatedUrl;
            $data->stock=$request->stock;
            $data->sku=$request->sku;
            $data->price=$request->price;
            $data->sale_price=$request->sale_price;
            $data->description=$request->description;
            $data->excerpt=$request->excerpt;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;
            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();
                $destinationpath=public_path('assets/featured_images/');
                $image->move($destinationpath,$imgname);
                $data->img=$imgname;
            }
            $data->save();

            if ($request->hasFile('images')) {
                $images = [];

                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $imageName = time() . '_' . $image->getClientOriginalName();

                                $image->move('assets/product_gallery/', $imageName);
                        $images[] = [
                            'image' => $imageName,
                            'product_id' => $data->id,

                            // You can add more fields here like title, description, etc.
                        ];

                    }
                }
                ProductImage::insert($images);

            }
            $data->categories()->attach($request->categories);
            $data->brands()->attach($request->brands);

            return back()->with('success','New Product has been added');


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
        $data=Product::with('images')->findOrFail($id);
        return view('backend_app.products.edit_product',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required',
        ]);

        try {
            $data= Product::find($id);
            $data->name=$request->name;
            $url = $request->slug;
            $slug = Str::slug($url, '-'); // Slugify the URL
            $hyphenatedUrl = str_replace(' ', '-', $slug);
            $data->slug = $hyphenatedUrl;
            $data->stock=$request->stock;
            $data->price=$request->price;
            $data->sale_price=$request->sale_price;
            $data->description=$request->description;
            $data->excerpt=$request->excerpt;
            $data->meta_title=$request->meta_title;
            $data->meta_description=$request->meta_description;
            $data->sku=$request->sku;


            if ($request->hasFile('img')) {
                $image=$request->file('img');
                $imgname=$request->file('img')->getClientOriginalName();

                $destinationpath=public_path('assets/featured_images/');
                $image->move($destinationpath,$imgname);
                $data->img=$imgname;

            }

            $data->save();

            if ($request->hasFile('images')) {
                $images = [];

                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $imageName = time() . '_' . $image->getClientOriginalName();

                                $image->move('assets/product_gallery/', $imageName);
                        $images[] = [
                            'image' => $imageName,
                            'product_id' => $data->id,

                            // You can add more fields here like title, description, etc.
                        ];

                    }
                }
                ProductImage::insert($images);



            }
            $data->categories()->sync($request->categories);
            $data->brands()->sync($request->brands);

            return redirect(route('showproduct'))->with('success',$data->name.' has been added');
        } catch (\Throwable $th) {
            return back()->with('error','Something Went Wrong');

        }


        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Product::find($id);
        $data->categories()->detach();
        $data->brands()->detach();
        Product::destroy($id);
        return back()->with('success', $data->name.' has been deleted');
    }

        public function AllGiftcards(){
            $giftCardCategory = Category::where('name', 'Gift Card')->first();
            $data = $giftCardCategory->products;
            return view('backend_app.gift_card.all_giftcards',compact('data'));
        }

    public function ImgDel($id){

        ProductImage::destroy($id);

        return back()->with('success','Gallery Image has been deleted');
    }

    public function update_status(Request $request){

        try {
            $product=Product::findOrFail($request->id);
            $product->featured_status= $request->status;
            $product->save();
            $response=[
                'status'=>200,
                'message'=>"Featured Status has been updated successfully",
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
    public function FilterProducts(Request $request){
        $data = Product::where('name', 'like', $request->name . '%')->paginate(21);
        return view('backend_app.products.products', compact('data'));
    }

    public function journey(){

        $data=Product::where('slug','journey')->first();
        SEOMeta::setTitle($data->meta_title);
        SEOMeta::setDescription($data->homepage_meta_description);
        SEOMeta::setCanonical(env('APP_URL') . '/product/' . $data->slug);
        OpenGraph::setDescription($data->meta_description);
        OpenGraph::setTitle($data->meta_title);
        $pageUrl = env('APP_URL') . '/product/'.$data->slug;
        OpenGraph::setUrl($pageUrl);
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(env('APP_URL') . '/assets/featured_images/' . $data->img);

        TwitterCard::setTitle($data->meta_title);
        TwitterCard::setSite('@YourTwitterHandle');
        TwitterCard::setImage(env('APP_URL') . '/assets/featured_images/' . $data->img);

        JsonLd::setTitle($data->meta_title);
        JsonLd::setDescription($data->meta_description);
        JsonLd::addImage(env('APP_URL') . '/assets/featured_images/' . $data->img);



         $relatedproducts=$data->categories;
         $reviews=Review::with('user')->where('product_id',$data->id)->get();

         $related = Product::whereHas('categories', function ($query) use ($relatedproducts) {
             $query->whereIn('category_id', $relatedproducts->pluck('id'));
         })->where('id', '!=', $data->id)->take(4)->get();

        return view('front-app.journey.product_detail',compact('data','related','reviews'));
     }

     public function stockStatus($status){
        if($status == 'in'){ // Changed '=' to '==' for comparison
            $data = Product::where('stock', '>', 0)->latest()->paginate(24);
            return view('backend_app.products.products', compact('data'));
        }
        else{
            $data = Product::where('stock', 0)->latest()->paginate(24);
            return view('backend_app.products.products', compact('data'));
        }
    }

    }

