@extends('layouts.dashboard_layout.master')
@section('content')
    <!-- left Content Start-->
    <div class="row">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <ul>
                    <li style="display: block;color: red">{{ $error }}</li>
                </ul>
            @endforeach
        @endif
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="btn btn-info w-100" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;"><b>রেজিস্ট্রেশন ফরম</b></div>
                <div class="panel-body"  style="min-height:310px;">
                    <div class="row">

                        <div class="col-md-12">
                            {{--বসতভিটার রেজিস্ট্রেশন ফরম--}}
                            <div id="boshot_reg"  class="tab-pane active text-right mt-3">

                                <form action="{{route('tax.store')}}" method="post" id="bform">
                                    @csrf

                                    <div class="row">
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-2 " style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন</h5>
                                        <div class="row col-sm-9 mt-4 ">
                                            <label for=""  class="col-sm-4 ">সদস্যের ক্রমিক নং</label>
                                            <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_no" readonly>
                                        </div>


                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                           <input type="number" class="form-control col-sm-8 {{ $errors->has('holding_no') ? ' is-invalid' : '' }}" name="holding_no"  id="holding_no" placeholder="ইংরেজীতে প্রদান করুন">
                                           @if ($errors->has('holding_no'))
                                               <span class="invalid-feedback" >
                                                <strong>{{ $errors->first('holding_no') }}</strong>
                                            </span>
                                           @endif
                                        </div>
                                        <div class="row col-sm-6 mt-4 has-feedback">
                                            <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                            <select name="word_no" id="word_no" class="form-control col-sm-8 {{ $errors->has('word_no') ? ' is-invalid' : '' }}">
                                                <option value="">চিহ্নিত করুন</option>
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
                                            @if ($errors->has('word_no'))
                                                <span class="invalid-feedback" >
                                                <strong>{{ $errors->first('word_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">খানা প্রধানের নাম (ইংরেজিতে) </label>
                                            <input type="text" class="form-control col-sm-8" name="name[]" id="name">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">খানা প্রধানের নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bname[]" id="bname">
                                            <small name="help-block" class="help-block text-right" style="color: red;margin-left: 34%"></small>
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4">--}}
                                            {{--<label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) </label>--}}
                                            {{--<input type="text" class="form-control col-sm-8" name="efname[]" id="efname">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 has-feedback">
                                            <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname">
                                            <small name="help-block" class="help-block text-right" style="color: red;margin-left: 34%"></small>
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4">--}}
                                            {{--<label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) </label>--}}
                                            {{--<input type="text" class="form-control col-sm-8" name="emname[]" id="emname">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname">
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4 match">--}}
                                            {{--<label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) </label>--}}
                                            {{--<input type="text" class="form-control col-sm-8 " name="e_gram" id="e_gram">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="b_gram" id="b_gram">
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4 match">--}}
                                            {{--<label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>--}}
                                            {{--<input type="text" class="form-control col-sm-8" name="e_post" id="e_post">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                            <input type="text" class="form-control col-sm-8" name="b_post" id="b_post">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">লিঙ্গ  <span style="color: red">*</span></label>
                                            <select name="gender[]" id="gender" class="form-control col-sm-8 text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option value="male">পুরুষ</option>
                                                <option value="female">মহিলা</option>
                                                <option value="others">অন্যান্য</option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>
                                            <input type="date" class="form-control col-sm-8" name="dob[]" id="dob">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র(যদি থাকে) </label>
                                            <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">রক্তের গ্রুপ </label>
                                            <select name="blood_group[]" id="blood_group" class="form-control col-sm-8  ">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4"> </div>
                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-6 mt-4 text-left match">
                                            <label for="" id="boshot_dhoron1" class="col-sm-4 text-right">বসতভিটার ধরন <span style="color: red">*</span></label>
                                            <select name="bosot_vitar_dhoron" id="boshot_dhoron" class="form-control col-sm-8  ">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($bosot_vitar_dhoron as $bosot_vitar_dhorons)
                                                    @if($bosot_vitar_dhorons->status==1)
                                                        <option value="{{$bosot_vitar_dhorons->id}}">{{$bosot_vitar_dhorons->bosot_vitar_dhoron}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">পেশা<span style="color: red">*</span></label>
                                            <select name="occupation[]" id="occa" class="form-control col-sm-8  text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($occa as $occas)
                                                    @if($occas->status==1)
                                                        <option value="{{$occas->id}}">{{$occas->occupation}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match">
                                            <label for="" id="tax_class1" class="col-sm-4 text-right">করের শ্রেনী<span style="color: red">*</span></label>
                                            <select name="tax_class" id="tax_class" class="form-control col-sm-8  text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($tax_class as $tax_classs)
                                                    @if($tax_classs->status==1)
                                                        <option value="{{$tax_classs->id}}">{{$tax_classs->tax_class}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for=""  class="col-sm-4" style="color: blue">করের পরিমান(টাকায়)</label>
                                            <input type="text" class="col-sm-8 form-control" style="color: red" name="tax_amount" id="tax_amount" placeholder="টাকার পরিমান" readonly>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">শিক্ষাগত যোগ্যতা</label>
                                            <select name="education" id="education" class="form-control col-sm-8  text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($education as $educations)
                                                    @if($educations->status==1)
                                                        <option value="{{$educations->id}}">{{$educations->education}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">রুম সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="room_no" id="room_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">বাড়ির বাৎসরিক মূল্যায়ন</label>
                                            <input type="number" class="form-control col-sm-8" name="barir_mullayon" id="barir_mullayon" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match">
                                            <label for="" class="col-sm-4 text-right">পরিবারের শ্রেণী</label>
                                            <select name="poribar_class" id="poribar_class" class="col-sm-8  form-control text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($poribar_class as $poribar_classs)
                                                    @if($poribar_classs->status==1)
                                                        <option value="{{$poribar_classs->id}}">{{$poribar_classs->poribar_class}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match" id="tax_start_date1">
                                            <label for="" class="text-right col-sm-4 text-right">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                                            <select name="tax_start_date" id="tax_start_date" class="form-control col-sm-8 ">
                                                <option value="">চিহ্নিত করুন</option>
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

                                        <div class="row col-sm-6 mt-4 text-left match" id="">
                                            <label for="" class="col-sm-4 text-right">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                                            <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control col-sm-8 ">
                                                <option value="">চিহ্নিত করুন</option>
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

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মোবাইল নং </label>
                                            <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">ইমেইল </label>
                                            <input type="email" class="form-control col-sm-8" name="email" id="email">
                                        </div>
                                        <div class="row col-sm-10 mt-4">
                                            <label for="" class="col-sm-4">ইউনিয়ন পরিষদ থেকে অনলাইনে সেবা গ্রহন ও ফি পরিশদের জন্য মোবাইল ব্যাংকিং নং </label>
                                            <input type="text" class="form-control col-sm-8" name="bank_acc_no" id="bank_acc_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>


                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-5" style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন।</h5>
                                        <div class="row col-sm-9  mt-4 mr-5 ">
                                            <label for=""class="col-sm-5"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>
                                            <div class="col-sm-2 apBirthCer">
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" name="birth_cer1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" name="birth_cer1" value="2">না </label>
                                            </div>
                                            <input type="text" class="form-control col-sm-5" name="birth_cer_no[]" placeholder="জন্ম নিবন্ধন নং" >
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বয়স্ক ভাতাভোগী কি না</label>
                                            <div class="col-sm-4 apOldVata">
                                                <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ফ্রীলান্সার কি না</label>
                                            <div class="col-sm-3 apFreelancer">
                                                <label class="radio-inline "><input class="freelancer fr1" id="freelancer" type="radio" name="freelancer1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="freelancer fr2" type="radio" name="freelancer1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >বয়স্ক ভাতার যোগ্য কিন্তু বঞ্চিত কি না</label>
                                            <div class="col-sm-4 apOldVataBonchito">
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" name="oldVataBonchito1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" name="oldVataBonchito1" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ফ্রীলান্সিং এর বিষয়</label>
                                            <div class="col-sm-7 apFreelancer">
                                                <input type="text" class="form-control" id="freelancer_subject" name="freelancer_subject[]">
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >বিধবা কি না</label>
                                            <div class="col-sm-4 apBidhoba">
                                                <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba1" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">মাসিক আয়(ফ্রীলান্সিং থেকে)</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="freelancing_masik_ay[]" placeholder="ইংরেজীতে প্রদান করুন">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 ">
                                            <label for="" class="col-sm-6" style="color: blue">বিধবা ভাতাভোগী কি না</label>
                                            <div class="col-sm-4 apBidhobaVata">
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ৪৫ বছর বয়সী স্বাক্ষরহীন কি না</label>
                                            <div class="col-sm-3 apOsakkhorBihin1">
                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin1" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত শিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-4 apShikkhitoBekar">
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >গর্ভবতী মা আছে কি না</label>
                                            <div class="col-sm-3 apOgorvotiMa">
                                                <label class="radio-inline "><input class="gorvotiMa" type="radio" name="gorvotiMa" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="gorvotiMa" type="radio" name="gorvotiMa" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রবাসী কি না</label>
                                            <div class="col-sm-4 apProbashi">
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">গর্ভকালীন সময়</label>
                                            <div class="col-sm-7 apgorvokalinSomoy">
                                                <input class="gorvokalinSomoy form-control" type="text"  name="gorvokalinSomoy" placeholder="মাসের সংখ্যা ইংরেজিতে প্রদান করুন">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বিদেশ গমনে খরচের পরিমাণ (বিদেশ যেয়ে থাকলে)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="bideshJeteKhoroch[]" placeholder="ইংরেজিতে প্রদান করুন">
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">৫ বছরের নিচে কম ওজনের শিশু আছে কি না</label>
                                            <div class="col-sm-3 apkomOjonerShishi">
                                                <label class="radio-inline "><input class="komOjonerShishu" type="radio" name="komOjonerShishu" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="komOjonerShishu" type="radio" name="komOjonerShishu" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বার্ষিক টাকা পাঠানর পরিমাণ (বিদেশ যেয়ে থাকলে)</label>
                                            <div class="col-sm-6">
                                                <select name="bideshBarshikTkpathanorPoriman[]" id="" class="form-control">
                                                    <option value="">চিহ্নিত করুন</option>
                                                    <option value="1">১ লক্ষ-৩ লক্ষ</option>
                                                    <option value="2">৩ লক্ষ-৫ লক্ষ</option>
                                                    <option value="3">৫ লক্ষের ওপরে</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ৪৫ বছরের মেয়ে/নারীর ৫ টি টিকা দেওয়া আছে কি না</label>
                                            <div class="col-sm-3 apOnariTika">
                                                <label class="radio-inline "><input class="nariTika" type="radio" name="nariTika" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="nariTika" type="radio" name="nariTika" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রতিবন্ধী কি না</label>
                                            <div class="col-sm-4 apProtibondh">
                                                <label class="radio-inline "><input class="protibondhi" type="radio" name="protibondhi1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="protibondhi" type="radio" name="protibondhi1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >সন্তান স্কুলে যায় কি না</label>
                                            <div class="col-sm-3 apOschoolGomon">
                                                <label class="radio-inline "><input class="schoolGomon" type="radio" name="schoolGomon" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="schoolGomon" type="radio" name="schoolGomon" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">মুক্তিযোদ্ধা কি না</label>
                                            <div class="col-sm-4 apMuktijoddha">
                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">স্কুলে না গেলে না যাওয়ার কারন</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="schoolNaJawarKaron">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">মুক্তিযোদ্ধা ভাতা প্রাপ্ত কি না</label>
                                            <div class="col-sm-4 apMuktijoddhaVata">
                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >গাছ লাগানোর জমি আছে কি না</label>
                                            <div class="col-sm-3 apOgasLaganorJomi">
                                                <label class="radio-inline "><input class="gasLaganorJomi" type="radio" name="gasLaganorJomi" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="gasLaganorJomi" type="radio" name="gasLaganorJomi" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত অশিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-4 apOshikkhitoBekar">
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >অতিরিক্ত জমি আছে কি না</label>
                                            <div class="col-sm-3 apOotiriktoJomi">
                                                <label class="radio-inline "><input class="otiriktoJomi" type="radio" name="otiriktoJomi" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="otiriktoJomi" type="radio" name="otiriktoJomi" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">নারী/পুরুষ উৎপাদনশীল কর্মজীবি কি না</label>
                                            <div class="col-sm-4 apFemaleUtpadonshil">
                                                <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil1" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil1" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >ভোকেশনাল/কারিগরি স্কুলে পড়ে কি না</label>
                                            <div class="col-sm-3 apOshikkhitoBekar">
                                                <label class="radio-inline "><input class="karigoriSchool" type="radio" name="karigoriSchool" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="karigoriSchool" type="radio" name="karigoriSchool" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পড়িবারের জমির পরিমান (শতক)</label>
                                            <input type="number" class="form-control col-sm-8" name="poribarer_jomir_poriman" id="poribarer_jomir_poriman" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">খানা প্রধানের মাসিক আয়</label>
                                            <input type="number" class="form-control col-sm-8" name="masik_ay[]" id="masik_ay" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">স্যানিটেশনের ধরন</label>
                                            <select name="sanitation_dhoron" id="sanitation_dhoron" class="form-control col-sm-8  text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($sanitation_dhoron as $sanitation_dhorons)
                                                    @if($sanitation_dhorons->status==1)
                                                        <option value="{{$sanitation_dhorons->id}}">{{$sanitation_dhorons->sanitation}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পরিবারের মোট সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="total_member_no" id="total_member_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পুরুষ সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="male_member_no" id="male_member_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মহিলা সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="female_member_no" id="female_member_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue"> পরিবার ভূমিহীন কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">বিদ্যুৎ সুবিধা পায় কি না</label>
                                            <div class="col-sm-3">
                                                <label class="radio-inline "><input class="" type="radio" name="biddut_subidha" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="biddut_subidha" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">নিরাপদ পানি পান করে কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="clean_water" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="clean_water" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">নিরাপদ পানির উৎস কি</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="cleanWaterSource">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">স্বাস্থ্য সম্মত স্যানিটেশন আছে কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">স্যানিটেশন পৃথক আছে কি না</label>
                                            <div class="col-sm-3">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">ইন্টারনেট সুবিধা পায় কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="internate" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="internate" value="2">না </label>
                                            </div>
                                        </div>
                                        <div id="boshot_form"></div>
                                        <div class="row col-sm-12 col-sm-offset-4 mt-4 text-left" id="bostoForm_add">
                                            <button style="background-color: green" class="btn btn-success">পরিবারের অন্য সদস্যের তথ্য যোগ করুন</button>
                                        </div>
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

        //csrf token

        function csrf(){
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }

        //Bosot member no

        $('#member_no').val(1);

        function memberSearch(){
            csrf();
            $.ajax({
                type:"POST",
                url:"{{route('bosot_member_no')}}",
                data:{
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                success:function (result) {
                if(result[2].member_no != 1){
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
                        $('#boshot_form').show();
                    }
                    else if(result !='one'){

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
                        $('#boshot_form').empty();
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
                        $('#boshot_form').show()

                    }
                },
            });
        }

        $('#holding_no,#word_no').on('keyup change',function () {
            memberSearch();
        });

        //Takar Poriman
        $('#boshot_dhoron,#occa,#tax_class').on('change',function () {
            csrf();
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
        // $('#freelancer_subject').prop('disabled',true);
        // $('.fr2').on('click change',function () {
        //     $('#freelancer_subject').prop('disabled',true);
        // });
        // $('.fr1').on('click change',function () {
        //     $('#freelancer_subject').prop('disabled',false);
        // });

        //bostoForm_add
        x=1,y=0;
        $('#bostoForm_add').on('click',function (e) {
            e.preventDefault();
            var max_fields = 30;

            if(x<max_fields){
                x++;
                $('#boshot_form').append('<div class="row mt-5">' +
                    '                        <div class="row col-sm-9 mt-4 ">\n' +
                    '                                                <label for=""  class="col-sm-4">সদস্যের ক্রমিক নং</label>\n' +
                    '                                                <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_nox" readonly>\n' +
                    '                                            </div>' +
                    '                                            <div class="col-sm-2  mt-4" >\n' +
                    '                                                <button style="background-color: red" id="bostoForm_sub" class="btn btn-success">remove</button>\n' +
                    '                                             </div>' +
                    '                                            <div class="row col-sm-9   mt-4 mr-5 ">\n' +
                    '                                                 <label for=""class="col-sm-3 text-right"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>\n' +
                    '                                                  <div class="col-sm-2 apBirthCer">\n' +
                    '                                                      <label class="radio-inline "><input class="birth" type="radio" name="birth_cer'+x+'"  value="1">হ্যাঁ</label>\n' +
                    '                                                      <label class="radio-inline "><input class="birth" type="radio" name="birth_cer'+x+'" value="2">না </label> \n' +
                    '                                                  </div>\n' +
                    '                                                  <input type="text" class="form-control col-sm-7" name="birth_cer_no[]" placeholder="জন্ম নিবন্ধন নং">\n' +
                    '                                             </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">নাম (ইংরেজিতে) </label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="name[]" id="name">\n' +
                    '                                            </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="bname[]" id="bname" required>\n' +
                    '                                            </div>\n'+ '                                            ' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname" required>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname" required>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং(যদি থাকে) </label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                    '                                            </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                    <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>\n' +
                    '                                                    <input type="date" class="form-control col-sm-8" name="dob[]" id="dob" required>\n' +
                    '                                                </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">পেশা</label>\n' +
                    '                                                <select name="occupation[]" id="" class="form-control col-sm-8 js-example-basic-single">\n' +
                    '                                                    <option value="0">চিহ্নিত করুন</option>\n' +
                    '                                                    @foreach($occa as $occas)\n' +
                    '                                                       @if($occas->status==1)\n' +
                    '                                                          <option value="{{$occas->id}}">{{$occas->occupation}}</option>\n' +
                    '                                                        @endif\n' +
                    '                                                     @endforeach\n' +
                    '                                                </select>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="row col-sm-6 mt-4 text-left">\n' +
                    '                                                <label for="" class="col-sm-4 text-right">লিঙ্গ <span style="color: red">*</span> </label>\n' +
                    '                                                <select name="gender[]" id="gender[]" class="form-control col-sm-8 js-example-basic-single " required>\n' +
                    '                                                    <option value="0">চিহ্নিত করুন</option>\n' +
                    '                                                    <option value="male">পুরুষ</option>\n' +
                    '                                                    <option value="female">মহিলা</option>\n' +
                    '                                                    <option value="others">অন্যান্য</option>\n' +
                    '                                                </select>\n' +
                    '                                             </div>' +
                    '                                             <div class="row col-sm-6 mt-4">\n' +
                    '                                                <label for="" class="col-sm-4">মোবাইল নং </label>\n' +
                    '                                                <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                    '                                            </div>' +
                    '                                             <div class="row col-sm-6 mt-4">\n' +
                        '                                            <label for="" class="col-sm-4">রক্তের গ্রুপ </label>\n' +
                        '                                            <select name="blood_group[]" id="blood_group" class="form-control col-sm-8">\n' +
                        '                                                <option value="">চিহ্নিত করুন</option>\n' +
                        '                                                <option value="A+">A+</option>\n' +
                        '                                                <option value="A-">A-</option>\n' +
                        '                                                <option value="B+">B+</option>\n' +
                        '                                                <option value="B-">B-</option>\n' +
                        '                                                <option value="O+">O+</option>\n' +
                        '                                                <option value="O-">O-</option>\n' +
                        '                                                <option value="AB+">AB+</option>\n' +
                        '                                                <option value="AB-">AB-</option>\n' +
                        '                                            </select>\n' +
                        '                                        </div>' +
                    '                                            <div class="row col-sm-12 mt-4 border border-light"></div>' +
                    '                                             <div class="row col-sm-6   mt-4 ">\n' +
                    '                                                <label for=""class="col-sm-6 "style="color: blue" >বিধবা কি না</label>\n' +
                    '                                                    <div class="apBidhoba">\n' +
                    '                                                        <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="bidh" type="radio" name="bidhoba'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                    \n' +
                    '                                              </div> ' +

                    '                                              <div class="row col-sm-6   mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-7" style="color: blue">মুক্তিযোদ্ধা কি না</label>\n' +
                            '                                            <div class=" apMuktijoddha">\n' +
                            '                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha'+x+'" value="1">হ্যাঁ</label>\n' +
                            '                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha'+x+'" value="2">না </label>\n' +
                            '                                            </div>\n' +
                        '                                          </div>' +
                    '                                               <div class="row col-sm-6  mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-6 " style="color: blue"> বিধবা ভাতাভগী কি না</label>\n' +
                    '                                                    <div class="apBidhobaVata">\n' +
                    '                                                        <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="BidhobaVata" type="radio" name="bidhoba_vata'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                              </div>' +
                    '                                              ' +
                    '                                              <div class="row col-sm-6  mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-7" style="color: blue">মুক্তিযোদ্ধা ভাতা প্রাপ্ত কি না</label>\n' +
                            '                                            <div class=" apMuktijoddhaVata">\n' +
                            '                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata'+x+'" value="1">হ্যাঁ</label>\n' +
                            '                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata'+x+'" value="2">না </label>\n' +
                            '                                            </div>\n' +
                        '                                         </div>' +
                    '                                               <div class="row col-sm-6  mt-4 ">\n' +
                    '                                                    <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত শিক্ষিত বেকার কি না</label>\n' +
                    '                                                    <div class="apShikkhitoBekar">\n' +
                    '                                                        <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                    \n' +
                    '                                               </div>' +
                    '                                              <div class="row col-sm-6  mt-4 ">\n' +
                    '                                                    <label for=""class="col-sm-7" style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত অশিক্ষিত বেকার কি না</label>\n' +
                    '                                                    <div class=" apOshikkhitoBekar">\n' +
                    '                                                        <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                    \n' +
                    '                                              </div>' +
                    '                                              <div class="row col-sm-6 mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-6" style="color: blue"> বয়স্ক ভাতাভগী কি না</label>\n' +
                    '                                                    <div class="apOldVata">\n' +
                    '                                                        <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="oldVata" type="radio" name="old_vata'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                              </div>' +
                    '                                              <div class="row col-sm-6 mt-4 ">\n' +
                    '                                              <label for="" class="col-sm-7" style="color: blue">বয়স্ক ভাতার যোগ্য কিন্তু বঞ্চিত কি না</label>\n' +
                        '                                               <div class="apOldVataBonchito">\n' +
                        '                                                  <label class="radio-inline "><input class="oldVataBonchito" type="radio" name="oldVataBonchito'+x+'" value="1">হ্যাঁ </label>\n' +
                        '                                                  <label class="radio-inline "><input class="oldVataBonchito" type="radio" name="oldVataBonchito'+x+'" value="2">না </label>\n' +
                        '                                               </div>\n' +
                    '                                              </div>' +
                    '                                              <div class="row col-sm-6 mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-6" style="color: blue">প্রবাসী কি না</label>\n' +
                    '                                                    <div class="apProbashi">\n' +
                    '                                                        <label class="radio-inline "><input class="probashi" type="radio" name="probashi'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="probashi" type="radio" name="probashi'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row col-sm-6 mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-7" style="color: blue">খর্বিত শিশু কি না</label>\n' +
                    '                                                    <div class="apKhorbito">\n' +
                    '                                                        <label class="radio-inline "><input class="khorbito" type="radio" name="khorbito'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="khorbito" type="radio" name="khorbito'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row col-sm-6  mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-6" style="color: blue">বিদেশ গমনে খরচের পরিমাণ (বিদেশ যেয়ে থাকলে)</label>\n' +
                            '                                            <div class="col-sm-6">\n' +
                            '                                                <input type="text" class="form-control" name="bideshJeteKhoroch[]" placeholder="ইংরেজিতে প্রদান করুন">\n' +
                            '                                            </div>\n' +
                            '                                        </div>' +
                    '                                               <div class="row col-sm-6  mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-7" style="color: blue">প্রতিবন্ধী কি না</label>\n' +
                    '                                                    <div class="apProtibondhi">\n' +
                    '                                                        <label class="radio-inline "><input class="protibondhi" type="radio" name="protibondhi'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="protibondhi" type="radio" name="protibondhi'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row col-sm-6 mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-6" style="color: blue">বার্ষিক টাকা পাঠানর পরিমাণ (বিদেশ যেয়ে থাকলে)</label>\n' +
                            '                                            <div class="col-sm-6">\n' +
                            '                                                <select name="bideshBarshikTkpathanorPoriman[]" id="bideshBarshikTkpathanorPoriman" class="form-control">\n' +
                            '                                                    <option value="">চিহ্নিত করুন</option>\n' +
                            '                                                    <option value="1">১ লক্ষ-৩ লক্ষ</option>\n' +
                            '                                                    <option value="2">৩ লক্ষ-৫ লক্ষ</option>\n' +
                            '                                                    <option value="3">৫ লক্ষের ওপরে</option>\n' +
                            '                                                </select>\n' +
                            '                                            </div>\n' +
                            '                                        </div>' +
                    '                                              <div class="row col-sm-6 mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-7" style="color: blue">নারী/পুরুষ উৎপাদনশীল কর্মজীবি কি না</label>\n' +
                    '                                                    <div class="apFemaleMaleUtpadonshil">\n' +
                    '                                                        <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="row col-sm-6  mt-4 ">\n' +
                    '                                                    <label for="" class="col-sm-6" style="color: blue">ফ্রীলান্সার কি না</label>\n' +
                    '                                                    <div class="apFreelancer">\n' +
                    '                                                        <label class="radio-inline "><input class="freelancer" type="radio" name="freelancer'+x+'" value="1">হ্যাঁ</label>\n' +
                    '                                                        <label class="radio-inline "><input class="freelancer" type="radio" name="freelancer'+x+'" value="2">না </label>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                        '                                            <div class="row col-sm-6  mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-7" style="color: blue">মাসিক আয় কত</label>\n' +
                            '                                            <div class="col-sm-5">\n' +
                            '                                                <input type="text" class="form-control" name="masik_ay[]" placeholder="ইংরেজিতে প্রদান করুন">\n' +
                            '                                            </div>\n' +
                            '                                        </div>' +
                        '                                           <div class="row col-sm-6 mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-6" style="color: blue">ফ্রীলান্সিং এর বিষয়</label>\n' +
                            '                                            <div class="col-sm-6 apFreelancer">\n' +
                            '                                                <input type="text" class="form-control" id="freelancer_subject" name="freelancer_subject[]">\n' +
                            '                                            </div>\n' +
                            '                                       </div>' +
                        '                                           <div class="row col-sm-6  mt-4 ">\n' +
                            '                                            <label for=""class="col-sm-7"style="color: blue" >১৫ থেকে ৪৫ বছর বয়সী স্বাক্ষরহীন কি না</label>\n' +
                            '                                            <div class="col-sm-3 apsakkhorBihin">\n' +
                            '                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin'+x+'" value="1">হ্যাঁ</label>\n' +
                            '                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin'+x+'" value="2">না </label>\n' +
                            '                                            </div>\n' +
                            '                                       </div>' +
                    '                                               <div class="row col-sm-6 mt-4 ">\n' +
                            '                                            <label for="" class="col-sm-6" style="color: blue">মাসিক আয়(ফ্রীলান্সিং থেকে)</label>\n' +
                            '                                            <div class="col-sm-6">\n' +
                            '                                                <input type="text" class="form-control" name="freelancing_masik_ay[]" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                            '                                            </div>\n' +
                            '                                        </div>' +
                    '                                               <div class="row col-sm-6  mt-4 ">\n' +
                            '                                            <label for=""class="col-sm-7"style="color: blue" >নির্ভরশীল কি না</label>\n' +
                            '                                            <div class="col-sm-3 apOshikkhitoBekar">\n' +
                            '                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar1" value="1">হ্যাঁ</label>\n' +
                            '                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar1" value="2">না </label>\n' +
                            '                                            </div>\n' +
                            '                                        </div>' +
                    '                                           </div>');

                $('#member_nox').attr('id', "member_no"+x).val(x);
                // $(document).ready(function() {
                //     $('.js-example-basic-single').select2();
                // });

            }
        });

        $('#boshot_form').on("click","#bostoForm_sub", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;

            //daynamic
            $("input[name^='member_no']").each(function(key) {
                $(this).val(key+1);
            });
            $(".apBidhoba").each(function(key) {
                $(this).find('.bidh').attr('name', "bidhoba"+(key+1));
            });
            $(".apBidhobaVata").each(function(key) {
                $(this).find('.BidhobaVata').attr('name', "bidhoba_vata"+(key+1));
            });
            $(".apShikkhitoBekar").each(function(key) {
                $(this).find('.ShikkhitoBekar').attr('name', "shikkhito_bekar"+(key+1));
            });
            $(".apOshikkhitoBekar").each(function(key) {
                $(this).find('.oshikkhitoBekar').attr('name', "oshikkhito_bekar"+(key+1));
            });
            $(".apOldVata").each(function(key) {
                $(this).find('.oldVata').attr('name', "old_vata"+(key+1));
            });
            $(".apOldVataBonchito").each(function(key) {
                $(this).find('.oldVataBonchito').attr('name', "oldVataBonchito"+(key+1));
            });
            $(".apProbashi").each(function(key) {
                $(this).find('.probashi').attr('name', "probashi"+(key+1));
            });
            $(".apKhorbito").each(function(key) {
                $(this).find('.khorbito').attr('name', "khorbito"+(key+1));
            });
            $(".apProtibondh").each(function(key) {
                $(this).find('.protibondhi').attr('name', "protibondhi"+(key+1));
            });
            $(".apFemaleMaleUtpadonshil").each(function(key) {
                $(this).find('.femaleMaleUtpadonshil').attr('name', "femaleMaleUtpadonshil"+(key+1));
            });
            $(".apFreelancer").each(function(key) {
                $(this).find('.freelancer').attr('name', "freelancer"+(key+1));
            });
            $(".apMuktijoddha").each(function(key) {
                $(this).find('.muktijoddha').attr('name', "muktijoddha"+(key+1));
            });
            $(".apMuktijoddhaVata").each(function(key) {
                $(this).find('.muktijoddhaVata').attr('name', "muktijoddhaVata"+(key+1));
            });
            $(".apsakkhorBihin").each(function(key) {
                $(this).find('.sakkhorBihin').attr('name', "sakkhorBihin"+(key+1));
            });

        });

        //form validation


       $('#sub').on('click',function (e) {

           if($('#holding_no').val() !='' && $('#word_no').val() !='' && $('#bname').val() !=''&& $('#bfname').val() !=''&& $('#bmname').val() !=''&& $('#b_gram').val() !=''&& $('#gender').val() !=''&& $('#dob').val() !=''&& $('#boshot_dhoron').val() !=''&& $('#occa').val() !='' && $('#tax_class').val() !=''&& $('#tax_start_date').val() !=''&& $('#last_tax_pay_date').val() !=''){
               e.submit();

           }
           else{
               e.preventDefault();

               if($('#holding_no').val()==''){
                   alert('হোল্ডিং নং প্রদান করুন');
               }

               else if($('#word_no').val()==''){
                   alert('ওয়ার্ড নং প্রদান করুন')
               }
               else if($('#bname').val()==''){
                   alert('খানা প্রধানের নাম প্রদান করুন')

               }
               else if($('#bfname').val()==''){
                   alert('পিতার প্রদান করুন')
               }
               else if($('#bmname').val()==''){
                   alert('মাতার প্রদান করুন')
               }
               else if($('#b_gram').val()==''){
                   alert('গ্রাম প্রদান করুন')
               }
               else if($('#gender').val()==''){
                   alert('লিঙ্গ প্রদান করুন')
               }
               else if($('#dob').val()==''){
                   alert('জন্ম তারিখ প্রদান করুন')
               }
               else if($('#boshot_dhoron').val()==''){
                   alert('বসতভিটার ধরন প্রদান করুন')
               }
               else if($('#occa').val()==''){
                   alert('পেশা প্রদান করুন')
               }
               else if($('#tax_class').val()==''){
                   alert('করের শ্রেনী প্রদান করুন')
               }
               else if($('#tax_start_date').val()==''){
                   alert('কর নির্ধারণের শুরুর অর্থবছর প্রদান করুন')
               }
               else if($('#last_tax_pay_date').val()==''){
                   alert('সর্বশেষ কর পরিষদের অর্থবছর প্রদান করুন')
               }
           }
       })

    </script>
@endsection