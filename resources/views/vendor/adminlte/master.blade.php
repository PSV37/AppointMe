<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 3'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    @if(! config('adminlte.enabled_laravel_mix'))
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    @include('adminlte::plugins', ['type' => 'css'])

    @yield('adminlte_css_pre')

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    @yield('adminlte_css')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css ">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <link href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet">
  <link href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css" rel="stylesheet">
  <link href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css" rel="stylesheet">
  <link href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" rel="stylesheet">


    @else
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @endif
	@yield('load_css')
    @yield('meta_tags')

    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif
</head>
<body class="@yield('classes_body')" @yield('body_data')>

@yield('body')

@if(! config('adminlte.enabled_laravel_mix'))
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
    <!-- <script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
    <!-- <script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script> -->


<!-- DataTables -->
<script src="https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://adminlte.io/themes/v3/dist/js/demo.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>


<!-- page script -->


@include('adminlte::plugins', ['type' => 'js'])

@yield('adminlte_js')
@else
<script src="{{ mix('js/app.js') }}"></script>


@endif
@yield('load_js')
</body>
</html>
<script type="text/javascript">
    
    function csrf(name="csrf-token"){
    const metas = document.getElementsByTagName('meta');
    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute('name') === name) {
            return metas[i].getAttribute('content');
        }
    }
    
    return null;
}

</script>
