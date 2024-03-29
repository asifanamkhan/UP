@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>মামলার নোটিশ</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row box" style="padding-bottom:20px;margin-top:10px;">
                                        <div class="container">
                                            <ul class="nav nav-tabs" id="myTab">
                                                <li id="mamla_notice" class="active"><a data-toggle="tab" href="#menu"  style="font-size:16px;">মামলার নোটিশ ফরম</a></li>
                                                <li id="notice_talika" class=""><a data-toggle="tab" href="#menu1"  style="font-size:16px;">নোটিশের তালিকা</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" id="mamla_notice_form">
                                    <form action="{{route('mamla.store')}}" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="card-header " > মামলার নোটিশের আবেদন ফরম:</div>
                                            <div class="card-body text-right">
                                                <div class="row mt-4">
                                                    <label for="" class="col-sm-2">মামলা নং</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" value="{{$mamla}}" name="mamla_no" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">বিষয়</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="subject" name="subject" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">মামলার তারিখ</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" id="mamlar_date" name="mamlar_date" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mt-4 text-right">
                                                    <label for="" class="col-sm-2">শুনানীর তারিখ</label>
                                                    <div class="col-sm-4">
                                                        <input type="date" id="sunanir_date" name="sunanir_date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="container">
                                            `<div class="card">
                                                <div class="card-header ">বাদীর তথ্য:</div>
                                                <div class="card-body">
                                                    <div id="badir_info">


                                                    <div class="row">
                                                        <div class="col-sm-9 col-sm-offset-1">
                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">নাম</label>
                                                                <div>
                                                                    <input type="text" id="" name="badi_name[]"  class="form-control badi_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">পিতার নাম</label>
                                                                <div>
                                                                    <input type="text" id="badi_fname" name="badi_fname[]" class="form-control badi_fname">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">গ্রাম</label>
                                                                <div>
                                                                    <input type="text" id="badi_gram" name="badi_gram[]" class="form-control badi_gram1">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-2 mt-5">

                                                            <a href="" id="badi_add" class="btn-sm btn-primary " style="background-color: #055e05">যোগ করুন</a>
                                                        </div>

                                                    </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-1 text-right">
                                                            <label for="" >গ্রাম</label>

                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="col-sm-4 ">
                                                                <div>
                                                                    <input type="text" disabled name="badi_gram[]" id="badi_gram2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 ">
                                                                <div>
                                                                    <input id="badi_check" type="checkbox">হাঁ (সবাই একই গ্রামের)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            `<div class="card">
                                                <div class="card-header ">বিবাদীর তথ্য:</div>
                                                <div class="card-body">
                                                    <div id="bibadir_info">

                                                    <div class="row">
                                                        <div class="col-sm-9 col-sm-offset-1">
                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">নাম</label>
                                                                <div>
                                                                    <input type="text" name="bibadi_name[]"  class="form-control bibadi_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">পিতার নাম</label>
                                                                <div>
                                                                    <input type="text" name="bibadi_fname[]" class="form-control bibadi_fname">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4 ">
                                                                <label for="" class="col-sm-offset-5">গ্রাম</label>
                                                                <div>
                                                                    <input type="text" name="bibadi_gram[]" class="form-control bibadi_gram1">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-2 mt-5">

                                                            <a href="" id="bibadi_add" class="btn-sm btn-primary " style="background-color: #055e05">যোগ করুন</a>
                                                        </div>

                                                    </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-sm-1 text-right">
                                                            <label for="">গ্রাম</label>

                                                        </div>
                                                        <div class="col-sm-9 ">
                                                            <div class="col-sm-4 ">
                                                                <div>
                                                                    <input type="text" disabled name="bibadi_gram[]" id="bibadi_gram2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 ">
                                                                <div>
                                                                    <input id="bibadi_check" type="checkbox">হাঁ (সবাই একই গ্রামের)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="condition" value="0">
                                        <button id="Generate" class="col-sm-offset-5 btn btn-info" style="background-color: #022241"> Generate</button>
                                </form>
                            </div>

                            <div class="card" id="all_mamla">
                                <div class="card-header">সকল মামলার তালিকা</div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div style="padding:4px;width:100%;">
                                            <div id="">
                                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                                    <thead>
                                                    <tr>
                                                        <th width="">মামলা নং</th>
                                                        <th>সনদ নং</th>
                                                        <th>বিষয়</th>
                                                        <th>আবেদনের তারিখ</th>
                                                        <th>শুনানীর তারিখ</th>
                                                        <th>অবস্থা</th>
                                                        <th>Action</th>
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

        $('#all_mamla').hide();

        $('#notice_talika').on('click',function () {
            $('#all_mamla').show();
            $('#mamla_notice_form').hide();

            //Mamla Talika Show Ajax

            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

                "processing": true,
                "serverSide": true,
                "bDestroy": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('mamlaShow') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}"}

                },
                "columns": [
                    { "data": "id" },
                    { "data": "id" },
                    { "data": "subject" },
                    { "data": "mamlar_date" },
                    { "data": "sunanir_date" },
                    { "data": "condition" },
                    { "data": "action" },
                ],

            });

        });

        $('#mamla_notice').on('click',function () {
            $('#all_mamla').hide();
            $('#mamla_notice_form').show();
        });

        //badi

        var max_fields1 = 30;
        x=0;
        $('#badi_add').on('click',function (e) {
            e.preventDefault();
            var name=0;
            var fname=0;
           $('.badi_name').each(function () {
               if ($(this).val() == '') {
                   name++;
               }
           });
           $('.badi_fname').each(function () {
                if ($(this).val() == '') {
                    fname++;
                }
            });

           if(name>0){

               alert('দু:খিত! বাদীর নাম দিতে হবে')
           }
           else if(fname>0){
               alert('দু:খিত! বাদীর পিতার নাম দিতে হবে')
           }
           else{
               if(x<max_fields1){
                   x++;
                   $('#badir_info').append('<div class="row">\n' +
                       '                                                        <div class="col-sm-9 col-sm-offset-1">\n' +
                       '                                                            <div class="col-sm-4 ">\n' +
                       '                                                                <label for="" class="col-sm-offset-5">নাম</label>\n' +
                       '                                                                <div>\n' +
                       '                                                                    <input type="text" name="badi_name[]" class="form-control badi_name">\n' +
                       '                                                                </div>\n' +
                       '                                                            </div>\n' +
                       '\n' +
                       '                                                            <div class="col-sm-4 ">\n' +
                       '                                                                <label for="" class="col-sm-offset-5">পিতার নাম</label>\n' +
                       '                                                                <div>\n' +
                       '                                                                    <input type="text" name="badi_fname[]" class="form-control badi_fname">\n' +
                       '                                                                </div>\n' +
                       '                                                            </div>\n' +
                       '\n' +
                       '                                                            <div class="col-sm-4 ">\n' +
                       '                                                                <label for="" class="col-sm-offset-5">গ্রাম</label>\n' +
                       '                                                                <div>\n' +
                       '                                                                    <input type="text" name="badi_gram[]" class="form-control badi_gram1">\n' +
                       '                                                                </div>\n' +
                       '                                                            </div>\n' +
                       '\n' +
                       '                                                        </div>\n' +
                       '                                                        <div class="col-sm-2 mt-5">\n' +
                       '\n' +
                       '                                                            <a href="" id="badi_remove" class="btn-sm btn-danger " style="background-color: #d61313">Remove</a>\n' +
                       '                                                        </div>\n' +
                       '\n' +
                       '                                                    </div>');
               }
           }
        });

        $('#badir_info').on("click","#badi_remove", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;
        });

        // Bibadi
        var max_fields2 = 30;
        y=0;
        $('#bibadi_add').on('click',function (e) {
            e.preventDefault();

            var bibadi_name=0;
            var bibadi_fname=0;
            $('.bibadi_name').each(function () {
                if ($(this).val() == '') {
                    bibadi_name++;
                }
            });
            $('.bibadi_fname').each(function () {
                if ($(this).val() == '') {
                    bibadi_fname++;

                }
            });

            if(bibadi_name>0){

                alert('দু:খিত! বিবাদীর নাম দিতে হবে')
            }
            else if(bibadi_fname>0){
                alert('দু:খিত! বিবাদীর পিতার নাম দিতে হবে')
            }
            else{
                if(y<max_fields2){
                    x++;
                    $('#bibadir_info').append('<div class="row">\n' +
                        '                                                        <div class="col-sm-9 col-sm-offset-1">\n' +
                        '                                                            <div class="col-sm-4 ">\n' +
                        '                                                                <label for="" class="col-sm-offset-5">নাম</label>\n' +
                        '                                                                <div>\n' +
                        '                                                                    <input type="text" name="bibadi_name[]" class="form-control bibadi_name">\n' +
                        '                                                                </div>\n' +
                        '                                                            </div>\n' +
                        '\n' +
                        '                                                            <div class="col-sm-4 ">\n' +
                        '                                                                <label for="" class="col-sm-offset-5">পিতার নাম</label>\n' +
                        '                                                                <div>\n' +
                        '                                                                    <input type="text" name="bibadi_fname[]" class="form-control bibadi_fname">\n' +
                        '                                                                </div>\n' +
                        '                                                            </div>\n' +
                        '\n' +
                        '                                                            <div class="col-sm-4 ">\n' +
                        '                                                                <label for="" class="col-sm-offset-5">গ্রাম</label>\n' +
                        '                                                                <div>\n' +
                        '                                                                    <input type="text" name="bibadi_gram[]" class="form-control bibadi_gram1">\n' +
                        '                                                                </div>\n' +
                        '                                                            </div>\n' +
                        '\n' +
                        '                                                        </div>\n' +
                        '                                                        <div class="col-sm-2 mt-5">\n' +
                        '\n' +
                        '                                                            <a href="" id="bibadi_remove" class="btn-sm btn-danger ">Remove</a>\n' +
                        '                                                        </div>\n' +
                        '\n' +
                        '                                                    </div>');
                }
            }

        });

        $('#bibadir_info').on("click","#bibadi_remove", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove();
            y--;
        });

        $('#badi_check').on('click',function () {

            if($('#badi_check').prop('checked')){
                   $('#badi_gram2').prop('disabled',false);
                   $('.badi_gram1').prop('disabled',true);
            }
            else{
                $('#badi_gram2').prop('disabled',true);
                $('.badi_gram1').prop('disabled',false);
            }

        });

        $('#bibadi_check').on('click',function () {

            if($('#bibadi_check').prop('checked')){
                $('#bibadi_gram2').prop('disabled',false);
                $('.bibadi_gram1').prop('disabled',true);
            }
            else{
                $('#bibadi_gram2').prop('disabled',true);
                $('.bibadi_gram1').prop('disabled',false);
            }
        });

        $('#Generate').on('click',function (e) {
            if($('#subject').val()==''){
                alert('বিষয় প্রদান করুন ');
                e.preventDefault();
            }
            else if($('#mamlar_date').val()==''){
                alert('মামলা এবং শুনানীর তারিখ ঠিকমত প্রদান করুন  ');
                e.preventDefault();
            }

            else if($('#sunanir_date').val()==''){
                alert('মামলা এবং শুনানীর তারিখ ঠিকমত প্রদান করুন  ');
                e.preventDefault();
            }

            var name=0;
            var fname=0;
            $('.badi_name').each(function () {
                if ($(this).val() == '') {
                    name++;
                }
            });
            $('.badi_fname').each(function () {
                if ($(this).val() == '') {
                    fname++;
                }
            });

            if(name>0){
                alert('দু:খিত! বাদীর নাম দিতে হবে')
                e.preventDefault();
            }
            else if(fname>0){
                alert('দু:খিত! বাদীর পিতার নাম দিতে হবে')
                e.preventDefault();
            }

            var bibadi_name=0;
            var bibadi_fname=0;
            $('.bibadi_name').each(function () {
                if ($(this).val() == '') {
                    bibadi_name++;
                }
            });
            $('.bibadi_fname').each(function () {
                if ($(this).val() == '') {
                    bibadi_fname++;
                }
            });

            if(bibadi_name>0){
                alert('দু:খিত! বিবাদীর নাম দিতে হবে')
                e.preventDefault();
            }
            else if(bibadi_fname>0){
                alert('দু:খিত! বিবাদীর পিতার নাম দিতে হবে')
                e.preventDefault();
            }
        });

    </script>

@endsection