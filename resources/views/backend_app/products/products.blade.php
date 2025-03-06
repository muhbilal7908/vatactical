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
                        <h2 class="content-header-title float-start mb-0">Product</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Product
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('addproduct')}}"><button class="btn btn-primary">Add Product +</button></a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card p-2">
                        <div class="row">

                        </div>
                        <form action="{{route('search-products')}}" method="GET">

                        <div class="row">

                            <div class="col-4">
                                <label for="">Product name</label>
                                <input type="text" class="form-control" placeholder="Enter product name" name="name">
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
                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Stock</th>
                                        <th>Featured</th>
                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    @forelse ($data as $key=>$item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>
                                            <img src="{{asset('assets/featured_images/'.$item->img)}}" class="me-75 rounded-3" height="50" width="50"  alt="img" />
                                            <span class="fw-bold">{{Str::words($item->name,'4','...')}}</span>
                                        </td>
                                        <th >
                                           <span  class=" btn {{ $item->stock > 5 ? ' btn-outline-success' : ($item->stock === 0 ? 'btn-outline-danger' : ($item->stock < 5 ? 'btn-outline-warning' : 'btn-outline-info')) }}"> {{ $item->stock }}</span>
                                        </th>



                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="hidden"  value="{{$item->id}}">
                                                <input value="1" onclick="updateFeaturedStatus(this)" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ $item->featured_status ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                                  <td>  <a  href="{{ route('edit-product', ['id' => $item->id]) }}">

                                                        <i data-feather="edit-2" class="me-50" style="color:#8A0103;"></i>

                                                    </a>
                                                    <a href="{{route('delete-product',['id'=>$item->id])}}">
                                                        <i data-feather="trash" class="me-50" style="color:#8A0103;"></i>

                                                    </a>

                                        </td>
                                    </tr>
                                    @empty
                                        <tr>Empty</tr>
                                    @endforelse


                                </tbody>
                            </table>

                           <div class="float-end mx-3 " id="paginationContainer">
                               {{$data->links()}}
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
<script>

function updateFeaturedStatus(checkbox) {
        // Determine the ID of the item associated with this checkbox
        var itemId = checkbox.parentNode.querySelector('input[type="hidden"]').value;
        console.log(itemId);
        // Determine the new status based on the checkbox state
        var newStatus = checkbox.checked ? 1 : 0;

        // Send an AJAX request to update the featured status
        $.ajax({
            url: '{{route('update-featured-status')}}',
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
