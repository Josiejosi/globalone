@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                       <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="panel-heading">
                            <h3>Register</h3>
                        </div>

                        <div class="panel-body">

                            <div class="form-group row">
                                <label for="upliter" class="col-md-4 col-form-label text-right">{{ __('Uplifter') }}:</label>

                                <div class="col-md-6">
                                    <input id="upliter" type="text" readonly class="form-control{{ $errors->has('upliter') ? ' is-invalid' : '' }}" name="upliter" value="{{ $upliter }}" required>

                                    @if ($errors->has('upliter'))
                                        <span class="danger" role="alert">
                                            <strong>{{ $errors->first('upliter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">{{ __('Name') }}:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-right">{{ __('Surname') }}:</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required>

                                    @if ($errors->has('surname'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-right">{{ __('Phone') }}:</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-right">{{ __('Country') }}:</label>

                                <div class="col-md-6">
                                    <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>

                                    @if ($errors->has('country'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-right">{{ __('E-Mail Address') }}:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_name" class="col-md-4 col-form-label text-right">{{ __('Bank Name') }}:</label>

                                <div class="col-md-6">
                                    <input id="bank_name" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="bank_name" value="{{ old('bank_name') }}" required>

                                    @if ($errors->has('bank_name'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('bank_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_holder" class="col-md-4 col-form-label text-right">{{ __('Account Holder') }}:</label>

                                <div class="col-md-6">
                                    <input id="account_holder" type="text" class="form-control{{ $errors->has('account_holder') ? ' is-invalid' : '' }}" name="account_holder" value="{{ old('account_holder') }}" required>

                                    @if ($errors->has('account_holder'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('account_holder') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_number" class="col-md-4 col-form-label text-right">{{ __('Account Number') }}:</label>

                                <div class="col-md-6">
                                    <input id="account_number" type="text" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" value="{{ old('account_number') }}" required>

                                    @if ($errors->has('account_number'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('account_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="account_type" class="col-md-4 col-form-label text-right">{{ __('Account Type') }}:</label>

                                <div class="col-md-6">
                                    <input id="account_type" type="text" class="form-control{{ $errors->has('account_type') ? ' is-invalid' : '' }}" name="account_type" value="{{ old('account_type') }}" required>

                                    @if ($errors->has('account_type'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('account_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-right">{{ __('Username') }}:</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}">

                                    @if ($errors->has('username'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label  text-right">{{ __('Password') }}:</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="error" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label  text-right">{{ __('Confirm Password') }}:</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer text-center">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="thm-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection
