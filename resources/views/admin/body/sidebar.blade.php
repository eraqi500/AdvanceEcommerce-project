@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Eraqi </b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard')? 'active':''}}">
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/brand')? 'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.brand') ? 'active': ''}}">
                        <a href="{{route('all.brand')}}">
                            <i class="ti-more"></i>All Brands</a></li>
                    <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                </ul>
            </li>

            <li class="treeview"{{($prefix == '/category') ? 'active': ''}}>
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li {{($route == 'all.category') ? 'active': ''}}>
                        <a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a>
                    </li>

                    <li {{($route == 'all.sub.category') ? 'active': ''}}>
                        <a href="{{route('all.sub.category')}}">
                            <i class="ti-more"></i>Sub Category</a></li>

                    <li {{($route == 'all.subsubcategory') ? 'active': ''}}>
                        <a href="{{route('all.subsubcategory')}}">
                            <i class="ti-more"></i>All Sub Category</a></li>

                </ul>
            </li>

            <li class="treeview" {{($prefix == '/product') ? 'active' : ''}}>
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all-product') ? 'active' : ''}}">
                        <a href="{{route('all-product')}}"><i class="ti-more"></i> Add Product</a></li>
                    <li class="{{($route == 'manage-product') ? 'active' : ''}}">
                        <a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Products </a></li>

                </ul>
            </li>

            <li class="treeview" {{($prefix == '/slider') ? 'active' : ''}}>
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-slider') ? 'active' : ''}}">
                        <a href="{{route('manage-slider')}}"><i class="ti-more"></i> Manage Slider</a></li>


                </ul>
            </li>


            <li class="treeview" {{($prefix == '/coupons') ? 'active' : ''}}>
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupon </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-coupon') ? 'active' : ''}}">
                        <a href="{{route('manage-coupon')}}"><i class="ti-more"></i> Manage Coupon</a></li>


                </ul>
            </li>

            <li class="treeview" {{($prefix == '/shipping') ? 'active' : ''}}>
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-division') ? 'active' : ''}}">
                        <a href="{{route('manage-division') ? 'active' : ''}}"><i class="ti-more"></i> Shipping Division</a></li>
                       <li><a href="{{route('manage-district')? 'active' : ''}}"><i class="ti-more"></i> Shipping District</a></li>
                    <li><a href="{{route('manage-state') ? 'active' : ''}}"><i class="ti-more"></i> Shipping State</a></li>


                </ul>
            </li>





            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>



            <li class="header nav-small-cap">EXTRA</li>


            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
