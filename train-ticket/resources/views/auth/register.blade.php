<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body style="background-color: #334361;">
    <div class="container py-5 h-100 mb-5 mb-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src='{{ asset('frontend/images/login_image.jpg') }}' alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Create your account
                                    </h5>

                                    <div class="form-outline mb-2">
                                        <input type="text" id="fname" name="fname" class="form-control form-control" placeholder="First Name" value="{{ old('fname') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="text" id="lname" name="lname" class="form-control form-control" placeholder="Last Name" value="{{ old('lname') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="text" id="nic" name="nic" class="form-control form-control" placeholder="NIC" value="{{ old('nic') }}" />
                                    </div>


                                    <div class="form-outline mb-2">
                                        <input type="tel" id="phone" name="phone" class="form-control form-control" placeholder="Phone" value="{{ old('phone') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="text" id="city" name="city" class="form-control form-control" placeholder="City" value="{{ old('city') }}" />
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="email" id="email" name="email" class="form-control form-control" placeholder="Email" value="{{ old('email') }}" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="password" id="password" name="password" class="form-control form-control" placeholder="Password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control" placeholder="Confirm Password" />
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <div class="text-danger">{{ $error }}</div>
                                    @endforeach
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                    </div>
{{--                                    @if($errors->has())--}}

{{--                                    @endif--}}
                                    <p class="mb-1 pb-lg-2" style="color: #393f81;">Do have an account? <a
                                            href='{{ route('login') }}' style="color: #393f81;">Login here</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mb-0 text-center fixed-bottom text-white" style="background-color: #121212;">
        <div class="container "></div>
        <!-- Copyright -->
        <div class="text-center p-3 mt-3" style="background-color: #121212;">
            © 2023 Copyright:
            <a class="text-white">E-Train</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>
