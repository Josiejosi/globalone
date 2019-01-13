@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   

            <div class="col-md-10 col-md-offset-1">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8  col-md-offset-2">
                            <div class="panel panel-default text-center">
                                <div class="panel panel-heading"><h3>{{ __('Verify Email-Address') }}</h3></div>

                                <div class="panel-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }}, 

                                </div>

                                <div class="panel-footer">
                                    <p class="text-center">
                                        <a class="btn btn-success btn-lg" href="{{ route('verification.resend') }}">
                                            {{ __('click here to request another') }}
                                        </a>
                                    </p>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
