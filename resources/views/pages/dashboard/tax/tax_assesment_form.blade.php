@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->

        <div class="panel panel-default">
            <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>এ্যাসেসমেন্ট ফরম</b></div>
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

                <div id="table">
                    <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                        <thead>
                        <tr>
                            <th width="2%">ক্র.নং</th>
                            <th>মালিকের নাম</th>
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
                    "url": "{{ route('taxAssesmentForm') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                            word_no:$('#word_no').val(),
                    }
                },

                "columns": [
                    { "data": "id" },
                    { "data": "bname" },
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
        });
        $('#example').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            // confirm then
            if (confirm('are you sure you want to delete this?')) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {_method: 'DELETE', submit: true}
                }).always(function (data) {
                    console.log(data);
                    $('#example').DataTable().draw(false);
                });
            }
        });


    </script>

    @endsection