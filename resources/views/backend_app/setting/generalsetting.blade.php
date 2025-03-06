@extends('backend_app.layouts.template')
@section('content')
@php
    $category= App\Models\Category::all();
    $brands= App\Models\Brand::all();
@endphp
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Setting</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item">General Setting
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <ul class="nav nav-pills mb-2">
                <!-- account -->
                <li class="nav-item">
                    <a class="nav-link active" id="business_setting">
                        <i data-feather="briefcase" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Business Setting</span>
                    </a>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <a class="nav-link " id="social_media">
                        <i data-feather="users" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Social Media</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="3rd_party">
                        <i data-feather="key" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">3rd Party</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="mail_config">
                        <i data-feather="mail" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Mail Config</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="recaptcha">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Recaptcha</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="shipping">
                        <i data-feather="message-square" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Shipping  & Payment Settings</span>
                    </a>
                </li>


            </ul>
            <div class="col-12">
        <div class="content-body" id="business_setting_div">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="user"></i> Company Information  </p>
                        </div>

                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row px-2 py-2">
                            <input type="hidden" name="data_from" value="business_setting">
                            <div class="col-6 col-lg-6  col-sm-12 mb-2">
                                <label for="">Company Name <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{$data->email}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 col-lg-6  col-sm-12 mb-2">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{$data->email}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 col-lg-4 col-sm-12 mb-2">
                                <label for="">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$data->address}}">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-4 col-lg-4 col-sm-12 mb-2">
                                <label for="">Phone No <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="phone_no" placeholder="Phone No" value="{{$data->phone_no}}">
                                @error('phone_no')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-4 col-lg-4 col-sm-12 mb-2">
                                <label for="">Footer Tagline</label>
                                <input type="text" class="form-control" name="footer_tagline" placeholder="Enter footer tagline" value="{{$data->footer_tagline}}">
                            </div>
                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title" value="{{$data->meta_title}}">
                            </div>
                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="5" placeholder="Enter Meta Description" class="form-control">{{$data->meta_description}}</textarea>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="image"></i> Website Header Logo  </p>

                        </div>


                        <div class="row px-2 py-2">


                            <img src="{{asset('assets/'.$data->logo)}}" alt="" class="w-50 m-auto d-block">
                            <input type="file" class="form-control mt-1" name="logo">



                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="image"></i> Footer Logo  </p>

                        </div>


                        <div class="row px-2 py-2">

                            <img src="{{asset('assets/'.$data->footer_logo)}}" alt="" class="w-50 m-auto  d-block">


                            <input type="file" class="form-control mt-1" multiple name="footer_logo">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="image"></i> Website Fav icon</p>

                        </div>


                        <div class="row px-2 py-2">

                            <img src="{{asset('assets/'.$data->footer_logo)}}" alt="" class="w-50 m-auto  d-block">


                            <input type="file" class="form-control mt-1" multiple name="footer_logo">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="image"></i> Preloader</p>

                        </div>


                        <div class="row px-2 py-2">

                            <img src="{{asset('assets/'.$data->footer_logo)}}" alt="" class="w-50 m-auto  d-block">


                            <input type="file" class="form-control mt-1" multiple name="footer_logo">

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary float-end">Save Information</button>
                </div>
            </div>
        </form>
            <!-- Basic Tables end -->

            <!-- Dark Tables start -->

                        </div>
                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="content-body " style="display: none;" id="social_media_div">
                            <!-- Basic Tables start -->
                            <input type="hidden" value="social_media" name="data_from">
                            <div class="row" id="basic-table">
                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://static.vecteezy.com/system/resources/thumbnails/012/660/856/small/facebook-logo-on-transparent-isolated-background-free-vector.jpg" style="width: 30px;height:30px;" alt=""> Facebook
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="facebook" placeholder="Enter Facebook Link" value="{{$data->facebook}}">
                                        </div>
                                      </div>
                                </div>


                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://img.freepik.com/free-vector/instagram-icon_1057-2227.jpg?size=338&ext=jpg&ga=GA1.1.34264412.1707868800&semt=ais" style="width: 30px;height:30px;" alt=""> Instagram
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="instagram" placeholder="Enter Instagram Link" value="{{$data->instagram}}">
                                        </div>
                                      </div>
                                </div>

                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://static.toiimg.com/thumb/msid-102075304,width-400,resizemode-4/102075304.jpg" style="width: 30px;height:30px;" alt=""> Twitter
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="twitter" placeholder="Enter Twitter Link" value="{{$data->twitter}}">
                                        </div>
                                      </div>
                                </div>

                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://store-images.s-microsoft.com/image/apps.31120.9007199266245564.44dc7699-748d-4c34-ba5e-d04eb48f7960.bc4172bd-63f0-455a-9acd-5457f44e4473" style="width: 30px;height:30px;" alt=""> Linkedin
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="linkedin" placeholder="Enter Linkedin Link" value="{{$data->linkedin}}">
                                        </div>
                                      </div>
                                </div>

                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://cdn.shopify.com/app-store/listing_images/ca1f1238d808935b77771b399df6e9ab/icon/CLe6nrP0lu8CEAE=.png" style="width: 30px;height:30px;" alt=""> Ticktok
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="ticktok" placeholder="Enter Tictok Link" value="{{$data->ticktok}}">
                                        </div>
                                      </div>
                                </div>

                                <div class="col-6 mt-1">
                                    <div class="card shadow border">
                                        <div class="p-1 border-bottom">
                                          <img src="https://play-lh.googleusercontent.com/lMoItBgdPPVDJsNOVtP26EKHePkwBg-PkuY9NOrc-fumRtTFP4XhpUNk_22syN4Datc" style="width: 30px;height:30px;" alt=""> Youtube
                                        </div>
                                        <div class="card-body pt-2">
                                            <input type="text" class="form-control" name="youtube" placeholder="Enter youtube Link" value="{{$data->youtube}}">
                                        </div>
                                      </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary float-end">Save Information</button>
                                </div>
                            </div>
                        </form>
                            <!-- Basic Tables end -->

                            <!-- Dark Tables start -->

                                        </div>

                                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="content-body " style="display: none;" id="3rd_party_div">
                                            <!-- Basic Tables start -->
                                            <input type="hidden" value="3rd_party" name="data_from">
                                            <div class="row" id="basic-table">
                                                <div class="col-6 mt-1">
                                                    <div class="card shadow border">
                                                        <div class="p-1 border-bottom">
                                                          <img src="https://bankful.com/wp-content/uploads/2022/09/bankful_logo_whitebg.png" class="w-25" alt="">
                                                        </div>
                                                        <div class="card-body pt-2">
                                                            <label for="">App ID</label>
                                                            <input type="text" class="form-control mb-2" name="bankful_id" placeholder="Optional" value="">
                                                            <label for="">Payment Username</label>
                                                            <input type="text" class="form-control mb-2" name="bankful_username" placeholder="Enter Username" value="{{$data->bankful_username}}">
                                                            <label for="">Payment Password</label>
                                                            <input type="text" class="form-control " name="bankful_password" placeholder="Enter Password" value="{{$data->bankful_password}}">
                                                        </div>
                                                      </div>
                                                </div>

                                                <div class="col-6 mt-1">
                                                    <div class="card shadow border">
                                                        <div class=" border-bottom">
                                                          <img src="https://upload.wikimedia.org/wikipedia/commons/1/1c/PUSHER.png" class="w-25" alt="">
                                                        </div>
                                                        <div class="card-body pt-2">
                                                            <label for="">App ID</label>
                                                            <input type="text" class="form-control mb-2" name="pusher_id" placeholder="Enter App ID" value="{{$data->pusher_id}}">
                                                            <label for="">App Key</label>
                                                            <input type="text" class="form-control mb-2" name="pusher_key" placeholder="Enter Key Key" value="{{$data->pusher_app_key}}">
                                                            <label for="">App Secreat</label>
                                                            <input type="text" class="form-control " name="pusher_secreat" placeholder="Enter Secreat Key" value="{{$data->pusher_secreat_key}}">
                                                        </div>
                                                      </div>
                                                </div>




                                                <div class="col-12">
                                                    <button class="btn btn-primary float-end">Save Information</button>
                                                </div>
                                            </div>
                                        </form>
                                            <!-- Basic Tables end -->

                                            <!-- Dark Tables start -->

                                                        </div>

                                                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="content-body " style="display: none;" id="mail_config_div">
                                                            <!-- Basic Tables start -->
                                                            <input type="hidden" value="mail_config" name="data_from">
                                                            <div class="row" id="basic-table">
                                                                <div class="col-6 mt-1">
                                                                    <div class="card shadow border">
                                                                        <div class="p-1 border-bottom">
                                                                          <img src="https://thumbs.dreamstime.com/b/%D0%BF%D0%B5%D1%87%D0%B0%D1%82%D1%8C-201003176.jpg" style="width:40px;" alt=""> SMTP Mail Setting
                                                                        </div>
                                                                        <div class="card-body pt-2">
                                                                            <div class="container-fluid p-0">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <label for="">Mailer Name</label>
                                                                                        <input type="text" class="form-control mb-2" name="mail_name" placeholder="Enter Name" value="{{$data->mailer_name}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Host</label>
                                                                                        <input type="text" class="form-control mb-2" name="mail_host" placeholder="Enter Host" value="{{$data->mailer_host}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Driver</label>
                                                                            <input type="text" class="form-control mb-2" name="mail_driver" placeholder="Enter Driver" value="{{$data->mailer_driver}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Port</label>
                                                                            <input type="text" class="form-control mb-2" name="mail_port" placeholder="Enter Port" value="{{$data->mailer_port}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Username</label>
                                                                            <input type="text" class="form-control mb-2" name="mailer_username" placeholder="Enter Username" value="{{$data->mailer_username}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Email ID</label>
                                                                            <input type="text" class="form-control mb-2" name="mail_email_id" placeholder="Enter Email ID" value="{{$data->mailer_email_id}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Encryption</label>
                                                                            <input type="text" class="form-control mb-2" name="mail_encryption" placeholder="Enter Encryption" value="{{$data->mailer_encryption}}">
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <label for="">Password</label>
                                                                            <input type="password" class="form-control mb-2" name="mail_password" placeholder="Enter Password" value="{{$data->mailer_password}}">
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <button class="btn btn-primary float-end">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                      </div>
                                                                </div>







                                                            </div>
                                                        </form>
                                                            <!-- Basic Tables end -->

                                                            <!-- Dark Tables start -->

                                                                        </div>

                                                                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                        <div class="content-body" style="display: none;" id="recaptcha_div">
                                                                            <!-- Basic Tables start -->
                                                                            <input type="hidden" value="recaptcha" name="data_from">
                                                                            <div class="row" id="basic-table">
                                                                                <div class="col-12 mt-1">
                                                                                    <div class="card shadow border">
                                                                                        <div class="p-1 border-bottom d-flex justify-content-between">
                                                                                         <div> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/ReCAPTCHA_icon.svg/220px-ReCAPTCHA_icon.svg.png" style="width:40px;" alt=""> Recaptcha Turn <span class="badge bg-danger">{{$data->recaptcha_status ===1 ? "OFF" : "ON"}}</span></div>
                                                                                         <div><div class="form-check form-switch">
                                                                                            <input class="form-check-input" name="status" value="1" type="checkbox" @if($data->recaptcha_status === 1) checked @endif role="switch" id="flexSwitchCheckDefault">
                                                                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                                                                          </div></div>
                                                                                        </div>
                                                                                        <div class="card-body pt-2">
                                                                                            <div class="container-fluid p-0">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <label for="">Site Key</label>
                                                                                                        <input type="text" class="form-control mb-2" name="recaptcha_site_key" placeholder="Enter Name" value="{{$data->recaptcha_site_key}}">
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <label for="">Secreat Key</label>
                                                                                                        <input type="text" class="form-control mb-2" name="recaptcha_secreat_key" placeholder="Enter Host" value="{{$data->recaptcha_secreat_password}}">
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <p>Instructions</p>
                                                                                                        <ol>
                                                                                                            <li>To get site key and secret key Go to the Credentials page <a href="https://www.google.com/recaptcha/admin/create">(Click here)</a></li>
                                                                                                            <li>Add a label (Ex: abc company)</li>
                                                                                                            <li>Select reCAPTCHA v2 as ReCAPTCHA Type</li>
                                                                                                            <li>Select sub type: Im not a robot checkbox</li>
                                                                                                            <li>Add Domain (For ex: demo.6amtech.com)</li>
                                                                                                            <li>Check in “Accept the reCAPTCHA Terms of Service”</li>
                                                                                                            <li>Press Submit</li>
                                                                                                            <li>Copy Site Key and Secret Key Paste in the input filed below and Save.</li>
                                                                                                        </ol>
                                                                                                    </div>





                                                                                                    <div class="col-12">
                                                                                                        <button class="btn btn-primary float-end">Save</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                                </div>
                                                                                            </div>



                                                                                        </div>
                                                                                      </div>
                                                                                </div>







                                                                            </div>
                                                                        </form>
                                                                            <!-- Basic Tables end -->

                                                                            <!-- Dark Tables start -->

                                                                                        </div>


                                                        {{-- Shipping --}}


                                                        <form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="content-body" style="display: none;" id="shipping_div">
                                                            <!-- Basic Tables start -->
                                                            <input type="hidden" value="shipping" name="data_from">
                                                            <div class="row" id="basic-table">
                                                                <div class="col-12 mt-1">
                                                                    <div class="card shadow border">
                                                                        <div class="p-1 border-bottom d-flex justify-content-between">
                                                                         <div>Shipping Details</div>
                                                                        </div>
                                                                        <div class="card-body pt-2">
                                                                            <div class="container-fluid p-0">
                                                                                <div class="row">
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <label for="" class="d-block mb-1">Shipping Price</label>
                                                                                            <input type="number" class="form-control" value="{{$shipping->shipping_price}}" placeholder="Shipping Tax" name="shipping_price" id="">
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="" class="d-block mb-1">Sales Tax %</label>
                                                                                            <input type="number" value="{{$shipping->sales_tax}}" class="form-control" placeholder="Sales Tax" step="any" name="sales_tax" id="">
                                                                                        </div>

                                                                                    </div>





                                                                                    <div class="col-12 mt-2">
                                                                                        <button class="btn btn-primary float-end">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                      </div>
                                                                </div>







                                                            </div>
                                                        </form>
                                                            <!-- Basic Tables end -->

                                                            <!-- Dark Tables start -->

                                                                        </div>



                                                        {{--  --}}

                    </div>


                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.nav-link').click(function (e) {
            e.preventDefault();
            var targetId = $(this).attr('id') + '_div';
            $('.nav-link').removeClass('active'); // Remove active class from all nav items
            $(this).addClass('active'); // Add active class to the clicked nav item
            $('[id$="_div"]').not('#' + targetId).hide(); // Hide all divs except the target div
            $('#' + targetId).show(); // Show the target div
        });
    });
Dropzone.options.myDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true, // Show remove link on each preview
        init: function () {
            this.on("success", function (file, response) {
                // Handle successful uploads
            });
            this.on("removedfile", function (file) {
                // Handle file removal
            });
        }
    };

</script>
@endsection
