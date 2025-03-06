@extends('backend_app.layouts.template')
@section('content')
@php
    $category = App\Models\Category::all();
    $brands = App\Models\Brand::all();
@endphp
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Update Membership</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('all-gifts') }}">All Gift Cards</a></li>
                                <li class="breadcrumb-item">Update Membership</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary float-end mb-1" id="submitForm" type="button">Update</button>
            </div>
        </div>
        <form id="giftCardForm" action="{{ route('update-gifts', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="content-body">
                        <div class="row" id="basic-table">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h6>Main Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <div class="col-12">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                                            <img src="{{ asset('assets/gift_cards/'.$data->img) }}" style="width:100px;height:100px;object-fit:cover;" class="mb-1" alt="">
                                            <label for="img">Featured Image</label>
                                            <input type="file" class="form-control" name="img">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-1">
                                            <label for="stock">Stock Status</label>
                                            <select name="stock" class="form-select">
                                                <option disabled selected value="">Select Stock Status</option>
                                                <option value="In stock">In Stock</option>
                                                <option value="Out of stock">Out Of Stock</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="description">Description</label>
                                            <textarea id="textarea" cols="30" rows="10" name="description" class="form-control textarea" placeholder="Enter Description">{{ $data->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h6>Price Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <div class="col-6 mt-1">
                                            <label for="price">Price <span class="text-danger">*</span></label>
                                            <input type="number" id="price" value="{{ $data->price }}" class="form-control" name="price" placeholder="Price">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="discounted">Discounted Price (%)</label>
                                            <input id="discounted" value="{{ $data->discount }}" type="number" class="form-control" placeholder="Discounted Price">
                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="discountedPrice">Sale</label>
                                            <input id="discountedPrice" value="{{ $data->sale }}" type="number" placeholder="Enter Discount First" name="sale_price" class="form-control text-dark" readonly>
                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="expire_date">Expire Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" value="{{ $data->expire_date }}" name="expire_date" placeholder="Expire Date">
                                            @error('expire_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-1">
                                            <div class="d-flex flex-row gap-1 mb-2">
                                                <label for="">Add Variations <span class="text-danger">*</span></label>
                                                <button type="button" class="btn btn-sm btn-success" id="addVariation">+</button>
                                            </div>
                                            <div class="row" id="variationsContainer">
                                                @foreach($data->variations as $item)
                                                <div class="col-12 template">
                                                    <div class="row align-items-center mb-1">
                                                        <div class="col-3">
                                                            <input type="text" class="form-control" value="{{ $item->variation_name }}" name="variation_names[]" placeholder="Enter Variation Name">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="number" class="form-control" value="{{ $item->price }}" name="variation_price[]" placeholder="Enter Price">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="number" class="form-control" value="{{ $item->members }}" name="members[]" placeholder="How many Members Can Apply?">
                                                        </div>
                                                        <div class="col-1">
                                                            <button type="button" class="btn btn-sm btn-danger deleteVariation">-</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h6>SEO Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" value="{{ $data->meta_title }}" class="form-control" placeholder="Enter Meta Title">
                                        <label for="meta_description" class="mt-1 d-block">Meta Description</label>
                                        <textarea name="meta_description" cols="30" rows="5" class="form-control" placeholder="Enter Meta Description">{{ $data->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

    $("#discounted").on("input", updateDiscountedPrice);

    $(document).ready(function(){
        $('#addVariation').click(function(){
            var variationTemplate = `
                <div class="col-12 template">
                    <div class="row align-items-center mb-1">
                        <div class="col-3">
                            <input type="text" class="form-control" name="variation_names[]" placeholder="Enter Variation Name">
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" name="variation_price[]" placeholder="Enter Price">
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" name="members[]" placeholder="How many Members Can Apply?">
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-sm btn-danger deleteVariation">-</button>
                        </div>
                    </div>
                </div>`;
            $('#variationsContainer').append(variationTemplate);
        });

        $(document).on('click', '.deleteVariation', function(){
            $(this).closest('.template').remove();
        });

        $('#submitForm').click(function() {
            tinyMCE.triggerSave();
            var formData = new FormData($('#giftCardForm')[0]);

            if ($('input[name="name"]').val().trim() === "") {
                alert("Please enter gift card name");
                return;
            }

            $.ajax({
                url: $('#giftCardForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Form Updated successfully!');
                   
                 
                },
                error: function(xhr) {
                    alert('An error occurred while submitting the form.');
                }
            });
        });
    });
</script>
@endsection
