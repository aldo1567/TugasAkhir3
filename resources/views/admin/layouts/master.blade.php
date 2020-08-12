@include('admin.layouts.includes.header')

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        @include('admin.layouts.includes.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">@yield('section-title')</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">@yield('section-breadcrumb')</li>
                    </ol>
                    @yield('content')
                </div>
            </main>
            @include('admin.layouts.includes.footer')
