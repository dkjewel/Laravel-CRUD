<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/')}}plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">

    <!-- Style Files -->
    <link rel="stylesheet" href="{{asset('/')}}css/styles.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('admin.assets.navbar')

<!-- Main Sidebar-->
@include('admin.assets.sidebar')


<!-- Main Content-->
    <div class="content-wrapper">

        @yield('content')
    </div>


    <!-- Main Footer -->
    @include('admin.assets.footer')

</div>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dist/js/adminlte.min.js"></script>
</body>
</html>
