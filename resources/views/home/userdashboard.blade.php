<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('home.header')
    <!-- Header Section End -->

    @include('home.userdashboarddetails')
<!-- Footer Section Begin -->
@include('home.footer')
<!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
</body>
</html>