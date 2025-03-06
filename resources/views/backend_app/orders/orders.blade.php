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
                        <h2 class="content-header-title float-start mb-0">Orders</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item">Orders
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
                                <h6 class="mb-2">Filter Order</h6>
                            </div>
                        </div>
                        <form action="{{route('filter-order')}}" method="get">

                        <div class="row">

                            <div class="col-2">
                                <label for="">Order ID</label>
                                <input type="number" class="form-control" name="order_id">
                            </div>
                            <div class="col-2">
                                <label for="">Order Status</label>
                               <select name="status" id="" class="form-select">
                                <option value="pending">Pending</option>
                                <option value="delivered">Delivered</option>

                               </select>
                            </div>
                            <div class="col-2">
                                <label for="">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name">
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
                            <h6 class="p-1">Total Orders List <span class="badge bg-danger rounded-3 ">{{$count}}</span></h6>
                            <a href="{{route('generate-pdf-orders')}}" class="btn btn-primary mb-2 mt-1 ms-auto waves-effect waves-float waves-light"   class="btn text-success  ms-auto ">Export PDF <i data-feather="file-text"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="font-size: 13px;">
                                <thead>
                                    <tr>

                                        <th>Order-ID</th>
                                        <th>Order Date</th>
                                        <th>Customer Info</th>
                                        <th>Total Amount</th>
                                        <th>Order Status</th>

                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><span class="d-block">{{$item->created_at->format('D M Y')}}</span>
                                            <span class="d-block">{{$item->created_at->format('h:i A')}}</span>
                                        </td>
                                        <td><span class="d-block fw-bold">{{$item->first_name}}</span>
                                            <span class="d-block">{{$item->phone_no}}</span>
                                        </td>
                                        <td>
                                          ${{$item->total}}
                                          <span class="d-block">
                                         <span class="badge rounded-pill badge-light-success me-1">{{$item->bank_status}}</span>
                                          </span>
                                        </td>

                                        <td> <form class="statusform" action="{{ route('update-status') }}" method="POST" onchange="submitStatus(this)">
                                            @csrf
                                            <select name="status" class="form-select @if($item->delivery_status === 'pending') text-danger @endif @if($item->delivery_status === "delivered") text-success @endif fw-bold" id="">
                                                <option @if($item->delivery_status === "pending") selected @endif value="pending">Pending</option>
                                                <option @if($item->delivery_status === "delivered") selected @endif value="delivered">Delivered</option>
                                            </select>

                                            <input type="hidden"  value="{{$item->id}}" name="id">
                                        </form></td>



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


                    </div>
                </div>
            </div>
            <div class="paginationcontainer">
                {{$data->links()}}
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




      function submitStatus(selectElement) {
        // Traverse up the DOM to find the closest form element
        var form = selectElement.closest(".statusform");

        // Check if a form is found before submitting
        if (form) {
            form.submit();
        }
    }
});
  </script>
@endsection
