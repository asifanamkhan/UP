@extends('layouts.front_end_layout.master')
@section('head_content')
    নাগরিক আবেদন
@endsection
@section('content')
    <div class="panel-body all-input-form">
        <form action="{{route('nagorik_abedon.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="defaultForm">
            @csrf
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Picture" class="col-sm-3 control-label">ছবি</label>
                        <div class="col-sm-5" style="margin-top:3px;">
                            <input type="file" name="image" id="image" class="form-control input-file-sm"/>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <div class="col-sm-3" style="margin-top:3px;">
                            <button name='upload' id="upload" class="btn btn-primary">আপলোড</button>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                    <div class="form-group has-feedback">
                        <label for="Delivery-type" class="col-sm-3 control-label">সরবরাহের ধরণ <span style="color: red">*</span></label>
                        <div class="col-sm-9 has-feedback" id="">
                            <label class="radio-inline delivery_type"><input class="delivery_type" type="radio" name="delivery_type" value="1">জরুরী</label>
                            <label class="radio-inline delivery_type"><input class="delivery_type" type="radio" name="delivery_type" value="2">অতি জরুরী
                            </label>
                            <label class="radio-inline delivery_type"><input class="delivery_type" type="radio" name="delivery_type" value="3"
                                                               checked="checked"> সাধারন</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="National-id-english" class="col-sm-6 control-label">ন্যাশনাল আইডি (ইংরেজিতে) </label>
                        <div class="col-sm-6">
                            <input type="text" name="nationid" id="nid" class="form-control" value="" minlength="15" maxlength='17' placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Birth-no" class="col-sm-6 control-label">জন্ম নিবন্ধন নং ( ইংরেজিতে ) </label>
                        <div class="col-sm-6">
                            <input type="text" name="bcno" id="bcno" class="form-control" maxlength="17" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Passport-no" class="col-sm-6 control-label">পাসপোর্ট নং ( ইংরেজিতে ) </label>
                        <div class="col-sm-6">
                            <input type="text" name="pno" id="pno" class="form-control" maxlength='17'
                                   placeholder=""/>
                            <span ></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Birth-date" class="col-sm-6 control-label">জম্ম তারিখ <span style="color: red;">*</span></label>
                        <div class="col-sm-6 date">
                            <div class="" id="">
                                <input type="date" class="form-control" name="dofb" id="dof"/>
                                <span ></span>
                                <small name="help-block" class="help-block" style="color: red"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Name-english" class="col-sm-3 control-label">নাম ( ইংরেজিতে ) <span
                                    style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="ename" id="name" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Name-bangla" class="col-sm-3 control-label">নাম ( বাংলায় ) <span
                                    style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="bname" id="bname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group has-feedback " >
                        <label for="Gender" class="col-sm-3 control-label">লিঙ্গ <span style="color: red;">*</span></label>
                        <div class="col-sm-3">
                            <select name="gender" id="gender" class="form-control" onchange="testshowHide(this.value);">
                                <option value="">চিহ্নিত করুন</option>
                                <option value="male" id="male">পুরুষ</option>
                                <option value="female" id="female">মহিলা</option>
                                <option value="others" id="others">অন্যান্য</option>
                            </select>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক <span style="color:red;">*</span></label>
                        <div class="col-sm-3">
                            <select name="mstatus" id="mstatus" class="form-control">
                                <option value="">চিহ্নিত করুন</option>
                                <option value="1" id="married">বিবাহিত</option>
                                <option value="2" id="unmarried">অবিবাহিত</option>
                                <option value="3" id="">বিপত্নীক / বিধবা</option>
                                <option value="4" id="divorced">তালাকপ্রাপ্ত</option>
                                <option value="5">দরকার নাই</option>
                            </select>
                            {{--<span class="glyphicon glyphicon-ok form-control-feedback"></span>--}}
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="wife">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Wife-name-english" class="col-sm-3 control-label">স্ত্রীর নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="eWname" id="eWname" class="form-control" placeholder="" value=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Wife-name-bangla" class="col-sm-3 control-label">স্ত্রীর নাম (বাংলায়)
                            <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="bWname" id="bWname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row aa" id="husband">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে)
                            <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="eHname" id="eHname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামী নাম (বাংলায়) <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="bHname" id="bHname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="efname" id="efname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)
                            <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="bfname" id="bfname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে) <span style="color: red;">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="emname" id="mname" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                        <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)
                            <span style="color: red">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" name="bmane" id="emane" class="form-control" placeholder=""/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="profession" class="col-sm-6 control-label">পেশা</label>
                        <div class="col-sm-6">
                            <input type="text" name="ocupt" id="occupation" class="form-control" placeholder=""
                                   maxlength="500"/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Education-qualification" class="col-sm-6 control-label">শিক্ষাগত যোগ্যতা</label>
                        <div class="col-sm-6">
                            <input type="text" name="qualification" id="qualification" class="form-control" placeholder=""
                                   maxlength="500"/>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Religion" class="col-sm-6 control-label">ধর্ম <span style="color: red">*</span></label>
                        <div class="col-sm-6">
                            <select name="religion" id="religion" class="form-control">
                                <option value=''>চিহ্নিত করুন</option>
                                <option value='ইসলাম'>ইসলাম</option>
                                <option value='হিন্দু'>হিন্দু</option>
                                <option value='বৌদ্ধ ধর্ম'>বৌদ্ধ ধর্ম</option>
                                <option value='খ্রিস্ট ধর্ম'>খ্রিস্ট ধর্ম</option>
                                <option value='অন্যান্য'>অন্যান্য</option>
                            </select>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Resident" class="col-sm-6 control-label">বাসিন্দা <span style="color: red">*</span></label>
                        <div class="col-sm-6">
                            <select name="bashinda" id='bs' class="form-control">
                                <option value=''>চিহ্নিত করুন</option>
                                <option value='1'>অস্থায়ী</option>
                                <option value='2'>স্থায়ী</option>
                            </select>
                            <span class=""></span>
                            <small name="help-block" class="help-block" style="color: red"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12" style="text-align:center;">
                    <div class="app-heading">
                        <br><b><u>বর্তমান ঠিকানা</u></b><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="app-sub-heading">
                            <b>( ইংরেজিতে )</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Village-english" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_gram" id="p_gram" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Road-block-sector-english"
                                       class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_rbs" id="p_rbs" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_wordno" id="p_wordno" class="form-control"
                                            placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_dis" id="p_dis" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_thana" id="p_thana" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" name="p_postof" id="p_postof" class="form-control" placeholder=""/>
                                    <span class=""></span>
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
                            <div class="form-group has-feedback">
                                <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_gram" id="pb_gram" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_rbs" id="pb_rbs" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_wordno" id="pb_wordno" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_dis" id="pb_dis" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_thana" id="pb_thana" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" name="pb_postof" id="pb_postof" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="permaHeading">
                <div class="col-sm-12" style="text-align:center;">
                    <div class="app-heading">
                        <b><u>স্থায়ী ঠিকানা</u></b>
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
                            <div class="form-group has-feedback">
                                <label for="Village-english" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_gram" id="per_gram" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Road-block-sector-english"
                                       class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_rbs" id="per_rbs" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_wordno" id="per_wordno" class="form-control"
                                            placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_dis" id="per_dis" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_thana" id="per_thana" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" name="per_postof" id="postof" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="app-sub-heading">
                           <b> ( বাংলায় )</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_gram" id="perb_gram" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_rbs" id="perb_rbs" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_wordno" id="perb_wordno" class="form-control"
                                           placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_dis" id="perb_dis" class="form-control" placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_thana" id="perb_thana" class="form-control"
                                           placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group has-feedback">
                                <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" name="perb_postof" id="perb_postof" class="form-control"
                                           placeholder=""/>
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12" style="text-align:center;">
                    <div class="app-heading">
                        <b><u>যোগাযোগের ঠিকানা</u></b>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Mobile" class="col-sm-6 control-label">মোবাইল <span style="color: red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" name="mob" id="mob" max="11" class="form-control" placeholder="ইংরেজিতে প্রদান করুন"/>
                            <span class=""></span>
                            <small name="help-block" class="help-block"></small>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group has-feedback">
                        <label for="Email" class="col-sm-6 control-label">ইমেল </label>
                        <div class="col-sm-6">
                            <input type="text" name="email" id="email" class="form-control" placeholder=""/>
                            <span class=""></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="Designation" class="col-sm-3 control-label">সংযুক্তি (যদি থাকে)</label>
                        <div class="col-sm-9">
                        <textarea name="attachment" class="form-control" rows="5" id="attachment"
                                  placeholder="উদাহরন: মুক্তিযোদ্ধা সন্তান, বিধবা, উপজাতি .....ইত্যাদি"></textarea>
                            <span class=""></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-6 col-sm-6 button-style">
                    <button type="submit" id="submit_button" class="btn btn-primary">দাখিল করুন</button>
                    <input type="hidden" name="token" value="{{$number =time().str_random(5) }}">
                    <input type="hidden" name="status" value="0">
                </div>
            </div>

        </form>
    </div>

