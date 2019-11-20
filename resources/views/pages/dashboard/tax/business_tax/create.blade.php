@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>ব্যবসায়ী কর আদায়</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row box" style="padding-bottom:20px;margin-top:10px; ">
                                        <div class="container">
                                            <ul class="nav nav-tabs font-weight-bold" id="myTab">
                                                <li class="active"><a data-toggle="tab" href="#banijjik_reg"  >ব্যবসায়ী কর রেজিস্ট্রেশন ফরম</a></li>
                                                <li class=""><a data-toggle="tab"  href="#banijjik_kor_aday"  >ব্যবসায়ী কর আদায়</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">

                                {{--ব্যবসায়ী কর রেজিস্ট্রেশন ফরম--}}
                                <div id="banijjik_reg"  class="tab-pane active text-right mt-3">
                                    <div class="card">
                                        <div class="card-header text-center" style="background-color: #DDDDDD"><b>ব্যবসায়ী কর রেজিস্ট্রেশন ফরম</b></div>
                                        <div class="card-body">
                                            <form action="{{route('business_tax.store')}}" method="post" id="banijjik">
                                               @csrf
                                                <div class="row mt-5 ">
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মালিকের নাম(ইংরেজীতে) </label>
                                                        <input type="text" class="form-control col-sm-7" name="ownerEname" id="ownerEname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মালিকের নাম(বাংলায়) <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="ownerBname" id="ownerBname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">পিতার নাম(ইংরেজীতে) </label>
                                                        <input type="text" class="form-control col-sm-7" name="efname" id="efname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">পিতার নাম(বাংলায়) <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="bfname" id="bfname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মাতার নাম(ইংরেজীতে) </label>
                                                        <input type="text" class="form-control col-sm-7" name="emname" id="emname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মাতার নাম(বাংলায়) <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="bmname" id="bmname">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">পোষ্ট অফিস</label>
                                                        <input type="text" class="form-control col-sm-7" name="postOffice" id="postOffice">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">গ্রাম <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="gram" id="gram">
                                                    </div>

                                                    <div class="row col-sm-12 mt-4 border border-light"></div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">ওয়ার্ড নং <span style="color: red">*</span></label>
                                                        <select name="word_no" id="word_no" class="form-control col-sm-7 js-example-basic-single">
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

                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মালিকের হোল্ডিং নং <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="holding_no" id="holding_no">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">রুম/দোকান নং <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control col-sm-7" name="roomNo" id="roomNo">
                                                    </div>
                                                    <div class=" col-sm-6 mt-4" id="last_tax_pay_date">
                                                        <label for="" class="col-sm-5">ব্যবসার ধরন <span style="color: red">*</span></label>
                                                        <select name="business_type" id="business_type" class="form-control col-sm-7">
                                                            <option value="0">চিহ্নিত করুন</option>
                                                            @foreach($business_type as $business_types)
                                                                <option value="{{$business_types->id}}" > {{$business_types->business_type}} </option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <div class=" col-sm-6 mt-4" id="tax_start_date">
                                                        <label for="" class="text-right col-sm-5">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                                                        <select name="tax_start_date" id="tax_start_date" class="form-control col-sm-7">
                                                            <option value="0">চিহ্নিত করুন</option>
                                                            <option value="2025-2026" > 2027-2028 </option>
                                                            <option value="2025-2026" > 2026-2027 </option>
                                                            <option value="2025-2026" > 2025-2026 </option>
                                                            <option value="2024-2025" > 2024-2025 </option>
                                                            <option value="2023-2024" > 2023-2024 </option>
                                                            <option value="2022-2023" > 2022-2023 </option>
                                                            <option value="2021-2022" > 2021-2022 </option>
                                                            <option value="2020-2021" > 2020-2021 </option>
                                                            <option value="2019-2020" > 2019-2020 </option>
                                                            <option value="2018-2019" > 2018-2019 </option>
                                                            <option value="2017-2018" > 2017-2018 </option>
                                                            <option value="2016-2017" > 2016-2017 </option>
                                                            <option value="2015-2016" > 2015-2016 </option>
                                                            <option value="2014-2015" > 2014-2015 </option>
                                                            <option value="2013-2014" > 2013-2014 </option>
                                                            <option value="2012-2013" > 2012-2013 </option>
                                                        </select>
                                                    </div>

                                                    <div class=" col-sm-6 mt-4" id="last_tax_pay_date">
                                                        <label for="" class="col-sm-5">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                                                        <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control col-sm-7">
                                                            <option value="0">চিহ্নিত করুন</option>
                                                            <option value="2025-2026" > 2027-2028 </option>
                                                            <option value="2025-2026" > 2026-2027 </option>
                                                            <option value="2025-2026" > 2025-2026 </option>
                                                            <option value="2024-2025" > 2024-2025 </option>
                                                            <option value="2023-2024" > 2023-2024 </option>
                                                            <option value="2022-2023" > 2022-2023 </option>
                                                            <option value="2021-2022" > 2021-2022 </option>
                                                            <option value="2020-2021" > 2020-2021 </option>
                                                            <option value="2019-2020" > 2019-2020 </option>
                                                            <option value="2018-2019" > 2018-2019 </option>
                                                            <option value="2017-2018" > 2017-2018 </option>
                                                            <option value="2016-2017" > 2016-2017 </option>
                                                            <option value="2015-2016" > 2015-2016 </option>
                                                            <option value="2014-2015" > 2014-2015 </option>
                                                            <option value="2013-2014" > 2013-2014 </option>
                                                            <option value="2012-2013" > 2012-2013 </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">মোবাইল</label>
                                                        <input type="text" class="form-control col-sm-7" name="mob" id="mob" placeholder="ইংরেজিতে প্রদান করুন">
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label for="" class="col-sm-5">ইমেইল </label>
                                                        <input type="text" class="form-control col-sm-7" name="email" id="email" placeholder="ইংরেজিতে প্রদান করুন">
                                                    </div>
                                                    <div class="col-sm-offset-6 mt-4">
                                                        <button class="btn btn-success" id="submit" style="background-color: darkgreen">দাখিল</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{--ব্যবসায়ী কর আদায়--}}
                                <div id="banijjik_kor_aday"  class="tab-pane text-right mt-3">
                                    <div class="row mt-5">
                                        <div class="col-sm-3 mt-4">
                                            <label for="" class="col-sm-5">ওয়ার্ড <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="word_no" id="word_no_search" placeholder="ইংরেজিতে প্রদান করুন">
                                        </div>
                                        <div class="col-sm-4 mt-4">
                                            <label for="" class="col-sm-5">মালিকের হোল্ডিং নং <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="holding_no" id="holding_no_search" placeholder="ইংরেজিতে প্রদান করুন">
                                        </div>
                                        <div class="col-sm-3 mt-4">
                                            <label for="" class="col-sm-5">দোকান নং <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="roomNo" id="roomNo_search" placeholder="ইংরেজিতে প্রদান করুন">
                                        </div>
                                        <div class="col-sm-2 text-left mt-4">
                                            <button class="btn" style="background-color: #022241;color: white" id="search">search</button>
                                        </div>
                                    </div>
                                    <div  class="card mt-5 text-left" id="banijjik_kor_aday_table">
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
                                                Business TAX Payment History
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
                                                    {{--<th>Action</th>--}}
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

        $('#loaderDiv').hide();
        $('#banijjik_kor_aday_table').hide();


        $('#search').on('click',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('business_kor_aday')}}",
                data:{
                    'holding_no':$('#holding_no_search').val(),
                    'word_no':$('#word_no_search').val(),
                    'roomNo':$('#roomNo_search').val(),
                },
                beforeSend: function() {
                    $("#loaderDiv").show();
                },
                success:function (result) {

                    $("#loaderDiv").hide();
                    if(result[0] == null){
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#thottho2 > tbody:last-child').empty();
                        $('#bosot_kor_aday_table').hide();
                        alert('কোন তথ্য পাওয়া যায় নাই');

                    }
                    else{
                        $('#banijjik_kor_aday_table').show();
                        $('#thottho').empty();
                        $('#thottho1 > tbody:last-child').empty();
                        $('#thottho2 > tbody:last-child').empty();

                        var kor = result[0];
                        var tax_amount =result[1];
                        //console.log(result[1]);

                            $('#thottho').append( kor.ownerBname+'  '+'এর তথ্য');
                            var holding_no = kor.holding_no;
                            var word_no = kor.word_no;
                            var roomNo = kor.roomNo;

                            var hold = 'business_tax_pay/' + holding_no +'/'+ word_no +'/'+ roomNo+'/'+tax_amount;


                            var newTr = "<tr>";
                            newTr += "<tr class='tr'> <th><b>নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.ownerBname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পিতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.bfname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মাতার নাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.bmname + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>গ্রাম</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.gram + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>পোষ্ট অফিস</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.postOffice + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>মোবাইল নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.mob + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>কর নির্ধারণের শুরুর অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.tax_start_date + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: blue'> <th><b>সর্বশেষ কর পরিষদের অর্থবছর</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.last_tax_pay_date + "</td>";
                            newTr += "</tr>";


                            $('#thottho1 > tbody:last-child').append(newTr);

                            var newTr = "<tr>";
                            newTr += "<tr class='tr' style='color: red'> <th><b>হোল্ডিং নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.holding_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>ওয়ার্ড নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.word_no + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>দোকান/রুম নং</b></th>";
                            newTr += "<td class='font-weight-bold'>" + kor.roomNo + "</td>";
                            newTr += "</tr>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b>ব্যবসার ধরন</b></th>";
                            newTr += "<td class='font-weight-bold'>" + result[2].business_type + "</td>";
                            newTr += "<tr> <th><b>বাৎসরিক করের পরিমান (টাকায়)</b></th>";
                            newTr += "<td class='font-weight-bold'>" + result[2].amount + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr style='color: red'> <th><b>সর্বমোট বকেয়া (টাকায়)</b></th>";
                            newTr += "<td class='font-weight-bold'>" + result[1] + "</td>";
                            newTr += "</tr>";
                            newTr += "<tr> <th><b></b></th>";
                            newTr += "<td><div><a href='' id='payment' class='btn-sm btn-info' style='background-color: green'>Payment</a></div></td>";
                            newTr += "</tr>";

                            $('#thottho2 > tbody:last-child').append(newTr);

                            $('#payment').prop('href', hold);

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
                    "url": "{{ route('business_tax_pay_list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{ csrf_token() }}",
                        holding_no: $('#holding_no_search').val(),
                        word_no: $('#word_no_search').val(),
                        roomNo:$('#roomNo_search').val(),
                    },
                },
                "columns": [
                    { "data": "id"},
                    { "data": "tax_pay_date" },
                    { "data": "money_recieve_no" },
                    { "data": "total_money" },
                    { "data": "moukuf" },
                    { "data": "total_payable_amount"},
                    // { "data": "action" },
                ],

            });
        })

    </script>

@endsection

