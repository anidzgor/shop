@extends('layouts.app')

@section('content')
    <div class="mt-5">
            <p class="text-center">{{ __('Sign In') }}</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf

                <div class="form-group row">               
                    <div class="col-md-6 offset-md-3">
                        <input id="email" placeholder="E-Mail Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                         @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                         @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                         <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
            </form>        

            <div class="col-md-6 offset-md-3">
                <p>You dont't have a account yet?<a href="{{ route('register') }}"> Sign up</a></p>
            </div>
    </div>
@endsection
