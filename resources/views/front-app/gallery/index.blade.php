@extends('front-app.layout.template')
@section('content')
<style>
    .hover_card:hover {
    transform: scale(1.05)!important;
    transition:0.3s ease;
}
</style>
<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Gallery</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('home')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Gallery</span>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumbs -->
<!-- Page Content -->
<div class="page_content_wrap page_paddings_no">
    <!-- Content -->
    <div class="content">
        <article class="post_item post_item_single">
            <section class="post_content">
                <!-- Welcome to our store -->
               
                <!-- /Welcome to our store -->
                <!-- Our team -->
                <div class="bg_dark_style_1">
                    <div class="content_wrap">
                        <div class="empty_space height_6_9em"></div>
                        <div class="sc_team_wrap">
                            <div  class="sc_team sc_team_style_team-1">


                                <h2 class="sc_section_title sc_item_title" style="color:white;">Gallery
                                    <span class="thin"> Images</span>
                                </h2>    <div class="container">
                                
                                <div class="row mb-5">
                                    <section class="galeria">
                                        <div class="container">
                                          
                                          <div class="contenedorImgs"></div>
                                        </div>
                                      </section>
                                    
                                  
                                </div>

                                 




                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Our team -->
                <!-- Book Right Now -->

                <!-- /Book Right Now -->
            </section>
        </article>
    </div>
</div>
@push('scripts')
        
   
<script>
   const imgs = @json($gallery->map(function ($item) {
  return [
      'titulo' => $item->name ?: 'No Title', // Default title if name is null
      'url' => env('APP_URL').'/assets/gallery/'.$item->img, // Assuming images are stored in public/storage/images/
      'descripcion' => $item->description // Or any other field you want to include
  ];
}));

console.log(imgs);



$.each(imgs, function(i, img){
$('.galeria .contenedorImgs').append(`
  <div class="imagen" style="background-image:url('${img.url}')">
    <p class="nombre">${img.titulo}</p>
  </div>`
);
}) 
setTimeout(() => {
$('.galeria').addClass('vis');
}, 1000)
$('.galeria').on('click', '.contenedorImgs .imagen', function(){
var imagen = imgs[$(this).index()].url;
var titulo = imgs[$(this).index()].titulo;
var descripcion = imgs[$(this).index()].descripcion;
$('.galeria').addClass('scale');
$(this).addClass('activa');
if(!$('.fullPreview').length){
  $('body').append(`
    <div class="fullPreview">
      <div class="cerrarModal"></div>
      <div class="wrapper">
        <div class="blur" style="background-image:url(${imagen})"></div>
        <p class="titulo">${titulo}</p>
        <img src="${imagen}">
        <p class="desc">${descripcion}</p>
      </div>
      <div class="controles">
        <div class="control av"></div>
        <div class="control ret"></div>
      </div>
    </div>`
  )
  $('.fullPreview').fadeIn().css('display','flex');
}
})
$('body').on('click', '.fullPreview .cerrarModal', function(){
$('.contenedorImgs .imagen.activa').removeClass('activa');
$('.galeria').removeClass('scale');
$(this).parent().fadeOut(function(){
  $(this).remove();
})
})
$('body').on('click', '.fullPreview .control', function(){
var activa = $('.contenedorImgs .imagen.activa');
var index;
if($(this).hasClass('av')){
  index = activa.next().index();
  if(index < 0) index = 0;
}else{
  index = activa.prev().index();
  if(index < 0) index = imgs.length - 1;
}
$('.fullPreview').addClass('anim');
setTimeout(()=>{
  $('.contenedorImgs .imagen.activa').removeClass('activa');
  $('.contenedorImgs .imagen').eq(index).addClass('activa');
  $('.fullPreview').find('.blur').css('background-image', 'url('+imgs[index].url+')');
  $('.fullPreview').find('img').attr('src', imgs[index].url);
  $('.fullPreview').find('.titulo').text(imgs[index].titulo);
  $('.fullPreview').find('.desc').text(imgs[index].descripcion);
  $('.fullPreview').removeClass('anim');
}, 500)
})

</script>
@endpush
@endsection
