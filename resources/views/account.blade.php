@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-5">
            <div class="user-profile compact">
                <div class="up-head-w">

                    <div class="up-main-info">
                        <h2 class="up-header">{{ auth()->user()->name }} {{ auth()->user()->surname }}</h2>
                        <h6 class="up-sub-header">LEVEL {{ $build["level"] }}</h6></div>
                    <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                            <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                        </g>
                    </svg>
                </div>

                <div class="up-contents">
                    <div class="m-b">
                        <div class="row m-b">
                            <div class="col-sm-6 b-r b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">0</div>
                                    <div class="label">Upliners</div>
                                </div>
                            </div>
                            <div class="col-sm-6 b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">0</div>
                                    <div class="label">Downliners</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="element-wrapper">
                <div class="element-box">
                    <form action="{{ url( '/account' ) }}" method="POST">
                        @csrf
                        <div class="element-info">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">Account Settings</h5>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="bank_name"> Bank Name</label>
                            <input class="form-control" 
                                   name="bank_name"
                                   value="{{ auth()->user()->account->bank_name }}" 
                                   placeholder="Bank Name" 
                                   type="text">
                                    @if ($errors->has('bank_name'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('bank_name') }}
                                        </div>
                                    @endif

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label for="account_holder"> Account Holder</label>
                                    <input class="form-control" 
                                           name="account_holder" 
                                           placeholder="Password"
                                           value="{{ auth()->user()->account->account_holder }}" 
                                           type="text">
                                    @if ($errors->has('account_holder'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('account_holder') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label for="account_number">Account Number</label>
                                    <input class="form-control" 
                                           placeholder="account_number"
                                           value="{{ auth()->user()->account->account_number }}"  
                                           name="account_number" 
                                           type="text">

                                    @if ($errors->has('account_number'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('account_number') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="account_type"> Bank Name</label>
                            <input class="form-control" 
                                   name="account_type"
                                   value="{{ auth()->user()->account->account_type }}" 
                                   placeholder="Account Type" 
                                   type="text">
                                    @if ($errors->has('account_type'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('account_type') }}
                                        </div>
                                    @endif

                        </div>

                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
