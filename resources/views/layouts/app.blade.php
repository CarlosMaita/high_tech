<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="es">
  <head>

    {{-- metas  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- titulo  --}}
    <title>@yield('title')</title>

    {{-- global css  --}}
    <link rel="stylesheet" href="/go/app/assets/css/vendor.css" />
    <link rel="stylesheet" href="/go/app/assets/css/style.css" />
    <link rel="stylesheet" href="/css/fuentes.css">
    <link rel="stylesheet" href="/css/estilos.css">

  </head>
  <body>

    {{-- header --}}
    @include('common.header')
    {{-- contenido --}}
    @yield('content')
    {{-- Whatasapp --}}
    @include('common.whatsapp')
    {{-- footer --}}
    @include('common.footer')

    {{-- global Js  --}}
    <script src="/go/app/assets/js/vendor.js"></script>
    <script src="/go/app/assets/js/app.js"></script>

  </body>
</html>
