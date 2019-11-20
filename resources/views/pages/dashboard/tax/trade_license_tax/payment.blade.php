@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body"  style="min-height:310px;">
                    <div class="card">
                        <div class="card-header" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;">
                            <b>ট্রেড লাইসেন্সধারির ট্যাক্স পরিশোধ ফরম</b>
                        </div>
                        <div class="card-body">
                            <div class="row font-weight-bold">
                                <div class="col-sm-4">
                                    <table class="table table-bordered table-hover ">
                                        <tr style='color: blue'>
                                            <th><b>প্রতিষ্ঠানের মালিকানার ধরণ</b></th>
                                            @if($payment->ownertype==1)
                                                <td >ব্যক্তি মালিকানাধীন</td>
                                            @elseif($payment->ownertype==2)
                                                <td >যৌথ মালিকানা</td>
                                            @else
                                                কোম্পানী
                                                @endif
                                        </tr>
                                        <tr style='color: blue'>
                                            <th><b>প্রতিষ্ঠানের নাম</b></th>
                                            <td >{{$payment->bcomname}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>মূল মালিকের নাম</b></th>
                                            <td >{{$payment->ewname}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>পিতার নাম</b></th>
                                            <td >{{$payment->efname}}</td>
                                        </tr>
                                        <tr>
                                            <th><b>মাতার নাম</b></th>
                                            <td >{{$payment->emname}}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-sm-4">
                                    <table class="table table-bordered table-hover">
                                        <tr style='color: blue'>
                                            <th><b>মালিকের বাণিজ্যিক হোল্ডিং নং</b></th>
                                            <td>{{$payment->taxid}}</td>
                                        </tr>
                                        <tr style='color: blue'>
                                            <th><b>দোকান নং</b></th>
                                            <td>{{$payment->dokanNo}}</td>
                                        </tr>
                                        <tr style='color: blue'>
                                            <th><b>ব্যবসায়ী তালিকা নং</b></th>
                                            <td id="">{{$payment->btalikaNo}}</td>
                                        </tr>
                                        <tr >
                                            <th><b>বাজারের নাম</b></th>
                                            <td id="">{{$payment->bazarName}}</td>
                                        </tr>
                                        <tr >
                                            <th><b>ব্যবসার ধরন</b></th>
                                            <td>{{$payment->business->business_type}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-4" >
                                    <table class="table table-bordered table-hover " style="color: blue">
                                        <tr style='color: blue'>
                                            <th><b>ওয়ার্ড নং</b></th>
                                            <td >{{$payment->be_wordno}}</td>
                                        </tr>
                                        <tr style='color: red'>
                                            <th><b>কর নির্ধারণের শুরুর অর্থবছর</b></th>
                                            <td>{{$payment->tax_start_date}}</td>
                                        </tr>
                                        <tr style='color: red'>
                                            <th><b>সর্বশেষ কর পরিষদের অর্থবছর</b></th>
                                            <td >{{$payment->last_tax_pay_date}}</td>
                                        </tr>

                                        <tr style="color: red">
                                            <th><b>সর্বমোট বকেয়া</b></th>
                                            <td >
                                                @if($tax_amount>=0)
                                                    {{$tax_amount}}
                                                @else
                                                    অগ্রীম {{-$tax_amount}} টাকা পরিষদ করা আছে
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="border border-success" style="background-color: #022241"></div>
                            <form action="{{route('trade_license_tax_payment')}}" method="POST" >
                                @csrf

                                <div class="row mt-5">
                                    <div class="col-sm-6 ">
                                        @php
                                            $now =  \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y');;
                                            $diff = $now-$last_year1;
                                            $current_month= Carbon\Carbon::now()->format('m');
                                        @endphp
                                        @if($diff>=0)
                                            @if($current_month>6)
                                                <div class="font-18 font-weight-bold" style="color: blue">জনাব {{$payment->ewname}} এর
                                                    @for($i=0;$i<$diff+1;$i++)
                                                        <span class="font-18 font-weight-bold" style="color: red">{{$last_year1 ++}}-{{$last_year2 ++}}</span>,
                                                    @endfor
                                                    <span style="color: black">({{$diff+1 }})</span> টি অর্থ বছরের কর বাকি আছে ।
                                                </div>
                                                <div class="row mt-5 text-left">
                                                    <label for="" class="col-sm-5">কয়টি অর্থ বছরের কর পরিষদ করবেন</label>
                                                    <input type="number" min="0" class="form-control col-sm-6 ortho_year_payable" name="ortho_year_payable">
                                                    <input type="hidden" class="form-control col-sm-6" name="ortho_year_diff_count" value="{{$diff+1}}">
                                                </div>

                                            @else
                                                <div class="font-18 font-weight-bold" style="color: blue">জনাব {{$payment->ewname}} এর
                                                    @for($i=0;$i<$diff;$i++)
                                                        <span class="font-18 font-weight-bold" style="color: red">{{$last_year1 ++}}-{{$last_year2 ++}}</span>,
                                                    @endfor
                                                    <span style="color: black">({{$diff }})</span> টি অর্থ বছরের বাকি আছে ।
                                                </div>
                                                <div class="row mt-5 text-left">
                                                    <label for="" class="col-sm-5">কয়টি অর্থ বছরের কর পরিষদ করবেন</label>
                                                    <input type="number" min="0" class="form-control col-sm-6 ortho_year_payable" name="ortho_year_payable">
                                                    <input type="hidden" class="form-control col-sm-6" name="ortho_year_diff_count" value="{{$diff}}">
                                                </div>
                                            @endif

                                        @else
                                            @if($tax_amount>=0)
                                                <div  class="font-16 font-weight-bold" style="color: blue">জনাব {{$payment->ewname}} এর সকল কর পরিষদ করা আছে</div>
                                            @else
                                                <div  class="font-16 font-weight-bold" style="color: blue">জনাব {{$payment->ewname}} এর অগ্রীম {{-$tax_amount}} টাকা পরিষদ করা আছে</div>
                                            @endif

                                            <div class="row mt-5 text-left">
                                                <label for="" class="col-sm-5">কয়টি অর্থ বছরের কর পরিষদ করবেন</label>
                                                <input type="number" min="0" class="form-control col-sm-6 ortho_year_payable" name="ortho_year_payable">
                                                <input type="hidden" class="form-control col-sm-6" name="ortho_year_diff_count" value="{{$diff+1}}">
                                            </div>

                                        @endif

                                    </div>
                                    <div class="border border-danger"></div>
                                    <div class="col-sm-5 text-right">
                                        <div class="row mt-4">
                                            <label for="" class="col-sm-5">মানি রসিদ নম্বর <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="money_recieve_no" value="">
                                        </div>

                                        <div class="row mt-4">
                                            <label for="" class="col-sm-5">মোট টাকা<span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="total_money" value="" id="total_money" readonly>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="" class="col-sm-5">মওকুফ টাকা <span style="color: red">*</span></label>
                                            <input type="number" min="0" class="form-control col-sm-7" name="moukuf" value="" id="moukuf">
                                        </div>
                                        <div class="row mt-4">
                                            <label for="" class="col-sm-5">পরিশোধিত টাকার পরিমান <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-7" name="total_payable_amount" id="total_payable_amount" value="" readonly>
                                        </div>
                                        <input type="hidden" name="taxid" value="{{$payment->taxid}}">
                                        <input type="hidden" name="word_no" value="{{$payment->be_wordno}}">
                                        <input type="hidden" name="dokanNo" value="{{$payment->dokanNo}}">
                                        <input type="hidden" name="btalikaNo" value="{{$payment->btalikaNo}}">
                                        <input type="hidden" name="previous_tax_amount" value="{{$tax_amount}}">
                                        <input type="hidden" name="last_tax_pay_date" value="{{$payment->last_tax_pay_date}}">
                                        <button class="btn-sm btn-info mt-4" style="background-color: green">Payment</button>
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
        var amount = {{$payment->tax_amount}}
        $('.ortho_year_payable').on('keyup change',function (e) {
            $('#total_money').val($('.ortho_year_payable').val()*amount);
            $('#total_payable_amount').val($('#total_money').val() - $('#moukuf').val())
        });
        $('#moukuf').on('keyup change',function (e) {
            $('#total_payable_amount').val($('#total_money').val() - $('#moukuf').val())
        });


    </script>

@endsection
