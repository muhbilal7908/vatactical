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
                            <h2 class="content-header-title float-start mb-0">Add Membership</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('all-gifts')}}">All Memberships</a>
                                    </li>
                                    <li class="breadcrumb-item">Add Membership
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="giftCardForm"  action="{{route('store-gifts')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary float-end mb-1" id="submitForm" type="button">Publish</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="content-body">
                        <!-- Basic Tables start -->
                        <div class="row" id="basic-table">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  border-bottom  ">
                                        <h6>Main Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <div class="col-12">
                                            <label for="">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" >
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                                            <label for="" >Featured Image</label>
                                            <input type="file" class="form-control " name="img">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-1">
                                            <label for="">Stock Status</label>
                                        <select name="stock" id="" class="form-select">
                                            <option disabled selected value="">Select Stock Status</option>
                                            <option value="In stock">In Stock</option>
                                            <option value="Out of stock">Out Of Stock</option>
                                        </select>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="">Description</label>
                                            <textarea  id="textarea" cols="30" rows="10" name="description" class="form-control textarea" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  border-bottom  ">
                                        <h6>Price Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <div class="col-6 mt-1">
                                            <label for="">Price <span class="text-danger">*</span></label>
                                            <input type="number" id="price" class="form-control" name="price" placeholder="Price">
                                            @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-1">

                                                <label for="">Discounted price(%)</label>
                                                <input id="discounted" type="number" class="form-control" placeholder="Discounted Price">

                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="">Sale</label>
                                            <input id="discountedPrice" type="number" placeholder="Enter Discount First" name="sale_price" class="form-control text-dark"  readonly>
                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="">Expire Date <span class="text-danger">*</span></label>
                                            <input type="date"  class="form-control" name="expire_date" placeholder="expire_date">
                                            @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-1">
                                            <div class="d-flex flex-row gap-1 mb-2">
                                                <label for="">Add Variations<span class="text-danger">*</span></label>
                                                <button type="button" class="btn btn-sm btn-success" id="addVariation">+</button>
                                            </div>
                                            <div class="row" id="variationsContainer">
                                                <!-- Variation Inputs will be added here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" >
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  border-bottom  ">
                                        <h6>Membership Discount </h6>
                                    </div>
                                    <div class="row px-3 py-1 pb-4">
                                        <div class="col-6 mt-1">
                                            <label for="">Fireamrs Discount (%)</label>
                                            <input type="number" id="firearms" class="form-control" name="firearms" placeholder="Enter firearms discount in %">
                                            @error('price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-1">

                                                <label for="">Ammunation Discount (%)</label>
                                                <input id="ammunation" type="number" name="ammunation" class="form-control" placeholder="Enter ammunation discount in %">

                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="">Accessories discount (%)</label>
                                            <input id="accessories" type="number" placeholder="Enter accessories discount in %" name="accessories" class="form-control text-dark"  >
                                        </div>
                                        <div class="col-6 mt-1">
                                            <label for="">Courses Discount (%)</label>
                                            <input type="number" id="courses"  class="form-control" name="courses" placeholder="Enter courses discount in %">
                                            @error('courses')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  border-bottom  ">
                                        <h6>SEO Information</h6>
                                    </div>
                                    <div class="row px-3 py-1">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title">
                                        <label for="" class="mt-1 d-block">Meta Description</label>
                                    <textarea name="meta_description"  cols="30" rows="5" class="form-control" placeholder="Enter Meta Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

        $(document).ready(function(){
            // Add Variation Button Click
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
                    // Append variation names and prices separately
                    $('input[name="variation_names[]"]').each(function() {
                        formData.append('variation_names[]', $(this).val());
                    });

                    $('input[name="variation_price[]"]').each(function() {
                        formData.append('variation_price[]', $(this).val());
                    });
                    $('input[name="members[]"]').each(function() {
                        formData.append('members[]', $(this).val());
                    });

                   

                    $.ajax({
                        url: $('#giftCardForm').attr('action'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Handle success
                            alert('Form submitted successfully!');
                            $('#giftCardForm')[0].reset();
                            $('#variationsContainer').empty();

                        },
                        error: function(xhr) {
                            // Handle error
                            alert('An error occurred while submitting the form.');
                            // Optionally, display validation errors
                        }
                    });
                });
            });


    </script>
    @endsection
