@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0"> অন্যান্য সেবার আবেদনকারীগণের তালিকা  </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">আবেদন পত্র</li>
                <li class="breadcrumb-item active"> অন্যান্য সেবার আবেদনকারীগণের তালিকা  </li>
            </ol>
        </div>
    </div>

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:black; font-size: 20px;background:#40A291;text-align:center;"> অন্যান্য সেবার আবেদনকারীগণের তালিকা  </div>
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
                                            <th>সেবার ধরন</th>
                                            <th>মোবাইল </th>
                                            <th>আবেদনের তারিখ</th>
                                            <th>সার্টিফিকেট</th>
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
                    "url": "{{ route('othersAbedonIndex') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}"}
                },

                "columns": [
                    { "data": "id" },
                    { "data": "bname" },
                    { "data": "token" },
                    { "data": "serviceList" },
                    { "data": "mob" },
                    { "data": "created_at" },
                    { "data": "certificates" },
                ],
            });
        } );

    </script>
@endsection