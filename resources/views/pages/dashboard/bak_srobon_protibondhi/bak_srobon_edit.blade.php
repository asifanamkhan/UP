@extends('layouts.dashboard_layout.master')
@section('head_content')
    অন্যান্য সেবা এর জন্য আবেদন ফরম
@endsection
@section('content')
    <form action="{{route('others_sonod_abedon.update',$othersSonodAbedon->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
        @csrf
        @method('PATCH')
        <div class="row"  style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Picture" class="col-sm-3 control-label">ছবি</label>
                    <div class="col-sm-5" style="margin-top:3px;">
                        <input type="file" value="{{$othersSonodAbedon->image}}" name="image" class="form-control input-file-sm" />
                    </div>
                    <div class="col-sm-3" style="margin-top:3px;">
                        <button  onclick="return ajaxUpload(this.form,'index.php/home/profile_upload', '&lt;br&gt;Uploading image please wait.....&lt;br&gt;'); return false;" name='upload' class="btn btn-primary">আপলোড</button>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-offset-5 col-sm-7" id="UPLOAD">

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Service List" class="col-sm-3 control-label"> সেবা সমহু  <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="" id="" class="form-control" required disabled >
                            <option value="">চিহ্নিত করুন</option>
                            <option value="1" >মৃত্যু সনদ</option>
                            <option value="2" >চারিত্রিক সনদ</option>
                            <option value="3" >অবিবাহিত সনদ</option>
                            <option value="4" >ভূমিহীন সনদ</option>
                            <option value="5" >পুনঃ বিবাহ না হওয়া সনদ </option>
                            <option value="6" >বার্ষিক আয়ের প্রত্যয়ন</option>
                            <option value="7" >একই নামের প্রত্যয়ন</option>
                            <option value="8" >প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী</option>
                            <option value="9" >সনাতন ধর্ম  অবলম্বী</option>
                            <option value="10" >অনুমতি পত্র</option>
                            <option value="11" >প্রত্যয়ন পত্র</option>
                            <option value="12" >মুক্তিযোদ্ধা সনদ</option>
                            <option value="13" >মুক্তিযোদ্ধা পোষ্য সনদ</option>
                        </select>
                    </div>
                    <label for="Delivery-type" class="col-sm-3 control-label"> সরবরাহের ধরণ  <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="delivery_type" id="delivery_type" class="form-control" required >
                            <option value="2"  @if($othersSonodAbedon->delivery_type == '2') selected @endif>অতি জরুরী </option>
                            <option value="1"  @if($othersSonodAbedon->delivery_type == '1') selected @endif>জরুরী</option>
                            <option value="3"  @if($othersSonodAbedon->delivery_type == '3') selected @endif >সাধারন</option>

                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div id="" style="display: block;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Income Measured" class="col-sm-6 control-label">আয়ের পরিমান( ইংরেজিতে ) </label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$othersSonodAbedon->incomeAmount}}" name="incomeAmount" id="incomeAmount" class="form-control"  onkeypress="return checkaccnumber(event);"  placeholder="" />
                            <span class="sub-hints">বি.দ্র. : বার্ষিক আয়ের প্রত্যয়ন পত্র এর জন্য!</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Publish Name" class="col-sm-6 control-label">প্রকাশে নাম</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$othersSonodAbedon->publishName}}" name="publishName" id="publishName" class="form-control"  placeholder="" />
                            <span class="sub-hints">বি.দ্র. : একই নামের প্রত্যয়ন পত্র এর জন্য!</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Work Placed" class="col-sm-6 control-label">কর্ম ক্ষেত্রের নাম</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$othersSonodAbedon->workPlace}}" name="workPlace" id="workPlace" class="form-control"  placeholder="" />
                            <span class="sub-hints">বি.দ্র. : অনুমতি পত্র এর জন্য! যেমন: পুলিশ.</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Death-date" class="col-sm-6 control-label">মৃত্যু তারিখ </label>
                        <div class="col-sm-6 date">
                            <div class="input-group input-append date" id="deathPicker">
                                <input type="date" value="{{$othersSonodAbedon->ddfb}}" class="form-control" name="ddfb" />
                                <span class="sub-hints">বি.দ্র. : মৃত্যুর সনদ পত্রের জন্য</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="National-id-english" class="col-sm-6 control-label">ন্যাশনাল আইডি (ইংরেজিতে)  </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->nationid}}" name="nationid" id="nid" class="form-control" maxlength='17' onkeypress="return checkaccnumber(event);"  placeholder="" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-no" class="col-sm-6 control-label">জন্ম নিবন্ধন নং ( ইংরেজিতে ) </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->bcno}}" name="bcno" id="bcno" class="form-control" maxlength="17" onkeypress="return checkaccnumber(event);"  placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Passport-no" class="col-sm-6 control-label">পাসপোর্ট নং ( ইংরেজিতে ) </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->pno}}" name="pno" id="pno" class="form-control" maxlength='17' placeholder=""/>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-6 control-label">জম্ম তারিখ  <span>*</span></label>
                    <div class="col-sm-6 date">
                        <div class="input-group input-append date" id="datePicker">
                            <input type="text" value="{{$othersSonodAbedon->dofb}}" class="form-control" name="dofb" />
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Name-english" class="col-sm-3 control-label">নাম ( ইংরেজিতে )   <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->ename}}" name="ename" id="name" class="form-control" placeholder="" required />
                    </div>
                    <label for="Name-bangla" class="col-sm-3 control-label">নাম ( বাংলায় )  </label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->bname}}" name="bname" id="bname" class="form-control" placeholder="" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Gender" class="col-sm-3 control-label">লিঙ্গ   <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="gender" id="gender" class="form-control" required onchange="testshowHide(this.value);" >
                            <option value="">চিহ্নিত করুন</option>
                            <option value="male"@if($othersSonodAbedon->gender == 'male') selected @endif>পুরুষ</option>
                            <option value="female"@if($othersSonodAbedon->gender == 'female') selected @endif>মহিলা</option>
                            <option value="others"@if($othersSonodAbedon->gender == 'others') selected @endif>অন্যান্য</option>
                        </select>
                    </div>
                    <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক  <span>*</span></label>
                    <div class="col-sm-3">
                        <select name="mstatus" id="mstatus" class="form-control" required  >
                            <option value="">চিহ্নিত করুন</option>
                            <option value="1"@if($othersSonodAbedon->mstatus == '1') selected @endif>বিবাহিত</option>
                            <option value="2"@if($othersSonodAbedon->mstatus == '2') selected @endif>অবিবাহিত</option>
                            <option value="3"@if($othersSonodAbedon->mstatus == '3') selected @endif>বিপত্নীক / বিধবা</option>
                            <option value="4"@if($othersSonodAbedon->mstatus == '4') selected @endif>তালাকপ্রাপ্ত</option>
                            <option value="5"@if($othersSonodAbedon->mstatus == '5') selected @endif>দরকার নাই</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="wife" style="display: none;" data-topic="1" >
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Wife-name-english" class="col-sm-3 control-label">স্ত্রীর  নাম (ইংরেজিতে)  <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->eWname}}" name="eWname" id="eWname" class="form-control" placeholder="" />
                    </div>
                    <label for="Wife-name-bangla" class="col-sm-3 control-label">স্ত্রীর নাম (বাংলায়) </label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->bWname}}" name="bWname" id="bWname" class="form-control" placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2" >
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->eHname}}" name="eHname" id="eHname" class="form-control" placeholder="" />
                    </div>
                    <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামী নাম (বাংলায়) <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->bHname}}" name="bHname" id="bHname" class="form-control" placeholder="" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে)  <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->efname}}" name="efname" id="efname" class="form-control" placeholder="" required />
                    </div>
                    <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->bfname}}" name="bfname" id="bfname" class="form-control" placeholder="" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে)  <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->emname}}" name="emname" id="mname" class="form-control" placeholder="" required />
                    </div>
                    <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$othersSonodAbedon->bmane}}" name="bmane" id="emane" class="form-control" placeholder="" required />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-6 control-label">পেশা</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->ocupt}}" name="ocupt" id="occupation" class="form-control" placeholder="" maxlength="500" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Education-qualification" class="col-sm-6 control-label">শিক্ষাগত যোগ্যতা</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->qualification}}" name="qualification" id="qualification" class="form-control" placeholder=""  maxlength="500" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Religion" class="col-sm-6 control-label">ধর্ম    <span>*</span></label>
                    <div class="col-sm-6">
                        <select name="religion" class="form-control" required >
                            <option value=''>চিহ্নিত করুন</option>
                            <option value='ইসলাম'@if($othersSonodAbedon->religion == 'ইসলাম') selected @endif>ইসলাম</option>
                            <option value='হিন্দু'@if($othersSonodAbedon->religion == 'হিন্দু') selected @endif>হিন্দু</option>
                            <option value='বৌদ্ধ ধর্ম'@if($othersSonodAbedon->religion == 'বৌদ্ধ ধর্ম') selected @endif>বৌদ্ধ ধর্ম</option>
                            <option value='খ্রিস্ট ধর্ম'@if($othersSonodAbedon->religion == 'খ্রিস্ট ধর্ম') selected @endif>খ্রিস্ট ধর্ম</option>
                            <option value='অন্যান্য'@if($othersSonodAbedon->religion == 'অন্যান্য') selected @endif>অন্যান্য</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Resident" class="col-sm-6 control-label">বাসিন্দা    <span>*</span></label>
                    <div class="col-sm-6">
                        <select name="bashinda" id='bs' class="form-control" onchange="basinda_show_hide(this.value);" required >
                            <option value=''>চিহ্নিত করুন</option>
                            <option value='1'@if($othersSonodAbedon->bashinda == '1') selected @endif>অস্থায়ী</option>
                            <option value='2'@if($othersSonodAbedon->bashinda == '2') selected @endif>স্থায়ী</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="app-heading">
                    বর্তমান ঠিকানা
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        ( ইংরেজিতে )
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-english" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_gram}}" name="p_gram" id="p_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_rbs}}" name="p_rbs" id="p_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_wordno}}" name="p_wordno" id="p_wordno" class="form-control" onkeypress="return checkaccnumber(event);"  placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_dis}}" name="p_dis" id="p_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_thana}}" name="p_thana" id="p_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->p_postof}}" name="p_postof" id="p_postof" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        ( বাংলায় )
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_gram}}" name="pb_gram" id="pb_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_rbs}}" name="pb_rbs" id="pb_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_wordno}}" name="pb_wordno" id="pb_wordno" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_dis}}" name="pb_dis" id="pb_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_thana}}" name="pb_thana" id="pb_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->pb_postof}}" name="pb_postof" id="pb_postof" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="permaHeading">
            <div class="col-sm-12" style="text-align:center;">
                <div class="app-heading">
                    স্থায়ী  ঠিকানা
                </div>
            </div>
        </div>

        <div class="row" id="permanentAddress">
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        ( ইংরেজিতে )
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-english" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_gram}}" name="per_gram" id="per_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_rbs}}" name="per_rbs" id="per_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_wordno}}" name="per_wordno" id="per_wordno" class="form-control" onkeypress="return numtest();"  placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_dis}}" name="per_dis" id="per_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_thana}}" name="per_thana" id="per_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->per_postof}}" name="per_postof" id="postof" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        ( বাংলায় )
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_gram}}" name="perb_gram" id="perb_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_rbs}}" name="perb_rbs" id="perb_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_wordno}}" name="perb_wordno" id="perb_wordno" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_dis}}" name="perb_dis" id="perb_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_thana}}" name="perb_thana" id="perb_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$othersSonodAbedon->perb_postof}}" name="perb_postof" id="perb_postof" class="form-control" placeholder=""/>
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mobile" class="col-sm-6 control-label">মোবাইল    <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->mob}}" name="mob" id="mob" class="form-control"  placeholder="ইংরেজিতে প্রদান করুন" onkeypress=""  required />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-6 control-label">ইমেল </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$othersSonodAbedon->email}}" name="email" id="email" class="form-control" placeholder=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Designation" class="col-sm-3 control-label">সংযুক্তি (যদি থাকে)</label>
                    <div class="col-sm-9">
                        <textarea name="attachment" value="{{$othersSonodAbedon->attachment}}" class="form-control" rows="5" id="attachment" ></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-offset-6 col-sm-6 button-style">
                <div class="col-sm-offset-6 col-sm-6 button-style">
                    <button type="submit" id="submit_button" class="btn btn-primary">দাখিল করুন</button>
                </div>
            </div>
        </div>
    </form>
@endsection