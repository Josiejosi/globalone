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
                                <div class="value">R {{ round( (float) $incoming_sum, 2 ) }} ZAR</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Funds Received</div>
                                <div class="value">R {{ round( (float) $outgoing_sum, 2 ) }} ZAR</div>
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
