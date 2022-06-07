<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>MT</title>

    <meta name="description" content="MT &amp;The landing page">
    <meta name="author" content="MT">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="MT &amp; UI Framework">
    <meta property="og:site_name" content="MT">
    <meta property="og:description" content="MT &amp; UI by me">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('theme/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('theme/media/favicons/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme/media/favicons/favicon.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and MT framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('theme/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('theme/css/xwork.min.css')}}"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- END Stylesheets -->
</head>

<body>
    <?php $fixed_top = true; ?>
    <div id="page-container">
        @include('layouts.alert')

        @yield('content')


    </div>
    <!-- END Page Container -->

    <!--
      MT JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('theme/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('theme/js/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('theme/js/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('theme/js/op_auth_signin.min.js')}}"></script>
</body>

</html>