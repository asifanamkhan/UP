@extends('layouts.front_end_layout.master')
@section('head_content')
    ওয়ারিশ সনদের আবেদন
@endsection
@section('content')
    <form action="{{route('warish_sonod_abedon.store')}}" method="post" enctype="multipart/form-data" id="defaultForm"
          class="form-horizontal">
        @csrf
        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">সরবরাহের ধরণ <span>*</span></label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="1">জরুরী</label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="2">অতি জরুরী
                        </label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="3" checked>
                            সাধারন</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="national_id" class="col-sm-6 control-label">ন্যাশনাল আইডি (ইংরেজিতে) </label>
                    <div class="col-sm-6">
                        <input type="text" name="nationid" id="nid" maxlength='17' class="form-control"
                                placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bairth_no" class="col-sm-6 control-label">জন্ম নিবন্ধন নং ( ইংরেজিতে ) </label>
                    <div class="col-sm-6">
                        <input type="text" name="bcno" id="bcno" maxlength='17' class="form-control"
                               onkeypress="return checkaccnumber(event);" placeholder=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="passport_no" class="col-sm-6 control-label">পাসপোর্ট নং ( ইংরেজিতে ) </label>
                    <div class="col-sm-6">
                        <input type="text" name="pno" id="pno" maxlength='17' class="form-control" placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-6 control-label">জম্ম তারিখ <span>*</span></label>
                    <div class="col-sm-6 date">
                        <div class="">
                            <input type="date" class="form-control" name="dofb"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="death_ename" class="col-sm-3 control-label">মৃত ব্যাক্তির নাম ( ইংরেজিতে )
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="ename" id="name" class="form-control" />
                    </div>
                    <label for="death_name" class="col-sm-3 control-label">মৃত ব্যাক্তির নাম ( বাংলায় )
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bname" id="bname" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Gender" class="col-sm-3 control-label">লিঙ্গ <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="gender" id="gender" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            <option value="male">পুরুষ</option>
                            <option value="female">মহিলা</option>
                            <option value="others">অন্যান্য</option>
                        </select>
                    </div>
                    <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="mstatus" id="mstatus" class="form-control" >
                            <option value="">চিহ্নিত করুন</option>
                            <option value="1">বিবাহিত</option>
                            <option value="2">অবিবাহিত</option>
                            <option value="3">বিপত্নীক / বিধবা</option>
                            <option value="4">তালাকপ্রাপ্ত</option>
                            <option value="5">দরকার নাই</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="wife" style="display: none;" data-topic="1">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Wife-name-english" class="col-sm-3 control-label">স্ত্রীর নাম (ইংরেজিতে) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="eWname" id="eWname" class="form-control" placeholder=""/>
                    </div>
                    <label for="Wife-name-bangla" class="col-sm-3 control-label">স্ত্রীর নাম (বাংলায়)
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bWname" id="bWname" class="form-control" placeholder=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে)
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="eHname" id="eHname" class="form-control" placeholder=""/>
                    </div>
                    <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামী নাম (বাংলায়) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bHname" id="bHname" class="form-control" placeholder=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div id="efname">
                        <label for="father-english-name" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে) <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="efname" id="efname" class="form-control" />
                        </div>
                    </div>
                    <label for="father-bangla-name" class="col-sm-3 control-label">পিতার নাম (বাংলায়)
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bfname" id="bfname" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="mother-english-name" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="emname" id="emname" class="form-control" />
                    </div>
                    <label for="mother-bangla-name" class="col-sm-3 control-label">মাতার নাম (বাংলায়)
                        <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bmane" id="bmane" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6" id="father_id">
                <div class="form-group">
                    <label for="father-alive" class="col-sm-6 control-label">পিতা জীবিত কিনা</label>
                    <div class="col-sm-6">
                        <label class="radio-inline"><input type="radio" name="flive" id="fliveHa" value="1">হ্যাঁ </label>
                        <label class="radio-inline"><input type="radio" name="flive" id="fliveNa" value="0" checked>না</label>
                        <input type="text" name="fyears" id="fyears" class="form-control" placeholder="পিতার বয়স" disabled/>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" id="mother_id">
                <div class="form-group">
                    <label for="mother-alive" class="col-sm-6 control-label">মাতা জীবিত কিনা</label>
                    <div class="col-sm-6" id="">
                        <label class="radio-inline"><input type="radio" name="mlive" id="mliveHa" value="1">হ্যাঁ </label>
                        <label class="radio-inline"><input type="radio" name="mlive" id="mliveNa" value="0" checked>না</label>
                        <input type="text" name="myears" id="myears" class="form-control" placeholder="মাতার বয়স" disabled/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-6 control-label">পেশা</label>
                    <div class="col-sm-6">
                        <input type="text" name="ocupt" id="occupation" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Resident" class="col-sm-6 control-label">বাসিন্দা <span>*</span></label>
                    <div class="col-sm-6">
                        <select name="bashinda" id="bs" class="form-control" >
                            <option value=''>চিহ্নিত করুন</option>
                            <option value='1'>অস্থায়ী</option>
                            <option value='2'>স্থায়ী</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="permaHeading">
            <div class="col-sm-12" style="text-align:center;">
                <div class="app-heading">
                    <b>স্থায়ী ঠিকানা</b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                       <b> ( ইংরেজিতে )</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" name="p_gram" id="p_gram" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-Block-Sector" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" name="p_rbs" id="p_rbs" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" name="p_wordno" id="p_wordno" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" name="p_dis" id="p_dis" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" name="p_thana" id="p_thana" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" name="p_postof" id="p_postof" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        <b>( বাংলায় )</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_gram" id="pb_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-Block-Sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_rbs" id="pb_rbs" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_wordno" id="pb_wordno" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_dis" id="pb_dis" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_thana" id="pb_thana" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" name="pb_postof" id="pb_postof" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="permaHeading">
            <div class="col-sm-12" style="text-align:center;">
                <div class="app-heading">
                   <b>স্থায়ী ঠিকানা</b>
                </div>
            </div>
        </div>

        <div class="row" id="permanentAddress">
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        <b>( ইংরেজিতে )</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" name="per_gram" id="per_gram" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-Block-Sector" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" name="per_rbs" id="per_rbs" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" name="per_wordno" id="per_wordno" onkeypress="return numtest();"
                                       class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" name="per_dis" id="per_dis" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" name="per_thana" id="per_thana" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" name="per_postof" id="per_postof" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        <b>( বাংলায় )</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_gram" id="perb_gram" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-Block-Sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_rbs" id="perb_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_wordno" id="perb_wordno" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_dis" id="perb_dis" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_thana" id="perb_thana" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" name="perb_postof" id="perb_postof" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12" style="text-align:center;">
                <div class="app-heading">
                    যোগাযোগের ঠিকানা
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="English Applicant Name" class="col-sm-3 control-label small-font"> আবেদনকারীর নাম
                        (ইংরেজিতে) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="english_applicant_name" id="" class="form-control" />
                    </div>
                    <label for="Bangla Applicant Name" class="col-sm-3 control-label small-font">আবেদনকারীর নাম ( বাংলায়
                        ) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bangla_applicant_name" id="" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="English Applicant Father Name" class="col-sm-3 control-label small-font"> আবেদনকারীর
                        পিতার নাম (ইংরেজিতে) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="english_applicant_father_name" id="" class="form-control" />
                    </div>
                    <label for="Bangla Applicant Father Name" class="col-sm-3 control-label small-font">আবেদনকারীর পিতার
                        নাম ( বাংলায় ) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="bangla_applicant_father_name" id="" class="form-control" />
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mobile" class="col-sm-6 control-label small-font">মোবাইল <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" minlength="0" name="mob" id="mob" class="form-control" maxlength="11"
                                placeholder="ইংরেজিতে প্রদান করুন" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-6 control-label small-font">ইমেল <span>&nbsp;</span></label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email" class="form-control"
                               style="color: black;font-weight: 500;"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="text-align:center;">
                <div class="app-heading">
                    ওয়ারিশগনের তালিকা
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-2">
                        <h3> নাম </h3>
                    </div>
                    <div class="col-sm-3">
                        <h3> সম্পর্ক </h3>
                    </div>
                    <div class="col-sm-3">
                        <h3> বয়স </h3>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-3  col-sm-offset-1 extra-margin">
                        <input type="text" name="warishname[]" id="wname" class="form-control"/>
                    </div>
                    <div class="col-sm-3 extra-margin">
                        <input type="text" name="warishrel[]" id="wrel" class="form-control"/>
                    </div>
                    <div class="col-sm-3 extra-margin">
                        <input type="text" name="warishage[]" minlength="0" maxlength="" id="wage" placeholder="ইংরেজিতে"
                               class="form-control" />
                    </div>
                    <div class="col-sm-2 extra-margin">
                        <input type="button" id="addButton" value='নতুন ওয়ারিশ' class="addButton btn btn-info"/>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<div class="form-group hide" id="itemRows">--}}
                    {{--<div class=" col-sm-3  col-sm-offset-1 sub-extra-margin">--}}
                        {{--<input type="text" class="form-control" name="name"/>--}}
                    {{--</div>--}}
                    {{--<div class=" col-sm-3 sub-extra-margin">--}}
                        {{--<input type="text" class="form-control" name="rel"/>--}}
                    {{--</div>--}}
                    {{--<div class=" col-sm-3 sub-extra-margin">--}}
                        {{--<input type="text" class="form-control" name="age"/>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-2 sub-extra-margin">--}}
                        {{--<input type="button" value="Remove" class="removeButton btn btn-danger btn-sm"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div id="append"></div>


        <div class="row">
            <div class="col-sm-offset-6 col-sm-6 button-style">
                <button type="submit" id="submit_button" class="btn btn-primary">দাখিল করুন</button>
                <input type="hidden" name="status" value="0">
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://demos.creative-tim.com/paper-bootstrap-wizard/assets/js/jquery.validate.min.js"></script>
    {{--<script>--}}
        {{--$('#defaultForm').validate({--}}
            {{--rules: {--}}
                {{--efname: {--}}
                    {{--required: true,--}}
                    {{--minlength: 3--}}
                {{--},--}}
                {{--bfname: {--}}
                    {{--required: true,--}}
                    {{--minlength: 3--}}

                {{--}--}}

            {{--},--}}
            {{--messages:{--}}
                {{--efname:{--}}
                    {{--required:"father name is required"--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
    <script>


        $('#mliveHa').on('click',function () {

            $('#myears').prop('disabled',false)

        });
        $('#mliveNa').on('click',function () {

            $('#myears').prop('disabled',true)

        });
        $('#fliveHa').on('click',function () {

            $('#fyears').prop('disabled',false)

        });
        $('#fliveNa').on('click',function () {

            $('#fyears').prop('disabled',true)

        });

        var x = 0;
        $('#addButton').on('click', function (e) {
            //e.preventDefault();

            var max_fields = 30;
            if (x < max_fields) {
                x++;
                $('#append').append('<div class="row">\n' +
                    '            <div class="col-sm-12">\n' +
                    '                <div class="form-group">\n' +
                    '                    <div class="col-sm-3  col-sm-offset-1 extra-margin">\n' +
                    '                        <input type="text" name="warishname[]" id="wname" class="form-control"/>\n' +
                    '                    </div>\n' +
                    '                    <div class="col-sm-3 extra-margin">\n' +
                    '                        <input type="text" name="warishrel[]" id="wrel" class="form-control"/>\n' +
                    '                    </div>\n' +
                    '                    <div class="col-sm-3 extra-margin">\n' +
                    '                        <input type="text" name="warishage[]" minlength="0" maxlength="" id="wage" placeholder="ইংরেজিতে"\n' +
                    '                               class="form-control" />\n' +
                    '                    </div>\n' +
                    '                    <div class="col-sm-2 extra-margin">\n' +
                    '                        <input type="button" id="minusButton" value="-"  class=" btn btn-danger"/>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '        </div>');

            }
        });

        $(document).on("click", "#minusButton", function (e) {
            e.preventDefault();
            $(this).parent('div').parent().remove();
            x--;
        });
    </script>
@endsection