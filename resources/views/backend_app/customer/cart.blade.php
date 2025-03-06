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
                        <h2 class="content-header-title float-start mb-0">Cart</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('CustomerDashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Cart
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Product Name</th>
                                        <th>User Name</th>
                                        <th>Price</th>


                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>
                                            {{$key}}

                                        </td>
                                        <td><img src="{{asset('assets/featured_images/'.$item->products->img)}}" class="me-75" height="40" width="40"  />{{$item->products->name}}</td>

                                        <td>{{$item->products->name}}</td>
                                        <td>
                                          ${{$item->products->price}}
                                        </td>





                                        <td>
                                            <a class="dropdown-item" href="{{route('delete-item',['id'=>$item->id])}}">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
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
<script>
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
