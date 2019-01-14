@extends('layouts.backend')

@section('content')


        <div class="element-wrapper">
            <div class="element-box">
                <form action="{{ url( '/send/cash' ) }}" method="POST">
                    @csrf
                    <div class="element-info">
                        <div class="element-info-with-icon">
                            <div class="element-info-icon">
                                <div class="os-icon os-icon-wallet-loaded"></div>
                            </div>
                            <div class="element-info-text">
                                <h5 class="element-inner-header">Send Cash</h5>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="level"> Level 1</label>

                    </div>

                    <div class="form-group">

                        <label for="amount"> Amount:</label>
                        <input class="form-control" 
                               name="amount"
                               value="250" 
                               readonly
                               placeholder="Amount" 
                               type="text">
                        @if ($errors->has('amount'))
                            <div class="help-block form-text text-muted form-control-feedback">
                                {{ $errors->first('amount') }}
                            </div>
                        @endif

                    </div>


                    <div class="form-buttons-w">
                        <button class="btn btn-primary btn-danger" type="submit"> Create Send Order</button>
                    </div>

                </form>
            </div>
        </div>
        


@endsection
