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
                    <a href="{{route('add-promocodes')}}"><button class="btn btn-primary">Add PromoCode +</button></a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>


                                        <th>PromoCode</th>

                                        <th>Expiry Date</th>
                                        <th>Discount </th>

                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    @forelse ($data as $key=>$item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>

                                            <span class="fw-bold">{{$item->code}}</span>
                                        </td>
                                        <th>{{$item->expire_date}}</th>

                                        <th>{{$item->discount}}%</th>


                                        <td>

                                                    <a class="me-1"  href="{{ route('edit-promocode', ['id' => $item->id]) }}">

                                                        <i data-feather="edit-2" class="me-50" style="color:#8A0103;"></i>

                                                    </a>
                                                    <a href="{{route('destroy-promocode',['id'=>$item->id])}}">
                                                        <i data-feather="trash" class="me-50" style="color:#8A0103;"></i>

                                                    </a>

                                        </td>
                                    </tr>
                                    @empty
                                        <tr>Empty</tr>
                                    @endforelse


                                </tbody>
                            </table>


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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];

    $.ajax({
        url: 'filter-pagination?page=' + page, // Modify the URL according to your route
        beforeSend: function() {
    // Show preloader or loading spinner here
    $('#table-data').html(`
    <tr>
     <td colspan="12" class="text-center py-4"> <img src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca.gif" style="margin:auto;display:block;width:60px;"/> </td>
    </tr>
`);
$('#paginationContainer').html("");

},
        success: function (response) {
                    // Handle the success response as needed
                    console.log(response);
                    if(response.length ===0){
                        $('#table-data').html(' <h2 class="text-center primary-heading">Empty</h2>');
                    }
                    else{
            $('#paginationContainer').html(response.pagination);

            var html = '';
            var products = response.items.data;

            var itemNumber=0;
            products.forEach(function (element) {
            html += `<tr>
            <td>${itemNumber++}</td>
            <td>

                <span class="fw-bold">${element.name}</span>
            </td>

            <td><span class="badge rounded-pill badge-light-primary me-1">${element.slug}</span></td>
            <td>

                        <a href="/edit-product/${element.id}">
                            <i data-feather="edit-2" class="me-50" style="color:#8A0103;"></i>
                            <span style="color:#8A0103;">Edit</span>
                        </a>
                        <a href="/delete-product/${element.id}">
                            <i data-feather="trash" class="me-50" style="color:#8A0103;"></i>
                            <span style="color:#8A0103;">Delete</span>
                        </a>

            </td>
        </tr>`;

});


                 $('#table-data').html(html);
                }
                },
                error: function (error) {
                    // Handle errors if any
                    console.error(error);
                }
    });
});

</script>



@endsection
