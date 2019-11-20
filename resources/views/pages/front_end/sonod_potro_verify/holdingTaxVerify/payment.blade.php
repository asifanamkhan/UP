@extends('layouts.front_end_layout.master')
@section('head_content')
    হোল্ডিং ট্যাক্স পরিশোদ
@endsection
@section('content')
    <div class="panel panel-default mb-5">
        <div class="panel-body" >
            <div class="row">
                <form action="{{route('front/holding_tax_payment')}}" method="POST" >
                    @csrf

                    <div class="row mt-5">
                        <div class="col-sm-10 col-sm-offset-1 ">
                            @php
                                $now =  \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y');;
                                $diff = $now-$last_year1;
                                $current_month= Carbon\Carbon::now()->format('m');
                            @endphp
                            @if($diff>=0)
                                @if($current_month>6)
                                    <div class="font-18 " style="color: blue;font-weight: bold;font-size: 16px"> {{$payment->bname}} এর
                                        @for($i=0;$i<$diff+1;$i++)
                                            <span class="font-18 font-weight-bold" style="color: red">{{$last_year1 ++}}-{{$last_year2 ++}}</span>,
                                        @endfor
                                        <span style="color: black;">({{$diff+1 }})</span> টি অর্থ বছরের কর বাকি আছে ।
                                    </div>
                                    <div class="row text-left" style="margin-top: 25px">
                                        <label for="" class="col-sm-12">কয়টি অর্থ বছরের কর পরিষদ করবেন<span style="color: red">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="number" min="0" class="form-control  ortho_year_payable" name="ortho_year_payable" placeholder="অর্থবছরের সংখ্যা ইংরেজিতে প্রদান করুন ">
                                            <input type="hidden" class="form-control" name="ortho_year_diff_count" value="{{$diff+1}}">
                                        </div>
                                    </div>

                                @else
                                    <div class="font-18 " style="color: blue;font-weight: bold;font-size: 16px"> {{$payment->bname}} এর
                                        @for($i=0;$i<$diff;$i++)
                                            <span class="font-18 " style="color: red;font-weight: bold">{{$last_year1 ++}}-{{$last_year2 ++}}</span>,
                                        @endfor
                                        <span style="color: black">({{$diff }})</span> টি অর্থ বছরের বাকি আছে ।
                                    </div>
                                    <div class="row mt-5 text-left">
                                        <label for="" class="col-sm-12">কয়টি অর্থ বছরের কর পরিষদ করবেন<span style="color: red">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="number" min="0" class="form-control ortho_year_payable" name="ortho_year_payable">
                                            <input type="hidden" class="form-control " name="ortho_year_diff_count" value="{{$diff}}">
                                        </div>
                                    </div>
                                @endif

                            @else
                                @if($tax_amount>=0)
                                    <div  class="font-16 " style="color: blue;font-weight: bold;font-size: 16px"> {{$payment->bname}} এর সকল কর পরিষদ করা আছে</div>
                                @else
                                    <div  class="font-16 " style="color: blue;font-weight: bold;font-size: 16px"> {{$payment->bname}} এর অগ্রীম {{-$tax_amount}} টাকা পরিষদ করা আছে</div>
                                @endif

                                <div class="row mt-5 text-left">
                                    <label for="" class="col-sm-12">কয়টি অর্থ বছরের কর পরিষদ করবেন</label>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" class="form-control  ortho_year_payable" name="ortho_year_payable">
                                        <input type="hidden" class="form-control " name="ortho_year_diff_count" value="{{$diff+1}}">
                                    </div>
                                </div>

                            @endif

                        </div>

                        <div class="col-sm-offset-1 col-sm-10 text-left">

                            <div class="row mt-4">

                            </div>

                            <div class="row "style="margin-top: 25px;" >
                                <label for="" class="col-sm-12">মোট করের পরিমান(টাকায়)</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control " name="total_money" value="" id="total_money" readonly>
                                </div>
                            </div>
                            {{--<div class="row mt-4">--}}
                                {{--<label for="" class="col-sm-5">মওকুফ টাকা <span style="color: red">*</span></label>--}}
                                {{--<input type="number" min="0" class="form-control col-sm-7" name="moukuf" value="" id="moukuf">--}}
                            {{--</div>--}}
                            {{--<div class="row mt-4">--}}
                                {{--<label for="" class="col-sm-12">পরিশোধিত টাকার পরিমান <span style="color: red">*</span></label>--}}
                                {{--<input type="text" class="form-control col-sm-7" name="total_payable_amount" id="total_payable_amount" value="" readonly>--}}
                            {{--</div>--}}

                            <input type="hidden" name="holding_no" value="{{$payment->holding_no}}">
                            <input type="hidden" name="word_no" value="{{$payment->word_no}}">
                            <input type="hidden" name="previous_tax_amount" value="{{$tax_amount}}">
                            <input type="hidden" name="last_tax_pay_date" value="{{$payment->last_tax_pay_date}}">

                            <button class="btn-sm btn-info" style="background-color: green;margin-top: 15px; text-align: right;">Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
@section('script')
    <script>
        var amount = {{$payment->tax_amount}}
        $('.ortho_year_payable').on('keyup change',function (e) {
            $('#total_money').val($('.ortho_year_payable').val()*amount)
            //$('#total_payable_amount').val($('#total_money').val())
        });
        // $('#moukuf').on('keyup change',function (e) {
        //     $('#total_payable_amount').val($('#total_money').val() - $('#moukuf').val())
        // });


    </script>
    @endsection