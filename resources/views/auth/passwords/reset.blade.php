<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }} - Reset Password</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form id="password_resetform" name="password_resetform" action="{{ route('password.update') }}" method="POST">
                    @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-body">
                            <h3 class="card-title">Reset Password</h3>
                            <hr>
                            <div class="row p-t-10">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="control-label">Email<span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Password<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset Password</button>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div><a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a> / <a href="{{ route('register') }}" class="text-info m-l-5"><b>Sign Up</b></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/js/waves.js')}}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

        $("form[name='password_resetform']").validate({
            ignore: [],
            rules: 
            {
                email:"required",
                password: {
                    required: true,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                }
            },
            messages: 
            {
                email:'Please enter email.',
                password: {
                    required: 'Password is required',
                },
                password_confirmation: {
                    required: 'Confirm password is required.',
                    equalTo:"Password and Confirm password must match."
                }
            }
        });

    </script>

</body>

</html>