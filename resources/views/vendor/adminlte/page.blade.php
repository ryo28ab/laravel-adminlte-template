@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
  @stack('css')
  @yield('css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <style>
    * {
      font-family:
        'Noto Sans JP', "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol" !important
    }

    i {
      font-family: "Font Awesome 5 Free" !important;
    }
  </style>
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
  <div class="wrapper">

    {{-- Top Navbar --}}
    @if ($layoutHelper->isLayoutTopnavEnabled())
      @include('adminlte::partials.navbar.navbar-layout-topnav')
    @else
      @include('adminlte::partials.navbar.navbar')
    @endif

    {{-- Left Main Sidebar --}}
    @if (!$layoutHelper->isLayoutTopnavEnabled())
      @include('adminlte::partials.sidebar.left-sidebar')
    @endif

    {{-- Content Wrapper --}}
    @empty($iFrameEnabled)
      @include('adminlte::partials.cwrapper.cwrapper-default')
    @else
      @include('adminlte::partials.cwrapper.cwrapper-iframe')
    @endempty

    {{-- Footer --}}
    @hasSection('footer')
      @include('adminlte::partials.footer.footer')
    @endif

    {{-- Right Control Sidebar --}}
    @if (config('adminlte.right_sidebar'))
      @include('adminlte::partials.sidebar.right-sidebar')
    @endif

  </div>
@stop

@section('adminlte_js')
  @stack('js')
  @yield('js')
@stop
