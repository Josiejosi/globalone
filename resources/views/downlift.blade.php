@extends('layouts.backend')

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">Down-lift( s )</h6>
        <div class="element-box">

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
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ( count( $orders ) > 0 )

                                            @foreach( $orders as $user )

                                                @if ( ! $user->hasRole( 'admin' ) )

                                                    @if ( $user->is_active === 0 )
                                                        @if ( $user->proof )

                                                        <tr>
                                                            <td class="text-left">{{ $user->username }}</td>
                                                            <td class="text-left">{{ $user->name }} {{ $user->surname }}</td>
                                                            <td class="text-center">{{ $user->created_at }}</td>
                                                            <td class="text-center">{{ $user->created_at }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ '/user/activate' }}/{{ $user->id }}" class="btn btn-sm btn-warning">
                                                                    <i class="os-icon os-icon-ui-49"></i> Activate
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        @endif
                                                        
                                                    @endif

                                                @endif

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
