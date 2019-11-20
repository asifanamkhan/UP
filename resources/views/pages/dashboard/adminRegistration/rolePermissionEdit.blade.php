@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>রোল তৈরি করুন</b></div>
        <div class="panel-body" >
            <form action="{{route('adminUpdate',$role->id)}}" method="post">
                @csrf
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-4 control-label text-right">নতুন রোল যোগ করুন <span style="color: red">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" name="role_name" id="name" class="form-control" value="{{$role->name}}" placeholder="Ex: সচিব"/>
                            <span class="text-left"></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group has-feedback">
                        <label for="" class="col-sm-4 control-label text-right">বিবরণ<span style="color: red">*</span> </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control" value="{{$role->decription}}" >
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
                            <td><input type="checkbox" value="1" @if(in_array(1,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="1" @if(in_array(2,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="3" @if(in_array(3,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="4" @if(in_array(4,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>মামলা</th>
                            <td><input type="checkbox" value="5" @if(in_array(5,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="6" @if(in_array(6,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="7" @if(in_array(7,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>রেজিস্ট্রেশন ফরম</th>
                            <td><input type="checkbox" value="8" @if(in_array(8,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="9" @if(in_array(9,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="10" @if(in_array(10,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>বাণিজ্যিক কর ফরম</td>
                            <th><input type="checkbox" value="12" @if(in_array(12,$role_permissions)) checked  @endif name="permission_name[]"></th>
                            <td><input type="checkbox" value="13" @if(in_array(13,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="14" @if(in_array(14,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>ব্যবসায়ী কর ফরম</th>
                            <td><input type="checkbox" value="16" @if(in_array(16,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="17" @if(in_array(17,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td><input type="checkbox" value="18" @if(in_array(18,$role_permissions)) checked  @endif name="permission_name[]"></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>সেটআপ মেনু অ্যাক্সেস</th>
                            <td><input type="checkbox" value="21" @if(in_array(21,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>দৈনিক হিসাব অ্যাক্সেস</th>
                            <td><input type="checkbox" value="20" @if(in_array(20,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>হোল্ডিং ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="11" @if(in_array(11,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>বাণিজ্যিক ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="15" @if(in_array(15,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                        <tr>
                            <th>ব্যবসায়ী ট্যাক্স প্রদান</th>
                            <td><input type="checkbox" value="19" @if(in_array(19,$role_permissions)) checked  @endif name="permission_name[]"></td>
                        </tr>
                    </table>

                </div>
                <button class="btn btn-success col-sm-offset-5 mt-4" id="submit_button" style="background-color: green">আপডেট করুন</button>
            </form>
        </div>
    </div>


@endsection
@section('script')
    <script>
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