<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('images/icon/faviconpanel.ico')}}" type="image/x-icon"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title') | Panel de administración</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('template/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/skins/skin-blue.min.css')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">

    @include('template/nav')
    <br><br>
    @include('template/aside')


    <div class="content-wrapper">
      <section class="content-header">
        @yield('content')
      </section>
    </div>

    @include('template/footer')

    <script type="text/javascript" src="{{asset('jquery/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('template/dist/js/app.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('chartjs/Chart.js')}}"></script>
    @yield('js')


 <!-- javascript del sistema laravel -->
  <script src="js/highcharts.js"></script>
  <script src="js/graficas.js"></script>

  </body>
</html>
