@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">

                <h3 class="element-header">Outgoing</h6>
                <div class="element-content">

                    <div class="table-responsive">
                        <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-lg table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Created Date</th>
                                                    <th>Amount</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ( count( $outgoing ) > 0 )

                                                    @foreach( $outgoing as $outcome )

                                                        <?php 
                                                            $receiver = \App\User::find( $outcome->receiver_id ) ;
                                                        ?>

                                                        <tr>
                                                            <td class="text-left">{{ $receiver->username }}</td>
                                                            <td class="text-left">{{ $receiver->name }} {{ $receiver->surname }}</td>
                                                            <td class="text-center">{{ $outcome->created_at }}</td>
                                                            <td class="text-center">R {{ $outcome->amount }}</td>
                                                            <td class="text-center">
                                                                @if ( $outcome->status == 0 )
                                                                <a href="{{ url( '/pay/' ) }}/{{ $outcome->id }}" class="btn btn-xs btn-success">
                                                                    <i class="os-icon os-icon-ui-49"></i> Pay
                                                                </a>
                                                                @endif 
                                                                @if ( $outcome->status == 1 )
                                                                Awaiting Approval
                                                                @endif 
                                                                @if ( $outcome->status == 2 )
                                                                Paid
                                                                @endif 
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                @else

                                                    <tr>
                                                        <td class="text-center" colspan="5">No outgoing transactions.</td>
                                                    </tr>

                                                @endif                                                                  

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>          

        </div>
    </div> 

@endsection

