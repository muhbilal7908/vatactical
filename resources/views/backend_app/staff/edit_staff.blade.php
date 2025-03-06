@extends('backend_app.layouts.template')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Staff</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Add Staff
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('update-staff',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
            </div>


            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                   <button class="btn btn-primary " type="submit">Publish</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">


                        <div class="row p-3">
                            <div class="col-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Name">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{$data->email}}" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Phone no</label>
                                <input type="text" name="phone_no" class="form-control" value="{{$data->phone_no}}" placeholder="Enter Phone Number">
                                @error('phone_no')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4 mt-1">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{$data->instagram}}" placeholder="Enter Instagram">
                                @error('instagram')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{$data->facebook}}" placeholder="Enter facebook link">
                                @error('facebook')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">linkedin</label>
                                <input type="text" name="linkedin" class="form-control" value="{{$data->linkedin}}" placeholder="Enter linkedin Link">
                                @error('linkedin')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                            <div class="col-12 mt-1">
                                <label for="">Description</label>
                                <textarea  id="" cols="30" rows="10" name="description"  class="form-control" placeholder="Enter Description">{{$data->description}}</textarea>
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
                        <div class="content-body">
                            <!-- Basic Tables start -->
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">


                                        <div class="row p-2">
                                            <div class="col-12">
                                                <h5>Advance Options</h5>
                                                <label for="" class="mt-1 fw-bold">Featured Image</label>
                                                <img src="{{asset('assets/staff/'.$data->img)}}" class="w-100" alt="">
                                                <input type="file" class="form-control mt-1" name="img">






                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Tables end -->

                            <!-- Dark Tables start -->

                                        </div>
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
