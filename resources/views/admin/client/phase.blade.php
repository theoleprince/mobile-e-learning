<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    </head>
    <body  style="background-color:rgb(184, 184, 187); height:100%">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/user/formation')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/admin/users/profil')}}" class="nav-link">Contact</a>
            </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}" alt="" style="width:50px; height:50px; float:left; border-radius:50%; margin-right:25px; border: 2px purple solid">
                            </span>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{url('/admin/profil')}}"><i class="dw dw-user1"></i> Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"><i class="dw dw-logout"></i> Log Out</a>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">Call me whenever you can...</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">I got your message bro</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                    <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">The subject goes here</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <div class="content p-2">
            <!-- CORPS -->
            <div class="container-fluid pt-2" style="width: 90%">
                <div class="row" style="height:100%;">
                    <div class="row card card-primary card-outline card-tabs p-4" style="width:100%;">
                        <div class="card-header p-2 border-bottom-1 text-center">
                            <h2>Vos Leçons</h2>
                        </div>
                        <div class="row ">
                            <div class="col-7 col-sm-9 pt-2">
                                <div class="tab-content" id="vert-tabs-right-tabContent">
                                <div class="tab-pane fade show active" id="vert-tabs-right-home" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="card m-2 col-8">
                                            <video controls width="250" height="350" class="mt-2 card-img-top">
                                                <source src=""/>
                                            </video>
                                            <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-profile" role="tabpanel" aria-labelledby="vert-tabs-right-profile-tab">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="card m-2 col-8">
                                            <video controls width="250" height="350" class="mt-2 card-img-top">
                                                <source src=""/>
                                            </video>
                                            <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-messages" role="tabpanel" aria-labelledby="vert-tabs-right-messages-tab">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="card m-2 col-8">
                                            <video controls width="250" height="350" class="mt-2 card-img-top">
                                                <source src=""/>
                                            </video>
                                            <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-settings" role="tabpanel" aria-labelledby="vert-tabs-right-settings-tab">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="card m-2 col-8">
                                            <video controls width="250" height="350" class="mt-2 card-img-top">
                                                <source src=""/>
                                            </video>
                                            <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>                                </div>
                                </div>
                            </div>
                            <div class="col-5 col-sm-3">
                                <div class="col nav nav-tabs nav-tabs-right" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical"  style="overflow-y: auto ; max-height: 550px;">
                                    <a class="nav-link active" id="vert-tabs-right-home-tab" data-toggle="pill" href="#vert-tabs-right-home" role="tab" aria-controls="vert-tabs-right-home" aria-selected="true">
                                        <div class="card m-1">
                                            <div class="row g-0 m-1">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>(N°:0)</b> titre</h5>
                                                    <p class="card-text">Cours</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Last updated 3 mins ago</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="vert-tabs-right-profile-tab" data-toggle="pill" href="#vert-tabs-right-profile" role="tab" aria-controls="vert-tabs-right-profile" aria-selected="false">
                                        <div class="card m-1">
                                            <div class="row g-0 m-1">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>(N°:0)</b> titre</h5>
                                                    <p class="card-text">Cours</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Last updated 3 mins ago</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="vert-tabs-right-messages-tab" data-toggle="pill" href="#vert-tabs-right-messages" role="tab" aria-controls="vert-tabs-right-messages" aria-selected="false">
                                        <div class="card m-1">
                                            <div class="row g-0 m-1">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>(N°:0)</b> titre</h5>
                                                    <p class="card-text">Cours</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Last updated 3 mins ago</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="vert-tabs-right-settings-tab" data-toggle="pill" href="#vert-tabs-right-settings" role="tab" aria-controls="vert-tabs-right-settings" aria-selected="false">
                                        <div class="card m-1">
                                            <div class="row g-0 m-1">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b>(N°:0)</b> titre</h5>
                                                    <p class="card-text">Cours</p>
                                                    <p class="card-text">
                                                        <small class="text-muted">Last updated 3 mins ago</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <!-- DataTables -->
        <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dist/js/demo.js')}}"></script>
    </body>
</html>

