@extends('backend_app.layouts.template')
@php
    $category= App\Models\Category::all();
    $users= App\Models\User::all();
    $courses= App\Models\Course::all();


@endphp
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Hall of Fame</h2>
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
                <form action="{{route('submit-certificates')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-12">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Issued By " class="form-control">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Short Description</label>
                                <input type="text" name="short_description" placeholder="Enter Short Description" class="form-control">
                                @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Select Course</label>
                                <select name="course" id="" class="form-control">
                                    <option value="">Choose..</option>
                                    @foreach ($courses as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                   </select>
                                @error('course')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>

                            <div class="col-12 mt-1">
                                <label for="">Tagline</label>
                                <input type="text" placeholder="Enter Tagline" class="form-control" name="tagline">
                                @error('tagline')
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
                        <div class="content-body">
                            <!-- Basic Tables start -->
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">


                                        <div class="row p-2">
                                            <div class="col-12">
                                                <h5>Advance Options</h5>
                                                <label for="" class="mt-1 fw-bold">Logo Image</label>
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
