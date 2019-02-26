@extends('layouts.backend')

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">My Structure</h6>
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
                                            <th>Level</th>
                                            <th>Phone</th>
                                            <th>Join Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ( count( $downliners ) > 0 )

                                            @foreach( $downliners as $downliner )

                                                <tr>
                                                    <td class="text-left">{{ $downliner["name"] }}</td>
                                                    <td class="text-left"><b>Level {{ $downliner["level"] }}</b></td>
                                                    <td class="text-left"><b>{{ $downliner["phone"] }}</b></td>
                                                    <td class="text-center"><small>{{ $downliner["join"] }}</small></td>
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
