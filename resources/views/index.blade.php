<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
<style>
.clr {
    background-image: linear-gradient(rgb(49, 86, 134) 60%, white);
    color: white;
    font-weight: bold;
    text-align: center;
    font-size: 2em;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed" style="overflow-x: hidden">
    <div class="wrapper">
        <header class="clr p-3 row">
            <div class="col-2"></div>
            <div class="col-9"> PLATEFORME DE PROFESSIONNALISATION ESSO</div>
            <div class="user-info-dropdown col-1">
                <div class="dropdown">
                    <a class="nav-link" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i
                            class="fas fa-bars"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{url('login')}}"><i class="dw dw-user1"></i> Se Connecter</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="row container col-12">
            <div class="col-sm-10 row mt-3">
                <div class="col-3 px-3 py-3"><a class="button btn btn-primary" href="{{route('contact')}}">Contact</a>
                </div>
                <div class="col-3 px-3 py-3"><a class="button btn btn-primary" href="{{route('prof')}}">Prof-Crea</a>
                </div>
                <div class="col-3 px-3 py-3"><a class="button btn btn-primary" href="{{route('login')}}">Mon IDP</a>
                </div>
                <div class="col-3 px-3 py-3"><a class="button btn btn-primary" href="#">Créateur</a>
                </div>
            </div>
            <div class="col-sm-2">Bnojour</div>
        </div>
        <div class="row container col-12">
            <div class="col-md-9">
                <div class="col-12">
                    <video controls width="95%" height="500" class="mt-2 card-img-top">
                        <source src="{{ url('') }}" />
                    </video>
                </div>
                <div class="col-12 text-center"
                    style=" margin: auto; width: 90%; background-image: linear-gradient(rgb(49, 86, 134) 60%, whitesmoke)">
                    <span class="p-2 " style="color: whitesmoke; font-size: 2em; font-weight: bold;">NATURE DES OUTILS
                        DE DEVELOPPEMENT</span>
                </div>
            </div>
            <div class="col-md-3 p-2" style="overflow-y: auto ; max-height: 550px;">

                @if(isset($formation))
                <div class="row">
                    @foreach($formation as $item)
                    <div class="col-6">
                        <a href="{{ url('/video/Idp/'.$item->id) }}" class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">
                                    {{$item->nom}}</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">
                                    {{$item->description}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">theo</span>
                    </div>
                    <img class="direct-chat-img"
                        src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                        alt="message user image">
                    <div class="direct-chat-text">
                        <b style="color: red">
                            Pas de video disponible
                        </b>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                @endif

                @if(isset($types))
                @if(isset($types['0']->categories))
                <div class="row">
                    @foreach($types['0']->categories as $item)
                    <div class="col-6">
                        <a href="{{ url('/video/'.$item->id) }}" class="card" style="width: 10rem;">
                            <img height=50 src="{{url('storage/'.$item->image)}}" alt="">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">
                                    {{$item->nom}}</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">
                                    {{$item->description}}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">theo</span>
                    </div>
                    <img class="direct-chat-img"
                        src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                        alt="message user image">
                    <div class="direct-chat-text">
                        <b style="color: red">
                            Pas de video disponible
                        </b>
                    </div>
                </div>
                @endif
                @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">theo</span>
                    </div>
                    <img class="direct-chat-img"
                        src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                        alt="message user image">
                    <div class="direct-chat-text">
                        <b style="color: red">
                            Pas de commentaire pour cette video
                        </b>
                    </div>
                </div>
                @endif



            </div>
        </div>
        <div class="row container col-12">
            <div class="col-12 foot text-center mt-2">
                <div class="col">
                    @if(isset($types))
                    @if(isset($types['1']->categories))
                    <div class="row">
                        @foreach($types['1']->categories as $item)

                        <div style=" height=30px;" class="col-2">
                            <a href="{{ url('/video/'.$item->id) }}" class="card m-2"
                                style="font-weight: bold;  margin: auto;">

                                <div class="card-body text-red">
                                    <img style="text-align:center" height=50 width=50
                                        src="{{url('storage/'.$item->image)}}" alt="">
                                    <div style="text-align:center; font-size: 12px; font-weight: bold;"
                                        class="card-text">
                                        {{$item->nom}}</div>
                                    <!--  <div style="text-align:center; font-size: 9px;" class="card-text">
                                    {{$item->description}}</div> -->
                                </div>
                            </a>

                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">theo</span>
                        </div>
                        <img class="direct-chat-img"
                            src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                            alt="message user image">
                        <div class="direct-chat-text">
                            <b style="color: red">
                                Pas de video disponible
                            </b>
                        </div>
                    </div>
                    @endif
                    @else
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">theo</span>
                        </div>
                        <img class="direct-chat-img"
                            src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                            alt="message user image">
                        <div class="direct-chat-text">
                            <b style="color: red">
                                Pas de commentaire pour cette video
                            </b>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="p-1 m-1 card col-12 text-center"
                    style=" margin: auto; width: 90%; background-image: linear-gradient(rgb(49, 86, 134) 60%, whitesmoke)">
                    <span class="p-2 " style="color: whitesmoke; font-size: 2em; font-weight: bold;">CATHEGORIE DES
                        IDENTIFIANTS PROFESSIONNEL</span>
                </div>

                @if(isset($types))
                @if(isset($types['2']->categories))
                <div class="row mt-3">
                    @foreach($types['2']->categories as $item)
                    <div class="col-3">
                        <a href="{{ url('/video/'.$item->id) }}" class="card">
                            <div class="card-body text-red">
                                <img style="text-align:center" height=50 width=50 src="{{url('storage/'.$item->image)}}"
                                    alt="">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">

                                    {{$item->nom}}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">theo</span>
                    </div>
                    <img class="direct-chat-img"
                        src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                        alt="message user image">
                    <div class="direct-chat-text">
                        <b style="color: red">
                            Pas de video disponible
                        </b>
                    </div>
                </div>
                @endif
                @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">theo</span>
                    </div>
                    <img class="direct-chat-img"
                        src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                        alt="message user image">
                    <div class="direct-chat-text">
                        <b style="color: red">
                            Pas de commentaire pour cette video
                        </b>
                    </div>
                </div>
                @endif

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
    <script src="{{asset('dist/js/script.js')}}"></script>
</body>

</html>