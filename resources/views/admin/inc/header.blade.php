
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/dastone-1/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Jan 2021 12:26:47 GMT -->
<head>
        <meta charset="utf-8" />
        <title>TAU PLAY - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="TAU Play Admin" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favico.ico') }}">
        <link href="{{asset('plugins/leaflet/leaflet.css') }}" rel="stylesheet">
        <link href="{{asset('plugins/lightpick/lightpick.css') }}" rel="stylesheet" />
        <!-- DataTables -->
        <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body class="dark-sidenav">
        @include('sweet::alert')
        <!-- Left Sidenav -->
        <div style="color:#fff" class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{ url('/') }}" class="logo">
                    <span>
                        <img src="{{asset('assets/images/tau-logo.png') }}" alt="logo-small" width="70" style="-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li style="color:#fff" class="menu-label mt-0">Main</li>
                    <li>
                        <a href="{{ route('home') }}" class="@if(Request::getPathInfo() =='/admin/dashboard')active @endif"><i style="color:#fff" data-feather="home" class="align-self-center menu-icon"></i><span style="color:#fff">Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{ route('category') }}"><i style="color:#fff" data-feather="layers" class="align-self-center menu-icon"></i><span style="color:#fff">Category</span></a>
                    </li>

                    <hr class="hr-dashed hr-menu">
                    <li style="color:#fff" class="menu-label my-2">TAU Play Channels</li>

                    <li>
                        <a href="{{ route('channels') }}"><i style="color:#fff" data-feather="grid" class="align-self-center menu-icon"></i><span style="color:#fff">Channels</span></a>
                    </li>


                </ul>

            </div>
        </div>
        <!-- end left-sidenav-->

        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- Navbar -->
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-nav float-right mb-0">
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }}</span>
                                <i data-feather="user" class="align-self-center icon-xs icon-dual mr-1 rounded-circle thumb-xs"></i>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#profileModalLogin"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul><!--end topbar-nav-->

                    <ul class="list-unstyled topbar-nav mb-0">
                        <li>
                            <button class="nav-link button-menu-mobile">
                                <i data-feather="menu" class="align-self-center topbar-icon"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->

            <div class="modal fade" id="profileModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalDefaultLogin" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="exampleModalDefaultLogin">Edit Profile</h6>
                            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="la la-times"></i></span>
                            </button>
                        </div><!--end modal-header-->
                        <div class="modal-body">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <h4 class="mt-3 mb-1 font-weight-semibold font-18">Edit Profile</h4>
                                </div>
                            </div>
                            <div class="card-body">

                                 <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('save.profile') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}" />
                                            <div class="form-group">
                                                <label for="cat">Name</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="name" id="cat" required value="{{ Auth::user()->name }}">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div class="input-group mb-3">
                                                    <input type="email" class="form-control" name="email" id="email" required value="{{ Auth::user()->email }}">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="password">Old Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="old_password" id="password" required>
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="n_password">New Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="new_password" id="n_password" required>
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="c_password">Confirm Password</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" name="confirm_password" id="c_password" required>
                                                </div>
                                            </div><!--end form-group-->


                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-2">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"> Save <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                </div><!--end col-->
                                            </div> <!--end form-group-->
                                        </form><!--end form-->
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end modal-body-->

                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div><!--end modal-->
