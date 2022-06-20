<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SKRIPSI METODE TOPSIS">
    <meta name="author" content="MUHAMMAD RIZKY AKBAR">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/adminbite/assets/images/favicon.png') }}">

    @yield('title')
    <!-- Custom CSS -->
    <!-- This page plugin data tables -->
    <link href="{{ asset('assets/adminbite/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet">

    <link href="{{ asset('assets/adminbite/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/adminbite/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <div id="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        @include('layouts.web.module.header')

        @include('layouts.web.module.sidebar')

        <div class="page-wrapper">

            @yield('content')

            <footer class="footer text-left">
                MUHAMMAD RIZKY AKBAR 1670231060
                <br>
                UNIVERSITAS KRISNADWIPAYANA {{ date('Y') }}
            </footer>

        </div>
    </div>


    <script src="{{ asset('assets/adminbite/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/adminbite/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/adminbite/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('assets/adminbite/dist/js/app.min.js') }}"></script>
    <!-- Theme settings -->
    <script src="{{ asset('assets/adminbite/dist/js/app.init.dark.js') }}"></script>
    <script src="{{ asset('assets/adminbite/dist/js/app-style-switcher.js') }}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/adminbite/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}">
    </script>
    <script src="{{ asset('assets/adminbite/assets/extra-libs/sparkline/sparkline.js') }}"></script>

    <!--Wave Effects -->
    <script src="{{ asset('assets/adminbite/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/adminbite/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/adminbite/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->

    <!--This page Data Tables -->
    <script src="{{ asset('assets/adminbite/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/adminbite/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    @yield('script')

</body>

</html>
