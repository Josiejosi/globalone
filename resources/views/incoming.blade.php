@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-sm-12">

            <div class="element-wrapper">

                <h3 class="element-header">Incoming</h6>
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

                                                @if ( count( $incoming ) > 0 )

                                                    @foreach( $incoming as $income )

                                                        <?php 
                                                            $sender = \App\User::find( $income->sender_id ) ;
                                                        ?>

                                                        <tr>
                                                            <td class="text-left">{{ $sender->username }}</td>
                                                            <td class="text-left">{{ $sender->name }} {{ $sender->surname }}</td>
                                                            <td class="text-center">{{ $income->created_at }}</td>
                                                            <td class="text-center">R {{ $income->amount }}</td>
                                                            <td class="text-center">
                                                                @if ( $income->status == 1 )
                                                                <a href="{{ url( '/approve/' ) }}/{{ $income->id }}" class="btn btn-xs btn-success">
                                                                    <i class="os-icon os-icon-ui-49"></i> Approve
                                                                </a>
                                                                @endif 
                                                                @if ( $income->status == 0 )
                                                                Pending Payment
                                                                @endif 
                                                                @if ( $income->status == 2 )
                                                                Paid
                                                                @endif 
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                @else

                                                    <tr>
                                                        <td class="text-center" colspan="5">No incoming transactions.</td>
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
