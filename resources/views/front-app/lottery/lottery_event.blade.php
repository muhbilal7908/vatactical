@extends('front-app.layout.template')
@section('content')
<style>
    @keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}

.blink {
    animation: blink 1s infinite;
}
@import url("https://fonts.googleapis.com/css2?family=Girassol&display=swap");

* {
  box-sizing: border-box;
}


body{
    overflow: hidden;
}
.deal-wheel {
    left: 29%;

  --size: clamp(250px, 80vmin, 700px);
  --lg-hs: 0 3%;
  --lg-stop: 50%;
  --lg: linear-gradient(
      hsl(var(--lg-hs) 0%) 0 var(--lg-stop),
      hsl(var(--lg-hs) 20%) var(--lg-stop) 100%
    );

  position: relative;
  display: grid;
  grid-gap: calc(var(--size) / 20);
  align-items: center;
  grid-template-areas:
    "spinner"
    "trigger";
  font-family: "Girassol", sans-serif;
  font-size: calc(var(--size) / 21);
  line-height: 1;
  text-transform: lowercase;
}

.deal-wheel > * {
  grid-area: spinner;
}

.deal-wheel .btn-spin {
  grid-area: trigger;
  justify-self: center;
}

.spinner {
  position: relative;
  display: grid;
  align-items: center;
  grid-template-areas: "spinner";
  width: var(--size);
  height: var(--size);
  transform: rotate(calc(var(--rotate, 25) * 1deg));
  border-radius: 50%;
  box-shadow: inset 0 0 0 calc(var(--size) / 40) hsl(0deg 0% 0% / 0.06);
}

.spinner * {
  grid-area: spinner;
}

.prize {
    position: relative;
    display: flex;
    align-items: center;
    padding: 0 calc(var(--size) / 6) 0 calc(var(--size) / 20);
    width: 47%;
    height: 60%;
    transform-origin: center right;
    transform: rotate(var(--rotate));
    user-select: none;
}

.cap {
  --cap-size: calc(var(--size) / 4);
  position: relative;
  justify-self: center;
  width: var(--cap-size);
  height: var(--cap-size);
}

/* Hide select dropdown from SVG import file */
.cap select {
  display: none;
}

.cap svg {
  width: 100%;
}

.ticker {
  position: relative;
  left: calc(var(--size) / -15);
  width: calc(var(--size) / 10);
  height: calc(var(--size) / 20);
  background: var(--lg);
  z-index: 1;
  clip-path: polygon(20% 0, 100% 50%, 20% 100%, 0% 50%);
  transform-origin: center left;
}

.btn-spin {
  color: hsl(0deg 0% 100%);
  background: var(--lg);
  border: none;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  text-transform: inherit;
  padding: 0.9rem 2rem 1rem;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: opacity 200ms ease-out;
}

.btn-spin:focus {
  outline-offset: 2px;
}


.btn-spin:active {
  transform: translateY(1px);
}

.btn-spin:disabled {
  cursor: progress;
  opacity: 0.25;
}

/* Spinning animation */
.is-spinning .spinner {
  transition: transform 8s cubic-bezier(0.1, -0.01, 0, 1);
}

.is-spinning .ticker {
  animation: tick 700ms cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes tick {
  40% {
    transform: rotate(-12deg);
  }
}

/* Selected prize animation */
.prize.selected .text {
  color: white!important;
  animation: selected 800ms ease!important;
}
.text{
    font-size: 12px;
    color: white!important;
}

@keyframes selected {
  25% {
    transform: scale(1.25);
    text-shadow: 1vmin 1vmin 0 hsla(0 0% 0% / 0.1);
  }
  40% {
    transform: scale(0.92);
    text-shadow: 0 0 0 hsla(0 0% 0% / 0.2);
  }
  60% {
    transform: scale(1.02);
    text-shadow: 0.5vmin 0.5vmin 0 hsla(0 0% 0% / 0.1);
  }
  75% {
    transform: scale(0.98);
  }
  85% {
    transform: scale(1);
  }
}

        @media(max-width:768px){
            .deal-wheel {
    left: 8%!important;
    --size: clamp(250px, 80vmin, 700px);
    --lg-hs: 0 3%;
    --lg-stop: 50%;
    --lg: linear-gradient(
      hsl(var(--lg-hs) 0%) 0 var(--lg-stop),
      hsl(var(--lg-hs) 20%) var(--lg-stop) 100%
    );
    position: relative;
    display: grid;
    grid-gap: calc(var(--size) / 20);
    align-items: center;
    grid-template-areas: "spinner"
        "trigger";
    font-family: "Girassol", sans-serif;
    font-size: calc(var(--size) / 21);
    line-height: 1;
    text-transform: lowercase;
}
        }

</style>
<audio id="myAudio" style="display: none;">
    <source src="{{asset('assets/sound/TunePocket-Prize-Wheel-Spin-Preview.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
  <audio id="winning_audio" style="display: none;">
    <source src="{{asset('assets/sound/tada-fanfare-a-6313.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Lottery Event</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>

                <span class="breadcrumbs_item current">Lottery Event</span>


            </div>
        </div>
    </div>
</div>
<button style="display:none;" id="modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Winner
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
          <h4 class="text-center text-dark">Congratulations !</h4>
          <p class="text-center"><span id="winner_msg"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{--     --}}
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid bg-white py-5">

    <div class="row">

        <div class="col-lg-12 col-sm-12 col-md-12  ">
            <div class="deal-wheel">
                <ul class="spinner" ></ul>
                <figure class="cap position-relative">
                  <!-- Grim reaper SVG import -->

                </figure>
                <div class="ticker"></div>
                <button class="btn-spin d-none">Spin the wheel</button>
            </div>


        </div>


    </div>
