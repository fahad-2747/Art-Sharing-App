<!DOCTYPE html>
<!--
Template Name: Foxclore
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
    <title>Art-Sharing-App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ asset('assets/frontend/layout/styles/layout.css') }}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
@include('frontend.body.header')
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
@yield('content')
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
@include('frontend.body.footer')
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#"> Fahadul Islam</a></p>

        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset('assets/frontend/layout/scripts/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/layout/scripts/jquery.backtotop.js') }}"></script>
<script src="{{ asset('assets/frontend/layout/scripts/jquery.mobilemenu.js') }}"></script>
</body>
</html>
