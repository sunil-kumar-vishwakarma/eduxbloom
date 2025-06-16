<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/edu-x white.png') }}" />
    <title>Edu-X</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</head>

<body>
    @include('includes.alerts')
        <!-- @include('partials.sidebar') -->
    <div class="main-content">
        @include('frontent_partials.navbar')
        @yield('content')

        @include('frontent_partials.footer')
    </div>
    @yield('scripts')
    {{-- <script src="{{ asset('js/toggleStatus.js') }}"></script> --}}
    <!-- <script src="{{ asset('js/script.js') }}"></script> -->

    <script>
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Show dropdown when hovering on the button
        dropdownBtn.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
        });

        // Show dropdown when hovering over the menu
        dropdownMenu.addEventListener('mouseenter', () => {
            dropdownMenu.style.display = 'block';
        });

        // Hide dropdown when the mouse leaves the button or the menu
        // dropdownBtn.addEventListener('mouseleave', () => {
        //     setTimeout(() => {
        //         if (!dropdownMenu.matches(':hover')) {
        //             dropdownMenu.style.display = 'none';
        //         }
        //     }, 200); // Optional delay for smoother UX
        // });

        dropdownMenu.addEventListener('mouseleave', () => {
            dropdownMenu.style.display = 'none';
        });
    </script>

</body>

</html>
