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
                        <h2 class="content-header-title float-start mb-0">All Users</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Users
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">

            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="row">

                        </div>
                        <form action="{{route('search-user')}}" method="GET">

                        <div class="row">

                            <div class="col-4">
                                <label for="">User name</label>
                                <input type="text" class="form-control" placeholder="Enter Username" name="user_name">
                            </div>
                            <div class="col-4">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                            <div class="col-4">
                                <label for="">Phone no</label>
                            <input type="text" class="form-control" placeholder="Enter Phone no" name="phone_no">
                            </div>




                            <div class="col-12">
                               <button type="submit" class="btn btn-primary mt-2">Search</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle waves-effect waves-float waves-light mb-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                            <a class="dropdown-item" href="{{route('generate-pdf-users')}}">Export PDF<i data-feather="file-text"></i></a>
                            <a  class="dropdown-item" href="{{route('export-csv')}}">Export CSV<i data-feather="file-text"></i></a>
                        </div>
                    </div>


                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>

                                        <th>Email</th>

                                        <th>Phone_no</th>
                                        <th>Functions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $item)
    <tr>
        <td>{{ $key }}</td>
        <td>
            @if ($item->img)
                <img class="shadow rounded-circle me-1" src="{{asset('assets/users/'.$item->img)}}" width="50" height="50" style="object-fit:contain;" alt="">   {{ $item->name }}
            @else
            <img class="me-1 shadow rounded-circle" src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" class="border  rounded-circle" width="50" height="50">
            {{ $item->name }}

        @endif
        </td>
        <td><span class="badge rounded-pill badge-light-primary me-1">{{ $item->email }}</span></td>
        <td>{{ $item->phone_no }}</td>
        <td>
                    <a class="text-danger" href="{{ route('delete-user', ['id' => $item->id]) }}" onclick="return confirm('Do you want to Confirm delete the user?')">
        <i data-feather="trash" class="me-50"></i>
                    </a>
                    <a class="text-danger" href="{{ route('user-info', ['id' => $item->id]) }}" >
        <i data-feather="eye" class="me-50"></i>
                    </a>
        </td>
    </tr>
    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Details for {{ $item->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><span class="fw-bold">Name:</span> {{ $item->name }}</p>
                    <p><span class="fw-bold">Email: </span> {{ $item->email }}</p>
                    <p><span class="fw-bold">Phone:</span>  {{ $item->phone_no }}</p>
                    <p><span class="fw-bold">Message: </span> {{ $item->message }}</p>

                    <!-- Add more details as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

@empty
    <tr>
        <td colspan="5">Empty</td>
    </tr>
@endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{$data->links()}}
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

@endsection
