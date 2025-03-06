@extends('front-app.layout.date_template')
@section('content')

    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">Select Date</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Select Date</span>
                </div>
            </div>
        </div>
    </div>
                @php  $key=0;
                  $allDates = [];
                @endphp

                @foreach ($slots as $item)
                    @php



$date = \Carbon\Carbon::parse($item->date);
$endDate = \Carbon\Carbon::parse($item->date)->addDays(30);
$key++;

while ($date->lte($endDate)) {
    $key++;
    $totalset = DB::table('subscription')
    ->where('date', $date)
    ->where('start_time', date('h:i A', strtotime($item->start_time)))
    ->where('end_time', date('h:i A', strtotime($item->end_time)))
    ->count();


    if ($date->isSameDay(\Carbon\Carbon::now()) || $date->isAfter(\Carbon\Carbon::now())) {
    
        // Store date, start time, end time, and seats information in an array
        $dateInfo = [
            'slot_id'=>$item->id,
            'date' => $date->format('Y-m-d'),
            'start_time' => date('h:i A', strtotime($item->start_time)),
            'end_time' => date('h:i A', strtotime($item->end_time)),
            'total_seats' => $data->seats,
            'remaining_seats'=>$data->seats-$totalset,
            'repeat'=>$item->repeat,
            'location'=>$item->location,
        ];
        $allDates[] = $dateInfo;
    }
    switch ($item->repeat) {
        case 'Weekly':
            $date->addWeek();
            break;
        case 'Every 2 Weeks':
            $date->addWeeks(2);
            break;
        case 'Every 3 Weeks':
            $date->addWeeks(3);
            break;
        case 'Every 4 Weeks':
            $date->addWeeks(4);
            break;
        case "Doesn't repeat":
        break 2;
        default:
            // Handle other repetition types as needed
            break;
    }
}

                    @endphp
                @endforeach




    <div  class=" px-lg-5 px-sm-2 px-2 px-md-3 mt-3 d-flex justify-content-center bg-white py-5" >
        <div  class="calender-width">
            <div id='calendar' ></div>
            <a class="btn btn-primary mt-3 m-auto d-block border-0" href="{{route('course-detail',['slug'=>$data->slug])}}">Back to Course</a>
        </div>
    </div>
   <!-- Your Blade template -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="eventModalLabel">Class Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('course-subscription')}}" method="GET">
          <!-- Start and End time details will be filled here -->
          <div id="eventDetails"></div>
          <h5 class="text-center text-dark">Book Your Seats</h5>
                                 <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-people-arrows  fs-1 mb-2" style="color:#8A0103;"></i>
                                 </div>
                                 <input type="number" id="seats" class="form-control bg-white" name="seats" value="1" min="1"  placeholder="Enter Number Of Your Seats">
                                 <input type="hidden" value="{{$data->id}}" name="course_id">
                                 <div id="names_container" style="max-height: 200px;overflow-y:scroll;" class="d-block px-3 mb-2"></div>
                                </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="confirm" class="btn btn-primary border-0">Confirm</button>
        <button style="display: none;" type="submit" id="buy" class="btn btn-primary border-0">Buy Now</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $("#confirm").click(function(){
        let seats=$("#seats").val();
        let html=`<h5 class='text-center text-dark mt-2 mb-2'>Enter Names For The Seats</h5>`;
        for (let index = 0; index < seats; index++) {
            html+=`<div>Seat  No:${index+1} Name:<input type="text" name="names[]" required class="form-control bg-white">`
        }
        $("#names_container").html(html);
        $("#buy").show();
    });
  </script>

@endsection
