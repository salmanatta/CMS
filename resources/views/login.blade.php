{{--@extends('main')--}}
@include('template.header')
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="main d-flex justify-content-center w-100">
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="loginDashobard" method="post">
                                        @if( Session::get('Fail'))
                                            <div style="text-align: center">
                                                <span class="text-danger">{{ Session::get('Fail') }}</span>
{{--                                                <alert class="alert alert-danger"></alert>--}}
{{--                                                {{ Session::get('Fail') }}--}}
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">User Name</label>
                                            <input class="form-control form-control-lg" type="text" name="uname" value="{{ old('uname') }}" placeholder="Enter your User Name">
                                            <span class="text-danger">{{ $errors->first('uname') }}   </span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password">
                                            <span class="text-danger">{{ $errors->first('password') }}   </span><br>
                                            <small>
                                                <a href="pages-reset-password.html">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <div class="form-check align-items-center">
                                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked="">
                                                <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary ">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
