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
                        <h2 class="content-header-title float-start mb-0">Lottery</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Winner Members
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
         <div class="row mt-1">
            @foreach ($data as $item)
            <div class="col-3">
                <div class="card card-profile">
                    <img style="height: 200px;object-fit:cover;" src="{{asset('assets/lottery/'.$item->lottery_img)}}" class="img-fluid card-img-top" alt="Profile Cover Photo" />
                    <div class="card-body">
                        <div class="profile-image-wrapper">
                            <div class="profile-image">
                                <div class="avatar">
                                    <img  src="https://i.pngimg.me/thumb/f/720/comhiclipartddbgu.jpg" alt="Profile Picture" />
                                </div>
                            </div>
                        </div>
                        <h3>{{$item->name }}</h3>
                        <h6 class="text-muted">{{$item->winner_name}}</h6>
                        <small class="text-muted">{{$item->email}}</small>

                        <span class="badge badge-light-primary profile-badge">Lottery Name:{{$item->lottery_name}}</span>
                        <hr class="mb-2" />
                        <a href="{{route('delete-winner',['id'=>$item->id])}}" class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
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
