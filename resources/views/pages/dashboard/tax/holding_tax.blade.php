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
                        {{--বসতভিটার কর আদায়:--}}
                        <div id="bosot_kor_aday" class="tab-pane">
                            <div class="row text-right">
                               <div class="row col-sm-5">
                                   <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                   <select name="word_no_search" id="word_no_search" class="form-control col-sm-8 js-example-basic-single">
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

                            <div id="loaderDiv" class="text-center ">
                                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
                            </div>

                            <div class="card mt-5" id="bosot_kor_aday_table">
                                <div class="card-header font-14 font-weight-bold" id="thottho"></div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-bordered table-hover " id="thottho1">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table table-bordered table-hover" id="thottho2">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <button style="background-color: #022241;"class="w-100 btn btn-info mt-4">
                                        Holding TAX Payment History
                                    </button>

                                    <table  id="example" class="table table-striped table-bordered dt-responsive nowrap mt-4" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">

                                        <thead>
                                            <tr>
                                                <th width="">ক্র.নং</th>
                                                <th>পরিশোধের তারিখ</th>
                                                <th>মানি রসিদ নম্বর</th>
                                                {{--<th  style="color:red;white-space: nowrap;">পরিশোধিত অর্থ বছর</th>--}}
                                                <th>টাকার পরিমান</th>
                                                <th>মওকুফ</th>
                                                <th>পরিশোধিত টাকার পরিমান</th>
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

@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{asset('datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('datatables/js/dataTables.responsive.min.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
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
                        var tax_amount =result[1]
                        kor.forEach(function (data) {

                        $('#thottho').append( data.bname+'  '+'এর তথ্য');
                         var holding_no = data.holding_no;
                         var word_no = data.word_no;
                         var member_no = data.member_no;
                         var hold = 'holding_tax_pay/' + holding_no +'/'+ word_no +'/'+ member_no+'/'+tax_amount;

                            var newTr = "<tr>";
                            newTr += "<tr class='tr'> <th><b>নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bfname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>গ্রাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.b_gram + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পোষ্ট অফিস</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.b_post + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>বসতভিটার ধরন</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bosot_vitar_dhorons.bosot_vitar_dhoron + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>পেশা</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.occupations.occupation + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>করের শ্রেনী</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.tax_classs.tax_class + "</td>";
                            newTr += "</tr>";

                            $('#thottho1 > tbody:last-child').append(newTr);

                            var newTr = "<tr>";
                            newTr += "<tr class='tr' style='color: red'> <th><b>হোল্ডিং নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.holding_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>ওয়ার্ড নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.word_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জাতীয় পরিচয় পত্র নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.nid + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>জন্ম নিবন্ধন নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.birth_cer_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মোবাইল নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.mob + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>কর নির্ধারণের শুরুর অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.tax_start_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>সর্বশেষ কর পরিষদের অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.last_tax_pay_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>সর্বমোট বকেয়া</b></th>";
                            newTr += "<td class='font-weight-bold'>" + result[1] + "</td>";
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

        $('#holding_search').on('click',function () {
            $('#holding_search').prop('disabled',true);
            $('#example').DataTable().destroy();
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],

                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('holding_tax_pay_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        holding_no: $('#holding_no_search').val(),
                        word_no: $('#word_no_search').val(),
                    },
                    complete: function() {
                        $('#holding_search').prop('disabled',false);
                    },
                },
                "columns": [
                    { "data": "id"},
                    { "data": "tax_pay_date" },
                    { "data": "money_recieve_no" },
                    //{ "data": "last_tax_pay_date" },
                    { "data": "total_money" },
                    { "data": "moukuf" },
                    { "data": "total_payable_amount"},
                    { "data": "action" },

                ],
            });
        })

    </script>

@endsection