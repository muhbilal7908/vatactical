@extends('backend_app.layouts.template')
@section('content')
@php
    $category= App\Models\Category::all();
    $brands= App\Models\Brand::all();
@endphp
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Products</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item">Add Products
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('submitproduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <button class="btn btn-primary" type="submit">Publish</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">


                        <div class="row p-3">
                            <div class="col-12">
                                <label for="">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Name" >
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="slug" placeholder="Slug">
                                @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Price <span class="text-danger">*</span></label>
                                <input type="number" id="price" class="form-control" name="price" placeholder="Price">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Discounted price(%)</label>
                                <input id="discounted" type="number" class="form-control" placeholder="Discounted Price">
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Sale</label>
                                <input id="discountedPrice" type="number" name="sale_price" class="form-control text-dark" placeholder="Sale Price"  readonly>
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Stock Quantity</label>
                              <input type="number" name="stock" class="form-control" placeholder="Enter Quantity ">
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">SKU</label>
                                <input type="text" name="sku" class="form-control" placeholder="SKU:">
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Description</label>
                                <textarea  id="textarea" cols="30" rows="10" name="description" class="form-control textarea" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Short Description</label>
                                <textarea id="textarea" cols="30" rows="4" name="excerpt" class="form-control textarea" placeholder="Enter Short Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->

            <!-- Dark Tables start -->

                        </div>
                    </div>

                    <div class="col-3">
                        <div class="content-body">
                            <!-- Basic Tables start -->
                            <div class="row" id="basic-table">
                                <div class="col-12">
                                    <div class="card">


                                        <div class="row p-2">
                                            <div class="col-12">
                                                <h5>Advance Options</h5>
                                                <label for="" class="mt-1 fw-bold">Featured Image</label>
                                                <input type="file" class="form-control mt-1" name="img">
                                                <label for="" class="mt-1 fw-bold mb-1">Gallery Images</label>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <input type="file" class="form-control" multiple name="images[]">
                                                </div>
                                                </div>
                                                <label for="" class="my-1 fw-bold">Categories</label>
                                                <div class="border rounded-3" style="height: 200px; overflow-y:auto;">
                                                <ul class="list-unstyled  px-1">
                                                    @foreach ($category as $item)
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{$item->id}}" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                         {{$item->name}}
                                                        </label>
                                                            <div class="d-block" style="font-size: 11px;">
                                                                @foreach ($item->subcategories as $sub_item)
                                                                <div class="form-check mt-1">
                                                                    <input class="form-check-input" style="height: 0px;width:0px;" type="checkbox" name="categories[]" value="{{$sub_item->id}}" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                     {{$sub_item->name}}
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                      </div>
                                                    @endforeach


                                                </ul>
                                            </div>
                                            <label for="" class="my-1 fw-bold">Brands</label>
                                            <div class="border rounded-3" style="height: 200px; overflow-y:auto;">
                                                <ul class="list-unstyled  px-1">
                                                    @foreach ($brands as $item)
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" name="brands[]" value="{{$item->id}}" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                         {{$item->name}}
                                                        </label>
                                                      </div>
                                                    @endforeach


                                                </ul>
                                            </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="card">


                                        <div class="row p-2">
                                            <div class="col-12">
                                            <h5>SEO</h5>
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control">
                                            <label for="" class="mt-2 d-block">Meta Description</label>
                                           <textarea name="meta_description"  cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                            <!-- Basic Tables end -->

                            <!-- Dark Tables start -->

                                        </div>
                                    </div>

                    </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    function updateDiscountedPrice() {
        var originalPrice = parseFloat($("#price").val());
        var discountPercentage = parseFloat($("#discounted").val());

        if (!isNaN(originalPrice) && !isNaN(discountPercentage)) {
            var discountedPrice = originalPrice - (originalPrice * discountPercentage / 100);
            $("#discountedPrice").val(discountedPrice.toFixed(2));
        }
    }

    // Attach the event handler to the 'discounted' input field
    $("#discounted").on("input", updateDiscountedPrice);

</script>
@endsection
