<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/animate-css/vivify.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/c3/c3.min.css') }}"/>
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/site.min.css') }}">

@if (\Lang::getLocale() == 'ar')
<style>
    .user-account .dropdown .dropdown-menu{
        right: 0 !important;
    }
</style>
@else
<style>
    .user-account .dropdown .dropdown-menu{
        left: 0 !important;
    }
</style>
@endif


@yield('stylesheet')
<link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/sweetalert/sweetalert.css') }}"/>
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
</head>