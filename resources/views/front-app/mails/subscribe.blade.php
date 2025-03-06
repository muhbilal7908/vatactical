

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        table, th, td {
      border:1px solid #8A0103;
    }
    </style>
</head>
  <body>
    <div style="border:2px solid #8A0103;background:white;">
        <div class="conatiner-fluid" style="padding-top:3%;">

        <div class="row">
            <img src="http://127.0.0.1:8000/assets/subscribe.jpg" style="width:100%; margin:auto; display:block;" alt="logo">
        </div>
    </div>
    <div class="container" style="padding: 20px">
        <div class="row text-center" style="text-align:center;">
            {{-- <h1>T</h1> --}}
           <img src="http://127.0.0.1:8000/assets/courses/'.$course_name->img)}}" height="150" width="150" alt="">
            <p class="text-white">Course Name:{{$course_name->name}}</p>
            <p class="text-white">

                Dear :{{$alldata['first_name']}}</p>

               <p> Congratulations! You've successfully enrolled in the course at Vatactical! Your registration process is complete, and we're delighted to have you as a part of our online learning community</p>
               <h4>Subscription Summary</h4>
               <table style="border:1px solid black;">
                    <tr>
                        <th>Email</th>
                        <td>{{$alldata['email']}}</td>
                    </tr>
                    <tr>
                        <th>Seats</th>
                        <td>{{$alldata['seats']}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{$alldata['date']}}</td>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <td>{{$alldata['start_time']}}</td>
                    </tr>
                    <tr>
                        <th>End Time</th>
                        <td>{{$alldata['end_time']}}</td>
                    </tr>
                    <tr>
                        <th>Repeat</th>
                        <td>{{$alldata['repeat']}}</td>
                    </tr>
                    @if($alldata['promocode_val'] !== null)
                    <tr>
                        <th>Promocode Discount</th>
                        <td>@isset($alldata['promocode_val']) {{$alldata['promocode_val']}}% @endisset</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Total Price</th>
                        <td>{{ !empty($alldata['sub_total']) ? $alldata['sub_total'] : $alldata['total'] }}</td>
                    </tr>


                </table>
            <a href="http://vatactical.com/"><button style="padding:10px; background-color:#8A0103; color:white; border:none; border-radius:30px">Visit Our Site</button></a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
