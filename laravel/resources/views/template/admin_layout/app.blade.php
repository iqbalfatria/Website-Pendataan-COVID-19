<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ADMIN</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="{{ url('') }}/laravel/vendor/Basik/assets/css/bootstrap1.css">
        <link rel="stylesheet" href="{{ url('') }}/laravel/vendor/Basik/assets/css/theme.css">
        <link rel="stylesheet" href="{{ url('') }}/laravel/vendor/Basik/assets/css/style.css">

        <link rel="stylesheet" type="text/css" href="{{ url('') }}/laravel/resources/views/admin_layout/datatables/datatables.min.css"/>
        <!-- endbuild -->
        <link rel="icon"  type="image/png" href="{{ url('') }}/laravel/logo/logo.png">
    </head>

    <body class="layout-row">


  @yield('aside')

  @yield('header')

  @yield('content')
  <!-- /.content-wrapper -->
    <div id="footer" class="page-footer hide">
                <div class="d-flex p-3">
                    <span class="text-sm text-muted flex">&copy; Copyright. flatfull.com</span>
                    <div class="text-sm text-muted">Version 1.1.2</div>
                </div>
    </div>
  </div>
 <script src="{{ url('') }}/laravel/vendor/Basik/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ url('') }}/laravel/vendor/Basik/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{ url('') }}/laravel/vendor/Basik/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ajax page -->
        <script src="{{ url('') }}/laravel/vendor/Basik/libs/pjax/pjax.min.js"></script>
                             <!-- <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/ajax.js"></script>
        <!-- lazyload plugin -->
        <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/lazyload.config.js"></script>
        <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/lazyload.js"></script>
        <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/plugin.js"></script>
        <!-- scrollreveal -->
        <script src="{{ url('') }}/laravel/vendor/Basik/libs/scrollreveal/dist/scrollreveal.min.js"></script>
        <!-- feathericon -->
        <script src="{{ url('') }}/laravel/vendor/Basik/libs/feather-icons/dist/feather.min.js"></script>
        <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/plugins/feathericon.js"></script>
        <!-- theme -->
        <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/theme.js"></script>
       <script src="{{ url('') }}/laravel/vendor/Basik/assets/js/utils.js"></script>
        <!-- endbuild -->
        
        <script type="text/javascript" src="{{ url('') }}/laravel/resources/views/admin_layout/datatables/datatables.min.js"></script>
        <script>
                jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
        </script>
</body>
</html>
