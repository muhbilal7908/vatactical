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
                        <h2 class="content-header-title float-start mb-0">Contact Forms</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Forms
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
            <div class="row" id="basic-table">
                <div class="col-12">
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
        <td>{{ $item->name }}</td>
        <td><span class="badge rounded-pill badge-light-primary me-1">{{ $item->email }}</span></td>
        <td>{{ $item->phone_no }}</td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                        <i data-feather="edit-2" class="me-50"></i>
                        <span>View More</span>
                    </a>

                    <!-- Modal -->

                    <a class="dropdown-item" href="{{ route('delete-form', ['id' => $item->id]) }}">
                        <i data-feather="trash" class="me-50"></i>
                        <span>Delete</span>
                    </a>
                </div>
            </div>
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
