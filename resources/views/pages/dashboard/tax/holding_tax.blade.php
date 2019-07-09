@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>বসতভিটার কর আদায়</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row" style="padding-bottom:20px;margin-top:10px; ">
                                        <ul class="nav nav-tabs font-weight-bold" id="myTab">
                                            <li class="active"><a data-toggle="tab" href="#boshot_reg"  >বসতভিটার রেজিস্ট্রেশন ফরম</a></li>
                                            <li class=""><a data-toggle="tab"  href="#bosot_kor_aday"  >বসতভিটার কর আদায়</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                {{--বসতভিটার রেজিস্ট্রেশন ফরম--}}


                                    <div id="boshot_reg"  class="tab-pane active text-right mt-5">
                                        <form action="{{route('tax.store')}}" method="post">
                                            @csrf
                                            <div id="boshot_form">

                                            <div class="row">
                                                <div class="row col-sm-9 mt-4 ">
                                                    <label for=""  class="col-sm-4">সদস্যের ক্রমিক নং</label>
                                                    <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_no" readonly>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                                    <input type="number" class="form-control col-sm-8" name="holding_no"  id="holding_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                                    <select name="word_no" id="word_no" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
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

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="name[]" id="name">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bname[]" id="bname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="efname[]" id="efname">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="emname[]" id="emname">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="e_gram" id="e_gram">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="b_gram" id="b_gram">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>
                                                    <input type="text" class="form-control col-sm-8" name="e_post" id="e_post">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                                    <input type="text" class="form-control col-sm-8" name="b_post" id="b_post">
                                                </div>


                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং </label>
                                                    <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">জন্ম নিবন্ধন নং </label>
                                                    <input type="text" class="form-control col-sm-8"  name="birth_cer[]" id="birth_cer" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>


                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" id="boshot_dhoron1" class="col-sm-4">বসতভিটার ধরন <span style="color: red">*</span></label>
                                                    <select name="boshot_dhoron" id="boshot_dhoron" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                        @foreach($bosot_vitar_dhoron as $bosot_vitar_dhorons)
                                                            <option value="{{$bosot_vitar_dhorons->name}}">{{$bosot_vitar_dhorons->name}}</option>
                                                            @endforeach

                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পেশা<span style="color: red">*</span></label>
                                                    <select name="occa[]" id="occa" class="form-control col-sm-8">
                                                        <option value="">চিহ্নিত করুন</option>
                                                        <option value="">চিcc</option>

                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" id="tax_class1" class="col-sm-4">করের শ্রেনী<span style="color: red">*</span></label>
                                                    <select name="tax_class" id="tax_class" class="form-control col-sm-8">
                                                        <option value="">চিহ্নিত করুন</option>

                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মোবাইল নং </label>
                                                    <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>

                                                <div class="row col-sm-6 mt-4" id="tax_start_date1">
                                                    <label for="" class="col-sm-4">কর নির্ধারণের শুরুর সন <span style="color: red">*</span></label>
                                                    <input type="date" class="form-control col-sm-8" name="tax_start_date" id="tax_start_date" >
                                                </div>

                                                <div class="row col-sm-6 mt-4" id="">
                                                    <label for="" class="col-sm-4">সর্বশেষ কর পরিষদের শন <span style="color: red">*</span></label>
                                                    <input type="date" class="form-control col-sm-8" name="last_tax_pay_date" id="last_tax_pay_date" >
                                                </div>

                                                <div class="row col-sm-9 mt-4 ">
                                                    <label for=""  class="col-sm-4">সরকারী সহযোগিতা পায় কি না<span> <input id="ref" class="" type="checkbox"></span></label>
                                                    <input type="text" class="col-sm-8 form-control" name="ref_name[]" id="ref_name" placeholder="রেফারেন্সের নাম" readonly>
                                                </div>

                                                <div class="col-sm-2 mt-4" id="bostoForm_add">
                                                    <button style="background-color: green" class="btn btn-success">যোগ করুন</button>
                                                </div>
                                            </div>

                                        </div>
                                    <div class="col-sm-6 mt-4">
                                        <button style="background-color: #022241" class="btn btn-success">Submit</button>
                                    </div>
                                </form>

                                </div>

                                {{--বসতভিটার কর আদায়:--}}

                                <div id="bosot_kor_aday" class="tab-pane">
                                    <div class="row text-right">
                                           <div class="row col-sm-5">
                                               <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                               <select name="word_no_search" id="word_no_search" class="form-control col-sm-8">
                                                   <option value="0">চিহ্নিত করুন</option>
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

                                           <div class="col-sm-5">
                                            <label for="" class="col-sm-4">হোল্ডিং নং : <span style="color: red">*</span></label>
                                            <input type="number" class="col-sm-7 form-control" name="holding_no_search" id="holding_no_search" placeholder="হোল্ডিং নাম্বার প্রদান করুন">
                                           </div>

                                           <button class="btn-sm btn-info col-sm-1" id="holding_search" style="background-color: #022241">খোঁজ করুন</button>

                                    </div>

                                    {{--data show--}}

                                    <div id="loaderDiv" class="text-center">
                                        <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
                                    </div>

                                    <div class="card mt-5" id="bosot_kor_aday_table">
                                        <div class="card-header font-14 font-weight-bold" id="thottho"></div>
                                        <div class="card-body">


                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <table class="table table-bordered table-hover " id="thottho1">
                                                        <tbody >

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-sm-6">
                                                    <table class="table table-bordered table-hover" id="thottho2">
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <button style="background-color: #022241;"class="w-100 btn btn-info mt-4">
                                                Holding TAX Payment History
                                            </button>

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

