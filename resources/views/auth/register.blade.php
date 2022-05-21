<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

</head>

<body style="background-image: url({{asset('assets/images/bg-pattern-light.svg')}})" class="loading authentication-bg" data-layout-config='{"darkMode":false}' data-layout-color="dark">

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign Up</h4>
                        </div>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="fullname" placeholder="Enter your name" value="{{old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" id="emailaddress" value="{{old('email')}}" placeholder="Enter your email">
                                @error('email')
                                <div class="invalid-feedback d-block">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password"  name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password"  name="password_confirmation" id="password" class="form-control " placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                            </div>

                        </form>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white">Already have account? <a href="{{route('login')}}" class="text-warning ms-1"><b>Log In</b></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer footer-alt text-white">
    <script>document.write(new Date().getFullYear())</script> © {{getenv('CUSTOM_SITE_NAME')}}
</footer>
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>
</html>


