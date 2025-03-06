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
                        <h2 class="content-header-title float-start mb-0">Lottery Participents</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Participents
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
               <a href="{{route('add-lottery-particpent')}}"> <button class="btn btn-primary ms-auto d-block mb-2">Add Lottery Member +</button></a>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <form action="{{route('search-participents')}}" method="GET">
                <div class="card p-2">
                <div class="row">

                    <div class="col-4">
                        <label for="">Lottery No</label>
                        <input type="text" class="form-control" placeholder="Enter Lottery no" name="lottery_no">
                    </div>
                    <div class="col-4">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" placeholder="Enter User name" name="user_name">
                    </div>
                    <div class="col-4">
                        <label for="">Lottery</label>
                       <select class="form-select" name="lottery_id" id="">
                        <option value="">Choose...</option>
                        @foreach ($lottery as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                       </select>
                    </div>




                    <div class="col-12">
                       <button type="submit" class="btn btn-primary mt-2">Search</button>
                    </div>
                </div>
            </div>
                </form>
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Lottery no</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Price</th>
                                        <th>Lottery Name</th>

                                        <th>Payment Status</th>
                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$item)
                                    <tr>



                                        <td>{{$item->lottery_no}}</td>
                                        <td>{{$item->first_name}}</td>
                                        <td>{{$item->email}}</td>

                                        <td>
                                          ${{$item->total}}
                                        </td>

                                        <td>{{$item->lottery->name}}</td>

                                        <td><span class="badge rounded-pill badge-light-success me-1">{{$item->bank_status}}</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <a class="dropdown-item" href="{{route('lottery-order-delete',['id'=>$item->id])}}">
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
            <div class="pagination">
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
