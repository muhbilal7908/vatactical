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
                        <h2 class="content-header-title float-start mb-0">Gallery   </h2>
                       
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Gallery Images
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
      
        <div class="mb-2">
            <button class="btn btn-primary ms-auto d-block" data-bs-toggle="modal" data-bs-target="#addModal">Add New</button>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addModalLabel">Add New Image</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Enter name of the image" name="name" class="form-control" id="name">
                                </div>
                                <div class="mb-1">
                                    <label for="img">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="img" class="form-control" id="img">
                                </div>
                                <div class="mb-1">
                                  <label for="">Enter Description</label>
                                  <textarea name="description" class="form-control" placeholder="Enter Description" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
          <div class="card mb-4">
         
            <div class="card-header d-flex flex-wrap justify-content-between gap-3">
              <div class="card-title mb-0 me-1">
                <h5 class="mb-1">My Gallery <small class="text-danger">Total ({{$data->total()}})</small></h5>
                
              </div>

            </div>
            <div class="card-body">
              <div class="row gy-4 mb-4">
                @forelse ($data as $key=>$item)
                <div class="col-sm-6 col-lg-4">
                  <div class="card  mb-0 shadow-none border" >
                    <div class="rounded-2 text-center">
                      <a href="app-academy-course-details.html"
                        ><img
                          class="img-fluid"
                          style="height: 200px;object-fit:cover;width:100%;"
                          src="{{asset('assets/gallery/'.$item->img)}}"
                          alt="{{$item->name}}"
                      /></a>
                    </div>
                   

                      <div class="d-flex flex-column justify-content-center flex-md-row gap-0 text-nowrap p-2">
                      
                        <button
                          class="btn btn-outline-secondary text-center"
                          data-bs-toggle="modal" data-bs-target="#editModal{{ $key }}">
                         Edit
                        </button>
                        <a
                          class=" btn btn-outline-danger text-center me-1"
                          href="{{route('gallery.delete',['id'=>$item->id])}}">
                        Delete

                        </a>
                        <form action="{{route('featured.gallery')}}" method="POST">
                          @csrf
                        <div class="form-check bg-white shadow px-3 py-2 position-absolute top-0 start-0">
                          <input type="hidden" value="{{ $item->id }}" name="id">
                          <input onchange="this.form.submit()" class="form-check-input" type="checkbox" name="status" value="1" id="flexCheckChecked" @if($item->featured === "1") checked @endif>
                          <small class="form-check-label text-danger fw-bold" for="flexCheckChecked">
                           Featured
                          </small>
                        </div>
                      </form>


                      {{-- modal --}}
                      <div class="modal fade" id="editModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Image</h1>
                              <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('gallery.update',['id'=>$item->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-1">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ $item->name }}" placeholder="Enter name of the image" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="mb-1">
                                        <label for="img">Image <span class="text-danger">*</span></label>
                                        <img src="{{ asset('assets/gallery/'.$item->img) }}" class="rounded-3 my-2 w-50 m-auto" alt="">
                                        <input type="file" name="img" class="form-control" id="img">
                                    </div>
                                    <div class="mb-1">
                                      <label for="">Enter Description</label>
                                      <textarea name="description" class="form-control"  id="" cols="30" rows="5">{{ $item->description }}</textarea>
                                    </div>
                                   
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update changes</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>

                      {{--  --}}
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

@endpush
@endsection
