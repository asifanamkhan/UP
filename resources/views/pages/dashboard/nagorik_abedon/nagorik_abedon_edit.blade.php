@extends('layouts.dashboard_layout.master')
@section('head_content')
    নাগরিক আবেদন
@endsection
@section('content')
    <div class="panel-body all-input-form">
        <form action="{{route('nagorik_abedon.update',$nagorikAbedon->id)}}" method="post"  class="form-horizontal" name="upform" id="upform">
            @csrf
            @method('PATCH')
            <div class="row"  style="margin-top: 10px;">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Picture" class="col-sm-3 control-label">ছবি</label>
                        <div class="col-sm-5" style="margin-top:3px;">
                            <input type="file" name="image" class="form-control input-file-sm" />
                        </div>
                        <div class="col-sm-3" style="margin-top:3px;">
                            <button  onclick="return ajaxUpload(this.form,'index.php/home/profile_upload', '&lt;br&gt;Uploading image please wait.....&lt;br&gt;'); return false;" name='upload' class="btn btn-primary">আপলোড</button>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="National-id-english" class="col-sm-6 control-label">ন্যাশনাল আইডি (ইংরেজিতে)  </label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$nagorikAbedon->nationid}}" name="nationid" id="nid" class="form-control" maxlength='17' onkeypress="return checkaccnumber(event);"  placeholder="" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Birth-no" class="col-sm-6 control-label">জন্ম নিবন্ধন নং ( ইংরেজিতে ) </label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$nagorikAbedon->bcno}}" name="bcno" id="bcno" class="form-control" maxlength="17" onkeypress="return checkaccnumber(event);"  placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Passport-no" class="col-sm-6 control-label">পাসপোর্ট নং ( ইংরেজিতে ) </label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$nagorikAbedon->pno}}" name="pno" id="pno" class="form-control" maxlength='17' placeholder=""/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Birth-date" class="col-sm-6 control-label">জম্ম তারিখ  <span>*</span></label>
                        <div class="col-sm-6 date">
                            <div class="input-group input-append date" id="datePicker">
                                <input type="text" value="{{$nagorikAbedon->dofb}}" class="form-control" name="dofb" id="dofb"/>
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
                            <input type="text" value="{{$nagorikAbedon->ename}}" name="ename" id="name" class="form-control" placeholder="" required />
                        </div>
                        <label for="Name-bangla"  class="col-sm-3 control-label">নাম ( বাংলায় )  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->bname}}" name="bname" id="bname" class="form-control" placeholder="" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Gender" class="col-sm-3 control-label">লিঙ্গ   <span>*</span></label>
                        <div class="col-sm-3">
                            <select name="gender"  id="gender" class="form-control" required onchange="testshowHide(this.value);" >
                                <option value=""></option>
                                <option value="male" @if($nagorikAbedon->gender == 'male') selected @endif>পুরুষ</option>
                                <option value="female" @if($nagorikAbedon->gender == 'female') selected @endif>মহিলা</option>
                                <option value="others" @if($nagorikAbedon->gender == 'female') selected @endif>অন্যান্য</option>
                            </select>
                        </div>
                        <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক  <span>*</span></label>
                        <div class="col-sm-3">
                            <select name="mstatus"  id="mstatus" class="form-control" required  >
                                <option value="">চিহ্নিত করুন</option>
                                <option value="1" @if($nagorikAbedon->mstatus == '1') selected @endif>বিবাহিত</option>
                                <option value="2" @if($nagorikAbedon->mstatus == '2') selected @endif>অবিবাহিত</option>
                                <option value="3" @if($nagorikAbedon->mstatus == '3') selected @endif>বিপত্নীক / বিধবা</option>
                                <option value="4" @if($nagorikAbedon->mstatus == '4') selected @endif>তালাকপ্রাপ্ত</option>
                                <option value="5" @if($nagorikAbedon->mstatus == '5') selected @endif>দরকার নাই</option>
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
                            <input type="text" value="{{$nagorikAbedon->eWname}}" name="eWname" id="eWname" class="form-control" placeholder="" />
                        </div>
                        <label for="Wife-name-bangla" class="col-sm-3 control-label">স্ত্রীর নাম (বাংলায়) <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->bWname}}" name="bWname" id="bWname" class="form-control" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="husband" style="display: none;" data-topic="2" >
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে) <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->eHname}}" name="eHname" id="eHname" class="form-control" placeholder="" />
                        </div>
                        <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামী নাম (বাংলায়) <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->bHname}}" name="bHname" id="bHname" class="form-control" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->efname}}" name="efname" id="efname" class="form-control" placeholder="" required />
                        </div>
                        <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->bfname}}" name="bfname" id="bfname" class="form-control" placeholder="" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->emname}}" name="emname" id="mname" class="form-control" placeholder="" required />
                        </div>
                        <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$nagorikAbedon->bmane}}" name="bmane" id="emane" class="form-control" placeholder="" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="profession"  class="col-sm-6 control-label">পেশা</label>
                        <div class="col-sm-6">
                            <input type="text"  value="{{$nagorikAbedon->ocupt}}"name="ocupt" id="occupation" class="form-control" placeholder="" maxlength="500" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Education-qualification" class="col-sm-6 control-label">শিক্ষাগত যোগ্যতা</label>
                        <div class="col-sm-6">
                            <input type="text" value="{{$nagorikAbedon->qualification}}" name="qualification" id="qualification" class="form-control" placeholder=""  maxlength="500" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Religion" class="col-sm-6 control-label">ধর্ম    <span>*</span></label>
                        <div class="col-sm-6">
                            <select name="religion"  class="form-control" required >
                                <option value='' ></option>
                                <option value='ইসলাম' @if($nagorikAbedon->religion == 'ইসলাম') selected @endif>ইসলাম</option>
                                <option value='হিন্দু' @if($nagorikAbedon->religion == 'হিন্দু') selected @endif>হিন্দু</option>
                                <option value='বৌদ্ধ ধর্ম' @if($nagorikAbedon->religion == 'বৌদ্ধ ধর্') selected @endif>বৌদ্ধ ধর্ম</option>
                                <option value='খ্রিস্ট ধর্ম' @if($nagorikAbedon->religion == 'খ্রিস্ট ধর্ম') selected @endif>খ্রিস্ট ধর্ম</option>
                                <option value='অন্যান্য' @if($nagorikAbedon->religion == 'অন্যান্য') selected @endif>অন্যান্য</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Resident" class="col-sm-6 control-label">বাসিন্দা    <span>*</span></label>
                        <div class="col-sm-6">
                            <select name="bashinda" id='bs' class="form-control" onchange="basinda_show_hide(this.value);" required >
                                <option value='' >চিহ্নিত করুন</option>
                                <option value='1' @if($nagorikAbedon->bashinda == '1') selected @endif>অস্থায়ী</option>
                                <option value='2' @if($nagorikAbedon->bashinda == '2') selected @endif>স্থায়ী</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12" style="text-align:center;">
                    <div class="app-heading">
                        <br ><b><u>বর্তমান ঠিকানা</u></b><br>
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
                                    <input type="text" value="{{$nagorikAbedon->p_gram}}" name="p_gram" id="p_gram" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Road-block-sector-english" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->p_rbs}}" name="p_rbs" id="p_rbs" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->p_wordno}}" name="p_wordno" id="p_wordno" class="form-control" onkeypress="return checkaccnumber(event);"  placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->p_dis}}" name="p_dis" id="p_dis" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->p_thana}}" name="p_thana" id="p_thana" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->p_postof}}" name="p_postof" id="p_postof" class="form-control" placeholder=""/>
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
                                    <input type="text" value="{{$nagorikAbedon->pb_gram}}" name="pb_gram" id="pb_gram" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->pb_rbs}}" name="pb_rbs" id="pb_rbs" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->pb_wordno}}" name="pb_wordno" id="pb_wordno" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->pb_dis}}" name="pb_dis" id="pb_dis" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->pb_thana}}" name="pb_thana" id="pb_thana" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->pb_postof}}" name="pb_postof" id="pb_postof" class="form-control" placeholder=""/>
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
                                    <input type="text" value="{{$nagorikAbedon->per_gram}}" name="per_gram" id="per_gram" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Road-block-sector-english" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->per_rbs}}" name="per_rbs" id="per_rbs" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Word-no-english" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->per_wordno}}" name="per_wordno" id="per_wordno" class="form-control" onkeypress="return numtest();"  placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="District-english" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->per_dis}}" name="per_dis" id="per_dis" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Thana-english" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->per_thana}}" name="per_thana" id="per_thana" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Post-office-english" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->per_postof}}" name="per_postof" id="postof" class="form-control" placeholder=""/>
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
                                    <input type="text" value="{{$nagorikAbedon->perb_gram}}" name="perb_gram" id="perb_gram" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Road-block-sector-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->perb_rbs}}" name="perb_rbs" id="perb_rbs" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->perb_wordno}}" name="perb_wordno" id="perb_wordno" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->perb_dis}}" name="perb_dis" id="perb_dis" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->perb_thana}}" name="perb_thana" id="perb_thana" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                                <div class="col-sm-6">
                                    <input type="text" value="{{$nagorikAbedon->perb_postof}}" name="perb_postof" id="perb_postof" class="form-control" placeholder=""/>
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
                            <input type="text" value="{{$nagorikAbedon->mob}}" name="mob" id="mob" class="form-control"  placeholder="ইংরেজিতে প্রদান করুন" onkeypress=""  required />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Email" class="col-sm-6 control-label">ইমেল </label>
                        <div class="col-sm-6">
                            <input type="text"  value="{{$nagorikAbedon->email}}"name="email" id="email" class="form-control" placeholder=""/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Designation" class="col-sm-3 control-label">সংযুক্তি (যদি থাকে)</label>
                        <div class="col-sm-9">
                            <textarea name="attachment" value="{{$nagorikAbedon->attachment}}" class="form-control" rows="5" id="attachment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-6 col-sm-6 button-style">
                    <button type="submit" id="submit_button" class="btn btn-primary">দাখিল করুন</button>
                </div>
            </div>
        </form>
    </div>
@endsection