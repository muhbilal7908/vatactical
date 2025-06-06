@extends('backend_app.layouts.template')
@section('content')
<style>
    .flatpickr-next-month{
        display: none;
    }
</style>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Website Analytics</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Website Analytics
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-12">
      <p>
        An Apexcharts.js component for ApexCharts. Read full documnetation
        <a href="https://apexcharts.com/docs/installation/" target="_blank">here</a>.
      </p>
    </div>
  </div>
  <!-- apex charts section start -->
  <section id="apexchart">
    <div class="row">
      <!-- Area Chart starts -->
      <div class="col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-sm-row flex-column
              justify-content-md-between
              align-items-start
              justify-content-start
            "
          >
            <div>
              <h4 class="card-title">Line Chart</h4>
              <span class="card-subtitle text-muted">Commercial networks</span>
            </div>
            <div class="d-flex align-items-center">
              <i class="font-medium-2" data-feather="calendar"></i>
              <input
                type="text"
                class="form-control flat-picker bg-transparent border-0 shadow-none"
                placeholder="YYYY-MM-DD"
              />
            </div>
          </div>
          <div class="card-body">
            <div id="line-area-chart"></div>
          </div>
        </div>
      </div>
      <!-- Area Chart ends -->

      <!-- Column Chart Starts -->
      <div class="col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-md-row flex-column
              justify-content-md-between justify-content-start
              align-items-md-center align-items-start
            "
          >
            <h4 class="card-title">Data Science</h4>
            <div class="d-flex align-items-center mt-md-0 mt-1">
              <i class="font-medium-2" data-feather="calendar"></i>
              <input
                type="text"
                class="form-control flat-picker bg-transparent border-0 shadow-none"
                placeholder="YYYY-MM-DD"
              />
            </div>
          </div>
          <div class="card-body">
            <div id="column-chart"></div>
          </div>
        </div>
      </div>
      <!-- Column Chart Ends -->

      <!-- Scatter Chart Starts -->
      <div class="col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-md-row flex-column
              justify-content-md-between justify-content-start
              align-items-md-center align-items-start
            "
          >
            <h4 class="card-title">New Technologies Data</h4>
            <div class="btn-group mt-md-0 mt-1" role="group" aria-label="Basic radio toggle button group">
              <input type="radio" class="btn-check" name="radio_options" id="radio_option1" autocomplete="off" checked />
              <label class="btn btn-outline-primary" for="radio_option1">Daily</label>

              <input type="radio" class="btn-check" name="radio_options" id="radio_option2" autocomplete="off" />
              <label class="btn btn-outline-primary" for="radio_option2">Monthly</label>

              <input type="radio" class="btn-check" name="radio_options" id="radio_option3" autocomplete="off" />
              <label class="btn btn-outline-primary" for="radio_option3">Yearly</label>
            </div>
          </div>
          <div class="card-body">
            <div id="scatter-chart"></div>
          </div>
        </div>
      </div>
      <!-- Scatter Chart Ends -->

      <!-- Line Chart Starts -->
      <div class="col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-sm-row flex-column
              justify-content-md-between
              align-items-start
              justify-content-start
            "
          >
            <div>
              <h4 class="card-title mb-25">Balance</h4>
              <span class="card-subtitle text-muted">Commercial networks & enterprises</span>
            </div>
            <div class="d-flex align-items-center flex-wrap mt-sm-0 mt-1">
              <h5 class="fw-bolder mb-0 me-1">$ 100,000</h5>
              <span class="badge badge-light-secondary">
                <i class="text-danger font-small-3" data-feather="arrow-down"></i>
                <span class="align-middle">20%</span>
              </span>
            </div>
          </div>
          <div class="card-body">
            <div id="line-chart"></div>
          </div>
        </div>
      </div>
      <!-- Line Chart Ends -->

      <!-- Bar Chart Starts -->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-sm-row flex-column
              justify-content-md-between
              align-items-start
              justify-content-start
            "
          >
            <div>
              <p class="card-subtitle text-muted mb-25">Balance</p>
              <h4 class="card-title fw-bolder">$74,382.72</h4>
            </div>
            <div class="d-flex align-items-center mt-md-0 mt-1">
              <i class="font-medium-2" data-feather="calendar"></i>
              <input
                type="text"
                class="form-control flat-picker bg-transparent border-0 shadow-none"
                placeholder="YYYY-MM-DD"
              />
            </div>
          </div>
          <div class="card-body">
            <div id="bar-chart"></div>
          </div>
        </div>
      </div>
      <!-- Bar Chart Ends -->

      <!-- Candlestick Chart Starts -->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-sm-row flex-column
              justify-content-md-between
              align-items-start
              justify-content-start
            "
          >
            <div>
              <h4 class="card-title mb-50">Stock Prices</h4>
              <p class="mb-0">$50,863.98</p>
            </div>
            <div class="d-flex align-items-center mt-md-0 mt-1">
              <i class="font-medium-2" data-feather="calendar"></i>
              <input
                type="text"
                class="form-control flat-picker bg-transparent border-0 shadow-none"
                placeholder="YYYY-MM-DD"
              />
            </div>
          </div>
          <div class="card-body">
            <div id="candlestick-chart"></div>
          </div>
        </div>
      </div>
      <!-- Candlestick Chart Ends -->

      <!-- Heatmap Chart Starts -->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Daily Sales States</h4>
            <div class="dropdown">
              <i
                data-feather="more-vertical"
                class="cursor-pointer"
                role="button"
                id="heat-chart-dd"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
              </i>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
                <a class="dropdown-item" href="#">Last 28 Days</a>
                <a class="dropdown-item" href="#">Last Month</a>
                <a class="dropdown-item" href="#">Last Year</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="heatmap-chart"></div>
          </div>
        </div>
      </div>
      <!-- Heatmap Chart Ends -->

      <!-- RadialBar Chart Starts -->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div
            class="
              card-header
              d-flex
              flex-sm-row flex-column
              justify-content-md-between
              align-items-start
              justify-content-start
            "
          >
            <h4 class="card-title mb-sm-0 mb-1">Statistics</h4>
          </div>
          <div class="card-body">
            <div id="radialbar-chart"></div>
          </div>
        </div>
      </div>
      <!-- RadialBar Chart Ends -->

      <!-- Radial Chart Starts-->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Mobile Comparison</h4>
          </div>
          <div class="card-body">
            <div id="radar-chart"></div>
          </div>
        </div>
      </div>
      <!-- Radial Chart Ends-->

      <!-- Donut Chart Starts-->
      <div class="col-xl-6 col-12">
        <div class="card">
          <div class="card-header flex-column align-items-start">
            <h4 class="card-title mb-75">Expense Ratio</h4>
            <span class="card-subtitle text-muted">Spending on various categories </span>
          </div>
          <div class="card-body">
            <div id="donut-chart"></div>
          </div>
        </div>
      </div>

    </div>
  </section>



        </div>
    </div>
</div>
</div>
</div>

  @push('scripts')
<script src="{{ asset('backend/vendors/js/charts/apexcharts.js') }}"></script>
  <script src="{{asset('backend/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

  <script src="{{ asset('backend/js/scripts/charts/chart-apex.js')}}"></script>

@endpush

@endsection
