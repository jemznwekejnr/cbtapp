@extends('layouts.app')

@section('content')
<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">{{ __('Reset Password') }}</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <!--<li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>-->
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page ">
    <div class="full-page login-page section-image" filter-color="black" data-image="{{ asset('assets/img/cbt.jpg') }}">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="content">
        <div class="container">
          <div class="col-md-4 ml-auto mr-auto">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="card card-login card-plain">
    <div class="card-header ">
      <div class="logo-container">
        <img src="{{ asset('assets/img/cbtlogo.png') }}" alt="">
        <h3 style="color:#fff;"><strong>CBT</strong></h3>
      </div>
    </div>
    <div class="card-body ">
      <div class="input-group no-border form-control-lg">
        <span class="input-group-prepend">
          <div class="input-group-text">
            <i class="now-ui-icons users_circle-08"></i>
          </div>
        </span>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email...">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
    </div>
    <div class="card-footer ">
        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mb-3">
            {{ __('Send Password Reset Link') }}
        </button>
      
      <div class="pull-left">
        <h6>
          <!--<a href="{{ route('register') }}" class="link footer-link">Create Account</a>-->
        </h6>
      </div>
      <div class="pull-right">
        <h6>
          <a href="{{ route('login') }}" class="link footer-link">Log in</a>
        </h6>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>
@endsection
