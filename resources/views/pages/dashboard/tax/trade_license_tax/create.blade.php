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
                                    <div class="">
                                        <table class="table table-bordered table-hover " id="thottho1">
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
        </div>
    </div>
@endsection

@section('script')
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

        $('#sonod_no').on('keyup' ,function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('trade_license_sonod_search')}}",
                data:{
                    'sonod_no':$('#sonod_no').val(),
                },
                success:function (result) {
                    $('#bcomname').val(result.bcomname);
                    $('#ownertype').val(result.ownertype);
                    $('#bb_gram').val(result.bb_gram);
                    $('#bb_wordno').val(result.bb_wordno);
                    $('#mob').val(result.mob);
                },
            });
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
                    console.log(result)
                    $("#loaderDiv").hide();
                    if(result == ''){
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#trade_license_table').hide();
                        alert('কোন তথ্য পাওয়া যায় নাই');
                    }
                    else{
                        $('#trade_license_table').show();
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();

                        result.forEach(function (data) {

                            $('#thottho').append( data.bwname+'  '+'এর তথ্য');
                            var holding_no = data.taxid;
                            var word_no = data.bb_wordno;


                            //var hold = 'holding_tax_pay/' + holding_no +'/'+ word_no +'/'+ member_no+'/'+tax_amount;


                            var newTr = "<tr>";
                            if (data.ownertype==1){
                                newTr += "<tr class='tr'> <th width='30%'><b>ব্যবসার ধরন</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "ব্যক্তি মালিকানাধীন" + "</td>";
                                newTr += "</tr>";
                            }
                            else if(data.ownertype==2){
                                newTr += "<tr class='tr'> <th width='30%'><b>ব্যবসার ধরন</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "যৌথ মালিকানা" + "</td>";
                                newTr += "</tr>";
                            }
                            else{
                                newTr += "<tr class='tr'> <th width='30%'><b>ব্যবসার ধরন</b></th>";
                                newTr += "<td class='font-weight-bold'>" + "কোম্পানী" + "</td>";
                                newTr += "</tr>";
                            }

                            newTr += "<tr class='tr'> <th><b>মালিকের নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bwname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.efname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>ওয়ার্ড নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bb_wordno + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>বাজারের নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.bazarName + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>মোবাইল </b></th>";
                            newTr += "<td class='font-weight-bold'>" + data.mob + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th width='30%'><b>বাৎসরিক ট্যাক্সের পরিমান </b></th>";
                            newTr += "<td class=''> <div class=''><input type='text' class='form-control col-sm-9'> <button class='btn-sm btn-success col-sm-offset-1' style='background-color: darkgreen'>Payment</button></div>" +"</td>";


                            $('#thottho1 > tbody:last-child').append(newTr);


                            $('#payment').prop('href', hold);
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
                    "url": "{{ route('holding_tax_pay_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        holding_no: $('#holding_no_search').val(),
                        word_no: $('#word_no_search').val(),
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
        })

    </script>
@endsection