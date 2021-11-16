<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    {{ $title }}
    @if (Session::has('login') && Session::get('login') == true)
        - {{ Session::get('name') }}
    @endif
</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
<link rel="stylesheet" href="/template/admin/dist/css/custom.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('head')
