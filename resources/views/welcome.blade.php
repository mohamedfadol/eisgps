<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <link rel="stylesheet" href="{{asset('new/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{asset('new/css/style.default.css')}}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{asset('new/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('new/css/media.css')}}">
    <link rel="stylesheet" href="{{asset('new/css/style-login.css')}}">
{{--    <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">--}}
    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
{{--    <script--}}
{{--        type="text/javascript"--}}
{{--        src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyANrKskLj72NvodFbVQu0kRQYUDEDq85c8">--}}
{{--    </script>--}}

</head>
<body >
<div id="app">
    <app></app>
</div>

<script src="{{ mix('js/bootstrap.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{asset('new/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('new/js/functions.js')}}"></script>
<script src="{{asset('new/js/bootstrap.bundle.js')}}"></script>

<script src="{{asset('new/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('new/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('new/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<!-- Main File-->
<script src="{{asset('new/js/front.js')}}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{asset('plugins/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>


{{--<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>--}}
{{--<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>--}}
{{--<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table-locale-all.min.js"></script>--}}
{{--<script--}}
{{--    src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>--}}


</body>
</html>
