@extends('frontend.layout.app')

@section('title')
    Register Page
@endsection

@section('content')

<main class="container py-5">
    <div class="page-header mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fi-rs-home mr-2"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="h4 mb-4">Create an Account</h1>
                            <p class="mb-4">Already have an account? <a href="{{ route('home.login') }}">Login</a></p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('success_message') }}
                                </div>
                            @endif

                            <form action="/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" required name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" required name="email" id="email" placeholder="Email">
                                    <div id="emailError" class="text-danger mt-2"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" required name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" class="form-control" required name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                                    <div id="passwordError" class="text-danger mt-2"></div>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" required name="dob" id="dob">
                                    <div id="dobError" class="text-danger mt-2"></div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" required name="phone" id="phone" placeholder="Phone">
                                    <div id="phoneError" class="text-danger mt-2"></div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                            
                                    <textarea  class="form-control" required name="address" id="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" class="form-control" required name="pincode" id="pincode" placeholder="Pincode">
                                </div>
                                <div class="form-group">
                                    <label for="city">Area</label>
                                    <input type="text" class="form-control" required name="area" id="area" placeholder="area" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="city">District</label>
                                    <input type="text" class="form-control" required name="district" id="district" placeholder="district" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" required name="city" id="city" placeholder="city" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" required name="state" id="state" placeholder="state" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" required name="country" id="country" placeholder="Country" disabled>
                                </div>
                               
                             
                                <div class="form-group mb-4">
                                    <label for="captcha">Security Code</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Security code *">
                                        <span class="security-code ml-2">
                                            <b class="text-primary">8</b>
                                            <b class="text-danger">6</b>
                                            <b class="text-warning">7</b>
                                            <b class="text-success">5</b>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" required name="payment_option" id="customer" value="customer" checked>
                                        <label class="form-check-label" for="customer">I am a donar</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" required name="payment_option" id="vendor" value="vendor">
                                        <label class="form-check-label" for="vendor">I am a paitent</label>
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" name="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">I agree to terms &amp; Policy. <a href="page-privacy-policy.html">Learn more</a></label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Submit &amp; Register</button>

                                <p class="font-xs text-muted mt-3"><strong>Note:</strong> Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="card mt-4">
                        <div class="card-body">
                            <a href="#" class="btn btn-outline-primary btn-block mb-2">
                                <img src="{{ asset('frontend/imgs/theme/icons/logo-facebook.svg') }}" alt="Facebook" class="mr-2">
                                Continue with Facebook
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-block mb-2">
                                <img src="{{ asset('frontend/imgs/theme/icons/logo-google.svg') }}" alt="Google" class="mr-2">
                                Continue with Google
                            </a>
                            <a href="#" class="btn btn-outline-dark btn-block">
                                <img src="{{ asset('frontend/imgs/theme/icons/logo-apple.svg') }}" alt="Apple" class="mr-2">
                                Continue with Apple
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
