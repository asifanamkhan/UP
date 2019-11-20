@extends('layouts.dashboard_layout.master')
@section('content')
    <div id="">
        <div class="row box" style="padding-bottom:20px;margin-top:10px; ">
            <div class="container">
                <ul class="nav nav-tabs font-weight-bold" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#doridro"  >দরিদ্র পরিবার  </a></li>
                    <li class=""><a data-toggle="tab"  href="#hotodoridro" > হতদরিদ্র পরিবার </a></li>
                </ul>
            </div>
        </div>
    </div>
<div class="tab-content">
    <div id="doridro"  class="tab-pane active text-right mt-3">
        <div class="panel panel-default mb-5">
            <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>দরিদ্র পরিবারের মাসিক আয় সীমা সেটআপ</b></div>
            <div class="panel-body" >
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-6 control-label text-right">দরিদ্র পরিবারের মাসিক আয় সীমা আপডেট করুন <span style="color: red">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" name="amount" id="doridroAmount" class="form-control" placeholder="ইংরেজিতে টাকার অংক প্রদান করুন (Ex: 1000)"/>
                            <span class="text-left"></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="status" value="1">
                <button class="btn btn-success " id="dorodro_submit" style="background-color: green">আপডেট করুন</button>

            </div>
        </div>

        {{--দরিদ্র পরিবারের মাসিক আয় তালিকা--}}
        <div class="card mt-5">
            <div class="card-header text-center"><b>বর্তমান দরিদ্র পরিবারের মাসিক আয় সীমা</b></div>
            <div class="card-body" >
                <table id="example1" class="table table-striped table-bordered dt-responsive nowrap text-left" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                    <thead>
                    <tr class="">
                        <th>টাকার পরিমান </th>
                        <th>সর্বশেষ আপডেট</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="hotodoridro"  class="tab-pane text-right mt-3">
        <div class="panel panel-default mb-5">
            <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>হতদরিদ্র পরিবারের মাসিক আয় সীমা সেটআপ</b></div>
            <div class="panel-body" >
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-6 control-label text-right">হতদরিদ্র পরিবারের মাসিক আয় সীমা আপডেট করুন <span style="color: red">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" name="amount" id="hotoDoridroAmount" class="form-control" placeholder="ইংরেজিতে টাকার অংক প্রদান করুন (Ex: 1000)"/>
                            <span class="text-left"></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="status" value="1">
                <button class="btn btn-success text-left" id="hotoDorodro_submit" style="background-color: green">আপডেট করুন</button>
            </div>
        </div>

        {{--দরিদ্র পরিবারের মাসিক আয় তালিকা--}}
        <div class="card mt-5">
            <div class="card-header text-center"><b>বর্তমান হতদরিদ্র পরিবারের মাসিক আয় সীমা</b></div>
            <div class="card-body" >
                <table id="example2" class="table table-striped table-bordered dt-responsive nowrap text-left" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                    <thead>
                    <tr>
                        <th>টাকার পরিমান </th>
                        <th>সর্বশেষ আপডেট</th>
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

    <script>

        $(document).ready(function(){
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#myTab a[href="' + activeTab + '"]').tab('show');
                $('#myTab a[href="' + activeTab + '"]').trigger('click');
            }
        });

        $('#dorodro_submit').on('click',function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('doridro.store')}}",
                data:{
                    'type':1,
                    'amount':$('#doridroAmount').val(),
                    'id':1,
                }
            });
            $('#example1').DataTable().draw();


        });
        $('#hotoDorodro_submit').on('click',function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('doridro.store')}}",
                data:{
                    'type':2,
                    'amount':$('#hotoDoridroAmount').val(),
                    'id':2,
                }
            });
            //console.log($('#hotoDoridroAmount').val());
            $('#example2').DataTable().draw();


        });
        $('#example1'). DataTable( {
            "bInfo": false,
            "bLengthChange": false,
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('doridroShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "amount" },
                { "data": "updated_at" },

            ]
        });
        $('#example2'). DataTable( {
            "bInfo": false,
            "bLengthChange": false,
            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('hotoDoridroShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "amount" },
                { "data": "updated_at" },

            ]
        });

        //name validation
        $('#name').on('keyup',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('education_name')}}",
                data: {
                    'education': $('#name').val()
                },
                success: function (result) {
                    console.log(result);
                    if ($('#name').val() == '') {
                        $('#name').parent().removeClass('has-success');
                        $('#name').parent().addClass('has-error');
                        $('#name').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#name').parent().find('small').show().text('Name is required');
                        $('#submit_button').prop("disabled", true);
                    }
                    else if (result == 'two') {
                        $('#name').parent().removeClass('has-success');
                        $('#name').parent().addClass('has-error');
                        $('#name').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#name').parent().find('small').show().text('Name is already exist');

                        $('#submit_button').prop("disabled", true);
                    }
                    else {
                        $('#name').parent().removeClass('has-error');
                        $('#name').parent().addClass('has-success');
                        $('#name').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#name').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#name').parent().find('small').hide();
                        $('#submit_button').prop("disabled", false);
                    }
                }

            });
        });

    </script>
@endsection