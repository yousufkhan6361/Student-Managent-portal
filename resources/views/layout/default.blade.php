<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Management</title>
    
    
    <!-- Bootstrap -->
    <link href="{{ asset('public/theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('public/theme/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/theme/build/css/custom.min.css') }}" rel="stylesheet">

    
    <style type="text/css">
      .fa-pencil-square-o{
        color: #268009;
      }
      .fa-trash{
        color: #c11818;
      }
      .fa-eye{
        color: #2398b3;
      }

     .sshow{
      text-align: left;
    padding: 4px;
    /* padding-left: 10px; */
    font-family: inherit;
     }
    </style>
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        @include('layout.header')
        @include('layout.sidebar')
      <div class="right_col" role="main">
        @yield('content')
      </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Student Portal by <a href="https://colorlib.com">josephkhan</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('public/theme/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/theme/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/theme/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('public/theme/vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('public/theme/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('public/theme/build/js/custom.min.js') }}"></script>
    @stack('footer-scripts')
  </body>
</html>