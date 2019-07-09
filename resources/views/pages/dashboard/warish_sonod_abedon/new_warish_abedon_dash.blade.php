@extends('layouts.dashboard_layout.master')
@section('content')

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ওয়ারিশ আবেদনকারীগণের তালিকা</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                        <thead>
                                        <tr>
                                            <th width="">ক্রমিক নং</th>
                                            <th>নাম</th>
                                            <th>ট্র্যাকিং নং</th>
                                            <th>সরবরাহের ধরণ</th>
                                            <th>মোবাইল </th>
                                            <th>আবেদনের তারিখ</th>
                                            <th>সার্টিফিকেট</th>
                                            {{--<th>অপসন</th>--}}
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <!--<script type="text/javascript" src="datatables/js/jquery-1.11.3.min.js"></script>--->
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js
')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100,200,300, -1], [ 25, 50,100,200,300, "All"]],

                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('NewWarishAbedonIndex') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}"}
                },

                "columns": [
                    { "data": "id" },
                    { "data": "bname" },
                    { "data": "token" },
                    { "data": "delivery_type" },
                    { "data": "mob" },
                    { "data": "created_at" },
                    { "data": "certificates" },
                ],
            });
        } );



    </script>




@endsection