@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->

    <div class="panel panel-default">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ব্যবসায়ী কর ধারীদের তালিকা</b></div>
        <div class="panel-body"  style="min-height:310px;">

            <div class="row mb-5">
                <label for=""class="col-sm-4 text-right">ওয়ার্ড নং <span style="color: red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="word_no">
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-info" id="search" style="background-color: #022241">Search</button>
                </div>
            </div>

            <div class="mb-5">
                <a href="#" class="btn btn-info" id="print" style="background-color: #022241"><i class="fa fa-print"> Print</i></a>
            </div>

            <div id="table ">
                <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                    <thead>
                    <tr>
                        <th width="">ক্র.নং</th>
                        <th>মালিকের নাম</th>
                        <th>মালিকের হোল্ডিং নং</th>
                        <th>গ্রাম </th>
                        <th>রুম/দোকান নং</th>
                        <th>ব্যবসার ধরন</th>
                        <th>কর নির্ধারণের শুরুর সন</th>
                        <th>সর্বশেষ কর পরিষদের অর্থবছর</th>
                    </tr>
                    </thead>
                </table>
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
            $('#table'). hide();
        } );


        $('#search').on('click',function () {
            var word_no=$('#word_no').val();
            var href='business_Tax_print'+'/'+word_no;
            $('#print').attr('href',href);
            $('#print').attr('target','_blank');
            $('#table'). show();
            $('#example').DataTable().destroy();
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100,200,300], [ 25, 50,100,200,300]],
                //"bInfo": false,
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('BusinesstaxDhariTalika') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        word_no:$('#word_no').val(),
                    }
                },

                "columns": [
                    { "data": "id" },
                    { "data": "ownerBname" },
                    { "data": "holding_no" },
                    { "data": "gram" },
                    { "data": "roomNo" },
                    { "data": "business_type" },
                    { "data": "tax_start_date" },
                    { "data": "last_tax_pay_date" },

                ],
            });
        });


    </script>

@endsection