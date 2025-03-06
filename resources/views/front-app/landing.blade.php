<!DOCTYPE html>
<html lang="en-US" class="scheme_original">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>VTSA &#8211; weapon store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -1;
        }

        @media(max-width:768px){
            .mybtn{
            width: 75%!important;
    left: 48px!important;
    font-size: 20px;

}
        }

    </style>
</head>

<body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide" style="background-color: white!important;background: url('/images/background.jpg');">

    <video id="video-background" autoplay muted loop>
        <source src="{{asset('assets/WhatsApp Video 2023-11-10 at 11.23.09 PM.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div id="delayed-button">
        <a href="{{ route('home') }}">
            <button class="btn btn-primary mybtn m-auto d-block animate__animated animate__bounceInUp" style="width: 22%;
            left: 150px;
            bottom: 60px;
            font-size: 20px;
            display: none;
            position: absolute;
            right: 150px;
            border-radius: 50px;
            margin: auto;
            padding: 15px 77px;
            cursor: pointer;
            bottom: 10px;
            font-style: normal !important;">Continue</button>
        </a>

        <a class="w-100 " href="https://tracking.deltadefense.com/aff_c?offer_id=372&aff_id=22347" target="_blank"><div class="bg-white"><img src="{{asset('assets/PartnerLogo_Horizontal_Black.webp')}}" class=" bg-white mt-5" style="z-index: 999;filter: invert(1);width: 20%;display:block;margin:auto;" alt=""></a></div>
       </div>

    </div>
<script>
    // Function to show the button
    function showButton() {
        const button = document.getElementById("delayed-button");
        if (button) {
            const delayedButton = button.querySelector("button");
            if (delayedButton) {
                delayedButton.style.display = "block";
            }
        }
    }

    // Set a timeout to call the function after 5 seconds (5000 milliseconds)
    setTimeout(showButton, 5000);
</script>

</body>

</html>
