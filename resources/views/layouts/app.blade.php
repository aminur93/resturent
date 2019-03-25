<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/img/apple-icon.png') }}">

    <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon.png') }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('backend/css/material-dashboard.css') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('backend/demo/demo.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css')
</head>
<body>

    <div id="app">

        <div class="wrapper ">

            @if (Request::is('admin*'))
                @include('layouts.admin.sidebar')
            @endif


            <div class="main-panel">
                @if (Request::is('admin*'))

                    @include('layouts.admin.topbar')
                @endif

                    @yield('content')
                @if (Request::is('admin*'))

                    @include('layouts.admin.footer')
                @endif

            </div>

        </div>
            {{--@if (Request::is('admin*'))--}}

                {{--@include('layouts.admin.sidebar_filter')--}}
            {{--@endif--}}
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('backend/js/plugins/moment.min.js') }}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('backend/js/plugins/sweetalert2.js') }}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('backend/js/plugins/jquery.validate.min.js') }}"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{ asset('backend/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('backend/js/plugins/bootstrap-selectpicker.js') }}"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{ asset('backend/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    {{--<script src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>--}}
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('backend/js/plugins/bootstrap-tagsinput.js') }}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('backend/js/plugins/jasny-bootstrap.min.js') }}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{ asset('backend/js/plugins/fullcalendar.min.js') }}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{ asset('backend/js/plugins/jquery-jvectormap.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('backend/js/plugins/nouislider.min.js') }}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{ asset('backend/js/plugins/arrive.min.js') }}"></script>
    <!-- Chartist JS -->
    <script src="{{ asset('backend/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('backend/js/plugins/bootstrap-notify.js') }}"></script>
    {{--<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->--}}
    <script src="{{ asset('backend/js/material-dashboard.js') }}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backend/demo/demo.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('js')

    {!! Toastr::message() !!}
</body>
</html>
