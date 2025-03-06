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
                                <li class="breadcrumb-item">All Staff Members
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                   <a href="{{route('add-staff')}}"> <button class="btn btn-primary">Add Staff Member +</button></a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
         <div class="row mt-1">
            @foreach ($data as $item)
            <div class="col-3"><div class="card position-relative" >
                <a onclick="return confirm('Are you sure you want to delete this item?');" class="position-absolute end-0 hover" href="{{route('delete-staff',['id'=>$item->id])}}"><i style="color:#8a0103;width:30px;height:30px;" class="ms-auto" data-feather="x-circle"></i></a>
                @if ($item->img !== null)
                <img src="{{asset('assets/staff/'.$item->img)}}" class="w-75 rounded-circle m-auto d-block mt-2 shadow" alt="...">
                @else
                <img src="{{asset('assets/staff/avatar.jpg')}}" class="w-75 rounded-circle m-auto d-block mt-2 shadow" alt="...">

                @endif
                <div class="card-body">
                  <h5 class="card-title fw-bold" style="color:#8a0103!important;">{{$item->name}}</h5>
                 <div class="fw-bold"><i style="color:#8a0103;width:20px;height:20px;" class="me-1" data-feather="mail"></i>{{$item->email}}</div>
                 <div class="fw-bold"><i style="color:#8a0103;width:20px;height:20px;" class="me-1" data-feather="phone"></i>{{$item->phone_no}}</div>
                 <div class="d-flex flex-row mt-1"><a href="{{$item->facebook}}"><i style="color:#8a0103;width:20px;height:20px;" class="me-1" data-feather="facebook"></i> </a><a href="{{$item->instagram}}"><i style="color:#8a0103;width:20px;height:20px;" class="me-1" data-feather="instagram"></i></a> <a href="{{$item->linkedin}}"><i style="color:#8a0103;width:20px;height:20px;" class="me-1" data-feather="linkedin"></i></a></div>
                <a href="{{route('edit-staff',['id'=>$item->id])}}" class="btn btn-primary mt-2">Edit profile</a>
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
