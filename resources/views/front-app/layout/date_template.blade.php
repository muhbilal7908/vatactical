<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VTSA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce-layout.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce-smallscreen.css')}}" type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/woocommerce/css/woocommerce.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/js/vendor/revslider/css/settings.css')}}" type="text/css" media="all" />
    {{-- <link rel="stylesheet" href="{{asset('assets/css/tpl-revslider.css" type="text/css')}}" media="all" /> --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">
    <link rel="stylesheet" href="{{asset('assets/css/fontello/css/fontello.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/animation.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/shortcodes.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/plugin.woocommerce.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/skin.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/messages.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/magnific/magnific-popup.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/js/vendor/swiper/swiper.min.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>


<style>
      .fc-header-toolbar {
  background-color:#8A0103;
  color:white;
  padding:10px;
  border-radius: 15px; /* Your desired background color */
}

.fc-event {
  background-color:#8A0103;
    border:none;
    cursor: pointer;
    margin-bottom: 5px;
}
.fc-event:hover{
    transform: scale(0.8);
    transition: 0.2s;
}
.fc-dayGridMonth-view{

    background: black;
}
.fc-dayGridMonth-view  a{

    color:white!important;
}
.text-primary{
  color:#8A0103!important;

}
#search-area{
    right:0px!important;
    height:0px!important;
}
.calender-width{
    width: 45%;
}

.text-primary{
    color:#8A0103!important;
}
.bg-background{
    background:#8A0103!important;
}
@media(max-width:768px){
    .calender-width{
    width: 100%;
}
}
</style>
</head>
@if(session('success'))
<div id="success" class="myalert py-3  px-2 alert-success justify-content-start w-50 text-white fw-bold shadow" role="alert" style="background:#5F9C4F!important;z-index: 999;
position: absolute;
left: 424px;
right: 100px;
top: 10px;
z-index:1002;">
   <i class="fa-solid fa-circle-exclamation me-2" style="color:white;"></i> {{ session('success') }}

</div>
@elseif(session('error'))
<div id="error" class="myalert px-2 py-3 bg-white  alert-danger justify-content-start w-50 text-dark fw-bold shadow" role="alert" style="z-index: 999;
position: absolute;
left: 424px;
right: 100px;
top: 10px;
z-index:1002;">
   <i class="fa-solid fa-circle-exclamation me-2" style="color:red;"></i> {{ session('error') }}

</div>
@endif
<body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide" style="background: black!important;">

    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
    @include('front-app.layout.header')
    @yield('content')
    @include('front-app.layout.footer')

    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const allDates = <?php echo json_encode($allDates); ?>; // Convert PHP array to JavaScript object
      
        
        // Initialize FullCalendar
        const validDates = allDates.map(dateInfo => dateInfo.date);
    
          
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
         
          initialDate: new Date(),

          events: allDates.map(dateInfo => ({
            slot_id:dateInfo.slot_id,
            title: 'Book Now', // Event title
            start: dateInfo.date, // Date as a string
            id:dateInfo.start_time,
          })),

          eventClick: function(info) {      
            const clickedDate = info.event.startStr; // Get clicked date as a string
            const clickedTime = info.event.id;
            console.log(allDates);
            
            // Find the clicked date in allDates
            const clickedEvent = allDates.find(dateInfo => dateInfo.date === clickedDate && dateInfo.start_time === clickedTime);

            if (clickedEvent) {
          
              
              // Show Bootstrap modal with start time, end time, and seats of the clicked date
              $('#eventModal').modal('show');
              $('#eventDetails').html(`<input type="hidden" name='slot_id' value='${clickedEvent.slot_id}' /><p>Date: ${clickedDate}</p><p>Start Time: ${clickedEvent.start_time}</p><p>End Time: ${clickedEvent.end_time}</p><p>Total Seats: ${clickedEvent.total_seats}</p><p>Remaning Seats: ${clickedEvent.remaining_seats}</p>
              <input name="start_time" value="${clickedEvent.start_time}" type="hidden"/><input name="end_time" value="${clickedEvent.end_time}" type="hidden"/><input name="total_seats" value="${clickedEvent.total_seats}" type="hidden"/><input name="remaining_seats" value="${clickedEvent.remaining_seats}" type="hidden"/><input name="repeat" value="${clickedEvent.repeat}" type="hidden"/>
              <input name="date" value="${clickedEvent.date}" type="hidden"/><input name="location" type="hidden" value="${clickedEvent.location}" />
              `);
            }
          },
        });
        calendar.render();
      });

      </script>

      </body>
</html>
