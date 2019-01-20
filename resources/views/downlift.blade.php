@extends('layouts.backend')

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">Downliners( s )</h6>
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
                                            <th>Join Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ( count( $downliners ) > 0 )

                                            @foreach( $downliners as $downliner )

                                                <?php 
                                                    $user = \App\User::find( $downliner->downliner_id ) ;
                                                ?>

                                                <tr>
                                                    <td class="text-left">{{ $user->username }}</td>
                                                    <td class="text-left">{{ $user->name }} {{ $user->surname }}</td>
                                                    <td class="text-center">{{ $user->created_at }}</td>
                                                </tr>

                                            @endforeach

                                        @else

                                            <tr>
                                                <td class="text-center" colspan="3">No downliners.</td>
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
