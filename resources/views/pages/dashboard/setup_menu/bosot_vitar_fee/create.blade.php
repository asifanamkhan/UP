@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b> বসতভিটার রেট যোগ করুন</b></div>
        <div class="panel-body" >
            <div class="col-sm-9">
                <div class="form-group has-feedback">
                    <label for="" class="col-sm-4 control-label text-right">বসতভিটার ধরন<span style="color: red">*</span> </label>
                    <div class="col-sm-8">
                        <select name="bosot_vitar_dhoron" id="bosot_vitar_dhoron" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            @foreach($bosot_vitar_dhoron as $bosot_vitar_dhorons)
                                <option value="{{$bosot_vitar_dhorons->id}}">{{$bosot_vitar_dhorons->bosot_vitar_dhoron}}</option>
                                @endforeach
                        </select>
                        <span class="text-left"></span>
                        <small name="help-block" class="help-block" style="color: red"></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 mt-4">
                <div class="form-group has-feedback">
                    <label for="" class="col-sm-4 control-label text-right">পেশা<span style="color: red">*</span> </label>
                    <div class="col-sm-8">
                        <select name="occupation" id="occupation" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            @foreach($occupation as $occupations)
                                <option value="{{$occupations->id}}">{{$occupations->occupation}}</option>
                                @endforeach
                        </select>
                        <span class="text-left"></span>
                        <small name="help-block" class="help-block" style="color: red"></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 mt-4">
                <div class="form-group has-feedback">
                    <label for="" class="col-sm-4 control-label text-right">করের শ্রেনী<span style="color: red">*</span> </label>
                    <div class="col-sm-8">
                        <select name="tax_class" id="tax_class" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            @foreach($tax_class as $tax_classs)
                                <option value="{{$tax_classs->id}}">{{$tax_classs->tax_class}}</option>
                                @endforeach
                        </select>
                        <span class="text-left"></span>
                        <small name="help-block" class="help-block" style="color: red"></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 mt-4">
                <div class="form-group has-feedback">
                    <label for="" class="col-sm-4 control-label text-right">ধার্যকৃত টাকার পরিমাণ<span style="color: red">*</span> </label>
                    <div class="col-sm-8">
                        <input type="number" name="tax_fee" id="tax_fee" class="form-control" placeholder="ইংরেজীতে টাকার পরিমান প্রদান করুন"/>
                        <span class="text-left"></span>
                        <small name="help-block" class="help-block" style="color: red"></small>
                    </div>
                </div>
            </div>
            <input type="hidden" name="status" value="1">
            <button class="btn btn-success col-sm-offset-5 mt-4" id="submit_button" style="background-color: green">যোগ করুন</button>
        </div>
    </div>

    {{--বসতভিটার ধরন এর তালিকা--}}
    <div class="card mt-5">
        <div class="card-header text-center"><b>বসতভিটার রেট সীট</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                <tr>
                    <th width="">ক্র.নং</th>
                    <th>বসতভিটার ধরন</th>
                    <th>পেশা</th>
                    <th>করের শ্রেনী</th>
                    <th>ধার্যকৃত টাকা</th>
                    <th>সর্বশেষ আপডেট</th>
                    <th>অবস্থা</th>
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
        $('#submit_button').on('click',function () {
            $.ajax({
                type:"POST",
                url:"{{route('holdingTaxFee.store')}}",
                data:{
                    'bosot_vitar_dhoron':$('#bosot_vitar_dhoron').val(),
                    'occupation':$('#occupation').val(),
                    'tax_class':$('#tax_class').val(),
                    'tax_fee':$('#tax_fee').val(),
                }
            });
            $('#example').DataTable().draw();

        });
        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

            "processing": true,
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

            "ajax":{
                "url": "{{ route('holdingTaxFeeShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "bosot_vitar_dhoron" },
                { "data": "occupation" },
                { "data": "tax_class" },
                { "data": "tax_fee" },
                { "data": "updated_at" },
                { "data": "status" },
                { "data": "action" },

            ]
        });

        //name validation
        $('#bosot_vitar_dhoron,#occupation,#tax_class').on('change',function (e) {


            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('bosot_vitar_fee')}}",
                data: {
                    'bosot_vitar_dhoron': $('#bosot_vitar_dhoron').val(),
                    'occupation': $('#occupation').val(),
                    'tax_class': $('#tax_class').val(),
                },
                success: function (result) {
                    console.log(result);
                    if (result == 'two') {
                        $('#bosot_vitar_dhoron').parent().removeClass('has-success');
                        $('#bosot_vitar_dhoron').parent().addClass('has-error');
                        $('#bosot_vitar_dhoron').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#bosot_vitar_dhoron').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#bosot_vitar_dhoron').parent().find('small').show().text('Oops!!! এই বসতভিটার ধরন, পেশা, করের শ্রেনী যোগ করা আছে।');

                        $('#occupation').parent().removeClass('has-success');
                        $('#occupation').parent().addClass('has-error');
                        $('#occupation').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#occupation').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#occupation').parent().find('small').show().text('Oops!!! এই বসতভিটার ধরন, পেশা, করের শ্রেনী যোগ করা আছে।');

                        $('#tax_class').parent().removeClass('has-success');
                        $('#tax_class').parent().addClass('has-error');
                        $('#tax_class').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#tax_class').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#tax_class').parent().find('small').show().text('Oops!!! এই বসতভিটার ধরন, পেশা, করের শ্রেনী যোগ করা আছে।');

                        $('#submit_button').prop("disabled", true);
                    }
                    else {

                        if($('#bosot_vitar_dhoron').val()!=''){
                            $('#bosot_vitar_dhoron').parent().removeClass('has-error');
                            $('#bosot_vitar_dhoron').parent().addClass('has-success');
                            $('#bosot_vitar_dhoron').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#bosot_vitar_dhoron').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#bosot_vitar_dhoron').parent().find('small').hide();
                            $('#submit_button').prop("disabled", false);
                        }
                        else{
                            $('#bosot_vitar_dhoron').parent().removeClass('has-success');
                            $('#bosot_vitar_dhoron').parent().addClass('has-error');
                            $('#bosot_vitar_dhoron').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#bosot_vitar_dhoron').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#bosot_vitar_dhoron').parent().find('small').show().text('The field is required cannot be empty.');
                            $('#submit_button').prop("disabled", true);
                        }

                        if($('#occupation').val()!=''){
                            $('#occupation').parent().removeClass('has-error');
                            $('#occupation').parent().addClass('has-success');
                            $('#occupation').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#occupation').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#occupation').parent().find('small').hide();
                            $('#submit_button').prop("disabled", false);
                        }
                        else{
                            $('#occupation').parent().removeClass('has-success');
                            $('#occupation').parent().addClass('has-error');
                            $('#occupation').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#occupation').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#occupation').parent().find('small').show().text('The field is required cannot be empty.');
                            $('#submit_button').prop("disabled", true);
                        }

                        if($('#tax_class').val()!=''){
                            $('#tax_class').parent().removeClass('has-error');
                            $('#tax_class').parent().addClass('has-success');
                            $('#tax_class').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#tax_class').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#tax_class').parent().find('small').hide();
                            $('#submit_button').prop("disabled", false);
                        }
                        else{
                            $('#tax_class').parent().removeClass('has-success');
                            $('#tax_class').parent().addClass('has-error');
                            $('#tax_class').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#tax_class').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#tax_class').parent().find('small').show().text('The field is required cannot be empty.');
                            $('#submit_button').prop("disabled", true);
                        }
                    }
                }

            });
        });

        $('#tax_fee').on('keyup',function () {
            if($('#tax_fee').val()!=''){
                $('#tax_fee').parent().removeClass('has-error');
                $('#tax_fee').parent().addClass('has-success');
                $('#tax_fee').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_fee').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_fee').parent().find('small').hide();
                $('#submit_button').prop("disabled", false);
            }
            else{
                $('#tax_fee').parent().removeClass('has-success');
                $('#tax_fee').parent().addClass('has-error');
                $('#tax_fee').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_fee').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_fee').parent().find('small').show().text('The field is required cannot be empty.');
                $('#submit_button').prop("disabled", true);
            }

        });

        $('#submit_button').on('click',function (e) {

            if($('#bosot_vitar_dhoron').val()!=''){
                $('#bosot_vitar_dhoron').parent().removeClass('has-error');
                $('#bosot_vitar_dhoron').parent().addClass('has-success');
                $('#bosot_vitar_dhoron').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bosot_vitar_dhoron').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bosot_vitar_dhoron').parent().find('small').hide();
                $('#submit_button').prop("disabled", false);
            }
            else{
                $('#bosot_vitar_dhoron').parent().removeClass('has-success');
                $('#bosot_vitar_dhoron').parent().addClass('has-error');
                $('#bosot_vitar_dhoron').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bosot_vitar_dhoron').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bosot_vitar_dhoron').parent().find('small').show().text('The field is required cannot be empty.');
                e.preventDefault();
            }
            if($('#tax_class').val()!=''){
                $('#tax_class').parent().removeClass('has-error');
                $('#tax_class').parent().addClass('has-success');
                $('#tax_class').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_class').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_class').parent().find('small').hide();
                $('#submit_button').prop("disabled", false);
            }
            else{
                $('#tax_class').parent().removeClass('has-success');
                $('#tax_class').parent().addClass('has-error');
                $('#tax_class').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_class').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_class').parent().find('small').show().text('The field is required cannot be empty.');
                e.preventDefault();
            }
            if($('#tax_fee').val()!=''){
                $('#tax_fee').parent().removeClass('has-error');
                $('#tax_fee').parent().addClass('has-success');
                $('#tax_fee').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_fee').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_fee').parent().find('small').hide();
                $('#submit_button').prop("disabled", false);
            }
            else{
                $('#tax_fee').parent().removeClass('has-success');
                $('#tax_fee').parent().addClass('has-error');
                $('#tax_fee').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#tax_fee').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#tax_fee').parent().find('small').show().text('The field is required cannot be empty.');
                e.preventDefault();
            }
            if($('#occupation').val()!=''){
                $('#occupation').parent().removeClass('has-error');
                $('#occupation').parent().addClass('has-success');
                $('#occupation').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#occupation').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#occupation').parent().find('small').hide();
                $('#submit_button').prop("disabled", false);
            }
            else{
                $('#occupation').parent().removeClass('has-success');
                $('#occupation').parent().addClass('has-error');
                $('#occupation').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#occupation').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#occupation').parent().find('small').show().text('The field is required cannot be empty.');
                e.preventDefault();
            }
        });

    </script>
@endsection