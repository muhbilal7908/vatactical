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
                        <h2 class="content-header-title float-start mb-0">{{$data->name}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('all-courses')}}">Courses</a>
                                </li>
                                <li class="breadcrumb-item">All Class Sessions
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                    @csrf
            </div>

                <input type="hidden"  name="id" value="{{$data->id}}">

        </div>
        <div class="row">


                    <div class="col-12">
                        <div class="content-body">
                            <!-- Basic Tables start -->
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">


                                        <div class="row p-2">
                                            <div class="col-12">
                                              
                                               <table class="table">
                                                <tr>
                                                    <th>S.No</th>

                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>


                                                    <th>Repeat</th>
                                                    <th class="text-center">Staff</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach ($slots as $key=>$item)
                                                <tr>
                                                    <td>{{$key}}</td>

                                                    <td>{{ $item->date}}</td>
                                                    <td>{{ date('h:i A', strtotime($item->start_time)) }}</td>
                                                    <td>{{ date('h:i A', strtotime($item->end_time)) }}</td>

                                                    <td>{{$item->repeat}}</td>
                                                    <td>
                                                        <img src="{{ asset('assets/staff/'.$item->staff->img ?? '') }}" class="rounded-circle mx-1" width="35" height="35" alt="">
                                                        {{ $item->staff->name }}
                                                    </td>
                                                    
                                                    <td><div class="d-flex flex-row gap-1">
                                                        <a  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key }}">
                                                            <i data-feather="edit-2" class="me-50"></i>
                                                           
                                                        </a>
                                                        <a  href="{{route('delete-slot',['id'=>$item->id])}}">
                                                        <i data-feather="trash" class="me-50 text-danger"></i>
                                                      
                                                    </a>
                                                </div></td>
                                                </tr>
                                                <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header" style="background:#8a0103;">
                                                          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update Class Session</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('courses.update.slots',['id'=>$item->id])}}" method="POST">
                                                                @csrf
                                                          <div class="container">
                                                          
                                                            <div class="row mt-1">
                                                                <div class="col-3 fw-bold">Location</div>
                                                                <div class="col-9">
                                                                    <input value="{{ $item->location }}" type="text" name="location" class="form-control" />
                                                                </div>
                                
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-3 fw-bold">Staff</div>
                                                                <div class="col-9">
                                                                    <select name="staff" id="" class="form-select">
                                                                        <option value="">Choose..</option>
                                                                        @foreach ($staffs as $staff)
                                                                        <option @if($staff->id === $item->staff_id) selected @endif value="{{$staff->id}}">{{$item->staff->name}}</option>
                                                                        @endforeach
                                
                                                                    </select>
                                                                </div>
                                
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-3 fw-bold">Date</div>
                                                                <div class="col-9">
                                                                    <input  type="date" value="{{ $item->date }}" name="date" class="form-control" />
                                                                </div>
                                
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-3 fw-bold"><p class="mt-2">Duration</p></div>
                                                                <div class="col-9">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p for="" class="text-center mb-0">From</p>
                                                                            <input type="time" value="{{ $item->start_time }}" name="start_time" class="form-control"></div>
                                
                                                                        <div class="col-6">
                                                                            <p for="" class="text-center mb-0">To</p>
                                
                                
                                                                            <input type="time" value="{{ $item->end_time }}" name="end_time" class="form-control"></div>
                                
                                                                    </div>
                                                                </div>
                                
                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-3 fw-bold">Repeat</div>
                                                                <div class="col-9">
                                                                    <select name="repeat" id="" class="form-select">
                                                                        <option value="">Choose..</option>
                                                                        <option @if($item->repeat === "Doesn't repeat") selected @endif value="Doesn't repeat">Doesn't repeat</option>
                                                                        <option @if($item->repeat === "Weekly") selected @endif value="Weekly">Weekly</option>
                                                                        <option @if($item->repeat === "Every 2 Weeks") selected @endif value="Every 2 Weeks">Every 2 Weeks</option>
                                                                        <option @if($item->repeat === "Every 3 Weeks") selected @endif value="Every 3 Weeks">Every 3 Weeks</option>
                                                                        <option @if($item->repeat === "Every 4 Weeks") selected @endif value="Every 4 Weeks">Every 4 Weeks</option>
                                
                                
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
                                                @endforeach
                                               </table>

                                            </div>

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
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>


@endsection
