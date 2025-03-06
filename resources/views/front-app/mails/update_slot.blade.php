

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
       
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');


        table, th, td {
      border:1px solid #8A0103;
    }
    h1,h2,h3,h4,h5,h6,p,th,td,tr,a{
        font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-style: normal;   
    }
    
    </style>
</head>
  <body>
<div style="background:white;">
    <div class="conatiner-fluid" style="padding-top:3%;">

        <div class="row">
            <img  src="https://www.vatactical.com/assets/logo.webp" style="width:10%; margin:auto; display:block;" alt="logo">
        </div>
    </div>
    <div class="container" style="padding: 20px">
        <div class="row text-center" style="text-align:center;">
            {{-- <h1>T</h1> --}}
            <h3 >Class Timing Update of: {{ $course_name }} 📢</h3>
            <h4>
                Dear :{{$user_name}}</h4>

               <p> This is to inform you that the course class details for {{ $course_name }} have been modified.</p>
               <p><b>Class Time Changed To:</b> {{ \Carbon\Carbon::parse($start_date)->format('D, j F Y') }}   -    {{ \Carbon\Carbon::parse($start_time)->format('H:i') }} </p>

               <a href="{{route('home')}}"><button style="padding:10px; background-color:#8A0103; color:white; border:none; border-radius:30px">Visit Our Site</button></a>
        </div>
    </div>
</div>
  </body>
</html>

