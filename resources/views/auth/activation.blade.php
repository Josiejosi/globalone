@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   

            <div class="col-md-8  col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel panel-heading">{{ __('Activate Account') }}</div>

                    <div class="panel-body">
                        <div class="alert alert-warning alert-important" role="alert">
                            <b>Note</b>: You need to send proof of activation, to proceed.
                        </div>
                        @if ( session('success') )
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ( session('error') )
                            <div class="alert alert-success" role="alert">{{ session('error') }}</div>
                        @endif

                            <div class="col-md-6 col-md-offset-3">

                                <form method="POST" action="{{ url( '/account/activation' ) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" 
                                            name="username" 
                                            value="{{ auth()->user()->username, '' }}" 
                                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                            placeholder="username or email-address proof-of-activation">

                                        @if ($errors->has('username'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="proof_of_activation">Proof of payment</label>
                                        <input type="file" 
                                            name="proof_of_activation" 
                                            class="form-control{{ $errors->has('proof_of_activation') ? ' is-invalid' : '' }}" 
                                            placeholder="Upload your proof of payment here.">
                                        @if ($errors->has('proof_of_activation'))
                                            <span class="error" role="alert">
                                                <strong>{{ $errors->first('proof_of_activation') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-lg">{{ __('click here to activate') }}</button>.
                                    </div>
                                </form>

                            </div>

                    </div>

                        <div class="panel panel-default">

                            <!-- Default panel contents -->
                            <div class="panel-heading">BANKING DETAILS</div>
                            <div class="panel-body">
                                <div class="alert alert-info alert-important">Use your username from registration as reference</div>
                                <table class="table">

                                    <tbody>
                                        <tr><td class="text-right">Amount:</td><td class="text-left"><b>R 250 ZAR OR $ 18 USD</b></td></tr>
                                        <tr><td class="text-right">Bank:</td><td class="text-left">ABSA</td></tr>
                                        <tr><td class="text-right">Account #:</td><td class="text-left">000000000000</td></tr>
                                        <tr><td class="text-right">Branch Code:</td><td class="text-left">00000</td></tr>
                                        <tr><td class="text-right">Branch Name:</td><td class="text-left">Branch</td></tr>
                                        <tr><td class="text-right">Reference #:</td><td class="text-left">Username or email-address</td></tr>
                                    </tbody>
                                </table>
                            </div>
                             <!-- Default panel contents -->
                            <div class="panel-heading">Crypto currency details</div>
                            <div class="panel-body">
                                <div class="alert alert-info alert-important">Use your username from registration as reference</div>
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <td class="text-right">BITCOIN ADDRESS:</td>
                                            <td class="text-left">1C9Nq69ZNNSL17GKrGRiTEyYLcpsoM5z47</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">BITCOIN ADDRESS:</td>
                                            <td class="text-left">0x7F2f507A0E26bFDEB5C692015A547F673bd211cd</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                                   

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
