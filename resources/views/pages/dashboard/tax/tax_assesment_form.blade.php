@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>এ্যাসেসমেন্ট ফরম</b></div>
                <div class="panel-body"  style="min-height:310px;">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                        <thead>
                        <tr>
                            <th width="">ক্র.নং</th>
                            <th>মালিকের নাম</th>
                            <th>ওয়ার্ড নং</th>
                            <th>হোল্ডিং নম্বর</th>
                            <th>বসতভিটার ধরন</th>
                            <th>রুম সংখ্যা</th>
                            <th>পেশা</th>
                            <th>করের শ্রেনী</th>
                            <th>কর নির্ধারণের শুরুর সন</th>
                            <th>ধার্যকৃত কর</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100,200,300, -1], [ 25, 50,100,200,300, "All"]],

                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('taxAssesmentForm') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}"}
                },

                "columns": [
                    { "data": "id" },
                    { "data": "bname" },
                    { "data": "word_no" },
                    { "data": "holding_no" },
                    { "data": "bosot_vitar_dhoron" },
                    { "data": "room_no" },
                    { "data": "occupation" },
                    { "data": "tax_class" },
                    { "data": "tax_start_date" },
                    { "data": "tax_amount" },
                    { "data": "action" },
                ],
            });
        } );
    </script>

    @endsection