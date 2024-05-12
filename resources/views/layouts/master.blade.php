<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <meta name="author" content="Mahasiswa Teknik Informatika Universitas Negeri Malang Angkatan 23">
  <title>SegoResek | Website</title>
  @include('partials.styles')
</head>
<body>

@include('partials.header')
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
<main>
    @yield('content')
</main>

@include('partials.footer')

@include('partials.scripts')

</body>
</html>
