@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ট্রেড লাইসেন্সধারির কর আদায়</b></div>
                    <div class="panel-body"  style="min-height:310px;">
                        <div class="row mt-5 text-right">
                            <div class="col-sm-6">
                                <label for="" class="col-sm-5">ওয়ার্ড নং</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="word_no" id="word_no">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="col-sm-5">মুল মালিকের বাণিজ্যিক হোল্ডিং নং</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="taxid" id="taxid">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="col-sm-5">দোকান নং </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="dokanNo" id="dokanNo">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="col-sm-5">ব্যবসায়ী তালিকা নং</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="btalikaNo" id="btalikaNo">
                                </div>
                            </div>
                            <div class="col-sm-offset-6 col-sm-6 mt-4 text-left">
                                <button class="btn btn-info" id="search" style="background-color: #022241" >search</button>
                            </div>
                            <div class="row col-sm-12 mt-4 border border-light"></div>

                            <div id="loaderDiv" class="text-center row col-sm-offset-6">
                                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        {{--trade license info show--}}
                        <div class="card mt-5" id="trade_license_table">
                            <div class="card-header font-14 font-weight-bold" id="thottho"></div>
                            <div class="card-body">
                                <div class="col-sm-6">
                                    <table class="table table-bordered table-hover " id="thottho1">
                                        <tbody style="color: blue" >

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="table table-bordered table-hover " id="thottho2">
                                        <tbody >

                                        </tbody>
                                    </table>
                                </div>


                                <button style="background-color: #022241;"class="w-100 btn btn-info mt-4">
                                    Trade License TAX Payment History
                                </button>

                                <table  id="example" class="table table-striped table-bordered dt-responsive nowrap mt-4" cellspacing="0" width="100%" style="color: #000102;font-weight:bolder;">
                                    <thead>
                                    <tr>
                                        <th width="">ক্র.নং</th>
                                        <th>পরিশোধের তারিখ</th>
                                        <th>মানি রসিদ নম্বর</th>
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

        $('#trade_license_table').hide();
        $('#loaderDiv').hide();

        $('#search').on('click',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('trade_license_kor_aday')}}",
                data:{
                    'taxid':$('#taxid').val(),
                    'word_no':$('#word_no').val(),
                    'dokanNo':$('#dokanNo').val(),
                    'btalikaNo':$('#btalikaNo').val(),
                },
                beforeSend: function() {
                    $("#loaderDiv").show();
                },
                success:function (result) {
                    $("#loaderDiv").hide();
                    if(result[0] == ''){
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#trade_license_table').hide();
                        alert('কোন তথ্য পাওয়া যায় নাই');
                    }
                    else{
                        $('#trade_license_table').show();
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#thottho2 > tbody:last-child').empty();

                        result[0].forEach(function (data) {

                            $('#thottho').append( data.bwname+'  '+'এর তথ্য');
                            var taxid = data.taxid;
                            var word_no = data.be_wordno;
                            var dokan = data.dokanNo;
                            var btalikaNo = data.btalikaNo;
                            var tax_amount = result[1];

                            var trade = 'tradeLicense_tax_pay/' + taxid +'/'+ word_no +'/'+ dokan+'/'+tax_amount+'/'+btalikaNo;


                            var newTr = "<tr>";
                            if (data.ownertype==1){
                                newTr += "<tr class='tr'> <th width=''><b>প্রতিষ্ঠানের মালিকানার ধরণ</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "ব্যক্তি মালিকানাধীন" + "</td>";
                                newTr += "</tr>";
                            }
                            else if(data.ownertype==2){
                                newTr += "<tr class='tr'> <th width=''><b>প্রতিষ্ঠানের মালিকানার ধরণ</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "যৌথ মালিকানা" + "</td>";
                                newTr += "</tr>";
                            }
                            else{
                                newTr += "<tr class='tr'> <th width=''><b>প্রতিষ্ঠানের মালিকানার ধরণ</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "কোম্পানী" + "</td>";
                                newTr += "</tr>";
                            }
                            newTr += "<tr class='tr'> <th><b>ব্যবসার ধরন</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.business.business_type + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr class='tr'> <th><b>মূল মালিকের নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bwname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.efname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>বাজারের নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bazarName + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr > <th><b>মোবাইল </b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.mob + "</td>";

                            $('#thottho1 > tbody:last-child').append(newTr);

                            var newTr = "<tr>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th width=''><b>বাৎসরিক ট্যাক্সের পরিমান </b></th>";
                            newTr += "<td class='font-weight-bold'> " +data.tax_amount+ "</td>";
                            newTr += "<tr style='color: red'> <th><b>কর নির্ধারণের শুরুর অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.tax_start_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>সর্বশেষ কর পরিষদের অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.last_tax_pay_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>সর্বমোট বকেয়া</b></th>";
                            newTr += "<td class='font-weight-bold'>" + result[1] + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b></b></th>";
                            newTr += "<td><div><a href='' id='payment' class='btn-sm btn-info' style='background-color: green'>Payment</a></div></td>";
                            newTr += "</tr>";
                            $('#thottho2 > tbody:last-child').append(newTr);

                            $('#payment').prop('href', trade);
                        });
                    }
                },
            });
        });

        $('#search').on('click',function () {
            $('#example').DataTable().destroy();
            $('#example'). DataTable( {
                "lengthMenu": [[ 25, 50,100, -1], [ 25, 50,100, "All"]],
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},

                "ajax":{
                    "url": "{{ route('tradeLcense_tax_pay_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        taxid: $('#taxid').val(),
                        word_no: $('#word_no').val(),
                        dokanNo: $('#dokanNo').val(),
                        btalikaNo: $('#btalikaNo').val(),
                    },
                },
                "columns": [
                    { "data": "id"},
                    { "data": "tax_pay_date" },
                    { "data": "money_recieve_no" },
                    { "data": "total_money" },
                    { "data": "moukuf" },
                    { "data": "total_payable_amount"},
                    { "data": "action" },
                ],
            });
        });

    </script>
@endsection