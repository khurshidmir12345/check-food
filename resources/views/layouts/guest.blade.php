<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendor/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>

<body>


@yield('coontent')


<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('/vendor/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('/js/off-canvas.js')}}"></script>
<script src="{{asset('/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('/js/template.js')}}"></script>
<script src="{{asset('/js/settings.js')}}"></script>
<script src="{{asset('/js/todolist.js')}}"></script>
<!-- endinject -->
</body>

</html>
