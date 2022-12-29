<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/autocomplete.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>

    <div id="main-wrapper">
        
        <!-- Header Section Start -->        
        @include('layouts.header')
        <!-- Header Section End -->

        <!-- Sidebar Section Start-->
        @include('layouts.sidebar')
        <!-- Sidebar Section End -->

        <!-- Main Section Start-->
        <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-12 align-self-center">
                    <h3 class="text-themecolor">@yield('page-title')</h3>
                </div>
            </div>

            <!-- Container Section Start -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Container Section End -->

            <!-- Footer Section Start-->
            @include('layouts.footer')
            <!-- Footer Section End-->
            
        </div>
        <!-- Main Section End-->

    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/js/waves.js')}}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.autocomplete.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <script type="text/javascript">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
        $(function() {
            @if(session('success'))        
                toastr.success("{{session('success')}}");
            @endif
            @if(session('error'))
                toastr.error("{{session('error')}}");                    
            @endif
        });

        function isOnlyNumber(evt) {
    
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

    </script>

    @yield('script')

</body>

</html>