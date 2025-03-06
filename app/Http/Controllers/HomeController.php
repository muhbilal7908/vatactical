<?php

namespace App\Http\Controllers;
use App\Models\Favourite;
use App\Models\LotteryOrder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use App\Models\HomeSlider;
use App\Models\Course;
use App\Models\Blog;
use App\Models\Promocode;
use App\Models\SettingModel;
use App\Models\Slots;
use App\Models\CourseSubscribe;
use App\Models\Category;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\Review;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Events\SendNotification;
use App\Models\Slider;
use App\Models\GiftCard;
use App\Models\Popup;
use App\Models\Gallery;

use Stripe\Subscription;
class HomeController extends Controller
{
    public function index(){
        try {
            $g_setting=SettingModel::where('id',1)->first();
            SEOMeta::setTitle($g_setting->meta_title);
            SEOMeta::setDescription($g_setting->meta_description);
            SEOMeta::setCanonical(env('APP_URL'));
            OpenGraph::setDescription($g_setting->meta_description);
            OpenGraph::setTitle($g_setting->meta_title);
            $pageUrl = env('APP_URL') . '/home';
            OpenGraph::setUrl($pageUrl);
            OpenGraph::addProperty('type', 'articles');
            OpenGraph::addImage(env('APP_URL') . '/assets/' . $g_setting->logo);
            TwitterCard::setTitle($g_setting->meta_title);
            TwitterCard::setSite('@YourTwitterHandle');
            TwitterCard::setImage(env('APP_URL') . '/home/' . $g_setting->logo);
            JsonLd::setTitle($g_setting->meta_title);
            JsonLd::setDescription($g_setting->meta_description);
            JsonLd::addImage(env('APP_URL') . '/home/' . $g_setting->logo);
            $categories=Category::with('subcategories')->get();
            $brands=Brand::all();
            $data=Product::where('featured_status',1)->get();
            $latest=Blog::latest()->take(1)->get();
            $featured=Blog::where('featured',1)->take(4)->get();
            $slider=Slider::all();
            $popup=Popup::where('id',1)->first();
            $gallery=Gallery::where('featured','1')->latest()->get();
            return view('front-app.index',compact('categories','brands','data','latest','featured','slider','popup','gallery'));
        }
        catch (\Throwable $th) {
           return view('front-app.404');
        }

    }

    public function BrandData($slug){

            $databrand=Brand::where('slug',$slug)->first();
            $data=$databrand->Products;

            return view('front-app.products.shop',compact('data'));


    }

    public function CategoryData($slug){

            $datacategory=Category::where('slug',$slug)->first();
            $data=$datacategory->products;
            $categories=Category::all();
            $brands=Brand::all();

            return view('front-app.products.shop',compact('data','brands','categories'));
        }


    public function ProductDetail($slug){
        try{

           $data=Product::with('categories')->where('slug',$slug)->first();
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

           return view('front-app.products.product_detail',compact('data','related','reviews'));
        } catch (\Throwable $th) {
            return back()->with('Something Went Wrong');
        }
    }

    function productFilter(Request $request) {
        $query = $request->search_val;

        $results = Product::whereRaw('LOWER(name) LIKE ?', [strtolower($query) . '%'])->get();
        return response()->json(['results' => $results]);
    }


public function FormSubmit(Request $request){

    $request->validate([
        'name'=>'required',
        'email'=>'required',
    ]);

    $recaptcha = SettingModel::find(1);

    if (isset($recaptcha) && $recaptcha['recaptcha_status'] == 1) {
        $secret_key = $recaptcha['recaptcha_secreat_password'];
        $response = $request->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response;

        // Send a POST request to Google reCAPTCHA for verification
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url);
        $body = json_decode($response->getBody());

        if (!$body->success) {
            return back()->with("error","Recaptcha Failed");
        }
    }

       Form::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone_no'=>$request->phone_no,
        'message'=>$request->message,
       ]);


    //    mail::to($request->email)->send(new SendEmail($request));

       return back()->with('success','You form has been submitted');

    }

    public function Shop(){
        $data=Product::all();
        $categories=Category::with('subcategories')->get();
        $brands=Brand::all();
        return view('front-app.products.shop',compact('data','categories','brands'));
    }

    public function TrackOrder(){
        return view('front-app.track-order');
    }
