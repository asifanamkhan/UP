@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>রোল তৈরি করুন</b></div>
        <div class="panel-body" >
            <form action="{{route('adminCreate')}}" method="post">
                @csrf
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-4 control-label text-right">নতুন রোল যোগ করুন <span style="color: red">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" name="role_name" id="name" class="form-control" placeholder="Ex: সচিব"/>
                            <span class="text-left"></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-4 control-label text-right">বিবরণ<span style="color: red">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control" >
                            <span class="text-left"></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <div class="card mt-5">
                            <div class="card-header text-center"><b>পারমিশন নির্ধারণ করুন</b></div>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-12">
                    <h5 style="color: red">পারমিশন নির্ধারণ করার জন্য টিক চিনহ দিন ।</h5>
                    <table class="mt-4 table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>অপশন</th>
                            <th>ডাটা এন্ট্রি</th>
                            <th>ডাটা দেখুন</th>
                            <th>আপডেট/ডিলিট</th>
                            <th>জেনারেট</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>আবেদন পত্র সমূহ</th>
                            <td><input type="checkbox" value="1" name="permission_name[]"></td>
                            <td><input type="checkbox" value="2" name="permission_name[]"></td>
                            <td><input type="checkbox" value="3" name="permission_name[]"></td>
                            <td><input type="checkbox" value="4" name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>মামলা</th>
                            <td><input type="checkbox" value="5" name="permission_name[]"></td>
                            <td><input type="checkbox" value="6" name="permission_name[]"></td>
                            <td><input type="checkbox" value="7" name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>রেজিস্ট্রেশন ফরম</th>
                            <td><input type="checkbox" value="8" name="permission_name[]"></td>
                            <td><input type="checkbox" value="9" name="permission_name[]"></td>
                            <td><input type="checkbox" value="10" name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>বাণিজ্যিক কর ফরম</td>
                            <th><input type="checkbox" value="12" name="permission_name[]"></th>
                            <td><input type="checkbox" value="13" name="permission_name[]"></td>
                            <td><input type="checkbox" value="14" name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>ব্যবসায়ী কর ফরম</th>
                            <td><input type="checkbox" value="16" name="permission_name[]"></td>
                            <td><input type="checkbox" value="17" name="permission_name[]"></td>
                            <td><input type="checkbox" value="18" name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>সেটআপ মেনু অ্যাক্সেস</th>
                            <td><input type="checkbox" value="21" name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>দৈনিক হিসাব অ্যাক্সেস</th>
                            <td><input type="checkbox" value="20" name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>হোল্ডিং ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="11" name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>বাণিজ্যিক ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="15" name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>ব্যবসায়ী ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="19" name="permission_name[]"></td>
                        </tr>
                    </table>
                </div>
                <button class="btn btn-success col-sm-offset-5 mt-4" id="submit_button" style="background-color: green">যোগ করুন</button>
            </form>
        </div>
    </div>

    {{--বসতভিটার ধরন এর তালিকা--}}
    <div class="card mt-5">
        <div class="card-header text-center"><b>শিক্ষার পদবী এর তালিকা</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                <tr>
                    <th width="">ক্র.নং</th>
                    <th>রোল</th>
                    <th>বিবরণ</th>
                    <th>সর্বশেষ আপডেট</th>
                    <th>Action</th>
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
                "url": "{{ route('roleShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "description" },
                { "data": "updated_at" },
                { "data": "action" },

            ]
        });

        //name validation
        {{--$('#name').on('keyup',function () {--}}

            {{--var token = "{{csrf_token()}}";--}}
            {{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{route('education_name')}}",--}}
                {{--data: {--}}
                    {{--'education': $('#name').val()--}}
                {{--},--}}
                {{--success: function (result) {--}}
                    {{--console.log(result);--}}
                    {{--if ($('#name').val() == '') {--}}
                        {{--$('#name').parent().removeClass('has-success');--}}
                        {{--$('#name').parent().addClass('has-error');--}}
                        {{--$('#name').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');--}}
                        {{--$('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');--}}
                        {{--$('#name').parent().find('small').show().text('Name is required');--}}
                        {{--$('#submit_button').prop("disabled", true);--}}
                    {{--}--}}
                    {{--else if (result == 'two') {--}}
                        {{--$('#name').parent().removeClass('has-success');--}}
                        {{--$('#name').parent().addClass('has-error');--}}
                        {{--$('#name').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');--}}
                        {{--$('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');--}}
                        {{--$('#name').parent().find('small').show().text('Name is already exist');--}}

                        {{--$('#submit_button').prop("disabled", true);--}}
                    {{--}--}}
                    {{--else {--}}
                        {{--$('#name').parent().removeClass('has-error');--}}
                        {{--$('#name').parent().addClass('has-success');--}}
                        {{--$('#name').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');--}}
                        {{--$('#name').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');--}}
                        {{--$('#name').parent().find('small').hide();--}}
                        {{--$('#submit_button').prop("disabled", false);--}}
                    {{--}--}}
                {{--}--}}

            {{--});--}}
        {{--});--}}

    </script>
@endsection