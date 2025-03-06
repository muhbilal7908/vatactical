@extends('front-app.layout.template')
@section('content')
<div class="py-3" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url('{{ asset('https://cdn11.bigcommerce.com/s-zsc0ch2sv8/images/stencil/1500x800/image-manager/about-bg.jpg') }}');background-size:cover;">
    <h1 class="text-center text-white py-5 my-5  ">FAQS</h1>
</div>
<section class="container my-5">
    <div class="accordion" id="accordionExample">
        @foreach ($data as $key=>$item)


        <div class="accordion-item mb-3 rounded-0 border border-white">
          <h2 class="accordion-header bg-primary rounded-0" id="heading{{$item->id}}">
            <button class="accordion-button bg-primary text-white " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}"   aria-expanded="false"   aria-controls="collapseOne">
              <span class="fw-bold">{{$item->title}}</span>
            </button>
          </h2>
          <div id="collapse{{$item->id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$item->id}}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <p class="text-dark">{{$item->description}}</p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
</section>

@endsection
