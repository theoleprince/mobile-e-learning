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
<style>
    .clr{
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
                    <a class="nav-link" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="fas fa-bars"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{url('login')}}"><i class="dw dw-user1"></i> Se Connecter</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="row container col-12">
            <div class="col-sm-10 row mt-3">
                <div class="col-3 px-3 py-3"><button class="button btn btn-primary">Contact</button></div>
                <div class="col-3 px-3 py-3"><button class="button btn btn-primary">Prof-Crea</button></div>
                <div class="col-3 px-3 py-3"><button class="button btn btn-primary">Mon IDP</button></div>
                <div class="col-3 px-3 py-3"><button class="button btn btn-primary">Créateur</button></div>
            </div>
            <div class="col-sm-2">Bnojour</div>
        </div>
        <div class="row container col-12">
            <div class="col-md-9">
                <div class="col-12">
                    <video controls width="95%" height="500" class="mt-2 card-img-top">
                        <source src="{{ url('') }}"/>
                    </video>
                </div>
                <div class="col-12 text-center" style=" margin: auto; width: 90%; background-image: linear-gradient(rgb(49, 86, 134) 60%, whitesmoke)">
                    <span class="p-2 " style="color: whitesmoke; font-size: 2em; font-weight: bold;">NATURE DES OUTILS DE DEVELOPPEMENT</span>
                </div>
            </div>
            <div class="col-md-3 p-2" style="overflow-y: auto ; max-height: 540px;">
                <div class="row">
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP CONCEPTEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Fomaliser les problèmes</div>
                            </div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DEVELOPPEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Recherche Les Solutions et Transforme Resultat</div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP PRODUCTEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Transforme Les Matières Première en Resultat</div>
                            </div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DISTRIBUTEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Initie à la Consomation des Resultats</div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP CONCEPTEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Fomaliser les problèmes</div>
                            </div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="card" style="width: 10rem;">
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP CONCEPTEUR</div>
                                <div style="text-align:center; font-size: 9px;" class="card-text">Fomaliser les problèmes</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 foot text-center mt-2">
            <div class="col">
                <div class="row">
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                </div>
                <div class="row">
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                    <div style="width: 70%; margin: auto;" class="col-2"><button class="card p-3 m-2" style="font-weight: bold; width: 90%; margin: auto;"> Gamme De Produit</button></div>
                </div>
                <div class="p-1 m-1 card col-12 text-center" style=" margin: auto; width: 90%; background-image: linear-gradient(rgb(49, 86, 134) 60%, whitesmoke)">
                    <span class="p-2 " style="color: whitesmoke; font-size: 2em; font-weight: bold;">CATHEGORIE DES IDENTIFIANTS PROFESSIONNEL</span>
                </div>
                <div class="row mt-3">
                    <div class="col-3">
                        <button class="card">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DEVELOPPEUR</div>
                            </div>
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                        </button>
                    </div>
                    <div class="col-3">
                        <button class="card">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DEVELOPPEUR</div>
                            </div>
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                        </button>
                    </div>
                    <div class="col-3">
                        <button class="card">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DEVELOPPEUR</div>
                            </div>
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                        </button>
                    </div>
                    <div class="col-3">
                        <button class="card">
                            <div class="card-body text-red">
                                <div style="text-align:center; font-size: 12px; font-weight: bold;" class="card-text">IDP DEVELOPPEUR</div>
                            </div>
                            <img src="{{asset('images.jpg')}}" class="card-img-top" alt="...">
                        </button>
                    </div>
                </div>
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
