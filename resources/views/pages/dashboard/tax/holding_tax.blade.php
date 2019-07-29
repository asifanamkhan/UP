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
                            <div style="padding:4px;width:100%;">
                                <div id="">
                                    <div class="row box" style="padding-bottom:20px;margin-top:10px; ">
                                        <div class="container">
                                            <ul class="nav nav-tabs font-weight-bold" id="myTab">
                                                <li class="active"><a data-toggle="tab" href="#boshot_reg"  >বসতভিটার রেজিস্ট্রেশন ফরম</a></li>
                                                <li class=""><a data-toggle="tab"  href="#bosot_kor_aday"  >বসতভিটার কর আদায়</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                {{--বসতভিটার রেজিস্ট্রেশন ফরম--}}


                                    <div id="boshot_reg"  class="tab-pane active text-right mt-3">

                                        <form action="{{route('tax.store')}}" method="post">
                                            @csrf
                                            <div id="boshot_form">

                                            <div class="row">
                                                <h5  class="text-left col-sm-11 col-sm-offset-1 mt-2 " style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে পূরণ করুন</h5>
                                                <div class="row col-sm-9 mt-4 ">
                                                    <label for=""  class="col-sm-4 ">সদস্যের ক্রমিক নং</label>
                                                    <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_no" readonly>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">হোল্ডিং নং<span style="color: red">*</span></label>
                                                    <input type="number" class="form-control col-sm-8" name="holding_no"  id="holding_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                                    <select name="word_no" id="word_no" class="form-control col-sm-8">
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

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">খানা প্রধানের নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="name[]" id="name">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">খানা প্রধানের নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bname[]" id="bname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="efname[]" id="efname">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="emname[]" id="emname">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">গ্রাম (ইংরেজিতে) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="e_gram" id="e_gram">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">গ্রাম (বাংলায় ) <span style="color: red">*</span></label>
                                                    <input type="text" class="form-control col-sm-8" name="b_gram" id="b_gram">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পোষ্ট অফিস (ইংরেজিতে) </label>
                                                    <input type="text" class="form-control col-sm-8" name="e_post" id="e_post">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পোষ্ট অফিস (বাংলায় ) </label>
                                                    <input type="text" class="form-control col-sm-8" name="b_post" id="b_post">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">মোবাইল নং </label>
                                                    <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>

                                                <div class="row col-sm-6 mt-4"> </div>
                                                <div class="row col-sm-12 mt-4 border border-light"></div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>
                                                    <input type="date" class="form-control col-sm-8" name="dob[]" id="dob">
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং(যদি থাকে) </label>
                                                    <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>



                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" id="boshot_dhoron1" class="col-sm-4">বসতভিটার ধরন <span style="color: red">*</span></label>
                                                    <select name="bosot_vitar_dhoron" id="boshot_dhoron" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                        @foreach($bosot_vitar_dhoron as $bosot_vitar_dhorons)
                                                            @if($bosot_vitar_dhorons->status==1)
                                                                <option value="{{$bosot_vitar_dhorons->id}}">{{$bosot_vitar_dhorons->bosot_vitar_dhoron}}</option>
                                                            @endif
                                                            @endforeach

                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পেশা<span style="color: red">*</span></label>
                                                    <select name="occupation[]" id="occa" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                            @foreach($occa as $occas)
                                                                @if($occas->status==1)
                                                                <option value="{{$occas->id}}">{{$occas->occupation}}</option>
                                                                @endif
                                                                @endforeach
                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" id="tax_class1" class="col-sm-4">করের শ্রেনী<span style="color: red">*</span></label>
                                                    <select name="tax_class" id="tax_class" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                        @foreach($tax_class as $tax_classs)
                                                            @if($tax_classs->status==1)
                                                                <option value="{{$tax_classs->id}}">{{$tax_classs->tax_class}}</option>
                                                            @endif
                                                            @endforeach

                                                    </select>
                                                </div>

                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">শিক্ষাগত যোগ্যতা</label>
                                                    <select name="education" id="education" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                        @foreach($education as $educations)
                                                            @if($educations->status==1)
                                                                <option value="{{$educations->id}}">{{$educations->education}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">রুম সংখ্যা</label>
                                                    <input type="number" class="form-control col-sm-8" name="room_no" id="room_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">বাড়ির বাৎসরিক মূল্যায়ন</label>
                                                    <input type="number" class="form-control col-sm-8" name="barir_mullayon" id="barir_mullayon" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পরিবারের শ্রেণী</label>
                                                    <select name="poribar_class" id="poribar_class" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
                                                        @foreach($poribar_class as $poribar_classs)
                                                            @if($poribar_classs->status==1)
                                                                <option value="{{$poribar_classs->id}}">{{$poribar_classs->poribar_class}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="row col-sm-6 mt-4 ">
                                                    <label for=""  class="col-sm-4" style="color: blue">করের পরিমান(টাকায়)</label>
                                                    <input type="text" class="col-sm-8 form-control" style="color: red" name="tax_amount" id="tax_amount" placeholder="টাকার পরিমান" readonly>
                                                </div>
                                                <div class="row col-sm-6 mt-4" id="tax_start_date1">
                                                    <label for="" class="text-right col-sm-4">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                                                    <select name="tax_start_date" id="tax_start_date" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
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

                                                <div class="row col-sm-6 mt-4" id="">
                                                    <label for="" class="col-sm-4">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                                                    <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control col-sm-8">
                                                        <option value="0">চিহ্নিত করুন</option>
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
                                                <div class="row col-sm-12 mt-4 border border-light"></div>



                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">আবাদী জমির পরিমান</label>
                                                    <input type="number" class="form-control col-sm-8" name="abadi_jomir_poriman" id="abadi_jomir_poriman" placeholder="বিঘাতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">পরিবারের মাসিক আয়</label>
                                                    <input type="number" class="form-control col-sm-8" name="poribar_masik_ay" id="poribar_masik_ay" placeholder="ইংরেজীতে প্রদান করুন">
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
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">প্রতিবন্ধী সদস্যের সংখ্যা</label>
                                                    <input type="number" class="form-control col-sm-8" name="protibondhi_member_no" id="protibondhi_member_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6 mt-4">
                                                    <label for="" class="col-sm-4">উৎপাদনশীল নারী কর্মজীবী সংখ্যা</label>
                                                    <input type="text" class="form-control col-sm-8" name="female_worker_no" id="female_worker_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-6  mt-4">
                                                    <label for="" class="col-sm-4">সরকারী অন্যান্য সুবিধা পাওয়ার যোগ্য কিন্তু পান না এমন সদস্যের সংখ্যা</label>
                                                    <input type="text" class="form-control col-sm-8" name="govt_member_no" id="govt_member_no" placeholder="ইংরেজীতে প্রদান করুন">
                                                </div>
                                                <div class="row col-sm-12 mt-4 border border-light"></div>

                                                <h5  class="text-left col-sm-11 col-sm-offset-1 mt-5" style="color: red">বিঃদ্রঃ- নিম্নোক্ত সেবাগুলো সতর্কতার সাথে হ্যাঁ/না পূরণ করুন। হ্যাঁ হলে পাশের ফিল্ড পূরণ করুন</h5>
                                                <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                                    <label for="" class="col-sm-6" style="color: blue"> পরিবার ভূমিহীন কি না</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="vumihin" type="radio" name="vumihin" value="2">না </label>
                                                    </div>
                                                </div>

                                                <div class="row col-sm-7  mt-4 ">
                                                    <label for=""class="col-sm-5"style="color: blue" > পরিবারে বিধবা আছে কি না</label>
                                                    <div class="col-sm-2">
                                                        <label class="radio-inline "><input class="bidhoba" type="radio" name="bidhoba" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="bidhoba" type="radio" name="bidhoba" value="2">না </label>
                                                    </div>
                                                    <input type="text" class="form-control col-sm-5" name="bidhoba_no" placeholder="থাকলে সংখ্যা" >
                                                </div>
                                                <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                                    <label for="" class="col-sm-6" style="color: blue">পরিবারে বিধবা ভাতা পান কি না</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline "><input class="" type="radio" name="bidhoba_vata" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="bidhoba_vata" value="2">না </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-7  mt-4 mr-5 ">
                                                    <label for=""class="col-sm-5"style="color: blue" >১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত বেকার আছে কি না</label>
                                                    <div class="col-sm-2">
                                                        <label class="radio-inline "><input class="" type="radio" name="train_bekar" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="train_bekar" value="2">না </label>
                                                    </div>
                                                    <input type="text" class="form-control col-sm-5" name="train_bekar_no" placeholder="থাকলে সংখ্যা" >
                                                </div>
                                                <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                                    <label for="" class="col-sm-6" style="color: blue">পরিবারে বয়স্ক ভাতা পান কি না</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline "><input class="" type="radio" name="old_vata" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="old_vata" value="2">না </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-7  mt-4 mr-5 ">
                                                    <label for=""class="col-sm-5"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>
                                                    <div class="col-sm-2">
                                                        <label class="radio-inline delivery_type"><input class="" type="radio" name="birth_cer" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline delivery_type"><input class="" type="radio" name="birth_cer" value="2">না </label>
                                                    </div>
                                                    <input type="text" class="form-control col-sm-5" name="birth_cer_no" placeholder="জন্ম নিবন্ধন নং" >
                                                </div>
                                                <div class="row col-sm-4 col-sm-offset-1 mt-4 ">
                                                    <label for="" class="col-sm-6" style="color: blue">নিরাপদ পানি পান করে কি না</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline "><input class="" type="radio" name="clean_water" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="clean_water" value="2">না </label>
                                                    </div>
                                                </div>

                                                <div class="row col-sm-7  mt-4 mr-5 ">
                                                    <label for=""class="col-sm-5"style="color: blue" >সরকারী সহযোগিতা পায় কি না</label>
                                                    <div class="col-sm-2">
                                                        <label class="radio-inline "><input class="" type="radio" name="ref" id="ref" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="ref" id="ref" value="2">না </label>
                                                    </div>
                                                    <input type="text" class="form-control col-sm-5" name="ref_name[]" placeholder="রেফারেন্সের নাম" >
                                                </div>

                                                <div class="row col-sm-4 col-sm-offset-1   mt-4 ">
                                                    <label for="" class="col-sm-6" style="color: blue">ইন্টারনেট সুবিধা পায় কি না</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline "><input class="" type="radio" name="internate" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="internate" value="2">না </label>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-7  mt-4 ">
                                                    <label for="" class="col-sm-5" style="color: blue">স্বাস্থ্য সম্মত স্যানিটেশন আছে কি না</label>
                                                    <div class="col-sm-2">
                                                        <label class="radio-inline "><input class="" type="radio" name="clean_water" value="1">হ্যাঁ</label>
                                                        <label class="radio-inline "><input class="" type="radio" name="clean_water" value="2">না </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-sm-offset-4 mt-4 text-left" id="bostoForm_add">
                                                    <button style="background-color: green" class="btn btn-success">পরিবারের অন্য সদস্যের তথ্য যোগ করুন</button>
                                                </div>
                                            </div>

                                        </div>
                                    <div class="col-sm-6 mt-5">
                                        <button style="background-color: #022241" class="btn btn-success">দাখিল করুন</button>
                                    </div>
                                </form>

                                </div>

                                {{--বসতভিটার কর আদায়:--}}

                                <div id="bosot_kor_aday" class="tab-pane">
                                    <div class="row text-right">
                                           <div class="row col-sm-5">
                                               <label for="" class="col-sm-4">ওয়ার্ড নং <span style="color: red">*</span></label>
                                               <select name="word_no_search" id="word_no_search" class="form-control col-sm-8">
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
    </div>

@endsection
@section('script')

    <link rel="stylesheet" href="{{asset('datatables/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('datatables/css/responsive.bootstrap.min.css')}}" />
    <!--<script type="text/javascript" src="datatables/js/jquery-1.11.3.min.js"></script>--->
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

        $('#ref').on('click',function () {

            if($('#ref').prop('checked')){
                $('#ref_name').prop('readonly',false);

            }
            else{
                $('#ref_name').prop('readonly',true);

            }
        });



        //Bosot member no
        $('#member_no').val(1);
        $('#holding_no').on('keyup',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('bosot_member_no')}}",
                data:{
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                success:function (result) {
                    if(result !='one'){

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
                    }
                },
            });
        });

        $('#word_no').on('change',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('bosot_member_no')}}",
                data:{
                    'holding_no':$('#holding_no').val(),
                    'word_no':$('#word_no').val(),
                },
                success:function (result) {
                    if(result !='one'){

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
                    }
                },
            });
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

        //bostoForm_add
        x=1;
        $('#bostoForm_add').on('click',function (e) {
            e.preventDefault();
            var max_fields = 30;

           if(x<max_fields){
               x++;
               $('#boshot_form').append('<div class="row mt-5"><div class="row col-sm-9 mt-4 ">\n' +
                   '                                                <label for=""  class="col-sm-4">সদস্যের ক্রমিক নং</label>\n' +
                   '                                                <input type="text" class="col-sm-8 form-control" name="member_no[]" id="member_nox" readonly>\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="name[]" id="name">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bname[]" id="bname">\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="efname[]" id="efname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পিতার নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bfname[]" id="bfname">\n' +
                   '                                            </div>\n' +
                   '\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মাতার  নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="emname[]" id="emname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মাতার  নাম (বাংলায় ) <span style="color: red">*</span></label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="bmname[]" id="bmname">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">জাতীয় পরিচয় পত্র নং(যদি থাকে) </label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="nid[]" id="nid" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                    <label for="" class="col-sm-4">জন্ম তারিখ <span style="color: red">*</span></label>\n' +
                   '                                                    <input type="date" class="form-control col-sm-8" name="dob[]" id="dob">\n' +
                   '                                                </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">পেশা<span style="color: red">*</span></label>\n' +
                   '                                                <select name="occupation[]" id="" class="form-control col-sm-8">\n' +
                   '                                                    <option value="0">চিহ্নিত করুন</option>\n' +
                   '                                                    @foreach($occa as $occas)\n' +
                   '                                                                @if($occas->status==1)\n' +
                   '                                                                <option value="{{$occas->id}}">{{$occas->occupation}}</option>\n' +
                   '                                                                @endif\n' +
                   '                                                                @endforeach\n' +
                   '                                                </select>\n' +
                   '                                            </div>\n' +
                   '                                            <div class="row col-sm-6 mt-4">\n' +
                   '                                                <label for="" class="col-sm-4">মোবাইল নং </label>\n' +
                   '                                                <input type="text" class="form-control col-sm-8" name="mob[]" id="mob" placeholder="ইংরেজীতে প্রদান করুন">\n' +
                   '                                            </div>\n' +
                   '                                             <div class="row col-sm-9  mt-4 mr-5 ">\n' +
                   '                                                    <label for=""class="col-sm-3"style="color: blue" >জন্ম নিবন্ধন আছে কি না</label>\n' +
                   '                                                    <div class="col-sm-2">\n' +
                   '                                                        <label class="radio-inline "><input class="" type="radio" name="birth_cer[]"  value="1">হ্যাঁ</label>\n' +
                   '                                                        <label class="radio-inline "><input class="" type="radio" name="birth_cer[]" value="2">না </label>\n' +
                   '                                                    </div>\n' +
                   '                                                    <input type="text" class="form-control col-sm-7" name="birth_cer_no[]" placeholder="জন্ম নিবন্ধন নং" >\n' +
                   '                                                </div>\n' +
                   '\n' +
                   '                                            <div class="col-sm-2 mt-4" >\n' +
                   '                                                <button style="background-color: red" id="bostoForm_sub" class="btn btn-success">remove</button>\n' +
                   '                                            </div>\n' +
                   '                                            \n' +
                   '\n' +
                   '                                            </div>\n' +
                   '                                        ');
               $('#member_nox').attr('id', "member_no"+x).val(x);
           }
        });

        $('#boshot_form').on("click","#bostoForm_sub", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;

            $("input[name^='member_no']").each(function(key) {
                $(this).val(key+1);
            });

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


        //
        $('#holding_search').on('click',function () {
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