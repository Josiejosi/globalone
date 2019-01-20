@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">

                <h3 class="element-header">Dashboard</h3>
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-4">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Funds Send</div>
                                <div class="value">R {{ round( (float) 0, 2 ) }} ZAR</div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Withdrawn Funds</div>
                                <div class="value">R {{ round( (float) 0, 2 ) }} ZAR</div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Funds Received</div>
                                <div class="value">R {{ round( (float) 0, 2 ) }} ZAR</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>          

        </div>
    </div> 
    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">

                <h5 class="element-header">Referral</h5>
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-box el-tablo">
                                <div class="label">Send this link to your friends:</div>
                                <h5>{{ url('/') }}/member/{{ auth()->user()->username }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          

        </div>
    </div>            
    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="btn btn-info btn-block btn-lg" href="{{ url( '/receive/cash' ) }}">
                                <div class="label">Withdraw</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#upgrade-model" >
                                <div class="label">Upgrade</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 

        </div>
    </div>

    <div class="modal" tabindex="-1" id="upgrade-model" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upgrade a level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to upgrade? </h5>
                    <p>This action will find a member to assign to you</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ url( '/upgrade' ) }}" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>

@endsection
