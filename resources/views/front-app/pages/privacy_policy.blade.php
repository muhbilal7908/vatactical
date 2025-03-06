@extends('front-app.layout.template')
@section('content')
<div class="py-3" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url('{{ asset('https://cdn11.bigcommerce.com/s-zsc0ch2sv8/images/stencil/1500x800/image-manager/about-bg.jpg') }}');background-size:cover;">
    <h1 class="text-center text-white py-5 my-5  ">Privacy & Policy</h1>
</div>
<section class="container my-5">

  @php echo $data @endphp
</section>

@endsection
