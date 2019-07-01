@extends('layouts.dashboard_layout.master')
@section('head_content')
    ট্রেড লাইসেন্স আবেদন
@endsection
@section('content')
    <form action="{{route('trade_license_abedon.update',$tradeLicenseAbedon->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
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
            <div class=" col-sm-offset-5 col-sm-7" id="UPLOAD">

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-3 control-label">সরবরাহের ধরণ  <span>*</span></label>
                    <div class="col-sm-4">
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="1" @if($tradeLicenseAbedon->ownertype == '1') checked @endif >জরুরী</label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="2" @if($tradeLicenseAbedon->ownertype == '2') checked @endif>অতি জরুরী  </label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="3" @if($tradeLicenseAbedon->ownertype == '3') checked @endif > সাধারন</label>
                    </div>
                    <label for="Application-type" class="col-sm-2 control-label">আবেদনের ধরণ    <span>*</span></label>
                    <div class="col-sm-3">
                        <label class="radio-inline"><input type="radio" id="new_app" value="1" checked="checked">নতুন আবেদন</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Owner-type" class="col-sm-3 control-label">প্রতিষ্ঠানের মালিকানার ধরণ <span>*</span></label>
                    <div class="col-sm-9">
                        <select name="ownertype" id="type_val" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            <option value="1" @if($tradeLicenseAbedon->ownertype == '1') selected @endif>ব্যক্তি মালিকানাধীন</option>
                            <option value="2" @if($tradeLicenseAbedon->ownertype == '2') selected @endif>যৌথ মালিকানা</option>
                            <option value="3" @if($tradeLicenseAbedon->ownertype == '3') selected @endif>কোম্পানী</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Institute-english-name" class="col-sm-3 control-label">প্রতিষ্ঠানের নাম (ইংরেজিতে )   <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text"value="{{$tradeLicenseAbedon->ecomname}}" name="ecomname" id="ecomname" class="form-control" />
                    </div>
                    <label for="Institute-bangla-name" class="col-sm-3 control-label">প্রতিষ্ঠানের নাম (বাংলায়)   <span>*</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$tradeLicenseAbedon->bcomname}}"} name="bcomname" id="bcomname" class="form-control" />
                    </div>
                </div>

            </div>
        </div>
        <div id="clearall">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Owner-name-english" class="col-sm-3 control-label">মালিকের নাম ( ইংরেজিতে )   <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->ewname}}" name="ewname" id="ewname" class="form-control" placeholder=""  />
                        </div>
                        <label for="Owner-name-bangla" class="col-sm-3 control-label">মালিকের নাম ( বাংলায় )  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->bwname}}" name="bwname" id="bwname" class="form-control" placeholder=""  />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Gender" class="col-sm-3 control-label">লিঙ্গ   <span>*</span></label>
                        <div class="col-sm-3">
                            <select name="gender" id="gender" class="form-control" required onchange="bybahik_obosthan_show1(this.value);" >
                                <option value="">চিহ্নিত করুন</option>
                                <option value="male" @if($tradeLicenseAbedon->gender == 'male') selected @endif>পুরুষ</option>
                                <option value="female" @if($tradeLicenseAbedon->gender == 'female') selected @endif>মহিলা</option>
                                <option value="others" @if($tradeLicenseAbedon->gender == 'others') selected @endif>অন্যান্য</option>
                            </select>
                        </div>
                        <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক  <span>*</span></label>
                        <div class="col-sm-3">
                            <select name="mstatus" id="mstatus" class="form-control" required onchange="bybahik_obosthan_show(this.value);" >
                                <option value="">চিহ্নিত করুন</option>
                                <option value="বিবাহিত" @if($tradeLicenseAbedon->mstatus == 'বিবাহিত') selected @endif>বিবাহিত</option>
                                <option value="অবিবাহিত" @if($tradeLicenseAbedon->mstatus == 'অবিবাহিত') selected @endif>অবিবাহিত</option>
                                <option value="বিধবা" @if($tradeLicenseAbedon->mstatus == 'বিধবা') selected @endif>বিপত্নীক / বিধবা</option>
                                <option value="তালাকপ্রাপ্ত" @if($tradeLicenseAbedon->mstatus == 'তালাকপ্রাপ্ত') selected @endif>তালাকপ্রাপ্ত</option>
                                <option value="নাই" @if($tradeLicenseAbedon->mstatus == 'নাই') selected @endif>দরকার নাই</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="pitar_nam" style="display: block;">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->efname}}" name="efname" id="efname" class="form-control" placeholder=""/>
                        </div>
                        <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->bfname}}" name="bfname" id="bfname" class="form-control" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row samir_nam" style="display: none;">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে)</label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->esname}}" name="esname" id="esname" class="form-control" placeholder=""/>
                        </div>
                        <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামীর নাম (বাংলায়)</label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->bsname}}" name="bsname" id="bsname" class="form-control" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->emname}}" name="emname" id="emname" class="form-control" placeholder=""/>
                        </div>
                        <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  <span>*</span></label>
                        <div class="col-sm-3">
                            <input type="text" value="{{$tradeLicenseAbedon->bmname}}" name="bmname" id="bmname" class="form-control" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="other_owner" style="display: none;">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-9">
                        <input type="button" value="{{$tradeLicenseAbedon->ncompany}}" class="btn btn-primary" id='natun' name="ncompany" onclick="addRow(this.form);" value='অন্যান্য মালিক' />
                    </div>
                </div>
            </div>
        </div>

        <div id="itemRows">

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Vat-id" class="col-sm-6 control-label">ভ্যাট  আইডি (যদি থাকে) </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$tradeLicenseAbedon->vatid}}" name="vatid" id="vatid" class="form-control" maxlength='17' placeholder="ইংরেজিতে"  onkeypress="return checkaccnumber(event);"  />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Tax-id" class="col-sm-6 control-label">ট্যাক্স আইডি (যদি থাকে)</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$tradeLicenseAbedon->taxid}}" name="taxid" id="taxid" class="form-control" maxlength='17' placeholder="ইংরেজিতে"  onkeypress="return checkaccnumber(event);" />
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Business-type-bangla" class="col-sm-3 control-label">ব্যবসার ধরন (বাংলায়)  <span>*</span></label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$tradeLicenseAbedon->business_type}}" name="business_type" id="btypes" class="form-control" placeholder=""/>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" id="inpucompany" style="display: none;">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Paid-up-capital" class="col-sm-3 control-label" style="color:red;">পরিশোধিত মূলধন (লিঃ কোম্পানির ক্ষেত্রে )<span> *</span></label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$tradeLicenseAbedon->pay_amount}}" name="pay_amount" value="0.00" class="form-control" placeholder=""/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="app-heading">
                    ব্যবসার ঠিকানা
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
                                <input type="text" value="{{$tradeLicenseAbedon->be_gram}}" name="be_gram" id="begram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-sector-block" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->be_rbs}}" name="be_rbs" id="be_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->be_wordno}}" name="be_wordno" id="be_wordno" class="form-control" onkeypress="return checkaccnumber(event);"  placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->be_dis}}" name="be_dis" id="be_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->be_thana}}" name="be_thana" id="be_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->be_postof}}" name="be_postof" id="be_postof" class="form-control" placeholder=""/>
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
                                <input type="text" value="{{$tradeLicenseAbedon->bb_gram}}" name="bb_gram" id="bb_gram" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-sector-block-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->bb_rbs}}" name="bb_rbs" id="bb_rbs" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->bb_wordno}}" name="bb_wordno" id="bb_wordno" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->bb_dis}}" name="bb_dis" id="bb_dis" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->bb_thana}}" name="bb_thana" id="bb_thana" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6">
                                <input type="text" value="{{$tradeLicenseAbedon->bb_postof}}" name="bb_postof" id="bb_postof" class="form-control" placeholder=""/>
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
                        <input type="text" value="{{$tradeLicenseAbedon->mob}}" name="mob" id="mob" class="form-control" placeholder="ইংরেজিতে প্রদান করুন" required />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Phone" class="col-sm-6 control-label">ফোন (যদি থাকে ) </label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$tradeLicenseAbedon->phone}}" name="phone" id="phone" class="form-control" onkeypress="return checkaccnumber(event);"  placeholder=""/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Email" class="col-sm-3 control-label">ইমেল</label>
                    <div class="col-sm-3">
                        <input type="text" value="{{$tradeLicenseAbedon->email}}" name="email" id="email" class="form-control" placeholder=""/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-offset-6 col-sm-6 button-style">
                <button type="submit"  id="submit_button" class="btn btn-primary">দাখিল করুন</button>
            </div>
        </div>
    </form>
@endsection