@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>রেজিস্ট্রেশন ফরম</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            {{--বসতভিটার রেজিস্ট্রেশন ফরম--}}
                            <div id="boshot_reg"  class="tab-pane active text-right mt-3">

                                <form action="{{route('tax.update',$tax->id)}}" method="post" id="bform">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-2 " style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন</h5>
                                        <div class="row col-sm-9 mt-4 ">
                                            <label for=""  class="col-sm-4 ">সদস্যের ক্রমিক নং</label>
                                            <input type="text" class="col-sm-8 form-control" name="member_no" id="member_no" readonly value="{{$tax->member_no}}">
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">বিভাগ <span style="color: red">*</span></label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="bivag" id="bivag">--}}
                                        {{--</div>--}}
                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">জেলা <span style="color: red">*</span></label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="zella" id="zella">--}}
                                        {{--</div>--}}
                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">উপজেলা <span style="color: red">*</span></label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="subZella" id="subZella">--}}
                                        {{--</div>--}}
                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">ইউনিয়ন <span style="color: red">*</span></label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="unionParishad" id="unionParishadp">--}}
                                        {{--</div>--}}

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                            <input type="number" class="form-control col-sm-8" name="holding_no"  id="holding_no" value="{{$tax->holding_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8 js-example-basic-single">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="1" @if($tax->word_no==1) selected @endif >1 ওয়ার্ড</option>
                                                <option value="2" @if($tax->word_no==2) selected @endif >2 ওয়ার্ড</option>
                                                <option value="3" @if($tax->word_no==3) selected @endif >3 ওয়ার্ড</option>
                                                <option value="4" @if($tax->word_no==4) selected @endif>4 ওয়ার্ড</option>
                                                <option value="5" @if($tax->word_no==5) selected @endif>5 ওয়ার্ড</option>
                                                <option value="6" @if($tax->word_no==6) selected @endif>6 ওয়ার্ড</option>
                                                <option value="7" @if($tax->word_no==7) selected @endif>7 ওয়ার্ড</option>
                                                <option value="8" @if($tax->word_no==8) selected @endif>8 ওয়ার্ড</option>
                                                <option value="9" @if($tax->word_no==9) selected @endif>9 ওয়ার্ড</option>
                                            </select>
                                        </div>
                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">নাম (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="name" value="{{$tax->name}}" id="name">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bname" value="{{$tax->bname}}" id="bname">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="efname" id="efname" value="{{$tax->efname}}" >
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bfname" id="bfname" value="{{$tax->bfname}}">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="emname" id="emname" value="{{$tax->emname}}">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bmname" id="bmname" value="{{$tax->bmname}}">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="e_gram" id="e_gram" value="{{$tax->e_gram}}">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="b_gram" id="b_gram" value="{{$tax->b_gram}}">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="e_post" id="e_post" value="{{$tax->e_post}}">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                            <input type="text" class="form-control col-sm-8" name="b_post" id="b_post" value="{{$tax->b_post}}">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">লিঙ্গ  <span style="color: red">*</span></label>
                                            <select name="gender" id="gender" class="form-control col-sm-8 js-example-basic-single text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="male" @if($tax->gender=='male') selected @endif>পুরুষ</option>
                                                <option value="female" @if($tax->gender=='female') selected @endif>মহিলা</option>
                                                <option value="others" @if($tax->gender=='others') selected @endif>অন্যান্য</option>
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মোবাইল নং </label>
                                            <input type="text" class="form-control col-sm-8" name="mob" id="mob" placeholder="ইংরেজীতে প্রদান করুন" value="{{$tax->mob}}">
                                        </div>


                                        <div class="row col-sm-6 mt-4"> </div>
                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>
                                            <input type="date" class="form-control col-sm-8" name="dob" id="dob" value="{{$tax->dob}}">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং(যদি থাকে) </label>
                                            <input type="text" class="form-control col-sm-8" name="nid" id="nid" value="{{$tax->nid}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>



                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" id="boshot_dhoron1" class="col-sm-4 text-right">বসতভিটার ধরন <span style="color: red">*</span></label>
                                            <select name="bosot_vitar_dhoron" id="boshot_dhoron" class="form-control col-sm-8 js-example-basic-single ">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($bosot_vitar_dhoron as $bosot_vitar_dhorons)
                                                    @if($bosot_vitar_dhorons->status==1)
                                                        <option @if($bosot_vitar_dhorons->id==$tax->bosot_vitar_dhoron) selected @endif value="{{$bosot_vitar_dhorons->id}}">{{$bosot_vitar_dhorons->bosot_vitar_dhoron}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">পেশা<span style="color: red">*</span></label>
                                            <select name="occupation" id="occa" class="form-control col-sm-8 js-example-basic-single text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($occa as $occas)
                                                    @if($occas->status==1)
                                                        <option @if($occas->id==$tax->occupation) selected @endif  value="{{$occas->id}}">{{$occas->occupation}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" id="tax_class1" class="col-sm-4 text-right">করের শ্রেনী<span style="color: red">*</span></label>
                                            <select name="tax_class" id="tax_class" class="form-control col-sm-8 js-example-basic-single text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($tax_class as $tax_classs)
                                                    @if($tax_classs->status==1)
                                                        <option  @if($tax_classs->id==$tax->tax_class) selected @endif value="{{$tax_classs->id}}">{{$tax_classs->tax_class}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">শিক্ষাগত যোগ্যতা</label>
                                            <select name="education" id="education" class="form-control col-sm-8 js-example-basic-single text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($education as $educations)
                                                    @if($educations->status==1)
                                                        <option @if($educations->id==$tax->education) selected @endif value="{{$educations->id}}">{{$educations->education}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">রুম সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="room_no" id="room_no" value="{{$tax->room_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">বাড়ির বাৎসরিক মূল্যায়ন</label>
                                            <input type="number" class="form-control col-sm-8" name="barir_mullayon" value="{{$tax->barir_mullayon}}" id="barir_mullayon" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">পরিবারের শ্রেণী</label>
                                            <select name="poribar_class" id="poribar_class" class="col-sm-8 js-example-basic-single form-control text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($poribar_class as $poribar_classs)
                                                    @if($poribar_classs->status==1)
                                                        <option @if($poribar_classs->id==$tax->poribar_class) selected @endif value="{{$poribar_classs->id}}">{{$poribar_classs->poribar_class}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4 ">
                                            <label for=""  class="col-sm-4" style="color: blue">করের পরিমান(টাকায়)</label>
                                            <input type="text" class="col-sm-8 form-control" style="color: red" name="tax_amount" id="tax_amount" value="{{$tax->tax_amount}}" placeholder="টাকার পরিমান" readonly>
                                        </div>
                                        <div class="row col-sm-6 mt-4 text-left" id="tax_start_date1">
                                            <label for="" class="text-right col-sm-4 text-right">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                                            <select name="tax_start_date" id="tax_start_date" class="form-control col-sm-8 js-example-basic-single">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="2025-2026" @if($tax->tax_start_date=='2025-2026') selected @endif > 2025-2026 </option>
                                                <option value="2024-2025" @if($tax->tax_start_date=='2024-2025') selected @endif > 2024-2025 </option>
                                                <option value="2023-2024" @if($tax->tax_start_date=='2023-2024') selected @endif> 2023-2024 </option>
                                                <option value="2022-2023" @if($tax->tax_start_date=='2022-2023') selected @endif> 2022-2023 </option>
                                                <option value="2021-2022" @if($tax->tax_start_date=='2021-2022') selected @endif> 2021-2022 </option>
                                                <option value="2020-2021" @if($tax->tax_start_date=='2020-2021') selected @endif> 2020-2021 </option>
                                                <option value="2019-2020" @if($tax->tax_start_date=='2019-2020') selected @endif> 2019-2020 </option>
                                                <option value="2018-2019" @if($tax->tax_start_date=='2018-2019') selected @endif> 2018-2019 </option>
                                                <option value="2017-2018" @if($tax->tax_start_date=='2017-2018') selected @endif> 2017-2018 </option>
                                                <option value="2016-2017" @if($tax->tax_start_date=='2016-2017') selected @endif> 2016-2017 </option>
                                                <option value="2015-2016" @if($tax->tax_start_date=='2015-2016') selected @endif> 2015-2016 </option>
                                                <option value="2014-2015" @if($tax->tax_start_date=='2014-2015') selected @endif> 2014-2015 </option>
                                                <option value="2013-2014" @if($tax->tax_start_date=='2013-2014') selected @endif> 2013-2014 </option>
                                                <option value="2012-2013" @if($tax->tax_start_date=='2012-2013') selected @endif> 2012-2013 </option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left" id="">
                                            <label for="" class="col-sm-4 text-right">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                                            <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control col-sm-8 js-example-basic-single">
                                                <option value="0">চিহ্নিত করুন</option>
                                                <option value="2025-2026" @if($tax->last_tax_pay_date=='2025-2026') selected @endif > 2025-2026 </option>
                                                <option value="2024-2025" @if($tax->last_tax_pay_date=='2024-2025') selected @endif > 2024-2025 </option>
                                                <option value="2023-2024" @if($tax->last_tax_pay_date=='2023-2024') selected @endif> 2023-2024 </option>
                                                <option value="2022-2023" @if($tax->last_tax_pay_date=='2022-2023') selected @endif> 2022-2023 </option>
                                                <option value="2021-2022" @if($tax->last_tax_pay_date=='2021-2022') selected @endif> 2021-2022 </option>
                                                <option value="2020-2021" @if($tax->last_tax_pay_date=='2020-2021') selected @endif> 2020-2021 </option>
                                                <option value="2019-2020" @if($tax->last_tax_pay_date=='2019-2020') selected @endif> 2019-2020 </option>
                                                <option value="2018-2019" @if($tax->last_tax_pay_date=='2018-2019') selected @endif> 2018-2019 </option>
                                                <option value="2017-2018" @if($tax->last_tax_pay_date=='2017-2018') selected @endif> 2017-2018 </option>
                                                <option value="2016-2017" @if($tax->last_tax_pay_date=='2016-2017') selected @endif> 2016-2017 </option>
                                                <option value="2015-2016" @if($tax->last_tax_pay_date=='2015-2016') selected @endif> 2015-2016 </option>
                                                <option value="2014-2015" @if($tax->last_tax_pay_date=='2014-2015') selected @endif> 2014-2015 </option>
                                                <option value="2013-2014" @if($tax->last_tax_pay_date=='2013-2014') selected @endif> 2013-2014 </option>
                                                <option value="2012-2013" @if($tax->last_tax_pay_date=='2012-2013') selected @endif> 2012-2013 </option>
                                            </select>
                                        </div>
                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-5" style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন।</h5>
                                        <div class="row col-sm-9  mt-4 mr-5 ">
                                            <label for=""class="col-sm-5"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>
                                            <div class="col-sm-2 apBirthCer">
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" name="birth_cer" @if($tax->birth_cer==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" name="birth_cer" @if($tax->birth_cer==2) checked @endif value="2">না </label>
                                            </div>
                                            <input type="text" class="form-control col-sm-5" name="birth_cer_no" placeholder="জন্ম নিবন্ধন নং" value="{{$tax->birth_cer_no}}" >
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বয়স্ক ভাতা পান কি না</label>
                                            <div class="col-sm-4 apOldVata">
                                                <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata" @if($tax->old_vata==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata" @if($tax->old_vata==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 mr-5 ">
                                            <label for=""class="col-sm-5"style="color: blue" >বয়স্ক ভাতার যোগ্য কিন্তু বঞ্চিত কি না</label>
                                            <div class="col-sm-2 apOldVataBonchito">
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" name="oldVataBonchito" @if($tax->oldVataBonchito==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" name="oldVataBonchito" @if($tax->oldVataBonchito==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >বিধবা কি না</label>
                                            <div class="col-sm-4 apBidhoba">
                                                <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba" @if($tax->bidhoba==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba" @if($tax->bidhoba==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 mr-5 ">
                                            <label for="" class="col-sm-5" style="color: blue">বিধবা ভাতা পান কি না</label>
                                            <div class="col-sm-2 apBidhobaVata">
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata" @if($tax->bidhoba_vata==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata" @if($tax->bidhoba_vata==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত শিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-4 apShikkhitoBekar">
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar" @if($tax->shikkhito_bekar==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar" @if($tax->shikkhito_bekar==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 mr-5 ">
                                            <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত অশিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-2 apOshikkhitoBekar">
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar" @if($tax->oshikkhito_bekar==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar" @if($tax->oshikkhito_bekar==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রবাসী কি না</label>
                                            <div class="col-sm-4 apProbashi">
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi" @if($tax->probashi==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi" @if($tax->probashi==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 mr-5 ">
                                            <label for="" class="col-sm-5" style="color: blue">নারী উৎপাদনশীল কর্মজীবি কি না</label>
                                            <div class="col-sm-2 apFemaleUtpadonshil">
                                                <label class="radio-inline "><input class="femaleUtpadonshil" type="radio" name="female_utpadonshil" @if($tax->female_utpadonshil==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="femaleUtpadonshil" type="radio" name="female_utpadonshil" @if($tax->female_utpadonshil==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রতিবন্ধী কি না</label>
                                            <div class="col-sm-4 apProtibondh">
                                                <label class="radio-inline "><input class="protibondh" type="radio" name="protibondh" @if($tax->protibondh==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="protibondh" type="radio" name="protibondh" @if($tax->protibondh==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ফ্রীলান্সার কি না</label>
                                            <div class="col-sm-2 apFreelancer">
                                                <label class="radio-inline "><input class="freelancer" type="radio" name="freelancer" @if($tax->freelancer==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="freelancer" type="radio" name="freelancer" @if($tax->freelancer==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>


                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">আবাদী জমির পরিমান (বিঘা)</label>
                                            <input type="number" class="form-control col-sm-8" name="abadi_jomir_poriman" id="abadi_jomir_poriman" value="{{$tax->abadi_jomir_poriman}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পরিবারের মাসিক আয়</label>
                                            <input type="number" class="form-control col-sm-8" name="poribar_masik_ay" id="poribar_masik_ay" value="{{$tax->poribar_masik_ay}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পরিবারের মোট সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="total_member_no" id="total_member_no" value="{{$tax->total_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পুরুষ সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="male_member_no" id="male_member_no" value="{{$tax->male_member_no}}" value="{{$tax->male_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মহিলা সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="female_member_no" id="female_member_no" value="{{$tax->female_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">স্যানিটেশনের ধরন</label>
                                            <select name="sanitation_dhoron" id="sanitation_dhoron" class="form-control col-sm-8 js-example-basic-single text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($sanitation_dhoron as $sanitation_dhorons)
                                                    @if($sanitation_dhorons->status==1)
                                                        <option  @if($sanitation_dhorons->id==$tax->sanitation_dhoron) selected @endif value="{{$sanitation_dhorons->id}}">{{$sanitation_dhorons->sanitation}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-9  mt-4">
                                            <label for="" class="col-sm-4">সরকারী অন্যান্য সুবিধা পাওয়ার যোগ্য কিন্তু পান না এমন সদস্যের সংখ্যা</label>
                                            <input type="text" class="form-control col-sm-8" name="govt_member_no" id="govt_member_no" value="{{$tax->govt_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue"> পরিবার ভূমিহীন কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" @if($tax->vumihin==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" @if($tax->vumihin==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">বিদ্যুৎ সুবিধা পায় কি না</label>
                                            <div class="col-sm-2">
                                                <label class="radio-inline "><input class="" type="radio" name="biddut_subidha" @if($tax->biddut_subidha==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="biddut_subidha" @if($tax->biddut_subidha==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">নিরাপদ পানি পান করে কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="clean_water" @if($tax->clean_water==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="clean_water" @if($tax->clean_water==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">স্বাস্থ্য সম্মত স্যানিটেশন আছে কি না</label>
                                            <div class="col-sm-2">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" @if($tax->satitation==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" @if($tax->satitation==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">স্যানিটেশন পৃথক আছে কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" @if($tax->satitation_prithok==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" @if($tax->satitation_prithok==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ইন্টারনেট সুবিধা পায় কি না</label>
                                            <div class="col-sm-2">
                                                <label class="radio-inline "><input class="" type="radio" name="internate" @if($tax->internate==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="internate" @if($tax->internate==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div id="boshot_form"></div>
                                    </div>
                                    <div class="col-sm-6 mt-5">
                                        <button style="background-color: #022241" class="btn btn-success" id="sub">দাখিল করুন</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        //form resubmission prevent

        $('#bform').on('submit',function () {
            $('#sub').prop('disabled',true);
        });


        //Takar Poriman
        $('#boshot_dhoron,#occa,#tax_class').on('change',function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('holding_tax_poriman')}}",
                data: {
                    'boshot_dhoron': $('#boshot_dhoron').val(),
                    'occa': $('#occa').val(),
                    'tax_class': $('#tax_class').val(),
                },
                beforeSend: function() {
                    $("#loaderDiv").show();
                },
                success: function (result) {
                    console.log(result);
                    $('#tax_amount').val(result.tax_fee);
                }

            });
        });


        //form validation

    </script>
@endsection