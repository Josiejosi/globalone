@extends('layouts.backend')

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">Up-lift( s )</h6>
        <div class="element-box">

            <div class="table-responsive">
                <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-lg table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Member</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ( count( $orders ) > 0 )

                                            @foreach( $orders as $order )

                                                <tr>
                                                    <td class="text-left">{{ $order->order_number }}</td>
                                                    <td class="text-left">R {{ $order->amount }} ZAR</td>
                                                    <td class="text-center">{{ $order->created_at }}</td>
                                                    <td class="text-center">Not assigned</td>
                                                    <td class="text-center">
                                                        <span class="label label-waring">Pending</span>
                                                    </td>
                                                </tr>

                                            @endforeach

                                        @else

                                            <tr>
                                                <td class="text-center" colspan="5">You have no transactions.</td>
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

@endsection
