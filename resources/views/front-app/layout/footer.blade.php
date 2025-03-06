
@php
$generalSetting=App\Models\SettingModel::where('id',1)->first();

@endphp
<footer class="contacts_wrap scheme_original" style="background-color: white;">
    <div class="container">
        <div class="row">
   <div class="col-md-4 col-lg-4 col-sm-12">
    <img src="{{asset('assets/featured_images/'.$generalSetting->footer_logo)}}" class="mb-5 mt-2 mob-center" width="250"   style="margin-left:-50px;" alt="">
    <ul class="list-unstyled list-inline">
        <a href="{{$generalSetting->facebook}}" target="_blank"><i class="fa-brands me-2 fab fa-facebook-square fa-lg fs-1" style="color:black;"></i></a>
      <a href="{{$generalSetting->instagram}}" target="_blank"><i class="fa-brands fa-instagram fa-lg fs-1 me-2" style="color:black;"></i></a>

    <a href="{{$generalSetting->linkedin}}">   <i class="fab fa-linkedin  fa-lg fs-1  me-2" style="color:black;"></i></a>
    <a href="{{$generalSetting->twitter}}">
        <i class="fa-brands fa-x-twitter fa-lg fs-1 me-2" style="color:black;"></i>

    </a>
    <a href="{{$generalSetting->ticktok}}">   <i class="fab fa-tiktok  fa-lg fs-1  me-2 " style="color:black;"></i></a>


    </ul>
    <p class="text-dark mb-0">© 2023 Copyright All Right Reserved VTSA</p>
    <p class="text-dark mb-0">
       {{$generalSetting->address}}</p>
    <ul class="list-unstyled list-inline text-dark">
       <li class="list-inline-item "><a href="sitemap.xml">Sitemap</a></li>

     <li class="list-inline-item"><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
     <li class="list-inline-item"><a href="{{route('terms_conditions')}}" class="text-dark">Terms & Conditions</a></li>







    </ul>
   </div>
   <div class="col-md-8 col-lg-8 col-sm-12 text-dark mt-5">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <h5 class="text-dark fw-bold">Partners</h5>
            <a href="https://tracking.deltadefense.com/aff_c?offer_id=372&aff_id=22347" target="_blank"><img src="{{asset('assets/PartnerLogo_Horizontal_Black.webp')}}" class="w-75 " alt=""></a>

       </div>
        <div class="col-md-4 col-lg-4 col-sm-12">


             <h5 class="text-dark fw-bold">Pages</h5>
            <ul class="list-unstyled text-dark">
                <li class=""><a class="text-dark" href="{{route('home')}}">Home</a></li>
              <li class=""><a class="text-dark" href="{{route('about')}}">About</a></li>
              <li class=""><a class="text-dark" href="{{route('services')}}">Services</a></li>
              <li class=""><a class="text-dark" href="{{route('front-blogs')}}">Blogs</a></li>
              <li class=""><a class="text-dark" href="{{route('shop')}}">Shop</a></li>
              <li class=""><a class="text-dark" href="{{route('mission')}}">Our Mission</li>
              <li class=""><a class="text-dark" href="{{route('faqs')}}">Faqs</li>

              <li class=""><a href="{{route('contact')}}">Contact</a></li>






             </ul>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <h5 class="text-dark fw-bold">Contact</h5>
            <ul class="list-unstyled text-dark">
                <li class="">{{$generalSetting->address}}</li>
              <li class=""><a href="tel:{{$generalSetting->phone_no}}">Phone: {{$generalSetting->phone_no}}</a></li>
              <li class=""><a href="mailto:{{$generalSetting->email}}">Email: {{$generalSetting->email}}</a></li>
                <h6 class="text-dark fw-bold mt-4">Payment Methods</h6>
                <img src="{{asset('assets/sezzel.svg')}}" class="w-50" alt="">
                <img src="{{asset('assets/pinWheel.svg')}}" class="w-25" style="margin-top: -20px;" alt="">
                <img src="{{asset('assets/visa.svg')}}" class="w-25" alt="">
                <img src="{{asset('assets/credova.png')}}" width="40" alt="">







             </ul>
        </div>

    </div>

   </div>
</div>
</div>

</footer>

