<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>S&N Admin - Dashboard</title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->

    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

</head>

<body class="fixed hold-transition dark-skin sidebar-mini theme-primary">

<div class="wrapper">

    @include('backend.layouts.header')

    @include('backend.layouts.sidebar')

    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            @yield('content')
        </div>
    </div>




</div>
<!-- ./wrapper -->

<!-- Vendor JS -->
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/pages/editor.js') }}"></script>
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
<!-- Sunny Admin App -->
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
</body>
@if (session('success'))



    <script>
        Swal.fire(
            'Success',
            "{{session('success')}}",
            'success'
        )
    </script>

@endif
</html>