@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <!--<script type="text/javascript" src="datatables/js/jquery-1.11.3.min.js"></script>--->
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

        $('#ref').on('click',function () {

            if($('#ref').prop('checked')){
                $('#ref_name').prop('readonly',false);

            }
            else{
                $('#ref_name').prop('readonly',true);

            }
        });

        $('#example'). DataTable( {
            "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

        });

        //Bosot member no
        $('#member_no').val(1);
        $('#holding_no').on('keyup',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('bosot_member_no')}}",
                data:{
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                success:function (result) {
                    if(result !='one'){

                    var mem = parseInt(result)+1;
                        $('#member_no').val(mem);
                        $('#bostoForm_add').hide();
                        $('#e_gram').val(result[1].e_gram).prop("readonly",true);
                        $('#b_gram').val(result[1].b_gram).prop("readonly",true);
                        $('#e_post').val(result[1].e_post).prop("readonly",true);
                        $('#b_post').val(result[1].b_post).prop("readonly",true);
                        $('#boshot_dhoron').val(result[1].boshot_dhoron).prop("selected",true);
                        $('#tax_class').val(result[1].tax_class).prop("selected",true);
                        $('#tax_start_date').val(result[1].tax_start_date).prop("selected",true);
                        $('#last_tax_pay_date').val(result[1].last_tax_pay_date).prop("selected",true);

                    }
                    else{
                        $('#member_no').val(1);
                        $('#bostoForm_add').show();
                        $('#e_gram').val(null).prop("readonly",false);
                        $('#b_gram').val(null).prop("readonly",false);
                        $('#e_post').val(null).prop("readonly",false);
                        $('#b_post').val(null).prop("readonly",false);
                        $('#boshot_dhoron').val(null).prop("selected",false);
                        $('#tax_class').val(null).prop("selected",false);
                        $('#tax_start_date').val(null).prop("selected",false);
                        $('#last_tax_pay_date').val(null).prop("selected",false);
                    }
                },
            });
        });

        $('#word_no').on('change',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('bosot_member_no')}}",
                data:{
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                success:function (result) {
                    if(result !='one'){

                        var mem = parseInt(result)+1;
                        $('#member_no').val(mem);
                        $('#bostoForm_add').hide();
                        $('#e_gram').val(result[1].e_gram).prop("readonly",true);
                        $('#b_gram').val(result[1].b_gram).prop("readonly",true);
                        $('#e_post').val(result[1].e_post).prop("readonly",true);
                        $('#b_post').val(result[1].b_post).prop("readonly",true);
                        $('#boshot_dhoron').val(result[1].boshot_dhoron).prop("selected",true);
                        $('#tax_class').val(result[1].tax_class).prop("selected",true);
                        $('#tax_start_date').val(result[1].tax_start_date).prop("selected",true);
                        $('#last_tax_pay_date').val(result[1].last_tax_pay_date).prop("selected",true);

                    }
                    else{
                        $('#member_no').val(1);
                        $('#bostoForm_add').show();
                        $('#e_gram').val(null).prop("readonly",false);
                        $('#b_gram').val(null).prop("readonly",false);
                        $('#e_post').val(null).prop("readonly",false);
                        $('#b_post').val(null).prop("readonly",false);
                        $('#boshot_dhoron').val(null).prop("selected",false);
                        $('#tax_class').val(null).prop("selected",false);
                        $('#tax_start_date').val(null).prop("selected",false);
                        $('#last_tax_pay_date').val(null).prop("selected",false);
                    }
                },
            });
        });

        //bostoForm_add
        x=1;
        $('#bostoForm_add').on('click',function (e) {
            e.preventDefault();
            var max_fields = 30;

           if(x<max_fields){
               x++;
               $('#boshot_form').append('<div class="row mt-5"><div class="row col-sm-9 mt-4 ">\n' +
                   '                                                <label for=""  class="col-sm-4">সদস্যের ক্রমিক নং</label>\n' +
                   '                                                <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_nox" readonly>\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="name[]" id="name">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bname[]" id="bname">\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="efname[]" id="efname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname">\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="emname[]" id="emname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং </label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">জন্ম নিবন্ধন নং </label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8"  name="birth_cer[]" id="birth_cer" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পেশা<span style="color: red">*</span></label>\n' +
                   '                                                <select name="occa[]" id="occa" class="form-control col-sm-8">\n' +
                   '                                                    <option value="0">চিহ্নিত করুন</option>\n' +
                   '                                                    <option value="1">চিcc</option>\n' +
                   '\n' +
                   '                                                </select>\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মোবাইল নং </label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-9 mt-4 ">\n' +
                   '                                                <label for=""  class="col-sm-4">সরকারী সহযোগিতা পায় কি না<span> <input id="ref" class="" type="checkbox"></span></label>\n' +
                   '                                                <input type="text" class="col-sm-8 form-control" name="ref_name[]" id="ref_name" placeholder="রেফারেন্সের নাম" readonly>\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="col-sm-2 mt-4" >\n' +
                   '                                                <button style="background-color: red" id="bostoForm_sub" class="btn btn-success">remove</button>\n' +
                   '                                            </div>\n' +
                   '                                            \n' +
                   '\n' +
                   '                                            </div>\n' +
                   '                                        ');
               $('#member_nox').attr('id', "member_no"+x).val(x);
           }
        });

        $('#boshot_form').on("click","#bostoForm_sub", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;

            $("input[name^='member_no']").each(function(key) {
                $(this).val(key+1);
            });

        });

        //bosot_kor_aday

        $('#bosot_kor_aday_table').hide();
        $('#loaderDiv').hide();

        //bosot_kor_aday_table ajax

        $('#holding_search').on('click',function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('bosot_kor_aday')}}",
                data:{
                    'holding_no':$('#holding_no_search').val(),
                    'word_no':$('#word_no_search').val(),
                },
                beforeSend: function() {
                    $("#loaderDiv").show();
                },
                success:function (result) {
                    $("#loaderDiv").hide();
                    if(result == ''){
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#thottho2 > tbody:last-child').empty();
                        $('#bosot_kor_aday_table').hide();
                        alert('কোন তথ্য পাওয়া যায় নাই');

                    }
                    else{
                        $('#bosot_kor_aday_table').show();
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#thottho2 > tbody:last-child').empty();

                        var kor = result;
                        kor.forEach(function (data) {

                            $('#thottho').append( data.bname+'  '+'এর তথ্য');
                             var holding_no = data.holding_no;
                             var word_no = data.word_no;
                             var member_no = data.member_no;

                             var hold = 'holding_tax_pay/' + holding_no +'/'+ word_no +'/'+ member_no;


                            var newTr = "<tr>";
                            newTr += "<tr class='tr'> <th><b>নাম</b></th>";
                            newTr += "<td>" + data.bname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td>" + data.bfname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td>" + data.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>গ্রাম</b></th>";
                            newTr += "<td>" + data.b_gram + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পোষ্ট অফিস</b></th>";
                            newTr += "<td>" + data.b_post + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>বসতভিটার ধরন</b></th>";
                            newTr += "<td>" + data.b_post + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পেশা</b></th>";
                            newTr += "<td>" + data.occa + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>করের শ্রেনী</b></th>";
                            newTr += "<td>" + data.tax_class + "</td>";
                            newTr += "</tr>";

                            $('#thottho1 > tbody:last-child').append(newTr);

                            var newTr = "<tr>";
                            newTr += "<tr class='tr'> <th><b>হোল্ডিং নং</b></th>";
                            newTr += "<td>" + data.holding_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>ওয়ার্ড নং</b></th>";
                            newTr += "<td>" + data.word_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জাতীয় পরিচয় পত্র নং</b></th>";
                            newTr += "<td>" + data.nid + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জন্ম নিবন্ধন নং</b></th>";
                            newTr += "<td>" + data.birth_cer + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মোবাইল নং</b></th>";
                            newTr += "<td>" + data.mob + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>কর নির্ধারণের শুরুর সন</b></th>";
                            newTr += "<td>" + data.tax_start_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>সর্বশেষ কর পরিষদের শন</b></th>";
                            newTr += "<td>" + data.last_tax_pay_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>সর্বমোট বকেয়া</b></th>";
                            newTr += "<td>" +  + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b></b></th>";
                            newTr += "<td><div><a href='' id='payment' class='btn-sm btn-info' style='background-color: green'>Payment</a></div></td>";
                            newTr += "</tr>";

                            $('#thottho2 > tbody:last-child').append(newTr);

                            $('#payment').prop('href', hold);
                        });
                    }
                },
            });
        });



    </script>



@endsection