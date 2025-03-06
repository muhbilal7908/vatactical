<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FameController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotteryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PagesContorller;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\MembershipController;
use App\Models\Lottery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    //////////////// Frontend Website ///////////////////////////////////////////

    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('journey',[ProductController::class,'journey'])->name('journey');
    Route::get('gallery',[HomeController::class,'gallery'])->name('website.gallery');
    Route::get('all-courses',[HomeController::class,'showCourses'])->name('front-courses');
    Route::get('course/{slug}',[HomeController::class,'courseDetail'])->name('course-detail');
    Route::get('shop',[HomeController::class,'Shop'])->name('shop');
    Route::get('about',[PagesContorller::class,'about'])->name('about');
    Route::get('terms-conditions',[PagesContorller::class,'terms_condition'])->name('terms_conditions');
    Route::get('privacy-policy',[PagesContorller::class,'privacy_policy'])->name('privacy_policy');
    Route::view('security','front-app.pages.security')->name('security');
    Route::get('faqs',[FAQController::class,'show'])->name('faqs');
    Route::view('range','front-app.courses.range')->name('range');
    Route::get('product-detail/{id}',[HomeController::class,'ProductDetail'])->name('product_detail');
    Route::get('brand/{slug}',[HomeController::class,'BrandData'])->name('brand');
    Route::get('category/{slug}',[HomeController::class,'CategoryData'])->name('category');
    Route::get('ammunation',[HomeController::class,'Shop'])->name('ammunation');
    Route::view('services','front-app.pages.services')->name('services');
    Route::get('product/{slug}',[HomeController::class,'ProductDetail'])->name('product_detail');
    Route::get('cart',[CartController::class,'ShowCart'])->name('show_cart')->middleware(['auth', 'verified']);
    Route::post('add-to-cart',[CartController::class,'AddToCart'])->name('add_to_cart')->middleware(['auth', 'verified']);
    Route::get('delete-item/{id}',[CartController::class,'DeleteItem'])->name('delete-item');
    Route::post('form-submit',[HomeController::class,'FormSubmit'])->name('form-submit');
   //
    Route::get('checkout/{id}',[CartController::class,'checkout'])->name('checkout');
    Route::post('order-submit',[OrderController::class,'OrderSubmit'])->name('order-submit');
    Route::get('order-payment',[OrderController::class,'OrderPayment'])->name('order-payment');
    Route::post('order-confirmation',[OrderController::class,'confirmation'])->name('order-confirmation');
    //

    Route::get('all-orders',[OrderController::class,'allOrders'])->name('all-orders');
    Route::get('generate-pdf-orders',[OrderController::class,'generatePDF'])->name('generate-pdf-orders');
    Route::post('update-order',[OrderController::class,'updateStatus'])->name('update-status');
    Route::get('delete-order/{id}',[OrderController::class,'deleteOrder'])->name('delete-order');
    Route::view('mission','front-app.pages.mission')->name('mission');
    Route::get('contact',[HomeController::class,'contact'])->name('contact');
    Route::view('VTSA-gaming','front-app.gaming')->name('VTSA-gaming');
    Route::get('all-fame',[FameController::class,'index'])->name('all-fame');
    Route::view('custom-gun','front-app.custom_gun')->name('custom-gun');
    Route::get('certificates',[CertificateController::class,'show'])->name('certificates');
    Route::post('filter-products',[HomeController::class,'filterProducts'])->name('filter-products');
    Route::get('all-blogs',[HomeController::class,'FrontBlogs'])->name('front-blogs');
    Route::get('blog-detail/{slug}',[HomeController::class,'BlogDetail'])->name('detail-blog');
    Route::get('blog-category/{slug}',[HomeController::class,'blogCategory'])->name('blog-category');
    Route::get('generate-pdf',[ProfileController::class,'generate_pdf'])->name('generate-pdf-users');
    Route::post('submit-review',[HomeController::class,'SubmitReview'])->name('submit-review')->middleware(['auth', 'verified']);;
    Route::post('product-filter',[HomeController::class,'productFilter'])->name('product-filter');
    Route::get('course-subscription',[SubscriptionController::class,'SubscribeCourse'])->name('course-subscription')->middleware(['auth', 'verified']);;
    Route::post('subscription-payment',[SubscriptionController::class,'SubscriptionPayment'])->name('subscription_payment');
    Route::post('subscription-confirmation',[SubscriptionController::class,'confirmation'])->name('subscription-confirmation');


    Route::get('course-payment',[SubscriptionController::class,'CoursePayment'])->name('course-payment');
    Route::view('403','front-app.403-page');
    Route::get('track-order',[HomeController::class,'TrackOrder'])->name('track-order');
    Route::post('track-no',[HomeController::class,'TrackNo'])->name('track-no');
    Route::get('date-picker/{slug}',[HomeController::class,'Datepicker'])->name('date-picker');
    Route::get('filter-pagination',[HomeController::class,'Pagination'])->name('filter-pagination');

