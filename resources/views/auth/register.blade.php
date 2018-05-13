@extends('layouts.app')

@section('content')

<div class="card mt-5">
<h2 class="text-center">{{ __('Register') }}</h2>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <input id="name" placeholder="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <input id="email" placeholder="E-Mail Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
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
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('sidebar')
  <div class="card bg-light p-3 mt-5">
    <h3 class="text-center">Join to us!</h3>
      <img src="{{url('/images/welcome.jpg')}}" class="register-banner" />
  </div>
@endsection
