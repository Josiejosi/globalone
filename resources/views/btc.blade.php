@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-5">
            <div class="user-profile compact">
                <div class="up-head-w">

                    <div class="up-main-info">
                        <h2 class="up-header">{{ auth()->user()->name }} {{ auth()->user()->surname }}</h2>
                        <h6 class="up-sub-header">LEVEL {{ $level }}</h6></div>
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
                    <form action="{{ url( '/btc' ) }}" method="POST">
                        @csrf
                        <div class="element-info">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">BTC Settings</h5>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="btc_Address"> BTC Address</label>
                            <input class="form-control" 
                                   name="btc_Address"
                                   value="{{ auth()->user()->btc->address }}" 
                                   placeholder="BTC Address" 
                                   type="text">
                                    @if ($errors->has('btc_Address'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('btc_Address') }}
                                        </div>
                                    @endif

                        </div>


                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Change</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
