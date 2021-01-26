@extends('layouts.app')

@section('content')
<div class="row vh-100 d-flex justify-content-center">
    <div class="col-12 align-self-center">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-body p-0 auth-header-box">
                        <div class="text-center p-3">
                            <a href="{{ url('/') }}" class="logo logo-admin">
                                <img src="{{ asset('assets/images/tau-logo.png') }}" height="50" alt="logo" style="-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);" class="auth-logo">
                            </a>
                            <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Let's Get Started</h4>
                            <p class="text-muted  mb-0">Sign in to continue</p>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav-border nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                            </li>
                        </ul>
                         <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                                <form class="form-horizontal auth-form" method="POST" action="{{ route('login.attempt') }}">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" placeholder="Enter Email" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group mb-2">
                                        <label for="userpassword">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!--end form-group-->

                                    <div class="form-group row my-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->

                            </div>
                        </div>
                    </div><!--end card-body-->
                    <div class="card-body bg-light-alt text-center">
                        <span class="text-muted d-none d-sm-inline-block">Thomas Adewumi University © {{ date('Y') }}</span>
                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end col-->
</div><!--end row-->
@endsection
