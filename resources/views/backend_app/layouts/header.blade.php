@php
    $user=Auth::user();
    $generalsetting=App\Models\SettingModel::where('id',1)->first();
    $notificaitons=App\Models\Notification::where('mark',0)->get();
    $notificaitons_count=App\Models\Notification::where('mark',0)->get()->count();


@endphp
<style>
    .navigation a{
        color:white!important;
        font-size: 12px;
    }

</style>
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl" style="background:#8a0103;" >
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon text-white" data-feather="moon"></i></a></li>
            @if($user->role==="admin")
            <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon text-white" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">{{$notificaitons_count}}</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                            <div class="badge rounded-pill badge-light-primary">{{$notificaitons_count}}</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        @forelse ($notificaitons as $key=>$item)
                        <a class="d-flex" href="#">

                            <div class="list-item d-flex align-items-start">

                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">{{$item->msg}}</p><small class="notification-text">Unread</small>
                                </div>


                            </div>
                        </a>
                        @empty
                        <a class="d-flex" href="#">

                            <div class="list-item d-flex align-items-start">

                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder"> Empty</p><small class="notification-text"></small>
                                </div>


                            </div>
                        </a>
                        @endforelse
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="{{route('all-notificaitons')}}">Read all notifications</a></li>
                </ul>
            </li>
            @endif
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder text-white">{{$user->name}}</span><span class="user-status text-white">{{$user->role}}</span></div><span class="avatar">@if(empty($user->img)) <img class="round" src="https://q-reviews.com/wp-content/uploads/2022/08/Profile_avatar_placeholder_large.png" alt="avatar" height="40" width="40">     @else  <img class="round" src="{{asset('assets/users/'.$user->img)}}" alt="avatar" height="40" width="40"> @endif<span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{route('edit-profile',['id'=>$user->id])}}"><i class="me-50" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    @if(Auth::user()->role==="admin")<a class="dropdown-item" href="{{route('general-setting')}}"><i class="me-50" data-feather="settings"></i> Settings</a>@endif
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>

        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" style="background:white;" data-scroll-to-active="true">
    <div class="navbar-header">

        <ul class="row position-relative mb-2">
                <img src="{{asset('assets/images/logojpeg-removebg-preview.png')}}" class="w-50 m-auto d-block" alt="">
        </ul>

    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content" style="background: #8A0103;" >
        <ul class="navigation navigation-main text-white" id="main-menu-navigation" data-menu="menu-navigation" style="background: #8a0103;">
            @if ($user->role==='admin')
            <li class=" nav-item {{ Request::routeIs('dashboard')  ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>
            </li>
            @else
            <li class=" nav-item {{ Request::routeIs('CustomerDashboard')  ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('CustomerDashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard </span></a>
            </li>
            @endif
            @if ($user->role==='admin')


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Product &amp; Management</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item {{ Request::routeIs('products') || Request::routeIs('addproduct') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="grid">Products</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('products')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Products</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('addproduct')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Product</span></a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item {{ Request::routeIs('all-lottery') || Request::routeIs('add-lottery') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="grid">Lottery</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('all-lottery')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Lottery</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-lottery')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Lottery</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('spinner')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Lottery Spinner</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('lottery-participents')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Lottery Participents</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('lottery-winners')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Lottery Winners</span></a>
                    </li>
                </ul>
            </li>








            <li class=" nav-item {{ Request::routeIs('show-category') || Request::routeIs('add-category') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="pause"></i><span class="menu-title text-truncate" data-i18n="pause">Categories</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('show-category')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Categories</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-category')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Category</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item {{ Request::routeIs('show-brands') || Request::routeIs('add-brand') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="disc"></i><span class="menu-title text-truncate" data-i18n="award">Brands</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('show-brands')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Brands</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-brand')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Brand</span></a>
                    </li>
                </ul>
            </li>



            <li class=" nav-item {{ Request::routeIs('all-blogs') || Request::routeIs('add-blog') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="align-justify"></i><span class="menu-title text-truncate" data-i18n="award">Blogs</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('all-blogs')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Blogs</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-blog')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Blog</span></a>
                    </li>
                </ul>
            </li>


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Course  Management</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item {{ Request::routeIs('all-courses') || Request::routeIs('add-course') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="award">Courses</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('courses-sessions')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">Courses Sessions</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('all-courses')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Courses</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-course')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Course</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('course-participents')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Course Participents</span></a>
                    </li>

                </ul>
            </li>
            </li>


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Analytics</span><i data-feather="more-horizontal"></i>
            </li>
           
            <li><a class="d-flex align-items-center" href="{{route('seo-stats')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">Analytics Dashboard</span></a>
            </li>






            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Order Management</span><i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item {{ Request::routeIs('all-transections') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('all-transections')}}"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="credit-card"> Transactions</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('all-subscriptions') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('all-subscriptions')}}"><i data-feather="shopping-bag"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Subscriptions</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('memberships/all') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('memberships.all')}}"><i data-feather="dollar-sign"></i><span class="menu-title text-truncate" data-i18n="dollar-sign">Memberships</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('all-orders') ? 'active' : ''}}"><a class="d-flex align-items-center" ><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Orders</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('all-orders')}}"  class="d-flex align-items-center" ><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('order-status',['status'=>'pending'])}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Pending</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('order-status',['status'=>'delivered'])}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Delivered</span></a>
                    </li>
                </ul>
            </li>


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">PROMOTION MANAGEMENT</span><i data-feather="more-horizontal"></i>
            <li class=" nav-item {{ Request::routeIs('all-promocodes') || Request::routeIs('add-promocodes') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="tag"></i><span class="menu-title text-truncate" data-i18n="grid">Promo Codes</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('all-promocodes')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Promocodes</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-promocodes')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Promocode</span></a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item {{ Request::routeIs('all-gifts') || Request::routeIs('add-gifts') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="gift"></i><span class="menu-title text-truncate" data-i18n="grid">Memberships</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('all-gifts')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Memberships</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-gifts')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Membership</span></a>
                    </li>
                </ul>
            </li>



            <li class=" nav-item {{ Request::routeIs('hall-of-fame') || Request::routeIs('add-fame_member') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="award">Hall of Fame</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('hall-of-fame')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Members</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-fame_member')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Member</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item {{ Request::routeIs('all-certificates') || Request::routeIs('add-certificates') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="award">Certificates</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('all-certificates')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Certificate</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{route('add-certificates')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Permission">Add Certificate</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ Request::routeIs('popup') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('popup')}}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Popup</span></a>
            </li>


            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Others </span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item {{ Request::routeIs('contact-forms') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('contact-forms')}}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Contact Forms</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('all_mails') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('all_mails')}}"><i data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="settings">All Mails</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('all-users') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('all-users')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">All Users</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('contact-forms') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('gallery.all')}}"><i data-feather="image"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Gallery</span></a>
            </li>

