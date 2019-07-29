@extends('layouts.dashboard_layout.master')
@section('content')
    <div class="panel panel-default mb-5">
        <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>বসতভিটার ধরন </b></div>
        <div class="panel-body" >
            <div class="col-sm-9">
                <div class="form-group has-feedback">
                    <label for="" class="col-sm-4 control-label text-right">নতুন বসতভিটার ধরন যোগ করুন <span style="color: red">*</span> </label>
                    <div class="col-sm-8">
                        <input type="text" name="bosot_vitar_dhoron" id="name" class="form-control" placeholder="Ex: টিনসেড"/>
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
       <div class="card-header text-center"><b>বসতভিটার ধরন এর তালিকা</b></div>
        <div class="card-body" >
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                <thead>
                    <tr>
                        <th width="">ক্র.নং</th>
                        <th>বসতভিটার ধরন</th>
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
                url:"{{route('bosotVitarDhoron.store')}}",
                data:{
                    'bosot_vitar_dhoron':$('#name').val(),
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
                "url": "{{ route('bosotVitarDhoronShow') }}",
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{ csrf_token() }}"},

            },
            "columns": [
                { "data": "id" },
                { "data": "bosot_vitar_dhoron" },
                { "data": "updated_at" },
                { "data": "status" },
                { "data": "action" },

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
                url: "{{route('bosot_vitar_name')}}",
                data: {
                    'name': $('#name').val()
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