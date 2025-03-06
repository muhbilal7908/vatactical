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
                        <h2 class="content-header-title float-start mb-0">Memberships</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
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
                                <h6 class="mb-2">Search</h6>
                            </div>
                        </div>
                        <form action="{{route('memberships.all')}}" method="GET">

                        <div class="row">

                            <div class="col-2">
                                <label for="">Membership ID</label>
                                <input type="number" class="form-control" name="membership_id">
                            </div>
                            <div class="col-2">
                               <label for="">Memberships</label>
                               <select name="membership" id="" class="form-select">
                                <option value="">Choose..</option>
                                @foreach ($memberships as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
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
                            <h6 class="p-1">Total Membership List <span class="badge bg-danger rounded-3 ">{{$data->total()}}</span></h6>
                            <a href="{{route('generate-pdf-memberships')}}" class="btn btn-primary mb-2 mt-1 ms-auto waves-effect waves-float waves-light"  id="export_pdf" class="btn text-success  ms-auto ">Export PDF <i data-feather="file-text"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="font-size: 13px;">
                                <thead>
                                    <tr>
                                        <th>Membership-ID</th>
                                        <th>Subscription Date</th>
                                        <th>Customer</th>
                                        <th>Membership Name</th>
                                        <th>Total Amount</th>
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
                                        <td><span>{{$item->membership->name}}</span></td>
                                        <td>
                                          ${{$item->total}}
                                          <span class="d-block">
                                         <span class="badge rounded-pill badge-light-success me-1">{{$item->bank_status}}</span>
                                          </span>
                                        </td>

                                      




                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{route('memberships.detail',['id'=>$item->id])}}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>View Detail</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('memberships.destroy',['id'=>$item->id])}}">
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
                {{$data->appends(Request::except('page'))->links()}}
            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>


@endsection
