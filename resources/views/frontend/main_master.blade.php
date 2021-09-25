<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">

    <title>{{ \App\Models\Setting::find(1)->title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/templatemo-stand-blog.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
    <!--

    TemplateMo 551 Stand Blog

    https://templatemo.com/tm-551-stand-blog

    -->
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

@include('frontend.layout.header')


@yield('content')

@include('frontend.layout.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Additional Scripts -->
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.js')}}"></script>
<script src="{{asset('frontend/assets/js/accordions.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))



    <script>
        Swal.fire(
            'Success',
            "{{session('success')}}",
            'success'
        )
    </script>

@endif
<script>
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

</body>
</html>
