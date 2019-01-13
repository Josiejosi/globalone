@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="row">

                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default text-center">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="panel-heading"><h3>Login</h3></div>

                            <div class="panel-body">


                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-right">{{ __('E-Mail Address / Username') }}: </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} field-inner" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-right">{{ __('Password') }}: </label>

                                    <div class="col-md-6">
                                        <input id="password" 
                                                type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} field-inner" 
                                                name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       name="remember" 
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="panel-footer">
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="thm-btn">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
