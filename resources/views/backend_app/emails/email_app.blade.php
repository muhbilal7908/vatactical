@extends('backend_app.layouts.template')
@section('content')
<div class="app-content content email-application">
    <div class="content-overlay"></div>

    <div class="header-navbar-shadow"></div>
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0 me-5">Emails</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">All Emails
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-area-wrapper container-xxl p-0">

        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content email-app-sidebar">
                    <div class="email-app-menu">
                        <div class="form-group-compose text-center compose-btn">
                            <button type="button" class="compose-email btn btn-primary w-100" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#compose-mail">
                                Compose
                            </button>
                        </div>
                        <div class="sidebar-menu-list">
                            <div class="list-group list-group-messages">
                                <a href="{{route('all_mails')}}" class="list-group-item list-group-item-action active">
                                    <i data-feather="mail" class="font-medium-3 me-50"></i>
                                    <span class="align-middle">Inbox</span>
                                    <span class="badge badge-light-primary rounded-pill float-end">{{$count}}</span>
                                </a>
                                <a href="{{route('sent-mails')}}" class="list-group-item list-group-item-action">
                                    <i data-feather="send" class="font-medium-3 me-50"></i>
                                    <span class="align-middle">Sent</span>
                                </a>

                                <a href="{{route('starred-mails')}}" class="list-group-item list-group-item-action">
                                    <i data-feather="star" class="font-medium-3 me-50"></i>
                                    <span class="align-middle">Starred</span>
                                </a>

                                <a href="{{route('trash-mails')}}" class="list-group-item list-group-item-action">
                                    <i data-feather="trash" class="font-medium-3 me-50"></i>
                                    <span class="align-middle">Trash</span>
                                </a>
                            </div>
                            <!-- <hr /> -->


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="body-content-overlay"></div>
                    <!-- Email list Area -->
                    <div class="email-app-list">
                        <!-- Email search starts -->
                        <div class="app-fixed-search d-flex align-items-center">
                            <div class="sidebar-toggle d-block d-lg-none ms-1">
                                <i data-feather="menu" class="font-medium-5"></i>
                            </div>
                            <div class="d-flex align-content-center justify-content-between w-100">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                    <input type="text" class="form-control" id="email-search" placeholder="Search email" aria-label="Search..." aria-describedby="email-search" />
                                </div>
                            </div>
                        </div>
                        <!-- Email search ends -->

                        <!-- Email actions starts -->
                        <div class="app-action">
                            <div class="action-left">
                                <div class="form-check selectAll">
                                    <input type="checkbox" class="form-check-input" id="selectAllCheck" />
                                    <label class="form-check-label fw-bolder ps-25" for="selectAllCheck">Select All</label>
                                </div>
                            </div>
                            <form action="{{route('delete-mails')}}" method="get" id="delete_mails">

                            <div class="action-right">
                                <ul class="list-inline m-0">
                                    <li id="delete_btn" class="list-inline-item ">
                                        <span class="action-icon"><i data-feather="trash-2" class="font-medium-2"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Email actions ends -->

                        <!-- Email list starts -->
                        <div class="email-user-list">
                            <ul class="email-media-list">
                                @foreach ($data as $item)
                                <li class="d-flex user-mail mail-read" >
                                    <div class="mail-left pe-50">
                                        <div class="avatar">
                                            <img src="https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg" alt="avatar img holder" />
                                        </div>
                                        <div class="user-action">
                                            <div class="form-check">
                                                <input type="checkbox" name="mails_ids[]" value="{{$item->id}}" class="form-check-input" id="customCheck1" />
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                            <span class="email-favorite"><i data-feather="star"></i></span>
                                            <input type="hidden" class="fav_id" value="{{$item->id}}">
                                        </div>
                                    </div>
                                    <div class="mail-body" data-bs-toggle="modal" data-bs-target="#modal_{{$item->id}}">
                                        <div class="mail-details">
                                            <div class="mail-items">
                                                @if($item->user_id !== null)
                                                <h5 class="mb-25">{{$item->user->name}}</h5>
                                                @else
                                                <h5 class="mb-25">{{$item->name}}</h5>
                                                @endif

                                                <span class="text-truncate">🎯 {{$item->subject}} </span>
                                            </div>
                                            <div class="mail-meta-item">
                                                <span class="me-50 bullet bullet-success bullet-sm"></span>
                                                <span class="mail-date">{{$item->created_at->format('d M Y')}}</span>
                                            </div>
                                        </div>
                                        <div class="mail-message">
                                            <p class="text-truncate mb-0">
                                               {{strip_tags($item->msg)}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <div class="modal fade" id="modal_{{$item->id}}" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h3 class="text-start mb-1" id="addNewCardTitle"> @if($item->user_id !== null)
                                                    {{$item->user->name}}
                                                    <small class="d-block">{{$item->user->email}}</small>
                                                    @else
                                                 {{$item->name}}
                                                    @endif</h3>
    </h1>
                                                <p class="text-start">Subejct:{{$item->subject}}</p>

                                                <!-- form -->

                                                        <p>Message: @php echo $item->msg @endphp</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                            </ul>
                            <div class="no-results">
                                <h5>No Items Found</h5>
                            </div>
                        </div>
                        <!-- Email list ends -->
                    </div>
                </form>
                    <!--/ Email list Area -->
                    <!-- Detailed Email View -->

                    <!--/ Detailed Email View -->

                    <!-- compose email -->
                    <div class="modal modal-sticky" id="compose-mail" data-bs-keyboard="false">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content p-0">
                                <div class="modal-header">
                                    <h5 class="modal-title">Compose Mail</h5>
                                    <div class="modal-actions">
                                        <a href="#" class="text-body me-75"><i data-feather="minus"></i></a>
                                        <a href="#" class="text-body me-75 compose-maximize"><i data-feather="maximize-2"></i></a>
                                        <a class="text-body" href="#" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></a>
                                    </div>
                                </div>
                                <div class="modal-body flex-grow-1 p-0">
                                    <form   action="{{route("submit-mail")}}" method="POST">
                                        @csrf
                                        <div class="compose-mail-form-field select2-primary">
                                            <label for="email-to" class="form-label">To: </label>
                                            <div class="flex-grow-1">
                                                <select class="select2 form-select w-100" name="users[]" id="email-to" multiple>
                                                    @foreach ($users as $item)
                                                    <option data-avatar="https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg" value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <a class="toggle-cc text-body me-1" href="#">Cc</a>
                                                <a class="toggle-bcc text-body" href="#">Bcc</a>
                                            </div>
                                        </div>
                                        <div class="compose-mail-form-field cc-wrapper">
                                            <label for="emailCC" class="form-label">Cc: </label>
                                            <div class="flex-grow-1">
                                                <!-- <input type="text" id="emailCC" class="form-control" placeholder="CC"/> -->
                                                <select class="select2 form-select w-100" name="cc" id="emailCC" multiple>
                                                    @foreach ($users as $item)
                                                    <option data-avatar="https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg" value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <a class="text-body toggle-cc" href="#"><i data-feather="x"></i></a>
                                        </div>
                                        <div class="compose-mail-form-field bcc-wrapper">
                                            <label for="emailBCC" class="form-label">Bcc: </label>
                                            <div class="flex-grow-1">
                                                <!-- <input type="text" id="emailBCC" class="form-control" placeholder="BCC"/> -->
                                                <select class="select2 form-select w-100" name="bcc" id="emailBCC" multiple>
                                                    @foreach ($users as $item)
                                                    <option data-avatar="https://www.shutterstock.com/image-vector/default-avatar-profile-icon-social-600nw-1677509740.jpg" value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <a class="text-body toggle-bcc" href="#"><i data-feather="x"></i></a>
                                        </div>
                                        <div class="compose-mail-form-field">
                                            <label for="emailSubject" class="form-label">Subject: </label>
                                            <input type="text" id="emailSubject" class="form-control" placeholder="Subject" name="subject" />
                                        </div>
                                        <textarea name="editor1"></textarea>
                                        <div class="compose-footer-wrapper">
                                            <div class="btn-wrapper d-flex align-items-center">
                                                <div class="btn-group dropup me-1">
                                                    <button  type="submit" class="btn btn-primary">Send</button>
                                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                        <span class="visually-hidden">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"> Schedule Send</a>
                                                    </div>
                                                </div>
                                                <!-- add attachment -->
                                                <div class="email-attachement">
                                                    <label for="file-input" class="form-label">
                                                        <i data-feather="paperclip" width="17" height="17" class="ms-50"></i>
                                                    </label>

                                                    <input id="file-input" type="file" class="d-none" />
                                                </div>
                                            </div>
                                            <div class="footer-action d-flex align-items-center">
                                                <div class="dropup d-inline-block">
                                                    <i class="font-medium-2 cursor-pointer me-50" data-feather="more-vertical" role="button" id="composeActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </i>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="composeActions">
                                                        <a class="dropdown-item" href="#">
                                                            <span class="align-middle">Add Label</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="align-middle">Plain text mode</span>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="align-middle">Print</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <span class="align-middle">Check Spelling</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <i data-feather="trash" class="font-medium-2 cursor-pointer" data-bs-dismiss="modal"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ compose email -->

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="{{asset('backend/js/scripts/pages/app-email.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor1' );
    $('#delete_btn').click(function() {
           alert("Working");
           $('#delete_mails').submit();
       });
   </script>
@endpush

@endsection
