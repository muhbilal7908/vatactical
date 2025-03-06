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
                        <h2 class="content-header-title float-start mb-0">Popup</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Popup
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
         <div class="row mt-1">

            <div class="col-6">
                <form action="{{route('update-popup',['id'=>1])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card ">
                    <div class="col-12 border-bottom">
                        <div class="d-flex justify-content-between p-1">
                            <h5>Enable</h5>
                            <span><div class="form-check form-switch">
                                <input name="status" class="form-check-input" type="checkbox"  role="switch" id="flexSwitchCheckChecked" @if($data->status==="1") checked @endif>

                              </div></span>
                        </div>
                    </div>


                <div  class="px-3 pb-2 pt-1">
                <div>
                    <label for="" class="mt-1">Popup Title</label>
                    <input type="text" class="form-control" value="{{$data->title}}" name="title">
                </div>
                <div >
                    <label for="" class="mt-1">Popup Url</label>
                    <input type="text" class="form-control" value="{{$data->url}}" name="url">
                </div>
                <div >
                    <label for="" class="mt-1">Popup Image</label>
                    <input type="file" class="form-control"  name="img">
                </div>


                <button class="btn btn-primary mt-2">Submit</button>
            </div>
            </form>
                </div>
              </div>

            <div class="col-6"><div class="card position-relative px-5 py-2" >
                <img src="{{asset('assets/popup/'.$data->img)}}" style="height: 260px;object-fit:cover;" class="w-100 m-auto d-block shadow" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold text-center" style="color:#8a0103!important;">{{$data->title}}</h5>
                </div>
              </div></div>




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