</div>
@php
    $lottery_members=[];
    foreach ($data as $key => $value) {
        $combine=array($value->first_name,$value->lottery_no);
        $lottery_members[]=$combine;
    }

@endphp

@push("scripts")
<script>

     const predefinedColors = [
        "hsl(197, 30%, 43%)",   // dark blue
        "hsl(173, 58%, 39%)",   // dark green
        "hsl(43, 74%, 66%)",    // dark red
        "hsl(27, 87%, 67%)",    // dark black
        "hsl(12, 76%, 61%)",    // dark brown
        "hsl(350, 60%, 52%)",   // additional color 1
        "hsl(91, 43%, 54%)",    // additional color 2
        "hsl(140, 36%, 74%)"    // additional color 3
    ];
    /**
     * Prize data will space out evenly on the deal wheel based on the amount of items available.
     * @param text [string] name of the prize
     * @param color [string] background color of the prize
     * @param reaction ['resting' | 'dancing' | 'laughing' | 'shocked'] Sets the reaper's animated reaction
     */
     const prizes = [
        @foreach($lottery_members as $index => $member)
            {


                text: "{{ $member[0] }}",
                color: predefinedColors[{{$index}} % predefinedColors.length],
                reaction: "Winner" ,// Example reaction, you can customize as needed
                lottery_no: "{{ $member[1] }}",
            },
        @endforeach
        ];
    const wheel = document.querySelector(".deal-wheel");
    const spinner = wheel.querySelector(".spinner");
    const trigger = wheel.querySelector(".btn-spin");
    const ticker = wheel.querySelector(".ticker");
    const prizeSlice = 360 / prizes.length;
    const prizeOffset = Math.floor(180 / prizes.length);
    const spinClass = "is-spinning";
    const selectedClass = "selected";
    const spinnerStyles = window.getComputedStyle(spinner);
    let tickerAnim;
    let rotation = 0;
    let currentSlice = 0;
    let prizeNodes;

    const createPrizeNodes = () => {
      prizes.forEach(({ text, color, reaction }, i) => {
        const rotation = prizeSlice * i * -1 - prizeOffset;

        spinner.insertAdjacentHTML(
          "beforeend",
          `<li class="prize" data-reaction=${reaction} style="--rotate: ${rotation}deg">
            <span class="text">${text}</span>
          </li>`
        );
      });
    };

    const createConicGradient = () => {
      spinner.setAttribute(
        "style",
        `background: conic-gradient(
          from -90deg,
          ${prizes
            .map(
              ({ color }, i) =>
                `${color} 0 ${(100 / prizes.length) * (prizes.length - i)}%`
            )
            .reverse()}
        );`
      );
    };

    const setupWheel = () => {
      createConicGradient();
      createPrizeNodes();
      prizeNodes = wheel.querySelectorAll(".prize");
    };

    const spinertia = (min, max) => {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    const runTickerAnimation = () => {
      // https://css-tricks.com/get-value-of-css-rotation-through-javascript/
      const values = spinnerStyles.transform.split("(")[1].split(")")[0].split(",");
      const a = values[0];
      const b = values[1];
      let rad = Math.atan2(b, a);

      if (rad < 0) rad += 2 * Math.PI;

      const angle = Math.round(rad * (180 / Math.PI));
      const slice = Math.floor(angle / prizeSlice);

      if (currentSlice !== slice) {
        ticker.style.animation = "none";
        setTimeout(() => (ticker.style.animation = null), 10);
        currentSlice = slice;
      }
      tickerAnim = requestAnimationFrame(runTickerAnimation);
    };

    const selectPrize = () => {
        const selected = Math.floor(rotation / prizeSlice);
  const selectedPrize = prizes[selected];
  const prizeText = `${selectedPrize.text}\nReaction: ${selectedPrize.reaction}`;
  const win_data=`${selectedPrize.lottery_no}`;


$.post('{{ route('front_lottery_winner') }}', { lottery_id: win_data })
  .done(function(data) {

// Modal
$("#modal-btn").click();
 var audio = document.getElementById("winning_audio");
  audio.play();
    $("#winner_msg").text(data.message);


  })
  .fail(function(error) {
    // This function is executed if the request fails
    console.error("Request failed:", error);
  })
  .always(function() {
    // This function is always executed regardless of success or failure
    console.log("Request completed.");
  });


    };



    spinner.addEventListener("transitionend", () => {
      cancelAnimationFrame(tickerAnim);
      trigger.disabled = false;
      trigger.focus();
      rotation %= 360;
      selectPrize();
      wheel.classList.remove(spinClass);
      spinner.style.setProperty("--rotate", rotation);
    });

    setupWheel();

    var channel_2 = pusher.subscribe('lottery-channel');

// Bind to the 'lottery-event' event on 'lottery-channel'
channel_2.bind('lottery-event', function(data) {

         // Click event for #static-spinner

  var audio = document.getElementById("myAudio");
  audio.play();

      trigger.disabled = true;
      rotation = Math.floor(Math.random() * 360 + spinertia(2000, 4000));
      prizeNodes.forEach((prize) => prize.classList.remove(selectedClass));
      wheel.classList.add(spinClass);
      spinner.style.setProperty("--rotate", rotation);
      ticker.style.animation = "none";
      runTickerAnimation();
    });


    </script>
@endpush
@endsection
