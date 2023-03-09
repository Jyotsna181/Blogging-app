<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js" rel="stylesheet">
    
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  
    <!-- Scripts -->
    
</head>
<body>
@include('layouts.include.admin-navbar')
<div id="layoutSidenav">
    @include('layouts.include.admin-sidebar')
    <div id="layoutSidenav_content">
        <main>
             @yield('content')
        </main>
        @include('layouts.include.admin-footer')
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>          
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>          
<script>
    $(document).ready(function() {
        $("#mySummernote").summernote(
            {
                height: 150,
            }
        );
        $('.dropdown-toggle').dropdown();
    });
    let table = new DataTable('#mydataTable');
</script>
</body>
</html>