public function TrackNo(Request $request)
{
    try {
        $data = Order::where('id', $request->order_id)->first();

        if ($data) {
            return response()->json($data);
        } else {
            return response()->json('No Record Found!');
        }
    } catch (\Exception $e) {
        return response()->json('Error: ' . $e->getMessage());
    }


}
    public function Datepicker($slug){
        $data=Course::where('slug',$slug)->first();
        $slots=Slots::where('course_id',$data->id)->get();
        return view('front-app.date_picker',compact('data','slots'));
    }

    public function showCourses(){
        $courses = Course::where('status','1')
        ->orderBy('order_number', 'ASC')
        ->get();
        return view('front-app.courses.courses', compact('courses'));

    }
    public function courseDetail($slug){

        $data=Course::where('slug',$slug)->first();

        SEOMeta::setTitle($data->meta_title);
        SEOMeta::setDescription($data->meta_description);
        SEOMeta::setCanonical('http://vatactical.com/assets/courses/'.$data->slug);

        OpenGraph::setDescription($data->meta_description);
        OpenGraph::setTitle($data->meta_title);
        $pageUrl = 'http://vatactical.com/assets/courses/'.$data->slug;
        OpenGraph::setUrl($pageUrl);
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage('http://vatactical.com/assets/courses/'.$data->img);

        TwitterCard::setTitle($data->meta_title);
TwitterCard::setSite('@YourTwitterHandle');
TwitterCard::setImage('http://vatactical.com/assets/courses/'.$data->meta_title);

        JsonLd::setTitle($data->meta_title);
        JsonLd::setDescription($data->meta_description);
        JsonLd::addImage('http://vatactical.com/assets/courses/'.$data->img);

        $slots=Slots::where('course_id',$data->id)->get();

        return view('front-app.courses.course-detail',compact('data','slots'));
    }

    public function filterProducts(Request $request){

            $query = Product::query();
            if ($request->has('categories') && $request->input('categories') !== null) {
                $categories = $request->input('categories');
                $query->whereHas('categories', function ($categoryQuery) use ($categories) {
                    $categoryQuery->whereIn('category_id', $categories);
                });
            }


            if ($request->has('min') && $request->has('max')) {
                $minPrice = max(0, $request->input('min')); // Ensure min is at least 0
                $maxPrice = $request->input('max');
                $query->whereBetween('price', [$minPrice, $maxPrice]);

            }

                if ($request->has('sorting')) {
                    if ($request->input('sorting') === 'low') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->input('sorting') === 'high') {
                        $query->orderBy('price', 'desc');
                    }
                    elseif($request->input('sorting')==='latest'){
                        $query->latest();

                    }
                }
           $data=$query->get();
           return response()->json($data);
        }

        public function FrontBlogs(Request $request){
            try {
                $data=Blog::paginate(12);
                return view('front-app.blogs.blogs',compact('data'));
            }
             catch(\Throwable $th) {
               return back()->with('error',$th->getMessage());
            }

        }

        public function GetCertificate(Request $request){
            dd($request->input());
        }
        public function BlogDetail($slug){
            try {

                $data=Blog::where('slug',$slug)->first();
                $related=Blog::where('category_id',$data->category_id)->take(3)->get();
                $recent=Blog::latest()->take(5)->get();

                $categories=Category::all();
                return view('front-app.blogs.blog_detail',compact('data','categories','related','recent'));
            }
             catch(\Throwable $th) {
               return back()->with('error',$th->getMessage());
            }

        }

        public function SubmitReview(Request $request){
            try {
                $user=Auth::user();
                $data=new Review;
                $data->user_id=$user->id;
                $data->product_id=$request->product_id;
                $data->rating=$request->rate;
                $data->review_text=$request->review_text;
                $data->save();
                return back()->with('success','Your review has been added');
            } catch (\Throwable $th) {
                return back()->with('error','Something went wrong');

            }
        }

        public function blogCategory($slug){
            try {
            $category_id=Category::where('slug',$slug)->first();

            $data=Blog::where('category_id',$category_id->id)->get();

            return view('front-app.blogs.blogs',compact('data'));

            } catch (\Throwable $th) {
                return back()->with("error",$th->getMessage());
            }
        }
        public function DashboardData(){

            $products=Product::all()->count();
            $stock=[
                'instock'=>Product::where('stock','>',0)->get()->count(),
                'outofstock'=>Product::where('stock',0)->get()->count()
            ];

            $users=User::all()->count();
            $subscriptioncount=CourseSubscribe::all()->count();
            $orders = Order::where('delivery_status', 'delivered')->count();
            $total_orders_earn=Order::sum('total');
            $total_subscriptions_earn=CourseSubscribe::sum('total');
            $pending_count=Order::where('delivery_status','pending')->get()->count();
            $delivered_count=Order::where('delivery_status','delivered')->get()->count();
            $pending_price=Order::where('delivery_status','pending')->sum('total');
            $delivered_price=Order::where('delivery_status','delivered')->sum('total');
            $participents=LotteryOrder::all()->count();

            $total_earning=$total_orders_earn+$total_subscriptions_earn;

            $orderscount=Order::all()->count();
            $pendingOrders = Order::where('delivery_status', 'pending')->count();

            if ($pendingOrders > 0) {
                $percentageDelivered = ($orders / $pendingOrders) * 100;
            } else {
                $percentageDelivered = 0; // Avoid division by zero
            }

            // Format the result
            $percentageDelivered = number_format($percentageDelivered, 2);

            $allorders=Order::all()->count();
            $startDate = now()->startOfMonth(); // Start of the current month
        $endDate = now()->endOfMonth();     // End of the current month

        $monthearning = Order::whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');
        $monthearningsubscription = CourseSubscribe::whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');

        $totalmonthearning=$monthearning+$monthearningsubscription;


            $currentMonthEarnings = Order::whereBetween('created_at', [$startDate, $endDate])
            ->sum('total');

        // Calculate the total earnings for the previous month
        $previousMonthStartDate = $startDate->subMonth();
        $previousMonthEndDate = $endDate->subMonth();
        $previousMonthEarnings = Order::whereBetween('created_at', [$previousMonthStartDate, $previousMonthEndDate])
            ->sum('total');

        // Calculate the percentage increase
        $percentageIncrease = 0;

        if ($previousMonthEarnings > 0) {
            $percentageIncrease = (($currentMonthEarnings - $previousMonthEarnings) / $previousMonthEarnings) * 100;
        }

        // Format the results
        $currentMonthEarnings = number_format($currentMonthEarnings, 2);
        $percentageIncrease = number_format($percentageIncrease, 2);

        $overallsum=Order::sum('total');
        $ordersdata=Order::latest()->take(10)->get();

        $topUsers = User::withCount(['orders', 'course_subscriptions'])
        ->orderByDesc(DB::raw('orders_count + course_subscriptions_count'))
        ->take(5)
        ->get();

    // Fetch top courses based on the number of subscriptions
    $topCoursesBySubscriptions = Course::withCount('subscriptions')
        ->orderBy('subscriptions_count', 'desc')
        ->take(5)
        ->get();

    // Fetch top products based on the number of orders
    $topProductsByOrders = Product::withCount('orders')
        ->orderBy('orders_count', 'desc')
        ->take(5)
        ->get();

            $categories=Brand::all()->count();
            return view('backend_app.index', compact(
                'products', 'users', 'orders', 'categories', 'allorders', 'monthearning',
                'currentMonthEarnings', 'percentageIncrease', 'pendingOrders', 'percentageDelivered',
                'overallsum', 'ordersdata', 'subscriptioncount', 'orderscount', 'total_earning',
                'totalmonthearning', 'pending_count', 'delivered_count', 'pending_price', 'delivered_price',
                'participents', 'stock', 'topUsers', 'topCoursesBySubscriptions',
                'topProductsByOrders'
            ));

        }


        public function Pagination(Request $request){

            $data=Product::paginate(24);

            return response()->json([
                'items' => $data,
                'pagination' => $data->links()->toHtml() // Pass pagination HTML via JSON
            ]);


}


