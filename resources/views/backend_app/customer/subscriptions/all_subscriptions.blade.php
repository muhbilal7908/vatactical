@extends('backend_app.layouts.template')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Subscription</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('CustomerDashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item ">All
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="mb-2">Filter Subscription</h6>
                            </div>
                        </div>
                        <form action="{{route('filter-subscription')}}" method="post">
                            @csrf
                        <div class="row">

                            <div class="col-2">
                                <label for="">Subscription ID</label>
                                <input type="number" class="form-control" name="order_id">
                            </div>
                            <div class="col-2">
                               <label for="">Courses</label>
                               <select name="courses" id="" class="form-select">
                                <option value="">Choose..</option>
                                @foreach ($courses as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                               </select>
                            </div>

                            <div class="col-2">
                                <label for="">Order Date From</label>
                                <input type="date" class="form-control" name="date_from">
                            </div>
                            <div class="col-2">
                                <label for="">Order Date To</label>
                                <input type="date" class="form-control" name="date_to">
                            </div>
                            <div class="col-2">
                               <button type="submit" class="btn btn-primary mt-2">Show Data</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="d-flex flex-row flex-between w-100">
                            <h6 class="p-1">Total Subscriptions List <span class="badge bg-danger rounded-3 ">{{$count}}</span></h6>
                            <button class="btn btn-primary mb-2 mt-1 ms-auto waves-effect waves-float waves-light"  id="export_pdf" class="btn text-success  ms-auto ">Export PDF <i data-feather="file-text"></i></button>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="font-size: 13px;">
                                <thead>
                                    <tr>

                                        <th>Subscription-ID</th>
                                        <th>Subscription Date</th>
                                        <th>Customer</th>

                                        <th>Course Name</th>
                                        <th>Total Amount</th>
                                        <th>Start / End Time</th>

                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><span class="d-block">{{$item->created_at->format('j M Y')}}</span>
                                            <span class="d-block">{{$item->created_at->format('h:i A')}}</span>
                                        </td>
                                        <td><span class="d-block fw-bold">{{$item->first_name}}</span>
                                            <span class="d-block"><i data-feather="phone"></i> {{$item->phone_no}}</span>
                                        </td>
                                        <td><span>{{$item->courses->name}}</span></td>
                                        <td>
                                          ${{$item->total}}
                                          <span class="d-block">
                                         <span class="badge rounded-pill badge-light-success me-1">{{$item->bank_status}}</span>
                                          </span>
                                        </td>

                                        <td> {{$item->start_time}} / {{$item->end_time}}</td>



                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{route('order-detail',['id'=>$item->id])}}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>View Detail</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('delete-order',['id'=>$item->id])}}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>

                        <div id="orders-data" class="table-responsive" style="display:none;">
                            <img src="{{asset('assets/logojpeg-removebg-preview (1).png')}}" class="w-25 py-4 ms-auto d-block" alt="">
                            <h3 class="mb-2">Subscription List</h3>
                            <table class="table" style="font-size: 10px;">
                                <thead>
                                    <tr>

                                        <th>Subscription-ID</th>
                                        <th>Subscription Date</th>
                                        <th>Customer</th>

                                        <th>Course Name</th>
                                        <th>Total Amount</th>
                                        <th>Start / End Time</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                    <tr >
                                        <td>{{$item->id}}</td>
                                        <td><span class="d-block">{{$item->created_at->format('D M Y')}}</span>
                                            <span class="d-block">{{$item->created_at->format('h:i A')}}</span>
                                        </td>
                                        <td><span class="d-block fw-bold">{{$item->first_name}}</span>
                                            <span class="d-block"><i data-feather="phone"></i> {{$item->phone_no}}</span>
                                        </td>
                                        <td>{{$item->courses->name}}</td>
                                        <td>
                                          ${{$item->total}}
                                          <span class="d-block">
                                         <span class="badge rounded-pill badge-light-success me-1">{{$item->bank_status}}</span>
                                          </span>
                                        </td>

                                        <td >
                                           {{$item->start_time}} / {{$item->end_time}}

                                          </td>



                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->

            <!-- Dark Tables start -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
      let file_id = $("#file_id").val();
      $("#export_pdf").click(function(){
        $("#preloader").show();

      // Capture the HTML section
      var element = $("#orders-data").html();

        console.log(element);
      // Options for html2pdf.js
      var options = {
        margin: 10,
        filename: 'subscriptions.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      };

      // Use html2pdf.js to generate the PDF
      html2pdf(element, options)
        .then(function(){
          // Hide the preloader once the PDF is generated
          $("#preloader").hide();
        })
      // Hide the ledger section again after capturing

      });

    });

      function submitStatus(selectElement) {
        // Traverse up the DOM to find the closest form element
        var form = selectElement.closest(".statusform");

        // Check if a form is found before submitting
        if (form) {
            form.submit();
        }
    }
  </script>
@endsection
