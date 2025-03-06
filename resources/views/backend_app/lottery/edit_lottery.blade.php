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
                        <h2 class="content-header-title float-start mb-0">Lottery</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Update Lottery
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="{{route('update-lottery',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
            </div>


            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                   <button class="btn btn-primary " type="submit">Update</button>
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
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$data->name}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="col-12 mt-1">
                                <label for="">Expire Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Enter Instagram" value="{{$data->expire_date}}">
                                @error('date')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Discount Price</label>
                                <input type="number" name="discount_price" class="form-control" value="{{$data->discount}}" placeholder="Enter Discount Price For Multiple Tickets">
                                @error('discount_price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter Price" value="{{$data->price}}">
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <label for="">Description</label>
                                <textarea  id="" cols="30" rows="10" name="description" class="form-control textarea" placeholder="Enter Description">{{$data->description}}</textarea>
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
                                                <img src="{{asset('assets/lottery/'.$data->img)}}" class="w-100 my-2" alt="">
                                                <input type="file" class="form-control mt-1" name="img">

                                                <label for="" class="mt-1 fw-bold">Select Item</label>


   <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Products</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Gifts</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Courses</button>
                                                    </li>

                                                  </ul>
                                                  <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active bg-transparent p-1" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                        <h5 class="text-white">Products</h5>
                                                        <select name="product_id" id="" class="form-control">
                                                            <option value="">Choose...</option>
                                                            @foreach ($products as $item)
                                                            <option @if($data->product_id === $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                          @endforeach
                                                          </select>
                                                    </div>
                                                    <div class="tab-pane fade p-1" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                        <h5 class="text-white">Gift Card</h5>
                                                        <select name="gift_card_id" id="" class="form-control">
                                                            <option value="">Choose...</option>
                                                            @foreach ($giftcards as $item)
                                                            <option @if($data->gift_id === $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="tab-pane fade p-1" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                                        <h5 class="text-white">Courses</h5>
                                                        <select name="course_id" id="" class="form-control">
                                                            <option value="">Choose...</option>
                                                            @foreach ($courses as $item)
                                                            <option @if($data->course_id === $item->id) selected @endif  value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                          </select>
                                                    </div>

                                                  </div>



                                                </div>

                                                </div>





                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Tables end -->

                            <!-- Dark Tables start -->

                                        </div>
                                    </div>
                                </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Responsive tables end -->

        </div>
    </div>
</div>


@endsection
