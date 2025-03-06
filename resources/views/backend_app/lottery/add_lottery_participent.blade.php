@extends('backend_app.layouts.template')
@section('content')
@php
    $category=App\Models\Category::all();
@endphp
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Lottery Member</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Add Member
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('store-lottery-particpent')}}" method="POST" enctype="multipart/form-data">
                    @csrf
            </div>


            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block ">
                <div class="mb-1 breadcrumb-right">
                   <button class="btn btn-primary " type="submit">Publish</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" >
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="user"></i> Member Information  </p>
                        </div>



                        <div class="row px-3 pt-2 pb-3">
                            <div class="col-6">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter First Name">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Phone No</label>
                                <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone no">
                                @error('phone_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Company Name</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter company name">
                                @error('company_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>






                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="map-pin"></i> Address Information  </p>
                        </div>



                        <div class="row px-3 pt-2 pb-3">
                            <div class="col-6">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Enter country">
                                @error('country')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Province</label>
                                <input type="text" name="province" class="form-control" placeholder="Enter Province">
                                @error('province')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter City">
                                @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Address</label>
                                <input type="text" name="address
                                " class="form-control" placeholder="Enter Address">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>







                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom pb-0">
                         <p class="fw-bold"><i data-feather="archive"></i> Lottery Information  </p>
                        </div>



                        <div class="row px-3 pt-2 pb-3">
                            <div class="col-6">
                                <label for="">Select Lottery</label>
                                <select class="form-select" name="lottery_id" id="">
                                    <option value="">Choose Lottery</option>
                                    @foreach ($data as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('lottery_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Payment Method</label>
                                <select class="form-select" name="payment_method" id="">
                                    <option value="">Choose Payment Method</option>

                                    <option value="cash">Cash</option>
                                    <option value="bankful">Bankful</option>


                                </select>
                                @error('payment_method')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>









                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->

            <!-- Dark Tables start -->

                        </div>
                    </div>

                    <div class="col-3">

                                    </div>
                                </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>


@endsection
