@extends('backend_app.layouts.template')
@section('content')
@push('styles')
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

@endpush
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Transactions</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All
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
                        <form action="{{ route('search-transection') }}" method="GET">

                            <div class="row">

                                <div class="col-6">
                                    <label for="user">Users</label>
                                    <select name="user" id="user" class="form-select">
                                        <option value="">Select User</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->id }}" {{ old('user') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="date_from">Transaction Date</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{ old('date_from') }}">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-2">Search</button>
                                </div>

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

                            <a  class="dropdown-item" href="{{route('transection-excel')}}">Export CSV<i data-feather="file-text"></i></a>
                        </div>
                    </div>


                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User Name</th>

                                        <th>Message</th>

                                        <th>Amount</th>
                                        <th>Transection Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $item)
    <tr>
        <td>{{ $key }}</td>
        <td>
            {{ $item->user->name }}
        </td>
        <td>{{$item->msg}}</td>
        <td>${{ $item->amount }}</td>
        <td>{{ $item->created_at }}</td>
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
            {{$data->appends(Request::except('page'))->links()}}
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
@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
@endpush
@endsection
