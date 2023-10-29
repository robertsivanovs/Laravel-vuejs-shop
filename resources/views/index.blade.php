<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Scripts / Stylesheets / Meta tags component -->
    @component('components/scripts')
    @endcomponent
    <title>Ziemassvētku eglītes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="header-container">
        <!-- Header component -->
        @component('components/header')
        @endcomponent
        <!-- Main navigation panel component -->
        @component('components/nav')
        @endcomponent
    </div>
    <div id="app">
        <product-component csrfToken="{{ csrf_token() }}"></product-component>
    </div>
    <!-- Footer component -->
    @component('components/footer')
    @endcomponent
</body>

</html>
