@extends('layouts.backend')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/css/jquery.orgchart.min.css" rel="stylesheet">
    <style>
        .orgchart {
            background-image: none !important ;
        }
    </style>
@endsection

@section('content')

    <div class="element-wrapper">
        <h6 class="element-header">My Structure</h6>
        <div class="element-box">

            <div class="table-responsive">
                <div id="chart-container"></div>
            </div>
            
        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.3/js/jquery.orgchart.min.js"></script>

    <script>
        
        $( function() {
            $.getJSON('/member/structure', function(data) {
                console.log(data) ;

                var oc = $('#chart-container').orgchart({
                  'data' : data,
                  'nodeContent': 'phone'
                });

            }) ;
        }) ;

    </script>
@endsection
