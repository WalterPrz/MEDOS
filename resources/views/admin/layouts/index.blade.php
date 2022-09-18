<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('js/app.js') }}" defer></script>

  <title>MEDOS</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/30866eb011.js" crossorigin="anonymous"></script>

  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="/css/admin/style.css" rel="stylesheet">
  <link href="/css/admin/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <!--CKEditor Plugin-->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

  

  @yield('css_role_page')

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/admin">MEDOS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          @auth
          {{ Auth::user()->name }}
          @endauth
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      @role('admin')
        <li class="nav-item">
          <a class="nav-link" href="/roles">
            <i class="fa fa-unlock-alt"></i>
            <span>Roles</span></a>
        </li>
      @endrole
      <li class="nav-item">
          <a class="nav-link" href="/inventario">
            <i class="fas fa-fw fa-box"></i>
            <span>Inventario</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/ventas">
            <i class="fas fa-fw fa-coins"></i>
            <span>Ventas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ingresomed/crear">
            <i class="fas fa-fw fa-tag"></i>
            <span>Compras</span></a>
        </li>

      @permission(['ver.usuarios'])
        <li class="nav-item">
          <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span></a>
        </li>
      @endpermission

      <li class="nav-item">
          <a class="nav-link" href="/proveedor">
            <i class="fas fa-fw fa-truck"></i>
            <span>Proveedor</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/categoria">
            <i class="fas fa-fw fa-table"></i>
            <span>Categoria</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="/diagnostico">
            <i class="fa fa-user-md" aria-hidden="true"></i>
            <span>Consultas</span></a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="/referenciaMedica">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Emitir referencia medica</span></a>
      </li>      
      
      <li class="nav-item">
          <a class="nav-link" href="/visita">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Visitas medicas</span></a>
          <a class="nav-link" href="/citas">
          <i class="fas fa-fw fa-calendar"></i>
            <span>Citas</span></a>
      </li>
    </ul>




    <div id="content-wrapper">

        <div class="container-fluid">

          @yield('content')
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <!--<footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2019</span>
            </div>
          </div>
        </footer>-->

    </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

          <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

          {{-- <a class="btn btn-primary" href="login.html">Cerrar sesión</a> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->

  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/admin/sb-admin.js"></script>

  <!-- Demo scripts for this page-->
  <script src="/js/admin/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  @yield('js_venta_page')
  @yield('js_user_page')
  @yield('js_role_page')
  </body>

</html>
