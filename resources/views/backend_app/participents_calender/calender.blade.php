@extends('backend_app.layouts.template')
@section('content')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/calendars/fullcalendar.min.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->


<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/app-calendar.css')}}">
@endpush
<style>
    .fc-daygrid-event {
        display: block!important;
    }
    .fc-button-group button{
        color: black!important;
    }
</style>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Full calendar start -->
            <section>
                <div class="app-calendar overflow-hidden border">
                    <div class="row g-0">
                        <!-- Sidebar -->
                        <div class="col app-calendar-sidebar flex-grow-0 overflow-hidden d-flex flex-column" id="app-calendar-sidebar">
                            <div class="sidebar-wrapper">
                                <div class="card-body d-flex justify-content-center">
                                    {{-- <button class="btn btn-primary btn-toggle-sidebar w-100" data-bs-toggle="modal" >
                                        <span class="align-middle">Search</span>
                                    </button> --}}
                                    <h2>All Participents</h2>
                                </div>
                                <div class="card-body pb-0 d-none">
                                    <h5 class="section-label mb-1">
                                        <span class="align-middle">Filter</span>
                                    </h5>
                                    <div class="form-check mb-1">
                                        <input type="checkbox" class="form-check-input select-all" id="select-all" checked />
                                        <label class="form-check-label" for="select-all">View All</label>
                                    </div>
                                    <div class="calendar-events-filter">
                                        <div class="form-check form-check-danger mb-1">
                                            <input type="checkbox" class="form-check-input input-filter" id="personal" data-value="personal" checked />
                                            <label class="form-check-label" for="personal">Personal</label>
                                        </div>
                                        <div class="form-check form-check-primary mb-1">
                                            <input type="checkbox" class="form-check-input input-filter" id="business" data-value="business" checked />
                                            <label class="form-check-label" for="business">Business</label>
                                        </div>
                                        <div class="form-check form-check-warning mb-1">
                                            <input type="checkbox" class="form-check-input input-filter" id="family" data-value="family" checked />
                                            <label class="form-check-label" for="family">Family</label>
                                        </div>
                                        <div class="form-check form-check-success mb-1">
                                            <input type="checkbox" class="form-check-input input-filter" id="holiday" data-value="holiday" checked />
                                            <label class="form-check-label" for="holiday">Holiday</label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <input type="checkbox" class="form-check-input input-filter" id="etc" data-value="etc" checked />
                                            <label class="form-check-label" for="etc">ETC</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <img src="{{asset('backend/images/pages/calendar-illustration.png')}}" alt="Calendar illustration" class="img-fluid" />
                            </div>
                        </div>
                        <!-- /Sidebar -->

                        <!-- Calendar -->
                        <div class="col position-relative">
                            <div class="card shadow-none border-0 mb-0 rounded-0">
                                <div class="card-body pb-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /Calendar -->
                        <div class="body-content-overlay"></div>
                    </div>
                </div>
                <!-- Calendar Add/Update/Delete event modal-->
                <div class="modal modal-slide-in event-sidebar fade" id="add-new-sidebar">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title">More Detail</h5>
                            </div>
                            <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                <form class="event-form needs-validation" data-ajax="false" novalidate>
                                    <div class="mb-1">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Event Title" required />
                                    </div>

                                    <div class="mb-1 position-relative">
                                        <label for="start-date" class="form-label">Date</label>
                                        <input type="text" class="form-control" id="start-date" name="start-date" placeholder="Start Date" />
                                    </div>
                                    <div class="mb-1 position-relative">
                                        <label for="end-date" class="form-label">Start Time</label>
                                        <input type="text" class="form-control" id="time_start" name="end-date" placeholder="Start Time" />
                                    </div>
                                    <div class="mb-1 position-relative">
                                        <label for="end-date" class="form-label">End Time</label>
                                        <input type="text" class="form-control" id="time_end" name="end-date" placeholder="End Time" />
                                    </div>
                                    <div class="mb-1 position-relative">
                                        <label for="end-date" class="form-label">Seats</label>
                                        <div class="fs-1 fw-bold"><span id="bookings"></span>/<span id="total_seats"></span></div>
                                    </div>
                                     <div class="mb-1 position-relative">
                                        <label for="end-date" class="form-label">All Users</label>
                                        <div class="border p-1" style="max-height: 150px;overflow-y:scroll;" id="all_users"></div>
                                    </div>





                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Calendar Add/Update/Delete event modal-->
            </section>
            <!-- Full calendar end -->

        </div>
    </div>
</div>

{{--  --}}
@push('scripts')


<script src="{{asset('backend/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->


<script src="{{asset('backend/vendors/js/extensions/moment.min.js')}}"></script>

<script src="{{asset('backend/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->




{{--  --}}
<script src="{{asset('backend/app-assets/vendors/js/calendar/fullcalendar.min.js')}}"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('backend/js/scripts/pages/app-calendar-events.js')}}"></script>
<script src="{{asset('backend/js/scripts/pages/app-calendar.js')}}"></script>
<script>
     $(window).on('load', function() {
          if (feather) {
              feather.replace({
                  width: 14,
                  height: 14
              });
          }
      })
  </script>
</script>

@endpush
<!-- END: Page JS-->
@endsection
