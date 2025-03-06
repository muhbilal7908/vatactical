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
{{--  --}}


<!--/ Medal Card -->
@foreach($user_types as $key=>$item)
<div class="col-xl-4 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">{{ $item['newVsReturning'] == 'new' ? 'New' : 'Returning' }} <span class="text-capitalize">users</span></h4>
            <div class="d-flex align-items-center">
                <p class="card-text font-small-2 me-25 mb-0">RealTime Data</p>
            </div>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">{{ $item['activeUsers'] }}</h4>
                            <p class="card-text font-small-3 mb-0">{{$key ===0 ? "User land of website" : "User return from website"}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach




<div class="col-xl-4 col-md-6 col-12">
    <div class="card card-statistics">
        <div class="card-header">
            <h4 class="card-title">Not Set Yet</h4>
            <div class="d-flex align-items-center">
                <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
            </div>
        </div>
        <div class="card-body statistics-body">
            <div class="row">
                <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                            </div>
                        </div>
                        <div class="my-auto">
                            <h4 class="fw-bolder mb-0">$(Not SET)</h4>
                            <p class="card-text font-small-3 mb-0">(Not SET)</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



{{--  --}}
<div class="col-lg-12 col-md-12 col-sm-12">
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
            <h4 class="card-title mb-25">Sales Charts</h4>
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

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-browser-states" style="height: 500px;">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Browser States</h4>
                    <p class="card-text font-small-2">Counter August 2024</p>
                </div>
                {{-- <div class="dropdown chart-dropdown">
                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Last 28 Days</a>
                        <a class="dropdown-item" href="#">Last Month</a>
                        <a class="dropdown-item" href="#">Last Year</a>
                    </div>
                </div> --}}
            </div>
                @php
                    $browserImages = [
    'Chrome' => 'chrome.png',
    'Safari' => 'safari.jfif',
    'Safari (in-app)' => 'safari.jfif',
    'Firefox' => 'firefox.png',
    'Edge' => 'edge.png',
    'Android Webview' => 'android_webview.png',
    'Amazon Silk' => 'amazon_silk.png',
    "Samsung Internet" => "amazon_silk.png"
];
@endphp

                <div class="card-body">
                    @foreach ($fetchTopBrowsers as $item)
                    <div class="browser-states">
                        <div class="d-flex">
                            <img src="{{ asset('assets/browsers/' . $browserImages[$item['browser']]) }}" class="rounded me-1" height="30" alt="{{ $item['browser'] }}" />
                            <h6 class="align-self-center mb-0">{{ $item['browser'] }}</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="fw-bold text-body-heading me-1">{{ $item['screenPageViews'] }}</div>
                            <div id="browser-state-chart-warning"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-browser-states" style="height: 500px;">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Country States</h4>
                    <p class="card-text font-small-2">Counter August 2024</p>
                </div>
            </div>

            @php
                $countryFlags = [
                    'United States' => 'usa.webp',
                    'Pakistan' => 'pak.jpg',
                    'Philippines' => 'philippines.jpg',
                    'Canada' => 'canada.jpg',
                    'Puerto Rico' => 'puerto_rico.png',
                    'United Kingdom' => 'uk.svg',
                    // Add more countries and their respective flag images as needed
                    '(not set)' => 'not_set.png', // Placeholder image for not set country
                    '' => 'not_set.png', // Placeholder image for not set country

                ];
            @endphp

            <div class="card-body">
                @foreach ($fetchTopCountries as $item)
                    @if ($item['country'] !== 'Pakistan')
                        <div class="browser-states">
                            <div class="d-flex">
                                <img src="{{ asset('assets/flags/' . $countryFlags[$item['country']]) }}" class="rounded-circle border me-1" style="width:30px;height:30px;object-fit:cover;" alt="{{ $item['country'] }}" />
                                <h6 class="align-self-center mb-0">{{ $item['country'] }}</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="fw-bold text-body-heading me-1">{{ $item['screenPageViews'] }}</div>
                                <div id="browser-state-chart-warning"></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12" >
        @php
    $operatingSystemImages = [
        'iOS' => 'apple.webp',
        'Macintosh' => 'mac.jpg',
        'Android' => 'androide.jfif',
        'Windows' => 'windows.png',
        'Linux' => 'linux.png',
        // Add more operating systems and their respective images as needed
        '(not set)' => 'not_set.png', // Placeholder image for not set operating system
    ];
@endphp

        <div class="card card-browser-states" style="height: 500px;">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Operating Systems</h4>
                    <p class="card-text font-small-2">Counter August 2024</p>
                </div>
            </div>
            <div class="card-body">
                @foreach ($fetchTopOperatingSystems as $item)
                    <div class="browser-states">
                        <div class="d-flex">
                            <img src="{{ asset('assets/operating_systems/' . $operatingSystemImages[$item['operatingSystem']] ?? 'not_set.png') }}" class="rounded-circle border me-1" style="width:30px;height:30px;object-fit:cover;" alt="{{ $item['operatingSystem'] }}" />
                            <h6 class="align-self-center mb-0">{{ $item['operatingSystem'] }}</h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="fw-bold text-body-heading me-1">{{ $item['screenPageViews'] }}</div>
                            <div id="browser-state-chart-warning"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



{{--
    <div class="col-xl-4 col-lg-4 col-sm-12  col-12">
        <div class="card">
          <div class="card-header flex-column align-items-start">
            <h4 class="card-title mb-75">Expense Ratio</h4>
            <span class="card-subtitle text-muted">Spending on various categories </span>
          </div>
          <div class="card-body">
            <div id="donut-chart"></div>
          </div>
        </div>
      </div> --}}

{{--
            <div class="row">
    <div class="col-12">
      <p>
        An Apexcharts.js component for ApexCharts. Read full documnetation
        <a href="https://apexcharts.com/docs/installation/" target="_blank">here</a>.
      </p>
    </div>
  </div> --}}
  <!-- apex charts section start -->
  {{-- <section id="apexchart">
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
  </section> --}}



        </div>
    </div>
</div>


{{--  <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-browser-states">
        <div class="card-header">
          <div>
            <h4 class="card-title">Browser States</h4>
            <p class="card-text font-small-2">Counter August 2020</p>
          </div>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Last 28 Days</a>
              <a class="dropdown-item" href="#">Last Month</a>
              <a class="dropdown-item" href="#">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/google-chrome.png')}}"
                class="rounded me-1"
                height="30"
                alt="Google Chrome"
              />
              <h6 class="align-self-center mb-0">Google Chrome</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">54.4%</div>
              <div id="browser-state-chart-primary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/mozila-firefox.png')}}"
                class="rounded me-1"
                height="30"
                alt="Mozila Firefox"
              />
              <h6 class="align-self-center mb-0">Mozila Firefox</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">6.1%</div>
              <div id="browser-state-chart-warning"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/apple-safari.png')}}"
                class="rounded me-1"
                height="30"
                alt="Apple Safari"
              />
              <h6 class="align-self-center mb-0">Apple Safari</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">14.6%</div>
              <div id="browser-state-chart-secondary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/internet-explorer.png')}}"
                class="rounded me-1"
                height="30"
                alt="Internet Explorer"
              />
              <h6 class="align-self-center mb-0">Internet Explorer</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">4.2%</div>
              <div id="browser-state-chart-info"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img src="{{asset('images/icons/opera.png')}}" class="rounded me-1" height="30" alt="Opera Mini" />
              <h6 class="align-self-center mb-0">Opera Mini</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">8.4%</div>
              <div id="browser-state-chart-danger"></div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

  @push('scripts')
<script src="{{ asset('backend/vendors/js/charts/apexcharts.js') }}"></script>
  <script src="{{asset('backend/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

  <script src="{{ asset('backend/js/scripts/charts/chart-apex.js')}}"></script>


  <script>
      var flatPicker = $('.flat-picker'),
    isRtl = $('html').attr('data-textdirection') === 'rtl',
    chartColors = {
      column: {
        series1: '#826af9',
        series2: '#d2b0ff',
        bg: '#f8d3ff'
      },
      success: {
        shade_100: '#7eefc7',
        shade_200: '#06774f'
      },
      donut: {
        series1: '#ffe700',
        series2: '#00d4bd',
        series3: '#826bf8',
        series4: '#2b9bf4',
        series5: '#FFA1A1'
      },
      area: {
        series3: '#a4f8cd',
        series2: '#60f2ca',
        series1: '#2bdac7'
      }
    };
    var dates = @json($dates);
  var orderCounts = @json($orderCounts);
  var subscriptionCounts = @json($subscriptionCounts);
  var lotteryCounts = @json($lotteryCounts);

  var lineChartEl = document.querySelector('#line-chart'),
    lineChartConfig = {
      chart: {
        height: 400,
        type: 'line',
        zoom: {
          enabled: false
        },
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      series: [
        {
          name: 'Orders',
          data: orderCounts
        },
        {
          name: 'Subscriptions',
          data: subscriptionCounts
        },
        {
          name: 'Lottery Orders',
          data: lotteryCounts
        }
      ],
      markers: {
        strokeWidth: 7,
        strokeOpacity: 1,
        strokeColors: [window.colors.solid.white],
        colors: [window.colors.solid.warning]
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      colors: [chartColors.column.series1, chartColors.column.series2, chartColors.column.bg],
      grid: {
        xaxis: {
          lines: {
            show: true
          }
        },
        padding: {
          top: -20
        }
      },
      tooltip: {
        custom: function (data) {
          return (
            '<div class="px-1 py-50">' +
            '<span>' +
            data.series[data.seriesIndex][data.dataPointIndex] +
            '</span>' +
            '</div>'
          );
        }
      },
      xaxis: {
        categories: dates
      },
      yaxis: {
        opposite: isRtl
      }
    };

  if (typeof lineChartEl !== undefined && lineChartEl !== null) {
    var lineChart = new ApexCharts(lineChartEl, lineChartConfig);
    lineChart.render();
  }
  </script>
@endpush

@endsection
