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
                        <h2 class="content-header-title float-start mb-0">Pages</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Pages
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
                        <span class="fw-bold">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="recaptcha">
                        <i data-feather="lock" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Courses</span>
                    </a>
                </li>
                <!-- security -->
                <li class="nav-item">
                    <a class="nav-link " id="social_media">
                        <i data-feather="users" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Privacy Policy</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " id="3rd_party">
                        <i data-feather="key" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">Terms & Conditions</span>
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
                         <p class="fw-bold"><i data-feather="user"></i>About Content  </p>
                        </div>

                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row px-2 py-2">
                            <input type="hidden" name="data_from" value="about">


                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                <label for="">Description</label>
                                <textarea name="description"  cols="30" rows="5"  placeholder="Enter Description" class="form-control textarea">@php echo $about @endphp</textarea>
                            </div>



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
                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="content-body " style="display: none;" id="social_media_div">
                            <!-- Basic Tables start -->
                            <input type="hidden" value="privacy_policy" name="data_from">
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-bottom pb-0">
                                         <p class="fw-bold"><i data-feather="user"></i> Privacy Policy Content  </p>
                                        </div>

                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row px-2 py-2">
                                            <input type="hidden" name="data_from" value="privacy_policy">


                                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                                <label for="">Description</label>
                                                <textarea name="description"  cols="30" rows="5" placeholder="Enter Description" class="form-control textarea">{{$privacy_policy}}</textarea>
                                            </div>



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

                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="content-body " style="display: none;" id="3rd_party_div">
                                            <!-- Basic Tables start -->
                                            <input type="hidden" value="terms_condition" name="data_from">
                                            <div class="row" id="basic-table">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header border-bottom pb-0">
                                                         <p class="fw-bold"><i data-feather="user"></i> Terms & Condition Content  </p>
                                                        </div>

                                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="row px-2 py-2">
                                                            <input type="hidden" name="data_from" value="terms_condition">


                                                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                                                <label for="">Description</label>
                                                                <textarea name="description"  cols="30" rows="5" placeholder="Enter Description" class="form-control textarea">{{$terms_condition}}</textarea>
                                                            </div>



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

                                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        <div class="content-body " style="display: none;" id="mail_config_div">
                                                            <!-- Basic Tables start -->
                                                            <input type="hidden" value="privacy_policy" name="data_from">
                                                            <div class="row" id="basic-table">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-header border-bottom pb-0">
                                                                         <p class="fw-bold"><i data-feather="user"></i> Privacy Policy Content  </p>
                                                                        </div>

                                                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                        <div class="row px-2 py-2">
                                                                            <input type="hidden" name="data_from" value="privacy_policy">


                                                                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                                                                <label for="">Description</label>
                                                                                <textarea name="description"  cols="30" rows="5" placeholder="Enter Description" class="form-control textarea">{{$privacy_policy}}</textarea>
                                                                            </div>



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

                                                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                        <div class="content-body" style="display: none;" id="recaptcha_div">
                                                                            <!-- Basic Tables start -->

                                                                            <div class="row" id="basic-table">
                                                                                <div class="col-12">
                                                                                    <div class="card">
                                                                                        <div class="card-header border-bottom pb-0">
                                                                                         <p class="fw-bold"><i data-feather="user"></i> Courses Content  </p>
                                                                                        </div>

                                                                                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                                                                                            @csrf
                                                                                        <div class="row px-2 py-2">
                                                                                            <input type="hidden" value="course" name="data_from">

                                                                                            <div class="col-12 col-lg-12 col-sm-12 mb-2">
                                                                                                <label for="">Description</label>
                                                                                                <textarea name="description"  cols="30" rows="5" placeholder="Enter Description" class="form-control textarea">{{$course}}</textarea>
                                                                                            </div>



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
