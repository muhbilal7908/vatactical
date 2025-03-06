

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email From Vatactical</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        table, th, td {
      border:1px solid #8A0103;
    }
    </style>
</head>
  <body>
<div style="border:2px solid #8A0103;background:white;">
    <div class="conatiner-fluid">

        <div class="row">
            <img  src="https://www.vatactical.com/assets/thank_you_sign_in.webp" style="width:30%; margin:auto; display:block;" alt="logo">
        </div>
    </div>
    <div class="container" style="padding: 20px">
        <div class="row text-center" style="text-align:center;">
            {{-- <h1>T</h1> --}}
            <p class="text-white">Message From Vriginia Tactical </p>
            <p class="text-white">
                @if ($data->user_id !== null)
                Dear :{{$data->user->name}}</p>
                @else
                Dear :{{$data->email}}</p>
                @endif


               <p>@php echo $data->msg @endphp</p>
            <a href="{{route('home')}}"><button style="padding:10px; background-color:#8A0103; color:white; border:none; border-radius:30px">Visit Our Site</button></a>
        </div>
    </div>
</div>
  </body>
</html>
