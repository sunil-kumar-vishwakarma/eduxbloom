<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Edu-X')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('storage/' . ($settings->favicon ?? 'default_favicon.png')) }}" />

</head>
<body>
    @include('includes.alerts')
    @include('partials.sidebar')
    <div class="main-content">
        @include('partials.navbar')
        @yield('content')
    </div>
    @yield('scripts')
    {{-- <script src="{{ asset('js/toggleStatus.js') }}"></script> --}}
    <script src="{{ asset('js/script.js') }}"></script>
<style>
    .main-content{
        margin-left:265px ;
    }
</style>
</body>
</html>
