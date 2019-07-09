@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body"  style="min-height:310px;">
                   <div class="card">
                       <div class="card-header" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;">
                           <b>বসত ভিটার ফি পরিশোধ ফরম</b>
                       </div>
                       <div class="card-body">
                           <div class="row font-weight-bold">
                                <div class="col-sm-4">
                                   <table class="table table-bordered table-hover ">
                                       <tr>
                                           <th>নাম</th>
                                           <td >{{$payment->bname}}</td>
                                       </tr>
                                       <tr>
                                           <th>পিতার নাম</th>
                                           <td >{{$payment->bfname}}</td>
                                       </tr>
                                       <tr>
                                           <th>মাতার  নাম</th>
                                           <td >{{$payment->bmname}}</td>
                                       </tr>
                                       <tr>
                                           <th>গ্রাম</th>
                                           <td >{{$payment->b_gram}}</td>
                                       </tr>
                                       <tr>
                                           <th>পোষ্ট অফিস</th>
                                           <td >{{$payment->b_post}}</td>
                                       </tr>
                                   </table>
                               </div>
                               <div class="col-sm-4">
                                   <table class="table table-bordered table-hover">
                                       <tr>
                                           <th>জাতীয় পরিচয় পত্র নং</th>
                                           <td>{{$payment->nid}}</td>
                                       </tr>
                                       <tr>
                                           <th>জন্ম নিবন্ধন নং</th>
                                           <td>{{$payment->birth_cer}}</td>
                                       </tr>
                                       <tr>
                                           <th>ওয়ার্ড নং</th>
                                           <td style="color: red">{{$payment->word_no}}</td>
                                       </tr>
                                       <tr>
                                           <th>হোল্ডিং নং</th>
                                           <td style="color: red">{{$payment->holding_no}}</td>
                                       </tr>
                                       <tr>
                                           <th>মোবাইল নং</th>
                                           <td>{{$payment->mob}}</td>
                                       </tr>
                                   </table>
                               </div>
                               <div class="col-sm-4">
                                   <table class="table table-bordered table-hover">
                                       <tr>
                                           <th>বসতভিটার ধরন</th>
                                           <td>{{$payment->boshot_dhoron}}</td>
                                       </tr>
                                       <tr>
                                           <th>পেশা</th>
                                           <td >{{$payment->occa}}</td>
                                       </tr>
                                       <tr>
                                           <th>করের শ্রেনী</th>
                                           <td >{{$payment->tax_class}}</td>
                                       </tr>
                                       <tr>
                                           <th>ধার্যকৃত টাকা</th>
                                           <td style="color: red">{{$payment->holding_no}}</td>
                                       </tr>
                                   </table>
                               </div>
                           </div>
                           <div class="border border-success" style="background-color: #022241"></div>
                           <form action="" >

                           <div class="row mt-5">
                               <div class="col-sm-7 ">
                                    <div class="payment_year">
                                        <div class="col-sm-5">
                                            <label for="" class="text-center col-sm-12 font-weight-bold font-16" style="color: blue">অর্থবছর</label>
                                            <select name="" id="" class="form-control col-sm-12">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="9" > 2023-2024 </option>
                                                <option value="8" > 2022-2023 </option>
                                                <option value="7" > 2021-2022 </option>
                                                <option value="6" > 2020-2021 </option>
                                                <option value="5" > 2017-2018 </option>
                                                <option value="4" > 2016-2017 </option>
                                                <option value="3" > 2015-2016 </option>
                                                <option value="2" > 2014-2015 </option>
                                                <option value="1" > 2013-2014 </option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="" class="text-center col-sm-12 font-weight-bold font-16" style="color: blue">টাকার পরিমান</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 mt-5">
                                            <button class="btn btn-info" style="background-color: green" id="patment_year_add"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                               </div>
                               <div class="border border-danger"></div>
                                   <div class="col-sm-4 text-right">
                                       <div class="row">
                                           <label for="" class="col-sm-5">পরিশোধের তারিখ <span style="color: red">*</span></label>
                                           @php
                                               $presentDays = \Carbon\Carbon::parse(\Carbon\Carbon::today());
                                           //dd($presentDays);
                                           @endphp
                                           <input type="date" class="form-control col-sm-7" name="tax_pay_date" value="{{$presentDays}}">
                                       </div>
                                       <div class="row mt-4">
                                           <label for="" class="col-sm-5">মানি রসিদ নম্বর <span style="color: red">*</span></label>
                                           <input type="text" class="form-control col-sm-7" name="money_recieve_no" value="">
                                       </div>

                                       <div class="row mt-4">
                                           <label for="" class="col-sm-5">মোট টাকা<span style="color: red">*</span></label>
                                           <input type="text" class="form-control col-sm-7" name="money_recieve_no" value="" readonly>
                                       </div>
                                       <div class="row mt-4">
                                           <label for="" class="col-sm-5">মওকুফ টাকা <span style="color: red">*</span></label>
                                           <input type="text" class="form-control col-sm-7" name="money_recieve_no" value="">
                                       </div>
                                       <div class="row mt-4">
                                           <label for="" class="col-sm-5">পরিশোধিত টাকার পরিমান <span style="color: red">*</span></label>
                                           <input type="text" class="form-control col-sm-7" name="money_recieve_no" value="" readonly>
                                       </div>
                                       <button class="btn-sm btn-info" style="background-color: green">Payment</button>
                                   </div>
                                </div>
                           </form>

                       </div>

                   </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script>
        x=1;
        $('#patment_year_add').on('click',function (e) {
            e.preventDefault();
            var max_fields = 30;

            if(x<max_fields){
                x++;
                $('.payment_year').append('<div class="">\n' +
                    '                                        <div class="col-sm-5">\n' +
                    '                                            <label for="" class="text-center col-sm-12 font-weight-bold font-16" style="color: blue">অর্থবছর</label>\n' +
                    '                                            <select name="" id="" class="form-control col-sm-12">\n' +
                    '                                                <option value="0">চিহ্নিত করুন</option>\n' +
                    '                                                <option value="9" > 2023-2024 </option>\n' +
                    '                                                <option value="8" > 2022-2023 </option>\n' +
                    '                                                <option value="7" > 2021-2022 </option>\n' +
                    '                                                <option value="6" > 2020-2021 </option>\n' +
                    '                                                <option value="5" > 2017-2018 </option>\n' +
                    '                                                <option value="4" > 2016-2017 </option>\n' +
                    '                                                <option value="3" > 2015-2016 </option>\n' +
                    '                                                <option value="2" > 2014-2015 </option>\n' +
                    '                                                <option value="1" > 2013-2014 </option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-sm-5">\n' +
                    '                                            <label for="" class="text-center col-sm-12 font-weight-bold font-16" style="color: blue">টাকার পরিমান</label>\n' +
                    '                                            <div class="col-sm-12">\n' +
                    '                                                <input type="text" class="form-control" readonly>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-sm-1 mt-5">\n' +
                    '                                            <button class="btn btn-info" style="background-color: red" id="patment_year_minus"><i class="fa fa-minus"></i></button>\n' +
                    '                                        </div>\n' +
                    '                                    </div>');
            }
        });

        $('.payment_year').on("click","#patment_year_minus", function(e) {
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;
        });

    </script>

    @endsection
