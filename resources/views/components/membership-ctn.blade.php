<style>
    .columns_wrap {
    position: relative;
    overflow: hidden;
}
.background-video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
    z-index: -1;
    opacity: 0.8;
}
</style>
<div class="custom_texture_bg3  ">
    <div class="content_wrap py-5 ">
        <div class="py-3"></div>
        <video autoplay muted loop class="background-video">
            <source src="{{ asset('assets/video/Reel 1.mp4') }}" type="video/mp4">

        </video>
        <div class="empty_space height_3em"></div>
        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns position-relative" style="">
            
            <div class="column-1_2 sc_column_item sc_column_item_2 even textalign_center">
                <div class="empty_space height_4em"></div>
                <h2 class="sc_title sc_title_regular sc_align_center textalign_center accent2 fw-bold position-relative ">
                   <span class="text-white">Join The Community</span>
                </h2>
                <div class=" accent2">
                    <p class="margin_bottom_null textalign_center text-white">Your range your community</p> 
                </div>
                <a href="{{route('gift-cards')}}"><button class="mt-4">Get your membership</button></a>
                <div class="empty_space height_5_3em"></div>
            </div>
            <div class="column-1_2 sc_column_item sc_column_item_1 odd first"></div>
          
        </div>
    </div>
    <div class="empty_space height_3em"></div>
</div>