{{--  --}}

<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">System Setup</span><i data-feather="more-horizontal"></i>
</li>
<li class=" nav-item {{ Request::routeIs('general-setting') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('general-setting')}}"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="settings">General Settings</span></a>
</li>

<li class=" nav-item {{ Request::routeIs('all-sliders') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('all-sliders')}}"><i data-feather="server"></i><span class="menu-title text-truncate" data-i18n="settings">Sliders</span></a>
</li>
<li class=" nav-item {{ Request::routeIs('') || Request::routeIs('') ? 'active' : ''}}"><a class="d-flex align-items-center" href="#"><i data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="award">Pages</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{route('page-content')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">All Pages</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{route('all-faqs')}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Roles">FAQS</span></a>
        </li>

    </ul>
</li>

<li class=" nav-item "><a class="d-flex align-items-center" href="{{route('logout')}}"><i data-feather="alert-triangle"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Logout</span></a>
</li>
<li class=" nav-item "><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="arrow-right-circle"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Go To Website</span></a>
</li>
{{--  --}}

            @else
            <li class=" nav-item {{ Request::routeIs('update-customer') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('edit-profile',['id'=>$user->id])}}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Dashboards">My Profile</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('favourite-backend') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('favourite-backend')}}"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Dashboards">My Favorites</span></a>
            </li>
            <li class=" nav-item {{ Request::routeIs('customer-cart') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('customer-cart')}}"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Dashboards">My Cart</span></a>
            </li>

            <li class=" nav-item {{ Request::routeIs('customer-orders') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('customer-orders')}}"><i data-feather="calendar"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">My Orders</span></a>
            </li>
            
            <li class=" nav-item {{ Request::routeIs('customer-subscriptions') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('customer-subscriptions')}}"><i data-feather="shopping-bag"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">My Subscriptions</span></a>
            </li>
            <li class=" nav-item "><a class="d-flex align-items-center" href="{{route('logout')}}"><i data-feather="alert-triangle"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Logout</span></a>
            </li>
            <li class=" nav-item "><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="arrow-right-circle"></i><span class="menu-title text-truncate" data-i18n="alert-triangle">Go To Website</span></a>
            </li>
            @endif
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="{{route('mails')}}"><i data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Email">Mails</span></a>
            </li> --}}


        </ul>
    </div>
</div>
