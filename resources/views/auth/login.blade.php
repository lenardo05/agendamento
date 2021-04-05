@extends('layouts.front')

@section('content')
  <div class="card login-card">
    <div class="row no-gutters">
      <div class="col-md-5">
        <img src="{{ asset('images/img_front.jpg') }}" alt="login" class="login-card-img">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <div class="brand-wrapper">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo">
          </div>
          <p class="login-card-description">Faça login em sua conta</p>
          <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Senha</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <button type="submit" class="btn btn-block login-btn mb-4">
                Login
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
