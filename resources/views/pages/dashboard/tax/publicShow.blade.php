@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->

    <div class="panel panel-default">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>পাবলিক ইনফর্মেশন ও একটিভ/ডিএকটিভ</b></div>
        <div class="panel-body"  style="min-height:310px;">

            <div class="row mb-5">
                <label for=""class="col-sm-4 text-right">ওয়ার্ড নং <span style="color: red">*</span></label>
                <div class="col-sm-5">
                    <select name="word_no" id="word_no" class="form-control{{ $errors->has('word_no') ? ' is-invalid' : '' }}">
                        <option value="">চিহ্নিত করুন</option>
                        <option value="1">1 ওয়ার্ড</option>
                        <option value="2">2 ওয়ার্ড</option>
                        <option value="3">3 ওয়ার্ড</option>
                        <option value="4">4 ওয়ার্ড</option>
                        <option value="5">5 ওয়ার্ড</option>
                        <option value="6">6 ওয়ার্ড</option>
                        <option value="7">7 ওয়ার্ড</option>
                        <option value="8">8 ওয়ার্ড</option>
                        <option value="9">9 ওয়ার্ড</option>
                    </select>
                </div>
            </div>

            <div class="row mb-5">
                <label for=""class="col-sm-4 text-right">হোল্ডিং নং <span style="color: red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="holding_no">
                </div>
            </div>

            <div class="row mb-5">
                <label for=""class="col-sm-4 text-right">মেম্বার নং <span style="color: red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="member_no">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6"></div>
                <button class="btn btn-info" id="search" style="background-color: #022241">Search</button>

            </div>

            <div id="table">
                <table id="example" class=" table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                    <thead>
                    <tr>
                        <th>নাম</th>
                        <th>পিতার নাম</th>
                        <th>মাতার নাম</th>
                        <th >হোল্ডিং</th>
                        <th>গ্রাম</th>
                        <th>মোবাইল</th>
                        <th>পেশা</th>
                        <th>Status</th>
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
                    "url": "{{ route('publicInfo') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        word_no:$('#word_no').val(),
                        holding_no:$('#holding_no').val(),
                        member_no:$('#member_no').val(),
                    }
                },

                "columns": [
                    { "data": "bname" },
                    { "data": "bfname" },
                    { "data": "bmname" },
                    { "data": "holding_no" },
                    { "data": "b_gram" },
                    { "data": "mob" },
                    { "data": "occupation" },
                    { "data": "status" },
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