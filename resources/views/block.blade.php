@extends('layouts.backend')

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">Users</h6>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ( count( $users ) > 0 )

                                            @foreach( $users as $user )

                                                @if ( ! $user->hasRole( 'admin' ) )

                                                    <tr>
                                                        <td class="text-left">{{ $user->username }}</td>
                                                        <td class="text-left">{{ $user->name }} {{ $user->surname }}</td>
                                                        <td class="text-center">{{ $user->created_at }}</td>
                                                        <td class="text-center">
                                                            @if ( $user->is_active === 1 )
                                                            <a href="{{ url( 'user/block/' ) }}/{{  $user->id  }}" class="btn btn-sm btn-danger">
                                                                <i class="os-icon os-icon-ui-49"></i> Block
                                                            </a>
                                                            @endif
                                                            @if ( $user->is_active === 0 )
                                                            <a href="{{ url( 'user/unblock/' ) }}/{{  $user->id  }}" class="btn btn-sm btn-danger">
                                                                <i class="os-icon os-icon-ui-49"></i> UnBlock
                                                            </a>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                @endif

                                            @endforeach

                                        @else

                                            <tr>
                                                <td class="text-center" colspan="6">No users.</td>
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



    <div class="modal" tabindex="-1" id="block-user-model" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BLock User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to block user? </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>

@endsection
