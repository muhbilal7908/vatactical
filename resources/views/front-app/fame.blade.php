@extends('front-app.layout.template')
@section('content')
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Hall Of Fame</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Hall of fame</span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row my-5">
        <h2 class="sc_section_title sc_item_title">Hall Of
            <span class="thin">Fame</span>
        </h2>
        @foreach ($data as $item)
        <div class="col-3"><div class="card bg-dark position-relative" >
            <a onclick="return confirm('Are you sure you want to delete this item?');" class="position-absolute end-0 hover" href="{{route('delete-staff',['id'=>$item->id])}}"><i style="color:#8a0103;width:30px;height:30px;" class="ms-auto" data-feather="x-circle"></i></a>
            @if ($item->img !== null)
            <img src="{{asset('assets/fame_members/'.$item->img)}}" class="w-75 rounded-circle m-auto d-block mt-2 shadow" alt="...">
            @else


            @endif
            <div class="card-body">


              <h4 class=" fw-bold text-white text-center">{{$item->user->name}}</h4 >



            </div>
          </div></div>
        @endforeach



     </div>
</div>
@endsection
