@extends('front-app.layout.template')
@section('content')

<div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1">
        <div class="content_wrap">
            <h1 class="page_title">Certificates</h1>
            <div class="breadcrumbs">
                <a class="breadcrumbs_item home" href="{{route('dashboard')}}">Home</a>
                <span class="breadcrumbs_delimiter"></span>
                <span class="breadcrumbs_item current">Certificates</span>
            </div>
        </div>
    </div>
</div>
<div class="container" >
    <div class="row my-5">
        <h2 class="sc_section_title sc_item_title">Certificates Of
            <span class="thin">VTSA</span>
        </h2>
        @foreach ($data as $item)
        <div class="col-3"><div class="card bg-dark position-relative" >
            <a onclick="return confirm('Are you sure you want to delete this item?');" class="position-absolute end-0 hover" href="{{route('delete-staff',['id'=>$item->id])}}"><i style="color:#8a0103;width:30px;height:30px;" class="ms-auto" data-feather="x-circle"></i></a>
            @if ($item->img !== null)
            <img src="{{asset('assets/certificates/'.$item->img)}}" class="w-75 rounded-circle m-auto d-block mt-2 shadow" alt="...">
            @else


            @endif
            <div class="card-body" >
              <h3 class="card-title fw-bold text-white text-center">{{$item->award_name}}</h3>
              <h5 class="fw-bold text-white text-center">{{$item->course}}</h5>

              <h6 class=" fw-bold text-white text-center">Goes To {{$item->name}}</h6>
              <button type="button" class="m-auto d-block mt-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                Download
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 80%;" >
                  <div class="modal-content" style="background: url('{{asset('assets/certificate/certificate-bg.png')}}');background-size:cover;">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                      <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-8 m-auto d-block text-center"><img class="w-50 m-auto d-block" src="{{asset('assets/certificates/'.$item->img)}}" alt="">
                            <p>The United States Concealed Carry</p>
                            <h3 class="text-dark fw-bold">{{$item->name}}</h3>has successfully completed the USCCA's program of instruction and is hereby designated a certified Virginia Firearms Instructor in:</p>
                            <h4 class="fw-bold bg-dark p-2">{{$item->course}}</h4>
                            <h5 class="fw-bold bg-dark p-2">CERTIFIED VTSA FIREARMS INSTRUCTOR</h5>
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="downloadPDF()">Download</button>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div></div>
          <div class="py-5 container-fluid" style="display:none">
          <div id="modal-body" >
            <div class="w-100"  >
                <div class="modal-content" style="background: url('{{asset('assets/certificate/certificate-bg.png')}}');background-size:cover;">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" >
                    <div class="container">
                      <div class="row mt-5">
                          <div class="col-lg-6 col-sm-12 col-md-8 m-auto d-block text-center"><img class="w-50 m-auto d-block mt-5" src="{{asset('assets/certificates/'.$item->img)}}" alt="">
                          <p>The United States Concealed Carry</p>
                          <h3 class="text-dark fw-bold">{{$item->name}}</h3>has successfully completed the USCCA's program of instruction and is hereby designated a certified Virginia Firearms Instructor in:</p>
                          <h4 class="fw-bold bg-dark p-2">{{$item->course}}</h4>
                          <h5 class="fw-bold bg-dark p-2">CERTIFIED VTSA FIREARMS INSTRUCTOR</h5>
                      </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
          </div>
        </div>
        @endforeach



     </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>

function downloadPDF() {
    // Get the modal body content
    const element = document.getElementById('modal-body');

    // Create a new instance of html2pdf
    const opt = {
        margin: 1,
        filename: 'certificate.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf(element, opt)
        .then(function(){
          // Hide the preloader once the PDF is generated

        });
      // Hide the ledger section again after capturing


}

    function getCertificate(element) {

          // Make an AJAX request
          $.ajax({
            url: "{{ route('get-certificate') }}",
            method: "POST",
            data: { id: element }, // Pass the ID as data
            success: function (response) {
                    // Handle the response here
                    console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle any errors here
                console.error(error);
            }
        });

    }
</script>


@endsection
