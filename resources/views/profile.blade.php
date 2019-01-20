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
                    <form action="{{ url( '/profile' ) }}" method="POST">
                        @csrf
                        <div class="element-info">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">Profile Settings</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label for="name"> Name</label>
                                    <input class="form-control" 
                                           name="name" 
                                           placeholder="Name"
                                           value="{{ auth()->user()->name }}" 
                                           type="text">
                                    @if ($errors->has('name'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label for="surname">Surname</label>
                                    <input class="form-control" 
                                           placeholder="surname"
                                           value="{{ auth()->user()->surname }}"  
                                           name="surname" 
                                           type="text">

                                    @if ($errors->has('surname'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('surname') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="account_type"> Phone</label>
                            <input class="form-control" 
                                   name="phone"
                                   value="{{ auth()->user()->phone }}" 
                                   placeholder="Phone" 
                                   type="text">
                                    @if ($errors->has('phone'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif

                        </div>

                        <div class="form-group">

                            <label for="account_type"> Country</label>
                            <input class="form-control" 
                                   name="country"
                                   value="{{ auth()->user()->country }}" 
                                   placeholder="Country" 
                                   type="text">
                                    @if ($errors->has('country'))
                                        <div class="help-block form-text text-muted form-control-feedback">
                                            {{ $errors->first('country') }}
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
