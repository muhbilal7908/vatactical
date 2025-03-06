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
                        <h2 class="content-header-title float-start mb-0">Courses</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Courses
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Manage Courses
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('add-course')}}">Add Course</a></li>
                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Course Session</a></li>

                        </ul>
                      </div>
                   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" style="background:#8a0103;">
                          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Class Session</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('submit-course-slot')}}" method="POST">
                                @csrf
                          <div class="container">
                            <div class="row mt-1">
                                <div class="col-3 fw-bold">Class</div>
                                <div class="col-9">
                                    <select name="course_id" class="form-select" id="">
                                        <option disabled selected value="">Choose...</option>
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-3 fw-bold">Location</div>
                                <div class="col-9">
                                    <input value="490 Goose Pond Rd Emporia, VA 23847" type="text" name="location" class="form-control" />
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-3 fw-bold">Staff</div>
                                <div class="col-9">
                                    <select name="staff" id="" class="form-select">
                                        <option value="">Choose..</option>
                                        @foreach ($staff as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-3 fw-bold">Date</div>
                                <div class="col-9">
                                    <input  type="date" name="date" class="form-control" />
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-3 fw-bold"><p class="mt-2">Duration</p></div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <p for="" class="text-center mb-0">From</p>
                                            <input type="time" name="start_time" class="form-control"></div>

                                        <div class="col-6">
                                            <p for="" class="text-center mb-0">To</p>


                                            <input type="time" name="end_time" class="form-control"></div>

                                    </div>
                                </div>

                            </div>
                            <div class="row mt-1">
                                <div class="col-3 fw-bold">Repeat</div>
                                <div class="col-9">
                                    <select name="repeat" id="" class="form-select">
                                        <option value="">Choose..</option>
                                        <option value="Doesn't repeat">Doesn't repeat</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Every 2 Weeks">Every 2 Weeks</option>
                                        <option value="Every 3 Weeks">Every 3 Weeks</option>
                                        <option value="Every 4 Weeks">Every 4 Weeks</option>


                                    </select>
                                </div>

                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                </form>
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
                                        <th>Name</th>
                                        <th>Price</th>


                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key=>$item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>
                                            <img src="{{asset('assets/courses/'.$item->img)}}" class="me-1 rounded-3" width="40" height="40" alt="brand" />
                                            {{$item->name}}
                                        </td>


                                        <td><span class="badge rounded-pill badge-light-primary me-1">${{$item->price}}</span></td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('courses-slots', ['id' => $item->id]) }}">

                                                        <i data-feather="box" class="me-50"></i>
                                                        <span>View Course Sessions</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('edit-course', ['id' => $item->id]) }}">

                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('delete-course',['id'=>$item->id])}}">
                                                        <i data-feather="trash" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>Empty</tr>
                                    @endforelse


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

<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

@endsection
