<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('partials.head')
  {{-- Styles --}}
  @include('partials.styles')
</head>
<body class="background">
  <div>
    {{-- Navbar --}}
    @include('partials.nav')

    {{-- Content --}}
    <div class="pt-5">
    @yield('content')
    {{-- Footer --}}
    @include('partials.footer')
    </div>

    {{-- Scripts --}}
    @include('partials.scripts')
  </div>
</body>
</html>