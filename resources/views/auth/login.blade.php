


<?php if(Auth::guest()){ ?>
{{-- @extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html>
<head>
  <title>Sokun</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">

  <link rel="stylesheet" type="text/css" href="{{asset('css/loginform.css')}}">
  <style>

        @import url('https://fonts.googleapis.com/css?family=Roboto');
        
        body {
            font-family: 'Roboto', sans-serif;
            background: url({{asset('images/mountain.png')}}) no-repeat center center fixed;
            background-size: cover;
        }
        .modal-content {
            border:1px solid #007bff;
            right: -18%;
            margin-top: 140px;
            box-shadow: 3px 3px 5px white;
            background-color:rgba(255,255,255,0.6);;
            opacity: .8;
            padding: 0 18px;
            border-radius: 10px;
        }
        #email,#password{
            border:1px solid #007bff;
        }

        </style>

</head>
<body>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
        <img src="{{asset('images/logoo.png')}}">
        </div>

        <div class="col-12 form-input">
          <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form-group">
                    <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
                    <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <button type="submit" class="btn  btn-sm btn-primary">Login</button>
          </form>
        </div>

        <div class="col-12 forgot">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <a class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
        </div>

      </div>
    </div>
  </div>

    


</body>
</html>
<?php } ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@if($user = Auth::user())
        <div class="row">
            <div class="col col-md-3"></div>
            <div style="margin-top:10%;"  class="col col-md-6">
                <img style="height:150px; margin-left:38%;" src="{{asset('images/checkmark.png')}}" alt="">
                 <h1 class="text-center">You are already login!!</h1>
                 <a style="margin-left:38%; font-weight:600;" href="{{route('campaign.index')}}"><button style="font-weight:600;" class="btn btn-primary">Back to homepage</button></a>
            </div>
            <div class="col col-md-3"></div>
    </div>

 @endif
    