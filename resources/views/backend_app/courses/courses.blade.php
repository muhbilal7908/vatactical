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
                </div>

                  

               
            </div>
        </div>
        <div>
          
        </div>
        <div class="card p-0 mb-4">
            <form action="{{route('filter-course')}}" class="w-100" method="GET">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
              <div class="app-academy-md-25 card-body py-0">
                <img
                  src="{{asset('assets/bulb-light.png')}}"
                  class="img-fluid app-academy-img-height scaleX-n1-rtl "
                  alt="Bulb in hand"
                  data-app-light-img="illustrations/bulb-light.png"
                  data-app-dark-img="illustrations/bulb-dark.png"
                  height="90" />
              </div>
              <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                <h3 class="card-title mb-4 lh-sm px-md-5 lh-lg">
                    Enhance Your Shooting Skills.
                    <span class="text-primary fw-medium text-nowrap">All in one place</span>.
                </h3>
                <p class="mb-3">
                    Improve your accuracy and safety with the most reliable online courses and certifications in gun shooting, firearm safety, tactical training, and marksmanship.
                </p>
               
                <div class="d-flex align-items-center justify-content-between w-75">
                    <input type="search" name="name" placeholder="Find your course" class="form-control me-2" />
                    <button type="submit" class="btn btn-primary btn-icon w-auto"><i data-feather="search"></i></button>
                </div>
          
            </div>

              <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                <img
                  src="{{asset('assets/pencil-rocket.png')}}"
                  alt="pencil rocket"
                  height="188"
                  class="scaleX-n1-rtl" />
              </div>
            </div>
            </form>
          </div>
          <div class="d-flex justify-content-end mb-1">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage Courses
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('add-course')}}">Add Course</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Course Session</a></li>
  
              </ul>
            </div>
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
                  <div class="container-fluid p-2">
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
          
          <div class="card mb-4">
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
              <div class="card-title mb-0 me-1">
                <h5 class="mb-1">My Courses</h5>
                <p class="text-muted mb-0">Total {{$data->total()}} courses you have</p>
              </div>

            </div>
            <div class="card-body">
              <div class="row gy-4 mb-4">
                @forelse ($data as $key=>$item)
                <div class="col-sm-12 col-lg-4">
                  <div class="card  mb-0 shadow-none border" >
                    <div class="rounded-2 text-center">
                      <a href="app-academy-course-details.html"
                        ><img
                          class="img-fluid"
                          style="height: 200px;object-fit:cover;width:100%;"
                          src="{{asset('assets/courses/'.$item->img)}}"
                          alt="{{$item->name}}"
                      /></a>
                    </div>
                    <div class="card-body ">
                        <div style="height: 200px;">
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="form-check form-switch">
                            <input type="hidden"  value="{{$item->id}}">
                            <input value="1" onclick="updateFeaturedStatus(this)" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ $item->status ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
                          </div>
                                            <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                          Seats <span class="text-warning"><i data-feather="link-2"></i></span
                          ><span class="text-muted">({{$item->seats}})</span>
                        </h6>
                      </div>
                      <a class="text-capitalize text-primary fw-bold" href="{{route('course-detail',['slug'=>$item->slug])}}"  >{{{Str::words($item->name,'6','...')}}}</a>
                      <p class="mt-2">{{strip_tags(Str::words($item->description,'14','...'))}}</p>
                      <p class="d-flex align-items-center"><i data-feather="send" class="me-1"></i> {{ count($item->slots) }} Sessions</p>
                    </div>


                      <div class="d-flex flex-column flex-md-row gap-1 text-nowrap">
                        <a
                        class="btn btn-outline-warning text-center"
                        href="{{route('courses-slots',['id'=>$item->id])}}">
                      Sessions
                      </a>
                        <a
                          class="btn btn-outline-secondary text-center"
                          href="{{route('edit-course',['id'=>$item->id])}}">
                         Edit
                        </a>
                        <a
                          class=" btn btn-outline-danger text-center"
                          href="{{route('delete-course',['id'=>$item->id])}}">
                        Delete

                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @empty
                <div>Empty</div>
                @endforelse
              </div>
              <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                {{ $data->links() }}
              </nav>
            </div>
          </div>

                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>

<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
@push('scripts')

<script>



function updateFeaturedStatus(checkbox) {
  
        // Determine the ID of the item associated with this checkbox
        var itemId = checkbox.parentNode.querySelector('input[type="hidden"]').value;
        console.log(itemId);
        // Determine the new status based on the checkbox state
        var newStatus = checkbox.checked ? 1 : 0;

        // Send an AJAX request to update the featured status
        $.ajax({
            url: '{{route('status-course')}}',
            method: 'POST',
            data: {
                id: itemId,
                status: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $("#success_toaster").show();
                $("#msg").text(response.message)
                setTimeout(() => {
                    $("#success_toaster").hide();
                }, 3000);
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    }

</script>
    
@endpush
@endsection
