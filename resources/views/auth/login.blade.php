@extends('backend.layouts.auth')
@section('title','Login')
@section('content')
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
        </div>
        <div class="card">
            <div class="body">
                <p class="lead">Login</p>
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email Address }}</label>
                        <input type="email" class="form-control round @error('email') is-invalid @enderror" name="email" id="signin-email"  placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control round @error('password') is-invalid @enderror" name="password" id="signin-password"  placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remeber me</span>
                        </label>								
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">Login</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password</a></span>
                        {{-- <span>Don't have an account? <a href="page-register.html">Register</a></span> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>

@endsection
