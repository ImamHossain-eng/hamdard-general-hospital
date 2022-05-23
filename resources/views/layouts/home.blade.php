<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hamdard General Hospital</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/hgh_logo.jpg')}}">
     <!-- Bootstrap core CSS -->
     <link href="{{asset('homepage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


     <!-- Additional CSS Files -->
     <link rel="stylesheet" href="{{asset('homepage/assets/css/fontawesome.css')}}">
     <link rel="stylesheet" href="{{asset('homepage/assets/css/tooplate-main.css')}}">
     <link rel="stylesheet" href="{{asset('homepage/assets/css/owl.css')}}">

</head>
<body>
    
    @yield('content') 


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Additional Scripts -->
    <script src="{{asset('homepage/assets/js/owl.js')}}"></script>
    <script src="{{asset('homepage/assets/js/accordations.js')}}"></script>
    <script src="{{asset('homepage/assets/js/main.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
  
            // navigation click actions 
            $('.scroll-link').on('click', function(event){
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop:0}, 'slow');         
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function (event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        // scroll function
        function scrollToID(id, speed){
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({scrollTop:targetOffset}, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() { }
            };
        }
    </script>
</body>
</html>