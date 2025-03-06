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
                        <h2 class="content-header-title float-start mb-0">PromoCodes</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item">Edit Promocode
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('update-promocode',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
            </div>


            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                   <button class="btn btn-primary " type="submit">Update</button>
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
                                <label for="">Promocode</label>
                                <input type="text" name="promocode" class="form-control" placeholder="Enter PromoCode" value="{{$data->code}}">
                                @error('promocode')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Expiry Date</label>
                                <input type="date" class="form-control" name="date" placeholder="" value="{{$data->expire_date}}">
                                @error('date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Discount in (%)</label>
                                <input type="number" class="form-control" step="any" name="discount" placeholder="Enter Discount %" value="{{$data->discount}}">
                                @error('discount')
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
