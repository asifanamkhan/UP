@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor mb-0 mt-0"></h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">অন্যান্য সেবাসমূহ</li>
                <li class="breadcrumb-item active">প্রত্যয়ন পত্র</li>
            </ol>
        </div>
    </div>

    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading" style=" color:black; font-size: 20px;background:#40A291;text-align:center;">প্রত্যয়ন পত্র</div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">
                        <div class="col-md-3 mt-4 mb-4">
                            <input type="date" class="form-control" id="inputDate" >
                        </div>
                        <div class="col-md-1 mt-4">
                            <button class="btn btn-info" id="inputBtn" value="5">Search </button>
                        </div>

                        <div class="col-md-3"></div>
                        <div class="col-md-5 mt-4">
                            <button value="2" class="btn btn-success days_filter" >সর্বশেষ দুই দিন</button>
                            <button value="7"  class="btn btn-primary days_filter" >সর্বশেষ এক সপ্তাহ</button>
                            <button value="30" class="btn btn-warning days_filter" >সর্বশেষ এক মাস</button>
                            <button value="1" class="btn btn-secondary days_filter" >সকল সনদ</button>
                        </div>
                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                        <thead>
                                        <tr>
                                            <th width="">ক্রমিক নং</th>
                                            <th>নাম</th>
                                            <th>ট্র্যাকিং নং</th>
                                            <th>সনদ নং</th>
                                            <th>সরবরাহের ধরণ</th>
                                            <th>মোবাইল </th>
                                            <th>জেনারেট তারিখ</th>
                                            <th>সার্টিফিকেট</th>
                                            <th>মানি রিসিট</th>
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

            load_data(1);

            function load_data(is_days){

                $('#example'). DataTable( {
                    "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

                    "processing": true,
                    "serverSide": true,
                    "bInfo": false,
                    "language": {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                    "ajax":{
                        "url": "{{ route('prottyonAbedon') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data":{ _token: "{{ csrf_token() }}",is_days:is_days,serveList:7}

                    },

                    "columns": [
                        { "data": "id" },
                        { "data": "bname" },
                        { "data": "token" },
                        { "data": "id" },
                        { "data": "delivery_type" },
                        { "data": "mob" },
                        { "data": "created_at" },
                        { "data": "certificates" },
                        { "data": "money_receipt" },
                    ],
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        var json = api.ajax.json();


                        // two = json.two;
                        // console.log(two);

                    },
                });
            }

            $(document).on('click', '.days_filter', function(){
                var no_of_days = $(this).val();
                console.log(no_of_days);
                $('#example').DataTable().destroy();
                if(no_of_days != '')
                {
                    load_data(no_of_days);
                }
                else
                {
                    load_data();
                }
            });

            $(document).on('click', '#inputBtn', function(e){
                e.preventDefault();
                var no_of_days = $('#inputDate').val();
                console.log(no_of_days);
                $('#example').DataTable().destroy();
                if(no_of_days != '')
                {
                    load_data(no_of_days);
                }
                else
                {
                    load_data();
                }
            });

        } );

    </script>
@endsection