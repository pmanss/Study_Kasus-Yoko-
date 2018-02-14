<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href='/assets/bootstrap/css/bootstrap.min.css'>
    <link rel="stylesheet" href='/font-awesome/css/font-awesome.min.css'>
    <link rel="stylesheet" href='/assets/dist/css/AdminLTE.min.css'>
    <link rel="stylesheet" href='/assets/dist/css/skins/skin-blue.min.css'>
    <link rel="stylesheet" href='/assets/plugins/datatables/dataTables.bootstrap.css'>
    <link rel="stylesheet" href='/assets/plugins/datepicker/datepicker3.css'>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
     <!-- Header -->
     <header class="main-header">
        <a href="#" class="logo">   
            <span class="logo-mini">
              <img src="{{ ('/images/'.Auth::user()->foto) }}" width="45px">
          </span>
          <span class="logo-lg"><b>Pondok</b> IT</span>
      </a>

      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ ('/images/'.Auth::user()->foto) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="{{ ('/images/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}
                </p>
            </li>
            <li class="user-footer">
            <div class="pull-center">
                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </div>
      </li>

  </ul>
</li>
</ul>
</div>
</nav>
</header>
<!-- End Header -->


<!-- Sidebar -->
<aside class="main-sidebar">

  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">MENU NAVIGASI</li>

      <li><a href="{{ route('santri.index') }}"><i class="fa fa-user"></i> <span>Daftar Santri</span></a></li>
      <li><a href="{{ route('divisi.index') }}"><i class="fa fa-dashboard"></i> <span>Daftar Divisi</span></a></li>
      
      

</section>
</aside>
<!-- End Sidebar -->

<!-- Content  -->
<div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        @section('breadcrumb')
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        @show
    </ol>
</section>

<section class="content">
  @yield('content')
</section>
</div>
<!-- End Content -->

<!-- Footer -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">

  </div>

</footer>
<!-- End Footer -->

<script src="/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/bootstrap/js/uang.js"></script>
<script src="/assets/dist/js/app.min.js"></script>

<script src="/assets/plugins/chartjs/Chart.min.js"></script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/js/validator.min.js"></script>

@yield('script')

</body>
</html>