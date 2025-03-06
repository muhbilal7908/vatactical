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
                        <h2 class="content-header-title float-start mb-0">Sliders</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Sliders
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                   <a href="{{route('create-sliders')}}"> <button class="btn btn-primary">Add New Slide +</button></a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
         <div class="row mt-1">
            @foreach ($data as $item)
            <div class="col-3"><div class="card position-relative" >
                <a onclick="return confirm('Are you sure you want to delete this item?');" class="position-absolute end-0 hover" href="{{route('destroy-sliders',['id'=>$item->id])}}"><i style="color:#8a0103;width:30px;height:30px;" class="ms-auto" data-feather="x-circle"></i></a>

                <img src="{{asset('assets/slide/'.$item->img)}}" class="w-75 rounded-3 m-auto d-block mt-2 shadow" alt="...">

                <div class="card-body">

                <a href="{{route('edit-sliders',['id'=>$item->id])}}" class="btn btn-primary mt-2 m-auto d-block">Edit Slide</a>
                </div>
              </div></div>
            @endforeach



         </div>
            <!-- Basic Tables end -->

            <!-- Dark Tables start -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>
@endsection
