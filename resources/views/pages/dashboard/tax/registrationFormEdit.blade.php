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

                                <form action="{{route('tax.update',$tax->id)}}" method="post" id="bform">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-2 " style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন</h5>
                                        <div class="row col-sm-9 mt-4 ">
                                            <label for=""  class="col-sm-4 ">সদস্যের ক্রমিক নং</label>
                                            <input type="text" class="col-sm-8 form-control" name="member_no" id="member_no" value="{{$tax->member_no}}" readonly>
                                        </div>


                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                            <input type="number" class="form-control col-sm-8 {{ $errors->has('holding_no') ? ' is-invalid' : '' }}" name="holding_no"  id="holding_no" value="{{$tax->holding_no}}" placeholder="ইংরেজীতে প্রদান করুন">
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
                                                <option @if($tax->word_no==1) selected @endif value="1">1 ওয়ার্ড</option>
                                                <option @if($tax->word_no==2) selected @endif value="2">2 ওয়ার্ড</option>
                                                <option @if($tax->word_no==3) selected @endif value="3">3 ওয়ার্ড</option>
                                                <option @if($tax->word_no==4) selected @endif value="4">4 ওয়ার্ড</option>
                                                <option @if($tax->word_no==5) selected @endif value="5">5 ওয়ার্ড</option>
                                                <option @if($tax->word_no==6) selected @endif value="6">6 ওয়ার্ড</option>
                                                <option @if($tax->word_no==7) selected @endif value="7">7 ওয়ার্ড</option>
                                                <option @if($tax->word_no==8) selected @endif value="8">8 ওয়ার্ড</option>
                                                <option @if($tax->word_no==9) selected @endif value="9">9 ওয়ার্ড</option>
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
                                            <input type="text" class="form-control col-sm-8" name="name" value="{{$tax->name}}" id="name">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">খানা প্রধানের নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bname" value="{{$tax->bname}}" id="bname">
                                            <small name="help-block" class="help-block text-right" style="color: red;margin-left: 34%"></small>
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) </label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="efname[]" id="efname">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 has-feedback">
                                            <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8"  name="bfname" value="{{$tax->bfname}}" id="bfname">
                                            <small name="help-block" class="help-block text-right" style="color: red;margin-left: 34%"></small>
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4">--}}
                                        {{--<label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) </label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="emname[]" id="emname">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="bmname" value="{{$tax->bmname}}" id="bmname">
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4 match">--}}
                                        {{--<label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) </label>--}}
                                        {{--<input type="text" class="form-control col-sm-8 " name="e_gram" id="e_gram">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                            <input type="text" class="form-control col-sm-8" name="b_gram" value="{{$tax->b_gram}}" id="b_gram">
                                        </div>

                                        {{--<div class="row col-sm-6 mt-4 match">--}}
                                        {{--<label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>--}}
                                        {{--<input type="text" class="form-control col-sm-8" name="e_post" id="e_post">--}}
                                        {{--</div>--}}
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                            <input type="text" class="form-control col-sm-8" name="b_post" value="{{$tax->b_post}}" id="b_post">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">লিঙ্গ  <span style="color: red">*</span></label>
                                            <select name="gender" id="gender" class="form-control col-sm-8 text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option @if($tax->gender=='male') selected @endif value="male">পুরুষ</option>
                                                <option @if($tax->gender=='female') selected @endif value="female">মহিলা</option>
                                                <option @if($tax->gender=='others') selected @endif value="others">অন্যান্য</option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>
                                            <input type="date" class="form-control col-sm-8" name="dob" value="{{$tax->dob}}" id="dob">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র(যদি থাকে) </label>
                                            <input type="text" class="form-control col-sm-8" name="nid" value="{{$tax->nid}}" id="nid" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">রক্তের গ্রুপ </label>
                                            <select name="blood_group" id="blood_group" class="form-control col-sm-8  ">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option @if($tax->blood_group=='A+') selected @endif value="A+">A+</option>
                                                <option @if($tax->blood_group=='A-') selected @endif value="A-">A-</option>
                                                <option @if($tax->blood_group=='B+') selected @endif value="B+">B+</option>
                                                <option @if($tax->blood_group=='B-') selected @endif value="B-">B-</option>
                                                <option @if($tax->blood_group=='O+') selected @endif value="O+">O+</option>
                                                <option @if($tax->blood_group=='O-') selected @endif value="O-">O-</option>
                                                <option @if($tax->blood_group=='AB+') selected @endif value="AB+">AB+</option>
                                                <option @if($tax->blood_group=='AB-') selected @endif value="AB-">AB-</option>
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
                                                        <option @if($tax->bosot_vitar_dhoron == $bosot_vitar_dhorons->id) selected @endif value="{{$bosot_vitar_dhorons->id}}">{{$bosot_vitar_dhorons->bosot_vitar_dhoron}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">পেশা<span style="color: red">*</span></label>
                                            <select name="occupation" id="occa" class="form-control col-sm-8  text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($occa as $occas)
                                                    @if($occas->status==1)
                                                        <option @if($tax->occupation == $occas->id) selected @endif value="{{$occas->id}}">{{$occas->occupation}}</option>
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
                                                        <option  @if($tax->tax_class == $tax_classs->id) selected @endif value="{{$tax_classs->id}}">{{$tax_classs->tax_class}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for=""  class="col-sm-4" style="color: blue">করের পরিমান(টাকায়)</label>
                                            <input type="text" class="col-sm-8 form-control" style="color: red" name="tax_amount" value="{{$tax->tax_amount}}" id="tax_amount" placeholder="টাকার পরিমান" readonly>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">শিক্ষাগত যোগ্যতা</label>
                                            <select name="education" id="education" class="form-control col-sm-8  text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($education as $educations)
                                                    @if($educations->status==1)
                                                        <option @if($tax->education == $educations->id) selected @endif value="{{$educations->id}}">{{$educations->education}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">রুম সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="room_no" value="{{$tax->room_no}}" id="room_no" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">বাড়ির বাৎসরিক মূল্যায়ন</label>
                                            <input type="number" class="form-control col-sm-8" name="barir_mullayon" value="{{$tax->barir_mullayon}}" id="barir_mullayon" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match">
                                            <label for="" class="col-sm-4 text-right">পরিবারের শ্রেণী</label>
                                            <select name="poribar_class" id="poribar_class" class="col-sm-8  form-control text-left">
                                                <option value="">চিহ্নিত করুন</option>
                                                @foreach($poribar_class as $poribar_classs)
                                                    @if($poribar_classs->status==1)
                                                        <option @if($tax->poribar_class == $poribar_classs->id) selected @endif value="{{$poribar_classs->id}}">{{$poribar_classs->poribar_class}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match" id="tax_start_date1">
                                            <label for="" class="text-right col-sm-4 text-right">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                                            <select name="tax_start_date" id="tax_start_date" class="form-control col-sm-8 ">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option @if($tax->tax_start_date=='2025-2026') selected @endif value="2025-2026" > 2025-2026 </option>
                                                <option @if($tax->tax_start_date=='2024-2025') selected @endif value="2024-2025" > 2024-2025 </option>
                                                <option @if($tax->tax_start_date=='2023-2024') selected @endif value="2023-2024" > 2023-2024 </option>
                                                <option @if($tax->tax_start_date=='2022-2023') selected @endif value="2022-2023" > 2022-2023 </option>
                                                <option @if($tax->tax_start_date=='2021-2022') selected @endif value="2021-2022" > 2021-2022 </option>
                                                <option @if($tax->tax_start_date=='2020-2021') selected @endif value="2020-2021" > 2020-2021 </option>
                                                <option @if($tax->tax_start_date=='2019-2020') selected @endif value="2019-2020" > 2019-2020 </option>
                                                <option @if($tax->tax_start_date=='2018-2019') selected @endif value="2018-2019" > 2018-2019 </option>
                                                <option @if($tax->tax_start_date=='2017-2018') selected @endif value="2017-2018" > 2017-2018 </option>
                                                <option @if($tax->tax_start_date=='2016-2017') selected @endif value="2016-2017" > 2016-2017 </option>
                                                <option @if($tax->tax_start_date=='2015-2016') selected @endif value="2015-2016" > 2015-2016 </option>
                                                <option @if($tax->tax_start_date=='2014-2015') selected @endif value="2014-2015" > 2014-2015 </option>
                                                <option @if($tax->tax_start_date=='2013-2014') selected @endif value="2013-2014" > 2013-2014 </option>
                                                <option @if($tax->tax_start_date=='2012-2013') selected @endif value="2012-2013" > 2012-2013 </option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4 text-left match" id="">
                                            <label for="" class="col-sm-4 text-right">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                                            <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control col-sm-8 ">
                                                <option value="">চিহ্নিত করুন</option>
                                                <option @if($tax->last_tax_pay_date=='2025-2026') selected @endif value="2025-2026" > 2025-2026 </option>
                                                <option @if($tax->last_tax_pay_date=='2024-2025') selected @endif value="2024-2025" > 2024-2025 </option>
                                                <option @if($tax->last_tax_pay_date=='2023-2024') selected @endif value="2023-2024" > 2023-2024 </option>
                                                <option @if($tax->last_tax_pay_date=='2022-2023') selected @endif value="2022-2023" > 2022-2023 </option>
                                                <option @if($tax->last_tax_pay_date=='2021-2022') selected @endif value="2021-2022" > 2021-2022 </option>
                                                <option @if($tax->last_tax_pay_date=='2020-2021') selected @endif value="2020-2021" > 2020-2021 </option>
                                                <option @if($tax->last_tax_pay_date=='2019-2020') selected @endif value="2019-2020" > 2019-2020 </option>
                                                <option @if($tax->last_tax_pay_date=='2018-2019') selected @endif value="2018-2019" > 2018-2019 </option>
                                                <option @if($tax->last_tax_pay_date=='2017-2018') selected @endif value="2017-2018" > 2017-2018 </option>
                                                <option @if($tax->last_tax_pay_date=='2016-2017') selected @endif value="2016-2017" > 2016-2017 </option>
                                                <option @if($tax->last_tax_pay_date=='2015-2016') selected @endif value="2015-2016" > 2015-2016 </option>
                                                <option @if($tax->last_tax_pay_date=='2014-2015') selected @endif value="2014-2015" > 2014-2015 </option>
                                                <option @if($tax->last_tax_pay_date=='2013-2014') selected @endif value="2013-2014" > 2013-2014 </option>
                                                <option @if($tax->last_tax_pay_date=='2012-2013') selected @endif value="2012-2013" > 2012-2013 </option>
                                            </select>
                                        </div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মোবাইল নং </label>
                                            <input type="text" class="form-control col-sm-8" name="mob" value="{{$tax->mob}}" id="mob" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 match">
                                            <label for="" class="col-sm-4">ইমেইল </label>
                                            <input type="email" class="form-control col-sm-8" name="email" value="{{$tax->email}}" id="email">
                                        </div>
                                        <div class="row col-sm-10 mt-4">
                                            <label for="" class="col-sm-4">ইউনিয়ন পরিষদ থেকে অনলাইনে সেবা গ্রহন ও ফি পরিশদের জন্য মোবাইল ব্যাংকিং নং </label>
                                            <input type="text" class="form-control col-sm-8" name="bank_acc_no" id="bank_acc_no" value="{{$tax->bank_acc_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>


                                        <div class="row col-sm-12 mt-4 border border-light"></div>
                                        <h5  class="text-left col-sm-11 col-sm-offset-1 mt-5" style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন।</h5>
                                        <div class="row col-sm-9  mt-4 mr-5 ">
                                            <label for=""class="col-sm-5"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>
                                            <div class="col-sm-2 apBirthCer">
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" @if($tax->birth_cer==1) checked @endif name="birth_cer" value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="birth" type="radio" @if($tax->birth_cer==2) checked @endif name="birth_cer" value="2">না </label>
                                            </div>
                                            <input type="text" class="form-control col-sm-5" name="birth_cer_no" value="{{$tax->birth_cer_no}}" placeholder="জন্ম নিবন্ধন নং" >
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বয়স্ক ভাতাভোগী কি না</label>
                                            <div class="col-sm-4 apOldVata">
                                                <label class="radio-inline "><input class="oldVata" type="radio" @if($tax->old_vata==1) checked @endif name="old_vata" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oldVata" type="radio" @if($tax->old_vata==2) checked @endif name="old_vata" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ফ্রীলান্সার কি না</label>
                                            <div class="col-sm-3 apFreelancer">
                                                <label class="radio-inline "><input class="freelancer fr1" id="freelancer" type="radio" name="freelancer" @if($tax->freelancer==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="freelancer fr2" type="radio" name="freelancer" @if($tax->freelancer==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >বয়স্ক ভাতার যোগ্য কিন্তু বঞ্চিত কি না</label>
                                            <div class="col-sm-4 apOldVataBonchito">
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" @if($tax->oldVataBonchito==1) checked @endif name="oldVataBonchito" value="1">হ্যাঁ</label>
                                                <label class="radio-inline delivery_type"><input class="oldVataBonchito" type="radio" @if($tax->oldVataBonchito==2) checked @endif name="oldVataBonchito" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">ফ্রীলান্সিং এর বিষয়</label>
                                            <div class="col-sm-7 apFreelancer">
                                                <input type="text" class="form-control" id="freelancer_subject" value="{{$tax->freelancer_subject}}" name="freelancer_subject">
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >বিধবা কি না</label>
                                            <div class="col-sm-4 apBidhoba">
                                                <label class="radio-inline "><input class="bidh" type="radio" @if($tax->bidhoba==1) checked @endif name="bidhoba" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="bidh" type="radio" @if($tax->bidhoba==2) checked @endif name="bidhoba" value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">মাসিক আয়(ফ্রীলান্সিং থেকে)</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="freelancing_masik_ay" value="{{$tax->freelancing_masik_ay}}" placeholder="ইংরেজীতে প্রদান করুন">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 ">
                                            <label for="" class="col-sm-6" style="color: blue">বিধবা ভাতাভোগী কি না</label>
                                            <div class="col-sm-4 apBidhobaVata">
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" @if($tax->bidhoba_vata==1) checked @endif name="bidhoba_vata" value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="BidhobaVata" type="radio" @if($tax->bidhoba_vata==2) checked @endif name="bidhoba_vata" value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ৪৫ বছর বয়সী স্বাক্ষরহীন কি না</label>
                                            <div class="col-sm-3 apOsakkhorBihin1">
                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin" @if($tax->sakkhorBihin==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="sakkhorBihin" type="radio" name="sakkhorBihin" @if($tax->sakkhorBihin==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত শিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-4 apShikkhitoBekar">
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar" @if($tax->shikkhito_bekar==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="ShikkhitoBekar" type="radio" name="shikkhito_bekar" @if($tax->shikkhito_bekar==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >গর্ভবতী মা আছে কি না</label>
                                            <div class="col-sm-3 apOgorvotiMa">
                                                <label class="radio-inline "><input class="gorvotiMa" type="radio" name="gorvotiMa" @if($tax->gorvotiMa==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="gorvotiMa" type="radio" name="gorvotiMa" @if($tax->gorvotiMa==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রবাসী কি না</label>
                                            <div class="col-sm-4 apProbashi">
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi" @if($tax->probashi==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="probashi" type="radio" name="probashi" @if($tax->probashi==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">গর্ভকালীন সময়</label>
                                            <div class="col-sm-7 apgorvokalinSomoy">
                                                <input class="gorvokalinSomoy form-control" type="text"  name="gorvokalinSomoy"  value="{{$tax->gorvokalinSomoy}}">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বিদেশ গমনে খরচের পরিমাণ (বিদেশ যেয়ে থাকলে)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="bideshJeteKhoroch" value="{{$tax->bideshJeteKhoroch}}" placeholder="ইংরেজিতে প্রদান করুন">
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">৫ বছরের নিচে কম ওজনের শিশু আছে কি না</label>
                                            <div class="col-sm-3 apkomOjonerShishi">
                                                <label class="radio-inline "><input class="komOjonerShishu" type="radio" name="komOjonerShishu" @if($tax->komOjonerShishu==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="komOjonerShishu" type="radio" name="komOjonerShishu" @if($tax->komOjonerShishu==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">বার্ষিক টাকা পাঠানর পরিমাণ (বিদেশ যেয়ে থাকলে)</label>
                                            <div class="col-sm-6">
                                                <select name="bideshBarshikTkpathanorPoriman" id="" class="form-control">
                                                    <option value="">চিহ্নিত করুন</option>
                                                    <option @if($tax->bideshBarshikTkpathanorPoriman==1)selected @endif value="1">১ লক্ষ-৩ লক্ষ</option>
                                                    <option @if($tax->bideshBarshikTkpathanorPoriman==2)selected @endif value="2">৩ লক্ষ-৫ লক্ষ</option>
                                                    <option @if($tax->bideshBarshikTkpathanorPoriman==3)selected @endif value="3">৫ লক্ষের ওপরে</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ৪৫ বছরের মেয়ে/নারীর ৫ টি টিকা দেওয়া আছে কি না</label>
                                            <div class="col-sm-3 apOnariTika">
                                                <label class="radio-inline "><input class="nariTika" type="radio" name="nariTika" @if($tax->nariTika==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="nariTika" type="radio" name="nariTika" @if($tax->nariTika==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">প্রতিবন্ধী কি না</label>
                                            <div class="col-sm-4 apProtibondh">
                                                <label class="radio-inline "><input class="protibondh" type="radio" name="protibondhi" @if($tax->protibondhi==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="protibondh" type="radio" name="protibondhi" @if($tax->protibondhi==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >সন্তান স্কুলে যায় কি না</label>
                                            <div class="col-sm-3 apOschoolGomon">
                                                <label class="radio-inline "><input class="schoolGomon" type="radio" name="schoolGomon" @if($tax->schoolGomon==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="schoolGomon" type="radio" name="schoolGomon" @if($tax->schoolGomon==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1  mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">মুক্তিযোদ্ধা কি না</label>
                                            <div class="col-sm-4 apMuktijoddha">
                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha" @if($tax->muktijoddha==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="muktijoddha" type="radio" name="muktijoddha" @if($tax->muktijoddha==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7 mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">স্কুলে না গেলে না যাওয়ার কারন</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="schoolNaJawarKaron" value="{{$tax->schoolNaJawarKaron}}">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">মুক্তিযোদ্ধা ভাতা প্রাপ্ত কি না</label>
                                            <div class="col-sm-4 apMuktijoddhaVata">
                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata" @if($tax->muktijoddhaVata==1) checked @endif  value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="muktijoddhaVata" type="radio" name="muktijoddhaVata" @if($tax->muktijoddhaVata==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >গাছ লাগানোর জমি আছে কি না</label>
                                            <div class="col-sm-3 apOgasLaganorJomi">
                                                <label class="radio-inline "><input class="gasLaganorJomi" type="radio" name="gasLaganorJomi" @if($tax->gasLaganorJomi==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="gasLaganorJomi" type="radio" name="gasLaganorJomi" @if($tax->gasLaganorJomi==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for=""class="col-sm-6"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত অশিক্ষিত বেকার কি না</label>
                                            <div class="col-sm-4 apOshikkhitoBekar">
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar" @if($tax->oshikkhito_bekar==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="oshikkhitoBekar" type="radio" name="oshikkhito_bekar" @if($tax->oshikkhito_bekar==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >অতিরিক্ত জমি আছে কি না</label>
                                            <div class="col-sm-3 apOotiriktoJomi">
                                                <label class="radio-inline "><input class="otiriktoJomi" type="radio" name="otiriktoJomi" @if($tax->otiriktoJomi==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="otiriktoJomi" type="radio" name="otiriktoJomi" @if($tax->otiriktoJomi==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">নারী/পুরুষ উৎপাদনশীল কর্মজীবি কি না</label>
                                            <div class="col-sm-4 apFemaleUtpadonshil">
                                                <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil" @if($tax->femaleMaleUtpadonshil==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="femaleMaleUtpadonshil" type="radio" name="femaleMaleUtpadonshil" @if($tax->femaleMaleUtpadonshil==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for=""class="col-sm-5"style="color: blue" >ভোকেশনাল/কারিগরি স্কুলে পড়ে কি না</label>
                                            <div class="col-sm-3 apOshikkhitoBekar">
                                                <label class="radio-inline "><input class="karigoriSchool" type="radio" name="karigoriSchool" @if($tax->karigoriSchool==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="karigoriSchool" type="radio" name="karigoriSchool" @if($tax->karigoriSchool==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-12 mt-4 border border-light"></div>

                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পড়িবারের জমির পরিমান (শতক)</label>
                                            <input type="number" class="form-control col-sm-8" name="poribarer_jomir_poriman" id="poribarer_jomir_poriman" value="{{$tax->poribarer_jomir_poriman}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">খানা প্রধানের মাসিক আয়</label>
                                            <input type="number" class="form-control col-sm-8" name="masik_ay" id="masik_ay" value="{{$tax->masik_ay}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4 text-left">
                                            <label for="" class="col-sm-4 text-right">স্যানিটেশনের ধরন</label>
                                            <select name="sanitation_dhoron" id="sanitation_dhoron" class="form-control col-sm-8  text-left">
                                                <option value="0">চিহ্নিত করুন</option>
                                                @foreach($sanitation_dhoron as $sanitation_dhorons)
                                                    @if($sanitation_dhorons->status==1)
                                                        <option @if($tax->sanitation==$sanitation_dhorons->id) selected @endif value="{{$sanitation_dhorons->id}}">{{$sanitation_dhorons->sanitation}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পরিবারের মোট সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="total_member_no" id="total_member_no" value="{{$tax->total_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">পুরুষ সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="male_member_no" id="male_member_no" value="{{$tax->male_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
                                        </div>
                                        <div class="row col-sm-6 mt-4">
                                            <label for="" class="col-sm-4">মহিলা সদস্যের সংখ্যা</label>
                                            <input type="number" class="form-control col-sm-8" name="female_member_no" id="female_member_no" value="{{$tax->female_member_no}}" placeholder="ইংরেজীতে প্রদান করুন">
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
                                            <div class="col-sm-3">
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
                                            <label for="" class="col-sm-5" style="color: blue">নিরাপদ পানির উৎস কি</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="cleanWaterSource" value="{{$tax->cleanWaterSource}}">
                                            </div>
                                        </div>
                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">স্বাস্থ্য সম্মত স্যানিটেশন আছে কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" @if($tax->satitation==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation" @if($tax->satitation==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>
                                        <div class="row col-sm-7  mt-4 ">
                                            <label for="" class="col-sm-5" style="color: blue">স্যানিটেশন পৃথক আছে কি না</label>
                                            <div class="col-sm-3">
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" @if($tax->satitation_prithok==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="satitation_prithok" @if($tax->satitation_prithok==2) checked @endif value="2">না </label>
                                            </div>
                                        </div>

                                        <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                            <label for="" class="col-sm-6" style="color: blue">ইন্টারনেট সুবিধা পায় কি না</label>
                                            <div class="col-sm-4">
                                                <label class="radio-inline "><input class="" type="radio" name="internate" @if($tax->internate==1) checked @endif value="1">হ্যাঁ</label>
                                                <label class="radio-inline "><input class="" type="radio" name="internate" @if($tax->internate==2) checked @endif value="2">না </label>
                                            </div>
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

    </script>
@endsection