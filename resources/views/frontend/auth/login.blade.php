@extends('frontend.layout.app')

@section('title')
    Login Page
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
                <div class="col-lg-6 d-none d-lg-block">
                    <img class="img-fluid rounded" src="{{ asset('frontend/imgs/page/login-1.png') }}" alt="Login Image">
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="h4 mb-4">Login</h1>
                            <p class="mb-4">Don't have an account? <a href="{{ route('home.register') }}">Create here</a></p>
                            <form action="/authenticate" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" required name="email" placeholder="Username or Email *">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required name="password" placeholder="Your password *">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="text" class="form-control" name="captcha" placeholder="Security code *">
                                        <span class="security-code ml-2">
                                            <b class="text-primary">8</b>
                                            <b class="text-danger">6</b>
                                            <b class="text-warning">7</b>
                                            <b class="text-success">5</b>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <a class="text-muted" href="{{ route('home.forget_password') }}">Forgot password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Log in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
