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
                        <h2 class="content-header-title float-start mb-0">Update Product</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Products / {{$data->name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('updateproduct',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$data->name}}" >
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="slug" placeholder="Slug"  value="{{$data->slug}}" >
                                @error('slug')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Price <span class="text-danger">*</span></label>
                                <input type="number" id="price" class="form-control" name="price" placeholder="Price" value="{{$data->price}}">
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Discounted price(%)</label>
                                <input id="discounted" type="number" class="form-control">
                            </div>
                            <div class="col-4 mt-1">
                                <label for="">Sale</label>
                                <input id="discountedPrice" type="number" name="sale_price" class="form-control text-dark"  readonly value="{{$data->sale_price}}">
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">Stock Quantity</label>
                              <input type="number" name="stock" class="form-control" placeholder="Enter Quantity " value="{{$data->stock}}">
                            </div>
                            <div class="col-6 mt-1">
                                <label for="">SKU</label>
                                <input type="text" name="sku" class="form-control" value="{{$data->sku}}">
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Description</label>
                                <textarea  id="" cols="30" rows="10" name="description" class="form-control text-area" placeholder="Enter Description">{{$data->description}}</textarea>
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Short Description</label>
                                <textarea id="" cols="30" rows="4" name="excerpt" class="form-control text-area" placeholder="Enter Short Description">{{$data->excerpt}}</textarea>
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
                                                <img src="{{asset('assets/featured_images/'.$data->img)}}" class="w-100" alt="">
                                                <input type="file" class="form-control mt-1" name="img">
                                                <label for="" class="mt-1 fw-bold mb-1">Gallery Images</label>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" name="images[]" id="images" placeholder="Choose images" multiple >
                                                        </div>
                                                        @error('images')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mt-1 text-center">
                                                            <div class="images-preview-div "> </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="d-flex flex-row flex-wrap gap-1 w-100">

                                                    @foreach ($data->images as $img)
                                                    <div class="w-25 rounded-2 position-relative">
                                                    <img src="{{asset('assets/product_gallery/'.$img->image)}}" width="60" height="50" style="object-fit: cover;" alt="">
                                                    <a href="{{route('delete-img',['id'=>$img->id])}}"><span class="badge text-bg-danger position-absolute top-0">X</span></a>
                                                </div>
                                                    @endforeach



                                                </div>

                                                <label for="" class="my-1 fw-bold">Categories</label>
                                                <div class="border rounded-3" style="height: 200px; overflow-y:auto;">
                                                <ul class="list-unstyled  px-1">
                                                    @foreach ($category as $item)
                                                    <div class="form-check mt-1">
                                                        <input @if($data->categories->contains('id', $item->id)) checked @endif   class="form-check-input" type="checkbox" name="categories[]" value="{{$item->id}}" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                         {{$item->name}}
                                                        </label>
                                                        <div class="d-block" style="font-size: 11px;">
                                                            @foreach ($item->subcategories as $sub_item)
                                                            <div class="form-check mt-1">
                                                                <input @if($data->categories->contains('id', $sub_item->id)) checked @endif class="form-check-input" style="height: 0px;width:0px;" type="checkbox" name="categories[]" value="{{$sub_item->id}}" id="flexCheckDefault">
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
                                                        <input @if($data->brands->contains('id', $item->id)) checked @endif class="form-check-input" type="checkbox" name="brands[]" value="{{$item->id}}" id="flexCheckDefault">
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
                                            <input type="text" name="meta_title" class="form-control" value="{{$data->meta_title}}">
                                            <label for="" class="mt-2 d-block">Meta Description</label>
                                           <textarea name="meta_description"  cols="30" rows="5" class="form-control">{{$data->meta_description}}</textarea>
                                            </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                            <!-- Basic Tables end -->

                            <!-- Dark Tables start -->

                                        </div>
                                    </div>

                    </div></form>
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
