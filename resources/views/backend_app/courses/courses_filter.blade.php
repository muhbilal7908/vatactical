@extends('backend_app.layouts.template')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.orange-coral.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.midnight-blue.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/css/evo-calendar.royal-navy.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('evo-calendar/js/demo.css')}}">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
<style>
    .calendar-sidebar>.calendar-year>p {
    margin: 0;
    font-size: 20px;
    display: inline-block;
}
.calendar-sidebar>.calendar-year>button.icon-button>span {
    border-right: 4px solid #fff;
    border-bottom: 4px solid #fff;
    width: 75%;
    height: 75%;
}
</style>
<div class="app-content content bg-white">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Courses Session</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">              {{ \Carbon\Carbon::parse($time)->format('D M j Y') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body p-0">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="container-fluid">
                            {{-- <form action="{{route('courses-filter')}}" method="GET">
                            <h4>Search Class</h4>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Search By Date</label>
                                    <input type="date" class="form-control" name="date">
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-25 float-end">Search</button>
                                </div>
                            </form> --}}
                            <main>
                                <div class="">




                                        <div class="section-content">

                                            {{-- <div class="action-buttons">

                                                <button class="btn-action active" data-set-theme="Default">DEFAULT</button>
                                                <button class="btn-action" data-set-theme="Midnight Blue">MIDNIGHT BLUE</button>
                                                <button class="btn-action" data-set-theme="Royal Navy">ROYAL NAVY</button>
                                                <button class="btn-action" data-set-theme="Orange Coral">ORANGE CORAL</button>
                                            </div> --}}
                                            <div class="container py-2">


                                            </div>
                                            <div class="console-log">
                                                <div class="log-content">
                                                    <div class="--noshadow royal-navy" id="demoEvoCalendar"></div>
                                                </div>
                                            </div>

                                        </div>




                                </div>
                            </main>
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
            <!-- Responsive tables end -->

        </div>
    </div>
</div>
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('evo-calendar/js/demo.js')}}"></script>
<script src="{{asset('evo-calendar/js/evo-calendar.js')}}"></script>

@endpush
@endsection
