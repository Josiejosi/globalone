@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">

                <h3 class="element-header">Dashboard</h3>
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Funds Send</div>
                                <div class="value">R {{ round( (float) $outgoing_sum, 2 ) }} ZAR</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Funds Received</div>
                                <div class="value">R {{ round( (float) $incoming_sum, 2 ) }} ZAR</div>
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

                <h5 class="element-header">Upgrade</h5>
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-8 col-offset-2">
                            @if ( $incoming_sum == 750 && $build["level"] === 2 )

                                <a class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#upgrade-model">upgrade</a>

                            @elseif ( $incoming_sum == 750 && $build["level"] === 1 )

                                <a class="btn btn-success btn-block btn-lg" href="{{ url( '/upgrade' ) }}">Upgrade</a>

                            @elseif ( $incoming_sum == 1500 && $build["level"] === 2 )

                                <a class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#upgrade-model">upgrade</a>

                            @elseif ( $incoming_sum == 3000 && $build["level"] === 2 )

                                <a class="btn btn-success btn-block btn-lg" href="{{ url( '/upgrade' ) }}">Upgrade</a>

                            @elseif ( $incoming_sum == 3000 && $build["level"] === 3 )

                                <a class="btn btn-success btn-block btn-lg" href="{{ url( '/upgrade' ) }}">Start from Level 1</a>

                            @else

                                <a class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#already-model">upgrade</a>
                                
                            @endif
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

    @if ( count( $incoming ) > 0 )

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-lg table-v2 table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center" colspan="4">{{ count( $incoming ) }} Recent incoming transactions.</td>
                        </tr>

                        @foreach( $incoming as $income )

                            @if ( $income->status == 1 )

                            <?php 
                                $sender = \App\User::find( $income->sender_id ) ;
                            ?>

                            <tr>
                                <td class="text-left">{{ $sender->username }}</td>
                                <td class="text-left">{{ $sender->name }} {{ $sender->surname }}</td>
                                <td class="text-center">R {{ $income->amount }}</td>
                                <td class="text-center">
                                    @if ( $income->status == 1 )
                                    <a href="{{ url( '/approve/' ) }}/{{ $income->id }}" class="btn btn-xs btn-success">
                                        <i class="os-icon os-icon-ui-49"></i> Approve
                                    </a>
                                    @endif 
                                </td>
                            </tr>

                            @endif

                        @endforeach                                                                 

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    @endif

    @if ( count( $outgoing ) > 0 )

        @foreach( $outgoing as $outcome )

            @if ( $outcome->status == 0 )

            <?php 
                $upliner = \App\User::find( $outcome->receiver_id ) ;
            ?>

            <div class="row">
                <div class="col-sm-12">

                    <div class="element-wrapper">

                        <h5 class="element-header">Upliner Banking Details</h5>
                        <div class="element-content">
                            <div class="row">

                                <div class="alert alert-warning alert-important" role="alert">
                                    <b>Note</b>: You need to send proof of payment, to proceed.
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
                                                placeholder="username or email-address proof-of-payment">

                                            <input type="hidden" 
                                                name="receiver_id" 
                                                value="{{ $upliner->id }}">

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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-box el-tablo">
                                        <table class="table">

                                            <tbody>
                                                <tr><td class="text-right">Amount:</td><td class="text-left">
                                                    <b>R {{ $outcome->amount }} ZAR</b>
                                                </td></tr>
                                                <tr><td class="text-right">Username:</td><td class="text-left">{{ $upliner->username }}</td></tr>
                                                <tr><td class="text-right">Name:</td><td class="text-left">{{ $upliner->name }} {{ $upliner->surname }}</td></tr>
                                                <tr><td class="text-right">Bank:</td><td class="text-left">{{ $upliner->account->bank_name }}</td></tr>
                                                <tr><td class="text-right">Account #:</td><td class="text-left">{{ $upliner->account->account_number }}</td></tr>
                                                <tr><td class="text-right">Account Type:</td><td class="text-left">{{ $upliner->account->account_type }}</td></tr>
                                                <tr><td class="text-right">BITCOIN ADDRESS:</td><td class="text-left">{{ $upliner->btc->address }}</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          

                </div>
            </div> 

             @endif 

        @endforeach 

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered table-lg table-v2 table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="text-center" colspan="4">{{ count( $outgoing ) }} Recent outgoing transactions.</td>
                        </tr>

                        @foreach( $outgoing as $outcome )

                            @if ( $outcome->status == 0 )

                            <?php 
                                $receiver = \App\User::find( $outcome->receiver_id ) ;
                            ?>

                            <tr>
                                <td class="text-left">{{ $receiver->username }}</td>
                                <td class="text-left">{{ $receiver->name }} {{ $receiver->surname }}</td>
                                <td class="text-center">R {{ $outcome->amount }}</td>
                                <td class="text-center">
                                    @if ( $outcome->status == 0 )
                                    <a href="{{ url( '/pay/' ) }}/{{ $outcome->id }}" class="btn btn-xs btn-success">
                                        <i class="os-icon os-icon-ui-49"></i> Pay
                                    </a>
                                    @endif 
                                </td>
                            </tr>

                             @endif 

                        @endforeach                                                                

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    @endif


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
                    <h5>You can only upgrade when your funds are fully confirmed? </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="already-model" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Already Upgraded</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>You have already upgraded to this level? </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
