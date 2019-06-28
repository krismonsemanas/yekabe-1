<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('seo-title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Panel Admin">
  <meta name="author" content="Arif Setiawan|MasariuMan">
  <meta name="robots" content="noindex, nofollow">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('tenpureto.beken.slice.css')
  @include('tenpureto.beken.slice.fonts')
  @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('tenpureto.beken.slice.header')
  @include('tenpureto.beken.slice.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('title')
      <ol class="breadcrumb">
        @yield('breadcrumb')
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('main')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('tenpureto.beken.slice.footer')

  <!-- controll_sidebar -->
</div>
<!-- ./wrapper -->

@include('tenpureto.beken.slice.js')
@stack('js')
</body>
</html>
