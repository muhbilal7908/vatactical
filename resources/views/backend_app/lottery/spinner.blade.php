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
                        <h2 class="content-header-title float-start mb-0">Spinner</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Take The Winner
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
         <div class="row mt-1 bg-white">
            <div class="row p-2">
                <div class="col-6"><!-- Button trigger modal -->
                    <button style="display:none;" id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content" style="background:url('{{asset('assets/stars.gif')}}');background-size:cover;background-color:white;" >
                          <div class="modal-header bg-warning">
                            <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Winner</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body   p-5" >
                            <h3 class="text-center">Congratulations Your Lottery Successsfuly Run! </h3>
                            <a href="{{route('lottery-winners')}}" class="btn btn-primary m-auto d-block mt-2">Check lottery Winner</a>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{--     --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  <form action="" id="formData">
                    @csrf
                <label for="">Select Lottery</label>
                <select class="form-select" name="lottery_id" id="">
                    <option value="">Choose...</option>
                    @foreach ($lottery as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>

                    <a id="winner" class="btn btn-primary mt-1">Start lottery</a>

                </form>
                </div>
                <div class="col-6 position-relative">
                    <img style="cursor: pointer" id="static-spinner" src="{{asset('assets/lottery_spinner_static.png')}}" class="w-100 m-auto " alt="">
                    <img id="start-spinner" src="{{asset('assets/lottery_spinner.gif')}}" class="w-100 m-auto " style="display:none;" alt="">
                    <img src="{{asset('assets/envelope_gif.gif')}}" id="envelope" class="w-75"  style="display:none;" alt="">
                </div>

            </div>

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
<button onclick="playSound()" style="display: none;">Play Sound</button>
<audio id="myAudio" style="display: none;">
  <source src="{{asset('assets/winner-audio/tadaa-47995.mp3')}}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Click event for #static-spinner
    function playSound() {
  var audio = document.getElementById("myAudio");
  audio.play();
}
        // AJAX request on #winner click
        $("#winner").click(function() {



            var formdata = $("#formData").serialize();
            $.ajax({
                method: 'POST',
                url: '{{route('lottery-user')}}',
                data: formdata,
                success: function(response) {
                    $('#static-spinner').hide();
                    $('#start-spinner').show();
                    $("#user_name").text(response.first_name);
                    // Set timeout for 5 seconds (5000 milliseconds)
                    var timeout = 2000;
                    setTimeout(function() {
                        playSound();
                        $("#envelope").show();
                        $('#start-spinner').hide();
                        setTimeout(function() {
                        $("#envelope").hide();
                        $("#modal-btn").click();
                    }, 3000);
                    }, timeout);


                }
            });
        });
    });


</script>
@endsection
