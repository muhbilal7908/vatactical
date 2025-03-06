@extends('front-app.layout.template')
@section('content')

<h1 class="text-center py-3 mt-5">All Lotteries</h1>

<div class="container py-5">
    <div class="row">
        @foreach ($data as $item)
        <div class="col-lg-3 col-sm-12 col-md-6 rounded-3 px-4">
            <a href="{{route('detail-lottery',['slug'=>$item->slug])}}" class="hover">
                <div class="rounded-3 shadow" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.334), rgba(0, 0, 0, 0.329)), url('{{asset('assets/lottery/'.$item->img)}}'); background-size: cover;">
                    <div style="padding-top:200px;"></div>
                    <div class="bg-primary w-75 m-auto d-block rounded-3 ">
                    <h5 class="text-center fw-bold mb-0 pt-2" >{{$item->name}}</h5>
                    <h5 class="text-center pb-2">${{$item->price}}</h5>
                </div>
                    <div class="pb-4"></div>
                </div>
            </a>
        </div>

        @endforeach
    </div>
</div>

@endsection