//Lottery
Route::group(['prefix' => 'lottery'], function () {
Route::get('all',[LotteryController::class,'allLottery'])->name('front-lottery');
Route::get('event',[LotteryController::class,'lottery_event'])->name('event-lottery');
Route::get('/{slug}',[LotteryController::class,'lotteryDetail'])->name('detail-lottery');
Route::get('checkout/{slug}',[LotteryController::class,'lotteryCheckout'])->name('lottery-checkout')->middleware(['auth', 'verified']);
Route::get('payment/{slug}',[LotteryController::class,'lottery_payment'])->name('lottery-payment')->middleware(['auth', 'verified']);
Route::post('store-payment/{id}',[LotteryController::class,'store_payment'])->name('lottery-store-payment')->middleware(['auth', 'verified']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



/////////////////// backend app  //////////////////////////////////////////


//customer
Route::group(['prefix' => 'customers'], function () {
Route::get('update_profile/{id}',[CustomerController::class,'UpdateProfile'])->name('update-customer');
Route::post('submit-profile',[CustomerController::class,'SubmitProfile'])->name('submit-profile');
Route::get('add-to-fav/{id}',[CustomerController::class,'AddToFav'])->name('add-to-fav')->middleware(['auth', 'verified']);
Route::get('Favorites',[CustomerController::class,'showFavourites'])->name('favourites')->middleware(['auth', 'verified']);
Route::get('delete-Favorites/{id}',[CustomerController::class,'DeleteFavourites'])->name('delete-favourites');
Route::post('Favorites-to-cart',[CustomerController::class,'FavtoCart'])->name("favourite-cart");
Route::get('Favorites-products',[CustomerController::class,'AllFav'])->name("favourite-backend");
Route::get('cart',[CustomerController::class,'customer_cart'])->name("customer-cart");
Route::get('dashboard',[CustomerController::class,'CustomerDashboard'])->name('CustomerDashboard');
Route::get('customer-subscriptions',[CustomerController::class,'CustomerSubscription'])->name('customer-subscriptions');
Route::get('customer-orders',[CustomerController::class,'Orders'])->name('customer-orders');
Route::get('edit-profile/{id}',[SettingController::class,'editProfile'])->name("edit-profile");
Route::post('update_profile',[SettingController::class,'UpdateProfile'])->name("update-profile");
Route::post('update-password/{id}',[SettingController::class,'updatePassword'])->name('update-password');
Route::post('get-certificate',[HomeController::class,'GetCertificate'])->name('get-certificate');
Route::get('filter-order',[CustomerController::class,'filterOrder'])->name('customer-filter-order');
//ORder Customer
})->middleware(['auth', 'verified']);
//admin
Route::get('order-detail/{id}',[OrderController::class,'OrderDetail'])->name('order-detail');
Route::get('subscription-detail/{id}',[SubscriptionController::class,'SubscriptionDetail'])->name('subscription-detail');
Route::middleware(['admin'])->group(function () {
Route::get('/dashboard',[HomeController::class,'DashboardData'])->name('dashboard');

//products

Route::get('products',[ProductController::class,'index'])->name('products');
Route::view('add-products','backend_app.products.addproduct')->name('addproduct');
Route::post('submit-product',[ProductController::class,'store'])->name('submitproduct');
Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');
Route::post('update-product/{id}',[ProductController::class,'update'])->name('updateproduct');
Route::get('delete-product/{id}',[ProductController::class,'destroy'])->name('delete-product');
Route::get('show-product',[ProductController::class,'index'])->name('showproduct');
Route::get('delete-img/{id}',[ProductController::class,'ImgDel'])->name('delete-img');
Route::post('/upload', 'UploadController@upload')->name('upload');
Route::post('/update-featured-status',[ProductController::class,'update_status'])->name('update-featured-status');
Route::get('search-products', [ProductController::class, 'FilterProducts'])->name('search-products');
Route::get('stock/{status}',[ProductController::class,'stockStatus'])->name('stock-status');
//Categoires

Route::get('categories',[CategoryController::class,'index'])->name('show-category');
Route::view('add-category','backend_app.category.addcategory')->name('add-category');
Route::post('submit-category',[CategoryController::class,'create'])->name('submit-category');
Route::get('edit-category/{id}',[CategoryController::class,'edit'])->name('edit-category');
Route::post('update-category/{id}',[CategoryController::class,'update'])->name('update-category');
Route::get('destroy-category/{id}',[CategoryController::class,'destroy'])->name('destroy-category');

//Brands
Route::get('brands',[BrandController::class,'index'])->name('show-brands');
Route::view('add-brand','backend_app.brands.addbrand')->name('add-brand');
Route::post('submit-brand',[BrandController::class,'store'])->name('submit-brand');
Route::get('edit-brand/{id}',[BrandController::class,'edit'])->name('edit-brand');
Route::post('update-brand/{id}',[BrandController::class,'update'])->name('update-brand');
Route::get('destroy-brand/{id}',[BrandController::class,'destroy'])->name('destroy-brand');
//Orders
Route::view('orders','backend_app.orders.orders')->name('orders');
Route::get('all-orders',[OrderController::class,'allOrders'])->name('all-orders');
Route::get('filter-order',[OrderController::class,'filterOrder'])->name('filter-order');
Route::get('order/{status}',[OrderController::class,'Statusorder'])->name('order-status');


// Email marketing


Route::get('all-mails',[EmailController::class,'index'])->name('all_mails');
Route::post('submit-mail',[EmailController::class,'store'])->name('submit-mail');
Route::get('delete-mails',[EmailController::class,'destroy'])->name('delete-mails');
Route::get('remove-mails',[EmailController::class,'remove'])->name('remove-mails');
Route::get('starred-mails',[EmailController::class,'starred'])->name('starred-mails');
Route::get('trash-mails',[EmailController::class,'trash'])->name('trash-mails');
Route::get('sent-mails',[EmailController::class,'sent'])->name('sent-mails');


// Statistics
Route::get('web-stats',[StatisticsController::class,'webStats'])->name('web-stats');
Route::get('seo-stats',[StatisticsController::class,'webStats'])->name('seo-stats');


//Courses
Route::get('courses',[CoursesController::class,'show'])->name('all-courses');
Route::get('add-courses',[CoursesController::class,'add_course'])->name('add-course');
Route::post('create-course',[CoursesController::class,'create'])->name('create-course');
Route::get('delete-course/{id}',[CoursesController::class,'destroy'])->name('delete-course');
Route::get('edit-course/{id}',[CoursesController::class,'edit'])->name('edit-course');
Route::post('update-course/{id}',[CoursesController::class,'update'])->name('update-course');
Route::get('courses-sessions/{id}',[CoursesController::class,'Slots'])->name('courses-slots');
Route::post('courses-sessions-update/{id}',[CoursesController::class,'updateSlot'])->name('courses.update.slots');

Route::POST('submit-slots',[CoursesController::class,'AddSlot'])->name('submit-course-slot');
Route::get('delete-slot/{id}',[CoursesController::class,'DeleteSlot'])->name('delete-slot');
Route::get('courses-filter',[CoursesController::class,'coursesFilter'])->name('courses-filter');
Route::get('courses-sessions',[CoursesController::class,'coursesSessions'])->name('courses-sessions');
Route::get('/find-courses',[CoursesController::class,'findCourses'])->name('find-courses');
Route::get('/all-slots',[CoursesController::class,'Allslots'])->name('all-slots');
Route::get('courses-participents',[CoursesController::class,'course_participents'])->name('course-participents');
Route::get('course-subscriptions',[CoursesController::class,'get_subscriptions'])->name('get-subscriptions');
Route::post('course-status',[CoursesController::class,'status'])->name('status-course');
Route::get('course-filter',[CoursesController::class,'filter'])->name('filter-course');


//Subscriptions
Route::get('all-subscriptions',[SubscriptionController::class,'allSubscripitons'])->name('all-subscriptions');
Route::get('generate-pdf-subscriptions',[SubscriptionController::class,'generatePDF'])->name('generate-pdf-subscriptions');

Route::get('destroy-subscription/{id}',[SubscriptionController::class,'DestroySubscription'])->name('destroy-subscription');
Route::get('filter-subscription',[SubscriptionController::class,'filter_subscription'])->name('filter-subscription');


//Memberships
Route::prefix('memberships')->group(function(){
Route::get('all',[MembershipController::class,'index'])->name('memberships.all');
Route::get('detail/{id}',[MembershipController::class,'show'])->name('memberships.detail');
Route::get('destroy/{id}',[MembershipController::class,'destroy'])->name('memberships.destroy');
Route::get('generate-pdf-memberships',[MembershipController::class,'generatePDF'])->name('generate-pdf-memberships');
});

//blogs
Route::get('blogs',[BlogController::class,'showallblogs'])->name('all-blogs');
Route::view('add-blog','backend_app.blogs.add_blog')->name('add-blog');
Route::post('submit-blog',[BlogController::class,'addblog'])->name('submit-blog');
Route::get('delete-blog/{id}',[BlogController::class,'destroy'])->name('destroy-blog');
Route::get('edit-blog/{id}',[BlogController::class,'checkblog'])->name('edit-blog');
Route::post('update-blog/{id}',[BlogController::class,'updateblog'])->name('update-blog');
Route::POST('update-blog-status',[BlogController::class,'update_blog_status'])->name('update-blog-status');
//Stripe
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe-get', 'stripe')->name('stripe-get');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

// General Setting

Route::get('general_setting',[SettingController::class,'GeneralSetting'])->name("general-setting");
Route::post('update_setting',[SettingController::class,'UpdateSetting'])->name("update-setting");

// Contact Forms

Route::get('contact-forms',[FormController::class,'ContactForm'])->name('contact-forms');
Route::get('delete-form/{id}',[FormController::class,'deleteContact'])->name('delete-form');

//Profile Edit



//all users
Route::get('all-users',[ProfileController::class,'AllUsers'])->name('all-users');
Route::get('search-user',[ProfileController::class,'search_user'])->name('search-user');

Route::get('user-delete/{id}',[ProfileController::class,'UserDelete'])->name('delete-user');

Route::get('user-info/{id}',[ProfileController::class,'userInfo'])->name('user-info');
Route::get('export-csv',[ProfileController::class,'export_excel'])->name('export-csv');

//Staff members
Route::get('all-staff',[StaffController::class,'index'])->name('all-staff');
Route::get('add-staff',[StaffController::class,'create'])->name('add-staff');
Route::POST('store-staff',[StaffController::class,'store'])->name('store-staff');
Route::get('edit-staff/{id}',[StaffController::class,'edit'])->name('edit-staff');
Route::post('update-staff/{id}',[StaffController::class,'update'])->name('update-staff');
Route::get('delete-staff/{id}',[StaffController::class,'destroy'])->name('delete-staff');

//Hall Of Fame
Route::get('hall-of-fame',[FameController::class,'show'])->name('hall-of-fame');
Route::get('add-member',[FameController::class,'create'])->name('add-fame_member');
Route::post('submit-member',[FameController::class,'store'])->name('submit-fame-member');
Route::post('update-member/{id}',[FameController::class,'update'])->name('update-fame-member');
Route::get('edit-member/{id}',[FameController::class,'edit'])->name('edit-fame-member');
Route::get('delete-member/{id}',[FameController::class,'destroy'])->name('delete-fame-member');


//Certificates

Route::get('all-certificates',[CertificateController::class,'index'])->name('all-certificates');
Route::get('add-certificates',[CertificateController::class,'create'])->name('add-certificates');
Route::post('submit-certificates',[CertificateController::class,'store'])->name('submit-certificates');
Route::post('update-certificates/{id}',[CertificateController::class,'update'])->name('update-certificates');
Route::get('edit-certificates/{id}',[CertificateController::class,'edit'])->name('edit-certificates');
Route::get('delete-certificates/{id}',[CertificateController::class,'destroy'])->name('delete-certificates');
});

//Slider

Route::get('all-sliders',[SliderController::class,'index'])->name('all-sliders');
Route::get('add-sliders',[SliderController::class,'create'])->name('create-sliders');
Route::post('post-slider',[SliderController::class,'store'])->name('store-sliders');
Route::get('edit-slider/{id}',[SliderController::class,'edit'])->name('edit-sliders');
Route::post('update-slider/{id}',[SliderController::class,'update'])->name('update-sliders');
Route::get('destroy-slider/{id}',[SliderController::class,'destroy'])->name('destroy-sliders');


//Gift Cards


Route::get('all-gifts',[GiftController::class,'index'])->name('all-gifts');
Route::get('add-gifts',[GiftController::class,'create'])->name('add-gifts');
Route::post('store-gifts',[GiftController::class,'store'])->name('store-gifts');
Route::get('edit-gifts/{id}',[GiftController::class,'edit'])->name('edit-gifts');
Route::post('update-gifts/{id}',[GiftController::class,'update'])->name('update-gifts');
Route::get('destroy-gifts/{id}',[GiftController::class,'destroy'])->name('destroy-gifts');
Route::group(['prefix' => 'gift-card'], function () {
Route::get('all',[GiftController::class,'show'])->name('gift-cards');
Route::get('/{slug}',[GiftController::class,'giftDetail'])->name('gift-detail');
Route::get('/checkout/{slug}',[GiftController::class,'purchaseGift'])->name('checkout-gift')->middleware(['auth', 'verified']);
Route::post('/payment/{slug}',[GiftController::class,'gift_payment'])->name('payment-gift')->middleware(['auth', 'verified']);
Route::post('/giftOrderSubmit/{id}',[GiftController::class,'giftOrderSubmit'])->name('giftOrderSubmit')->middleware('auth');
Route::post('giftorder-confirmation',[GiftController::class,'confirmation'])->name('giftorder-confirmation');
Route::post('/update-giftcard-status',[GiftController::class,'update_status'])->name('update-giftcard-status');
});

//PromoCodes


Route::get('all-promocodes',[PromoCodeController::class,'index'])->name('all-promocodes');
Route::get('add-promocode',[PromoCodeController::class,'create'])->name('add-promocodes');
Route::post('store-promocode',[PromoCodeController::class,'store'])->name('store-promocode');
Route::get('edit-promocode/{id}',[PromoCodeController::class,'edit'])->name('edit-promocode');
Route::post('update-promocode/{id}',[PromoCodeController::class,'update'])->name('update-promocode');
Route::get('destroy-promocode/{id}',[PromoCodeController::class,'destroy'])->name('destroy-promocode');


//Get Discounts


Route::post('card-discount',[HomeController::class,'cardDiscount'])->name('card-discount');
Route::post('promo-discount',[HomeController::class,'promoDiscount'])->name('promo-discount');

//Lottery
Route::post('lottery-order/{id}',[LotteryController::class,'LotteryOrder'])->name('lottery-order');
Route::post('lottery-order-delete/{id}',[LotteryController::class,'LotteryOrderDelete'])->name('lottery-order-delete');
Route::get('spinner',[LotteryController::class,'Spinner'])->name('spinner');
Route::get('lottery-participents',[LotteryController::class,'LotteryParticipents'])->name('lottery-participents');
Route::get('search-participents',[LotteryController::class,'search_participents'])->name('search-participents');
Route::post('lottery-user',[LotteryController::class,'LotteryUser'])->name('lottery-user');
Route::post('spinner-winner',[LotteryController::class,'front_lottery_winner'])->name('front_lottery_winner');
Route::get('get-winner',[LotteryController::class,'get_winner'])->name('get_winner');

Route::get('add-lottery-member',[LotteryController::class,"add_lottery_member"])->name("add-lottery-particpent");
Route::POST('store-lottery-member',[LotteryController::class,"store_lottery_participent"])->name("store-lottery-particpent");
Route::get("all-lotteries",[LotteryController::class,'index'])->name('all-lottery');
Route::get('add-lottery',[LotteryController::class,'create'])->name('add-lottery');
Route::post('store-lottery',[LotteryController::class,'store'])->name('store-lottery');
Route::get('edit-lottery/{id}',[LotteryController::class,'edit'])->name('edit-lottery');
Route::post('update-lottery/{id}',[LotteryController::class,'update'])->name('update-lottery');
Route::get('delete-lottery/{id}',[LotteryController::class,'destroy'])->name('delete-lottery');
Route::get('lottery-winners',[LotteryController::class,'winners'])->name('lottery-winners');
Route::get('delete-winner/{id}',[LotteryController::class,'delete_winner'])->name('delete-winner');
Route::get('add-discount',[LotteryController::class,'add_discount'])->name('add-discount');


//Popup


Route::get('popup',[PopupController::class,'popup'])->name('popup');
Route::post('updatepopup',[PopupController::class,'update'])->name('update-popup');


//FAQS

Route::group(['prefix' => 'FAQ'], function () {
Route::get('/',[FAQController::class,'index'])->name('all-faqs');
Route::get('create',[FAQController::class,'create'])->name('create-faqs');
Route::post('store',[FAQController::class,'store'])->name('store-faqs');
Route::get('edit/{id}',[FAQController::class,'edit'])->name('edit-faqs');
Route::post('update/{id}',[FAQController::class,'update'])->name('update-faqs');
Route::get('destroy/{id}',[FAQController::class,'destroy'])->name('destroy-faqs');
});

// Gallery

Route::prefix('gallery')->group(function(){
Route::get('all',[GalleryController::class,'index'])->name("gallery.all");
Route::get('create',[GalleryController::class,'create'])->name("gallery.create");
Route::get('edit/{id}',[GalleryController::class,'edit'])->name("gallery.edit");
Route::POST('store',[GalleryController::class,'store'])->name("gallery.store");
Route::put('update/{id}',[GalleryController::class,'update'])->name("gallery.update");
Route::get('delete/{id}',[GalleryController::class,'destroy'])->name("gallery.delete");
Route::post('featured-gallery',[GalleryController::class,'galleryStatus'])->name('featured.gallery');
});


//careers
Route::view('careers','front-app.careers.index')->name('careers');

//Notificaitons

Route::get('all-notificaitons',[NotificationController::class,'index'])->name('all-notificaitons');
Route::get('delete-notificaiton/{id}',[NotificationController::class,'destroy'])->name('delete-notificaiton');

//Pages
Route::group(['prefix' => 'page'], function () {
Route::get('all',[PagesContorller::class,'index'])->name('page-content');
Route::post('add',[PagesContorller::class,'store'])->name('store-content');

//Transection

});

Route::get("/all-transactions",[TransectionController::class,'index'])->name('all-transections');
Route::get("/transactions-excelexport",[TransectionController::class,'excelexport'])->name('transection-excel');
Route::get("/transaction",[TransectionController::class,'search'])->name('search-transection');