@endsection

@section('script')

    <script>
    //Image

    $('#upload').on('click',function (e) {
        e.preventDefault();
        var up = $('#image').val();
        if($('#image').val() !=''){
            $('#image').parent().find('small').show().text('Image Uploded Successfully');
            console.log(up);
        }
        else{
            $('#image').parent().find('small').show().text('please select a Image First');
            console.log(up);
        }

    });


        // Nid Validation
        $(document).on('keyup','#defaultForm [name="nationid"]',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('nagorikNid')}}",
                data:{
                    'nationid':$('#nid').val(),
                },
                success:function (result) {

                    console.log(result);

                    if($('#nid').val().length<15){
                        $('#nid').parent().removeClass('has-success');
                        $('#nid').parent().addClass('has-error');
                        $('#nid').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#nid').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#nid').parent().find('small').show().text('National id number more than 15 and less then 17 character');

                        $('#submit_button').prop("disabled",true);
                    }
                    else if(result == 'two'){
                        $('#nid').parent().removeClass('has-success');
                        $('#nid').parent().addClass('has-error');
                        $('#nid').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#nid').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#nid').parent().find('small').show().text('National id number is already exist');

                        $('#submit_button').prop("disabled",true);
                    }
                    else{
                        $('#nid').parent().removeClass('has-error');
                        $('#nid').parent().addClass('has-success');
                        $('#nid').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#nid').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#nid').parent().find('small').hide();
                        $('#submit_button').prop("disabled",false);
                    }
                },
            });

        });

        // জন্ম নিবন্ধন নং validation
        $(document).on('keyup','#bcno',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('nagorikBcno')}}",
                data:{
                    'bcno':$('#bcno').val(),
                },
                success:function (result) {

                    console.log(result);

                    if($('#bcno').val().length<15){
                        $('#bcno').parent().removeClass('has-success');
                        $('#bcno').parent().addClass('has-error');
                        $('#bcno').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#bcno').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#bcno').parent().find('small').show().text('Birth certficate number more than 15 and less then 17 character');

                        $('#submit_button').prop("disabled",true);
                    }
                    else if(result == 'two'){
                        $('#bcno').parent().removeClass('has-success');
                        $('#bcno').parent().addClass('has-error');
                        $('#bcno').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#bcno').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#bcno').parent().find('small').show().text('Birth certficate number is already exist');

                        $('#submit_button').prop("disabled",true);
                    }
                    else{
                        $('#bcno').parent().removeClass('has-error');
                        $('#bcno').parent().addClass('has-success');
                        $('#bcno').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#bcno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#bcno').parent().find('small').hide();
                        $('#submit_button').prop("disabled",false);
                    }
                },
            });

        });
        //Passport Validation
        $(document).on('keyup','#pno',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('nagorikPno')}}",
                data:{
                    'pno':$('#pno').val(),
                },
                success:function (result) {

                    console.log(result);

                    if($('#pno').val().length<13){
                        $('#pno').parent().removeClass('has-success');
                        $('#pno').parent().addClass('has-error');
                        $('#pno').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#pno').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#pno').parent().find('small').show().text('Passport number more than 13 and less then 17 character');
                        $('#submit_button').prop("disabled",true);
                    }
                    else if(result == 'two'){
                        $('#pno').parent().removeClass('has-success');
                        $('#pno').parent().addClass('has-error');
                        $('#pno').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#pno').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#pno').parent().find('small').show().text('Passport number is already exist');

                        $('#submit_button').prop("disabled",true);
                    }
                    else{
                        $('#pno').parent().removeClass('has-error');
                        $('#pno').parent().addClass('has-success');
                        $('#pno').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#pno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#pno').parent().find('small').hide();
                        $('#submit_button').prop("disabled",false);
                    }
                },
            });

        });

        //Mobile no Validation
        $(document).on('keyup','#mob',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"{{route('nagorikMob')}}",
                data:{
                    'mob':$('#mob').val(),
                },

                success:function (result) {
                    //console.log(result);
                    var mob = $('#mob').val();

                    var mobile = new RegExp('\\+?(88)?0?1[3456789][0-9]{8}\\b');
                    if(mobile.test(mob)){
                        $('#mob').parent().parent().removeClass('has-error');
                        $('#mob').parent().parent().removeClass('has-warning');
                        $('#mob').parent().parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#mob').parent().parent().addClass('has-success');
                        $('#mob').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#mob').parent().find('small').hide();
                        $('#submit_button').prop("disabled",false);

                        if(result == 'two'){
                            $('#mob').parent().parent().removeClass('has-error');
                            $('#mob').parent().parent().removeClass('has-success');
                            $('#mob').parent().parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#mob').parent().parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#mob').parent().parent().addClass('has-warning');
                            $('#mob').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#mob').parent().find('small').show().text('The Moblie number is already exist');
                        }
                    }

                    else {
                        $('#mob').parent().parent().removeClass('has-success');
                        $('#mob').parent().parent().removeClass('has-warning');
                        $('#mob').parent().parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#mob').parent().parent().addClass('has-error');
                        $('#mob').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#mob').parent().find('small').show().text('Invalid mobile number');
                        $('#submit_button').prop("disabled",true);
                    }
                }
            });
        });
    </script>
    <script>
        $('#wife').hide();
        $('#husband').hide();
        $('.help-block').hide();

        $(document).on('change','#gender',function () {
            $('#gender').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
            $('#gender').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');

            if($('#gender').val()=='male' && $('#mstatus').val() == 1){
                $('#wife').show();
                 $('#gender').parent().parent().removeClass('has-error');
                 $('#gender').parent().parent().addClass('has-success');

                $('#gender').parent().find('small').hide();
                $('#gender').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
            else{
                if($('#gender').val() == ''){
                    $('#gender').parent().parent().addClass('has-error');
                    $('#gender').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                    $('#gender').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#gender').parent().find('small').show().text('gender is required');

                }
                else{
                    $('#gender').parent().find('small').hide();
                }

                $('#wife').hide();

            }
        });
        $(document).on('change','#mstatus',function () {
            $('#mstatus').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
            $('#mstatus').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');

            if($('#gender').val()=='male' && $('#mstatus').val() == 1){
                $('#wife').show();
                 $('#mstatus').parent().parent().removeClass('has-error');
                 $('#mstatus').parent().parent().addClass('has-success');

                $('#mstatus').parent().find('small').hide();
                $('#gender').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');

            }
            else{
                if($('#mstatus').val() == ''){
                    $('#mstatus').parent().parent().addClass('has-error');
                    $('#mstatus').parent().find('small').show().text('mstatus is required');
                    $('#mstatus').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                    $('#mstatus').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                }
                else{
                    $('#mstatus').parent().find('small').hide();
                }

                $('#wife').hide();

            }
        });
        $(document).on('change','#gender',function () {
            if($('#gender').val()=='female' && $('#mstatus').val() == 1){
                $('#husband').show();
            }
            else{
                $('#husband').hide();
            }
        });
        $(document).on('change','#mstatus',function () {
            if($('#gender').val()=='female' && $('#mstatus').val() == 1){
                $('#husband').show();
            }
            else{
                $('#husband').hide();
            }
        });

        //Feild Validation

        $(document).on('keyup','#eWname',function () {
            if($('#eWname').val() == ''){
                $('#eWname').parent().addClass('has-error');
                $('#eWname').parent().parent().addClass('has-error');
                $('#eWname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#eWname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#eWname').parent().find('small').show().text('Wife name is required');
            }
            else{
                $('#eWname').parent().removeClass('has-error');
                $('#eWname').parent().parent().removeClass('has-error');
                $('#eWname').parent().addClass('has-success');
                $('#eWname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#eWname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#eWname').parent().find('small').hide();

            }
        });

        $(document).on('keyup','#bWname',function () {
            if($('#bWname').val() == ''){
                $('#bWname').parent().addClass('has-error');
                $('#bWname').parent().parent().addClass('has-error');
                $('#bWname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bWname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bWname').parent().find('small').show().text('Wife name is required');
            }
            else{
                $('#bWname').parent().removeClass('has-error');
                $('#bWname').parent().parent().removeClass('has-error');
                $('#bWname').parent().addClass('has-success');
                $('#bWname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bWname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bWname').parent().find('small').hide();

            }
        });

        $(document).on('keyup','#eHname',function () {
            if($('#eHname').val() == ''){
                $('#eHname').parent().addClass('has-error');
                $('#eHname').parent().parent().addClass('has-error');
                $('#eHname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#eHname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#eHname').parent().find('small').show().text('Husband name is required');
            }
            else{
                $('#eHname').parent().removeClass('has-error');
                $('#eHname').parent().parent().removeClass('has-error');
                $('#eHname').parent().addClass('has-success');
                $('#eHname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#eHname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#eHname').parent().find('small').hide();

            }
        });

        $(document).on('keyup','#bHname',function () {
            if($('#bHname').val() == ''){
                $('#bHname').parent().addClass('has-error');
                $('#bHname').parent().parent().addClass('has-error');
                $('#bHname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bHname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bHname').parent().find('small').show().text('Husband name is required');
            }
            else{
                $('#bHname').parent().removeClass('has-error');
                $('#bHname').parent().parent().removeClass('has-error');
                $('#bHname').parent().addClass('has-success');
                $('#bHname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bHname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bHname').parent().find('small').hide();

            }
        });
        $(document).on('keyup','#bfname',function () {
            if($('#bfname').val() == ''){
                $('#bfname').parent().addClass('has-error');
                $('#bfname').parent().parent().addClass('has-error');
                $('#bfname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bfname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bfname').parent().find('small').show().text('The father name is required');
            }
            else{
                $('#bfname').parent().removeClass('has-error');
                $('#bfname').parent().parent().removeClass('has-error');
                $('#bfname').parent().addClass('has-success');
                $('#bfname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bfname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bfname').parent().find('small').hide();

            }
        });
        $(document).on('keyup','#mname',function () {
            if($('#mname').val() == ''){
                $('#mname').parent().addClass('has-error');
                $('#mname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#mname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#mname').parent().find('small').show().text('The mother name is required');
            }
            else{
                $('#mname').parent().removeClass('has-error');
                $('#mname').parent().parent().removeClass('has-error');
                $('#mname').parent().addClass('has-success');
                $('#mname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#mname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#mname').parent().find('small').hide();

            }
        });
        $(document).on('keyup','#emane',function () {
            if($('#emane').val() == ''){
                $('#emane').parent().addClass('has-error');
                $('#emane').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#emane').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#emane').parent().find('small').show().text('The mother name is required');
            }
            else{
                $('#emane').parent().removeClass('has-error');
                $('#emane').parent().parent().removeClass('has-error');
                $('#emane').parent().addClass('has-success');
                $('#emane').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#emane').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#emane').parent().find('small').hide();

            }
        });
        $(document).on('change','#religion',function () {
            if($('#religion').val() == ''){
                $('#religion').parent().addClass('has-error');
                $('#religion').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#religion').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#religion').parent().find('small').show().text('The Religion field is required');
            }
            else{
                $('#religion').parent().removeClass('has-error');
                $('#religion').parent().parent().removeClass('has-error');
                $('#religion').parent().addClass('has-success');
                $('#religion').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#religion').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#religion').parent().find('small').hide();

            }
        });
        $(document).on('change','#bs',function () {
            if($('#bs').val() == ''){
                $('#bs').parent().addClass('has-error');
                $('#bs').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bs').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bs').parent().find('small').show().text('The field is required');
            }
            else{
                $('#bs').parent().removeClass('has-error');
                $('#bs').parent().parent().removeClass('has-error');
                $('#bs').parent().addClass('has-success');
                $('#bs').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bs').parent().find('small').hide();

            }
        });
        $(document).on('keyup','#name',function () {
            if($('#name').val() == ''){
                $('#name').parent().addClass('has-error');
                $('#name').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#name').parent().find('small').show().text('The name is required');
            }
            else{
                $('#name').parent().removeClass('has-error');
                $('#name').parent().addClass('has-success');
                $('#name').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#name').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#name').parent().find('small').hide();

            }
        });
        $(document).on('keyup','#bname',function () {
            if($('#bname').val() == ''){
                $('#bname').parent().addClass('has-error');
                $('#bname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bname').parent().find('small').show().text('The name is required');
            }
            else{
                $('#bname').parent().removeClass('has-error');
                $('#bname').parent().addClass('has-success');
                $('#bname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bname').parent().find('small').hide();

            }
        });
        //delivery_type
        $(document).on('click change','.delivery_type',function () {
            if($('.delivery_type').val() != ''){
                //$('.delivery_type').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('.delivery_type').parent().parent().addClass('has-success');
            }
        });

        // occupation
        $(document).on('keyup','#occupation',function () {
            if($('#occupation').val() != ''){
                $('#occupation').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#occupation').parent().parent().addClass('has-success');
            }
        });
        $(document).on('keyup','#qualification',function () {
            if($('#qualification').val() != ''){
                $('#qualification').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#qualification').parent().parent().addClass('has-success');
            }
        });
        //Present Address
        $(document).on('keyup','#p_gram',function () {
            if($('#p_gram').val() != ''){
                $('#p_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#p_gram').parent().parent().addClass('has-success');
            }
        });
        $(document).on('keyup','#p_rbs',function () {
            if($('#p_rbs').val() != ''){
                $('#p_rbs').parent().parent().addClass('has-success');
                $('#p_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });
        $(document).on('keyup','#p_wordno',function () {
            if($('#p_wordno').val() != ''){
                $('#p_wordno').parent().parent().addClass('has-success');
                $('#p_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });
        $(document).on('keyup','#p_dis',function () {
            if($('#p_dis').val() != ''){
                $('#p_dis').parent().parent().addClass('has-success');
                $('#p_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#p_thana',function () {
            if($('#p_thana').val() != ''){
                $('#p_thana').parent().parent().addClass('has-success');
                $('#p_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#p_postof',function () {
            if($('#p_postof').val() != ''){
                $('#p_postof').parent().parent().addClass('has-success');
                $('#p_postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_gram',function () {
            if($('#pb_gram').val() != ''){
                $('#pb_gram').parent().parent().addClass('has-success');
                $('#pb_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_rbs',function () {
            if($('#pb_rbs').val() != ''){
                $('#pb_rbs').parent().parent().addClass('has-success');
                $('#pb_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_wordno',function () {
            if($('#pb_wordno').val() != ''){
                $('#pb_wordno').parent().parent().addClass('has-success');
                $('#pb_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_dis',function () {
            if($('#pb_dis').val() != ''){
                $('#pb_dis').parent().parent().addClass('has-success');
                $('#pb_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_thana',function () {
            if($('#pb_thana').val() != ''){
                $('#pb_thana').parent().parent().addClass('has-success');
                $('#pb_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#pb_postof',function () {
            if($('#pb_postof').val() != ''){
                $('#pb_postof').parent().parent().addClass('has-success');
                $('#pb_postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });
        //Parmanent Address
        $(document).on('keyup','#per_gram',function () {
            if($('#per_gram').val() != ''){
                $('#per_gram').parent().parent().addClass('has-success');
                $('#per_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#per_rbs',function () {
            if($('#per_rbs').val() != ''){
                $('#per_rbs').parent().parent().addClass('has-success');
                $('#per_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#per_wordno',function () {
            if($('#per_wordno').val() != ''){
                $('#per_wordno').parent().parent().addClass('has-success');
                $('#per_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#per_dis',function () {
            if($('#per_dis').val() != ''){
                $('#per_dis').parent().parent().addClass('has-success');
                $('#per_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#per_thana',function () {
            if($('#per_thana').val() != ''){
                $('#per_thana').parent().parent().addClass('has-success');
                $('#per_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#postof',function () {
            if($('#postof').val() != ''){
                $('#postof').parent().parent().addClass('has-success');
                $('#postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_gram',function () {
            if($('#perb_gram').val() != ''){
                $('#perb_gram').parent().parent().addClass('has-success');
                $('#perb_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_rbs',function () {
            if($('#perb_rbs').val() != ''){
                $('#perb_rbs').parent().parent().addClass('has-success');
                $('#perb_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_wordno',function () {
            if($('#perb_wordno').val() != ''){
                $('#perb_wordno').parent().parent().addClass('has-success');
                $('#perb_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_dis',function () {
            if($('#perb_dis').val() != ''){
                $('#perb_dis').parent().parent().addClass('has-success');
                $('#perb_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_thana',function () {
            if($('#perb_thana').val() != ''){
                $('#perb_thana').parent().parent().addClass('has-success');
                $('#perb_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#perb_postof',function () {
            if($('#perb_postof').val() != ''){
                $('#perb_postof').parent().parent().addClass('has-success');
                $('#perb_postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        //Address

        $(document).on('keyup','#email',function () {
            if($('#email').val() != ''){
                $('#email').parent().parent().addClass('has-success');
                $('#email').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        $(document).on('keyup','#attachment',function () {
            if($('#attachment').val() != ''){
                $('#attachment').parent().parent().addClass('has-success');
                $('#attachment').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }
        });

        //value chacking

        $('#submit_button').on('click',function (e) {
            if($('#dof').val() !='' && $('#name').val() !='' && $('#bname').val() !='' && $('#mob').val() !=''&& $('#gender').val() !=''&& $('#mstatus').val() !=''&& $('#efname').val() !=''&& $('#bfname').val() !=''&& $('#mname').val() !=''&& $('#emane').val() !=''&& $('#religion').val() !=''&& $('#bs').val() !=''){
                if($('#nid').val() == ''){
                    $('#nid').val(0);
                }
                if($('#bcno').val() == ''){
                    $('#bcno').val(0);
                }
                if($('#pno').val() == ''){
                    $('#pno').val(0);
                }

                e.submit();
            }
            else {

                e.preventDefault();

                if($('#dof').val() ==''){
                    $('#dof').parent().parent().addClass('has-error');
                    $('#dof').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                   $('#dof').parent().find('small').show().text('The date is required');

                }
                if($('#name').val() ==''){
                    $('#name').parent().addClass('has-error');
                    $('#name').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#name').parent().find('small').show().text('The name is required');
                }
                if($('#bname').val() ==''){
                    $('#bname').parent().addClass('has-error');
                    $('#bname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#bname').parent().find('small').show().text('The name is required');
                }
                if($('#mob').val() ==''){
                    $('#mob').parent().parent().addClass('has-error');
                    $('#mob').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#mob').parent().find('small').show().text('The Mobile Number is required');
                }
                if($('#gender').val() ==''){
                    $('#gender').parent().parent().addClass('has-error');
                    $('#gender').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#gender').parent().find('small').show().text('The gender is required');
                }
                if($('#mstatus').val() ==''){
                    $('#mstatus').parent().parent().addClass('has-error');
                    $('#mstatus').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#mstatus').parent().find('small').show().text('The Marital Status is required');
                }
                if($('#efname').val() ==''){
                    $('#efname').parent().parent().addClass('has-error');
                    $('#efname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#efname').parent().find('small').show().text('The Father Name is required');
                }
                if($('#bfname').val() ==''){
                    $('#bfname').parent().parent().addClass('has-error');
                    $('#bfname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#bfname').parent().find('small').show().text('The Father Name is required');
                }
                if($('#mname').val() ==''){
                    $('#mname').parent().parent().addClass('has-error');
                    $('#mname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#mname').parent().find('small').show().text('The Mother Name is required');
                }
                if($('#emane').val() ==''){
                    $('#emane').parent().parent().addClass('has-error');
                    $('#emane').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#emane').parent().find('small').show().text('The Mother Name is required');
                }
                if($('#religion').val() ==''){
                    $('#religion').parent().parent().addClass('has-error');
                    $('#religion').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#religion').parent().find('small').show().text('The Religion field is required');
                }
                if($('#bs').val() ==''){
                    $('#bs').parent().parent().addClass('has-error');
                    $('#bs').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                    $('#bs').parent().find('small').show().text('This field is required');
                }
            }

        })

    </script>

@endsection