public function cardDiscount(Request $request)
{
    $data = GiftCard::where('gift_no', $request->giftcard)->first();

    if ($data) {
        // If the gift card exists, return a success response with the discount data
        return response()->json([
            'success' => true,
            'discount' => $data->discount, // Adjust this according to your GiftCard model structure
            // Add more data if needed
        ]);
    } else {
        // If the gift card does not exist, return an error response
        return response()->json([
            'success' => false,
            'message' => 'Gift card not found',
            // Add more details if necessary
        ]);
    }
}

public function promoDiscount(Request $request)
{
    $data=Promocode::where('code',$request->promocode)->first();
    if ($data) {
        $expireDate = $data->expire_date; // Assuming 'expire_date' is the field in the database

        // Check if the expire_date is equal to or greater than today's date
        if (strtotime($expireDate) >= strtotime(date('Y-m-d'))) {
            // If the promocode is valid (expire_date >= today's date), return a success response with the discount data
            return response()->json([
                'success' => true,
                'discount' => $data->discount, // Adjust this according to your Promocode model structure
                // Add more data if needed
            ]);
        } else {
            // If the promocode is expired, return an error response
            return response()->json([
                'success' => false,
                'message' => 'Promocode has expired',
                // Add more details if necessary
            ]);
        }
    } else {
        // If the promocode does not exist, return an error response
        return response()->json([
            'success' => false,
            'message' => 'Promocode not found',
            // Add more details if necessary
        ]);
}

}
public function contact(){
    $web_config=SettingModel::find(1);
    return view('front-app.pages.contact',compact('web_config'));
}

public function gallery(){
    try{
        $gallery=Gallery::all();
        return view('front-app.gallery.index',compact('gallery'));
    } catch (\Throwable $th) {
        return back()->with('error',$th->getMessage());
    }
}

}
