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
                        <h2 class="content-header-title float-start mb-0">Memberships</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">All Memberships
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{route('add-gifts')}}"><button class="btn btn-primary">Add Membership +</button></a>
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
                                        <th>Name</th>
                                        <th>Membership No</th>
                                        <th>Discount</th>
                                        <th>Menu Active</th>


                                        <th>Functions</th>

                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                    @forelse ($data as $key=>$item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>
                                            <img src="{{asset('assets/gift_cards/'.$item->img)}}" class="me-75 rounded-3" height="50" width="50"  alt="img" />
                                            <span class="fw-bold">{{$item->card}}</span>
                                        </td>



                                        <td><span class="badge rounded-pill badge-light-primary me-1">{{$item->gift_no}}</span></td>
                                        <td>{{$item->discount}}%</td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="hidden"  value="{{$item->id}}">
                                                <input value="1" onclick="updateFeaturedStatus(this)" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ $item->navbar ? 'checked' : '' }}>
                                            </div>
                                        </td>

                                        <td>

                                                    <a  href="{{ route('edit-gifts', ['id' => $item->id]) }}">

                                                        <i data-feather="edit-2" class="me-50" style="color:#8A0103;"></i>

                                                    </a>
                                                    <a href="{{route('destroy-gifts',['id'=>$item->id])}}">
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


function updateFeaturedStatus(checkbox) {
        // Determine the ID of the item associated with this checkbox
        var itemId = checkbox.parentNode.querySelector('input[type="hidden"]').value;
        console.log(itemId);
        // Determine the new status based on the checkbox state
        var newStatus = checkbox.checked ? 1 : 0;

        // Send an AJAX request to update the featured status
        $.ajax({
            url: '{{route('update-giftcard-status')}}',
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






@endsection
