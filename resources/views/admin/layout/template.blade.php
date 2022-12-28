<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('pagetitle')</title>


    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets') }}
/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets') }}
/css/style.css">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets') }}
/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets') }}
/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('dashboard_asset/assets') }}
/img/favicon.ico" />


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">                    
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('dashboard_asset/assets') }}/img/user.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="{{ asset('dashboard_asset/assets') }}/img/logo.png"
                                class="header-logo" /> <span class="logo-name">Admin</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="briefcase"></i><span>Admin Manage</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.alladmins')}}">All Admin</a></li>
                                <li><a class="nav-link" href="{{ route('admin.addadmin')}}">Add New Admin</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="command"></i><span>User Manage</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.allusers')}}">All Users</a></li>
                                <li><a class="nav-link" href="{{ route('admin.adduser')}}">Add New User</a></li>                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="mail"></i><span>Email</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.messages') }}">Messages</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Product Module</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="copy"></i><span>Products</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.addproduct') }}">Add Product</a></li>
                                <li><a class="nav-link" href="{{ route('admin.allproducts') }}">All Products</a></li>
                                <li><a class="nav-link" href="breadcrumb.html">Deleted Products</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Category</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.createcategory') }}">Add Category</a></li>
                                <li><a class="nav-link" href="{{ route('admin.allcategory') }}">All Categories</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Sub Category</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.createsubcategory') }}">Add Sub
                                        Category</a></li>
                                <li><a class="nav-link" href="{{ route('admin.allsubcategory') }}">All Sub
                                        Categories</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="shopping-bag"></i><span>Brands</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.createbrands') }}">Add Brands</a></li>
                                <li><a class="nav-link" href="{{ route('admin.allbrands') }}">All Brands</a></li>
                            </ul>
                        </li>


                        <li class="menu-header">Campaign & Other</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="layout"></i><span>Campaign</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.createcampaign') }}">Create Campaign</a>
                                </li>
                                <li><a class="nav-link" href="{{ route('admin.allcampaigns') }}">All Campaigns</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="grid"></i><span>Newsletter</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.addsubscriber') }}">Add Subscriber</a>
                                </li>
                                <li><a class="nav-link" href="{{ route('admin.allsubscribers') }}">All Subscribers</a>
                                </li>
                                <li><a class="nav-link" href="{{ route('admin.emailtosub') }}">Send Email to all</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="pie-chart"></i><span>Support Tickets</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('admin.alltickets') }}">All Tickets</a></li>
                                <li><a class="nav-link" href="{{ route('admin.addticket') }}">Add New Ticket</a></li>
                                <li><a class="nav-link" href="{{ route('admin.departments') }}">Departments</a></li>
                            </ul>
                        </li>

                        <li class="menu-header">Coupon & Other</li>
                        <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="image"></i><span>Coupon</span></a>      
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.createcoupon') }}">Create Coupon</a></li>
                                <li><a class="nav-link" href="{{ route('admin.allcoupons') }}">All Coupons</a></li>
                            </ul>                            
                        </li>
                        
                        
                        

                    
                        <li class="menu-header">Country & Tax</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i>
                            <span>Country Manage</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.country') }}">Country</a></li>
                                <li><a href="{{ route('admin.state') }}">State</a></li>                                
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i>
                            <span>Tax Settings</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.countrytax') }}">Country Tax</a></li>
                                <li><a href="{{ route('admin.statetax') }}">State Tax</a></li>                                
                            </ul>
                        </li>
                        
                        <!-- <li class="menu-header">Pages</li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user-check"></i><span>Auth</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="auth-login.html">Login</a></li>
                                <li><a href="auth-register.html">Register</a></li>
                                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                                <li><a href="auth-reset-password.html">Reset Password</a></li>
                                <li><a href="subscribe.html">Subscribe</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="alert-triangle"></i><span>Errors</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="errors-503.html">503</a></li>
                                <li><a class="nav-link" href="errors-403.html">403</a></li>
                                <li><a class="nav-link" href="errors-404.html">404</a></li>
                                <li><a class="nav-link" href="errors-500.html">500</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="anchor"></i><span>Other
                                    Pages</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                                <li><a class="nav-link" href="posts.html">Posts</a></li>
                                <li><a class="nav-link" href="profile.html">Profile</a></li>
                                <li><a class="nav-link" href="contact.html">Contact</a></li>
                                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="chevrons-down"></i><span>Multilevel</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Menu 1</a></li>
                                <li class="dropdown">
                                    <a href="#" class="has-dropdown">Menu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Child Menu 1</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="has-dropdown">Child Menu 2</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Child Menu 1</a></li>
                                                <li><a href="#">Child Menu 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> Child Menu 3</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')

                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    <a href="templateshub.net">Templateshub</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('dashboard_asset/assets') }}
/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('dashboard_asset/assets') }}
/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('dashboard_asset/assets') }}
/js/page/index.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('dashboard_asset/assets') }}
/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('dashboard_asset/assets') }}
/js/custom.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });

    </script>


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->



</html>
