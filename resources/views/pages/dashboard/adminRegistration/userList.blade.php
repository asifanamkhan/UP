@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="card mt-5">
        <div class="card-header text-center"><b>রোল এর তালিকা</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                <tr>
                    <th width="">ক্র.নং</th>
                    <th>ইউজারের নাম</th>
                    <th>রোল</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

@endsection
@section('script')
    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>

    <script>
        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('userListShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "role" },


            ]
        });

    </script>
@endsection