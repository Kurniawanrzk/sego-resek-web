<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="KURNIAWAN RIZKI TRINANTA SEMBIRNG">
  <title>Sego Resek Admin Website</title>

  @include('admin_partials.styles')
</head>
<body>

@include('admin_partials.header')
@if(\Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" style="position:fixed;right:0;bottom:0;z-index:2;" role="alert">
    <div class="alert-body">
        {{ \Session::get('error') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(\Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" style="position:fixed;right:0;bottom:0;z-index:2;" role="alert">
    <div class="alert-body">
        {{ \Session::get('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<main class="container mt-5">
    @yield('content')
</main>

@include('admin_partials.footer')

@include('admin_partials.scripts')

</body>
</html>
