<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" id="theme-link" href="{{ asset('frontend/assets/css/style.css') }}">

    <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-banner.png') }}">
    <link rel="preload" as="image" href="{{ asset('frontend/assets/images/pattern-2.svg') }}">
    <link rel="preload" as="image"
        href="{{ asset('frontend/assets/images/pattern-3.svg') }}>
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge,chrome=1" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">
    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/ico" href="{{ asset('img/favicon.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles

    @stack('after-styles')

    <x-google-analytics />
</head>

<body>

    @include('frontend.includes.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.includes.footer')

    <!-- Scripts -->
    @livewireScripts
    @stack('after-scripts')

    <script>
        // Function to toggle dark mode
        function toggleDarkMode() {
            const body = document.body;
            body.classList.toggle('dark-mode'); // Add this class to the <body> tag
            const isDarkMode = body.classList.contains('dark-mode');
            const themeLink = document.querySelector('#theme-link');

            // Update the CSS file based on the mode
            if (isDarkMode) {
                themeLink.href = "{{ asset('frontend/assets/css/style-dark.css') }}";
            } else {
                themeLink.href = "{{ asset('frontend/assets/css/style.css') }}";
            }

            // Store the user's theme preference in local storage
            localStorage.setItem('dark-mode', isDarkMode);
        }

        // Add an event listener to the dark mode switch
        const darkModeSwitch = document.querySelector('#username');
        darkModeSwitch.addEventListener('change', toggleDarkMode);

        // Check for the user's theme preference in local storage
        const isStoredDarkMode = localStorage.getItem('dark-mode');
        if (isStoredDarkMode === 'true') {
            toggleDarkMode();
        }
    </script>
   <script>
    // Function to enable dark mode
    function enableDarkMode() {
        document.body.classList.add('dark-mode');
        localStorage.setItem('darkMode', 'enabled');
    }

    // Function to disable dark mode
    function disableDarkMode() {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('darkMode', 'disabled');
    }

    // Check if dark mode is enabled or not in local storage
    if (localStorage.getItem('darkMode') === 'enabled') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }

    // Toggle dark mode when the switch is clicked
    const darkModeSwitch = document.getElementById('username');
    darkModeSwitch.addEventListener('change', function () {
        if (this.checked) {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const darkModeSwitch = document.getElementById('username');
        const currentStylesheet = getCurrentStylesheet();

        if (currentStylesheet === 'style-dark.css') {
            darkModeSwitch.checked = true;
        }

        darkModeSwitch.addEventListener('change', function () {
            if (this.checked) {
                loadStylesheet('style-dark.css');
            } else {
                loadStylesheet('style.css');
            }
        });

        function getCurrentStylesheet() {
            const stylesheets = document.querySelectorAll('link[rel="stylesheet"]');
            for (const stylesheet of stylesheets) {
                if (stylesheet.href.includes('style-dark.css')) {
                    return 'style-dark.css';
                }
            }
            return 'style.css';
        }

        function loadStylesheet(stylesheet) {
            const stylesheets = document.querySelectorAll('link[rel="stylesheet"]');
            for (const stylesheetTag of stylesheets) {
                if (stylesheetTag.href.includes(stylesheet)) {
                    stylesheetTag.disabled = false;
                } else {
                    stylesheetTag.disabled = true;
                }
            }
            localStorage.setItem('activeStylesheet', stylesheet);
        }
    });
</script>





</body>

</html>
