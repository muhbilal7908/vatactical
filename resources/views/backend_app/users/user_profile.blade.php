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
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Profile</a>
                                </li>
                                <li class="breadcrumb-item">{{$data->name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div id="user-profile">
                <!-- profile header -->
               
                <!--/ profile header -->

                <!-- profile info section -->
                <section id="profile-info">
                    <div class="container-fluid">

                        
                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="user-profile-img">
                                            <img src="assets/images/pattern-bg.jpg" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                                            <div class="overlay-content rounded-top">
                                                <div>
                
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end user-profile-img -->
                
                
                                        <div class="p-1 pt-0">
                
                                            <div class="mt-n5 position-relative text-center border-bottom pb-3">
                                                <img src="{{asset('assets/users/'.$data->img)}}" onerror="this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT45gcJLX6J9Wlyr4rFHA3beqZJbTyCvo_0whWJegVnZQ&amp;s'" alt="" style="height:150px;object-fit:cover;width:150px;" class="avatar-xl rounded-circle img-thumbnail">
                                                <h4 class="text-capitalize mt-3">{{$data->name}}</h4>
                
                
                
                                            </div>
                
                                            <div class="table-responsive mt-3 border-bottom pb-3">
                                                <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Company:</th>
                                                            <td class="text-muted">{{$data->company}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Country:</th>
                                                            <td class="text-muted">{{$data->country}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fw-bold">
                                                                City:</th>
                                                            <td class="text-muted">{{$data->city}}</td>
                                                        </tr>
                                                        <!-- end tr -->
                                                        <tr>
                                                            <th class="fw-bold">
                                                                Address:</th>
                                                            <td class="text-muted">{{$data->address}}</td>
                                                        </tr>
                                                        <!-- end tr -->
                
                                                        <!-- end tr -->
                                                        <tr>
                                                            <th class="fw-bold">Zip Code:</th>
                                                            <td class="text-muted">{{$data->zip_code}}</td>
                                                        </tr>
                                                        <!-- end tr -->
                
                                                        <tr>
                                                            <th class="fw-bold">Phone:</th>
                                                            <td class="text-muted">{{$data->phone_no}}</td>
                                                        </tr>
                                                        <!-- end tr -->
                
                                                        <tr>
                                                            <th class="fw-bold">Email:</th>
                                                            <td class="text-muted">{{$data->email}}</td>
                                                        </tr>
                                                        <!-- end tr -->
                                                    </tbody><!-- end tbody -->
                                                </table>
                                            </div>
                
                
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="col-xxl-9">
                
                                 <div class="card">
                                    <div class="card-body">
                                         <!-- Nav tabs -->
                                         <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">
                                                    <span>Orders</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                                    <span>Subscriptions</span>
                                                </a>
                                            </li>
                
                                        </ul>
                                    </div>
                                </div>
                
                
                                <!-- Tab content -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                          <div class="card-body">
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
                                                        @foreach ($ordersdata as $key=>$item)
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

                                       <div class="tab-pane " id="messages" role="tabpanel">
                                        <div class="card">
                                          <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" style="font-size: 13px;">
                                                    <thead>
                                                        <tr>
                    
                                                            <th>Subscription-ID</th>
                                                            <th>Subscription Date</th>
                                                            <th>Customer</th>
                    
                                                            <th>Course Name</th>
                                                            <th>Total Amount</th>
                                                            <th>Seats</th>
                    
                                                            <th>Functions</th>
                    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($subscriptions as $key=>$item)
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
                    
                                                            <td><span class=" btn  btn-outline-success waves-effect">{{ $item->seats }}</span></td>
                    
                    
                    
                    
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                        <i data-feather="more-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="{{route('subscription-detail',['id'=>$item->id])}}">
                                                                            <i data-feather="edit-2" class="me-50"></i>
                                                                            <span>View Detail</span>
                                                                        </a>
                                                                        <a class="dropdown-item" href="{{route('destroy-subscription',['id'=>$item->id])}}">
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
                
                
                
                                </div>
                
                            </div>
                
                        </div>
    </div>
</div>

@endsection
