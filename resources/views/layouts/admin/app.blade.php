<!doctype html>
<html lang="en">

<head>
    @include('layouts.admin.head')
    @yield('page_style')
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">


        @include('layouts.admin.sidebar')


        <!-- Header -->
        @include('layouts.admin.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main class="position-relative" id="main-container">
            <?php $fixed_top = false; ?>
            <!-- Page Content -->
            <div class="content">
                <!-- Overview -->
                @include('layouts.alert')
                @yield('content')
                <!-- END Overview -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        @include('layouts.admin.footer')
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('theme/js/jquery.min.js')}}"></script>
    <script src="{{ asset('theme/js/dashmix.app.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('theme/js/chart.js/chart.min.js')}}"></script>

    <script src="{{ asset('theme/js/be_pages_dashboard.min.js')}}"></script>

    <!-- Page JS Code -->
    @yield('page_script')
</body>

</html>