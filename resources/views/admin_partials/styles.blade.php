<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">
@if (request()->is('admin/dashboard') || request()->is('admin/komen'))
<link rel="stylesheet" href="{{ asset('assets/css/style_dashboard_admin.css') }}">
@endif
@if (request()->is('admin/menu'))
<link rel="stylesheet" href="{{ asset('assets/css/style_menu_admin.css') }}">
@endif
@if (request()->is('admin/komen'))
<link rel="stylesheet" href="{{ asset('assets/css/style_komen_admin.css') }}">
@endif
@if (request()->is('admin/kasir'))
<link rel="stylesheet" href="{{ asset('assets/css/kasir.css') }}">
@endif

