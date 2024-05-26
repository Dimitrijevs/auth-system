@include('includes.head')
<body>
    @include('includes.header')
        <main class="page-main bg-container-darker">
            @yield('content')
        </main>
    @include('includes.footer')
</body>
</html>
