@extends('layouts.front_end_layout.master')
@section('head_content')
    হোল্ডিং ট্যাক্স যাচাই
@endsection
@section('content')
    <div class="panel panel-default mb-5">
        <div class="panel-body" >
            <div class="row">
                <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                    <div class="form-group has-feedback col-sm-6">
                        <label for="Delivery-type" class="col-sm-3 control-label text-right">ওয়ার্ড নং <span style="color: red">*</span></label>
                        <div class="col-sm-8 has-feedback" id="">
                            <input type="text" class="form-control" id="word_no" placeholder="ইংরেজিতে ওয়ার্ড নং প্রদান করুন">
                        </div>
                    </div>

                    <div class="form-group has-feedback col-sm-6">
                        <label for="Delivery-type" class="col-sm-3 control-label text-right">হোল্ডিং নং <span style="color: red">*</span></label>
                        <div class="col-sm-8 has-feedback" id="">
                            <input type="text" class="form-control" id="holding_no" placeholder="ইংরেজিতে হোল্ডিং নং প্রদান করুন">
                        </div>
                    </div>
                </div>
                <button class="btn btn-success col-sm-offset-6" id="submit" style="background-color: darkgreen">search</button>
            </div>
            <div id="loaderDiv" class="text-center ">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
            </div>

            <div class=" mt-5" id="bosot_kor_aday_table">
                <h4 class=" font-14 font-weight-bold" id="thottho"></h4>
                <div class="">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-bordered table-hover " id="thottho1">
                                <tbody style="font-weight: bold">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered table-hover" id="thottho2">
                                <tbody style="font-weight: bold">

                                </tbody>
                            </table>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        $('#bosot_kor_aday_table').hide();
        $('#loaderDiv').hide();

        $('#submit').on('click',function () {

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
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                beforeSend: function() {
                    $("#loaderDiv").show();
                },
                success:function (result) {
                    $("#loaderDiv").hide();
                    if(result[0] == ''){
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

                        var kor = result[0];
                        var tax_amount =result[1];
                        kor.forEach(function (data) {

                            $('#thottho').append( data.bname+'  '+'এর তথ্য');
                            var holding_no = data.holding_no;
                            var word_no = data.word_no;
                            var member_no = data.member_no;

                            var hold = 'front/holding_tax_pay/' + holding_no +'/'+ word_no +'/'+ member_no+'/'+tax_amount;


                            var newTr = "<tr>";
                            newTr += "<tr class='tr'> <th><b>নাম</b></th>";
                            newTr += "<td >" + data.bname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td >" + data.bfname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td >" + data.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>গ্রাম</b></th>";
                            newTr += "<td >" + data.b_gram + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পোষ্ট অফিস</b></th>";
                            newTr += "<td >" + data.b_post + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>বসতভিটার ধরন</b></th>";
                            newTr += "<td >" + data.bosot_vitar_dhorons.bosot_vitar_dhoron + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>পেশা</b></th>";
                            newTr += "<td >" + data.occupations.occupation + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>করের শ্রেনী</b></th>";
                            newTr += "<td >" + data.tax_classs.tax_class + "</td>";
                            newTr += "</tr>";



                            $('#thottho1 > tbody:last-child').append(newTr);

                            var newTr = "<tr>";
                            newTr += "<tr class='tr' style='color: red'> <th><b>হোল্ডিং নং</b></th>";
                            newTr += "<td >" + data.holding_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>ওয়ার্ড নং</b></th>";
                            newTr += "<td >" + data.word_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জাতীয় পরিচয় পত্র নং</b></th>";
                            newTr += "<td >" + data.nid + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জন্ম নিবন্ধন নং</b></th>";
                            newTr += "<td >" + data.birth_cer_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মোবাইল নং</b></th>";
                            newTr += "<td >" + data.mob + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>কর নির্ধারণের শুরুর অর্থবছর</b></th>";
                            newTr += "<td >" + data.tax_start_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>সর্বশেষ কর পরিষদের অর্থবছর</b></th>";
                            newTr += "<td >" + data.last_tax_pay_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>সর্বমোট বকেয়া</b></th>";
                            newTr += "<td >" + result[1] + "</td>";
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
