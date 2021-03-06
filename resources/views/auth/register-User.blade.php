@extends('main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4>{{ __('New User') }}</h4>
                    </div>
                    @if(Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="card-body">
                            @if(isset($user))
                                <form method="POST" action="{{ url('edit-User/'.$user->id) }}">
                                    <input type="hidden" value="{{ $user->id }}" name="userId" >
                            @else
                                 <form method="POST" action="{{ url('addUser') }}">
                            @endif
                            @csrf
                            <div class="row mb-3">
                                <label for="mrno" class="col-md-4 col-form-label text-md-end">{{ __('MR No') }}</label>
                                <div class="col-md-6">
                                    <input id="mrno" type="text" class="form-control @error('mrno') is-mandatory @enderror" name="mrno" value="{{ isset($user) ? $user->mr_no : old('mrno') }}" required autocomplete="mrno" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="designation" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                                <div class="col-md-6">
                                    <input id="designation" type="text" class="form-control @error('designation') is-mandatory @enderror" name="designation" value="{{ isset($user) ? $user->designation : old('designation') }}" required autocomplete="designation" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ isset($user) ? $user->password : '' }} required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ isset($user) ? $user->password : '' }} required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    @if(isset($user))
                                        <button type="submit" class="btn btn-warning">Update User</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
