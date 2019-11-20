@extends('layouts.dashboard_layout.master')
@section('head_content')
    ট্রেড লাইসেন্স আবেদন
@endsection
@section('content')
    <div class="panel-body all-input-form" >
        <div class="card-header" style=" color:white; background-color: #022241; font-size: 14px;text-align:center;">ট্রেড লাইসেন্স আবেদন</div>
    <form  action="{{route('trade_license_abedon.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" name="upform" id="upform">
        @csrf
        <div class="row mt-5" style="margin-top: 10px;">
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
            <div class=" col-sm-offset-5 col-sm-7" id="UPLOAD">

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-3 control-label">সরবরাহের ধরণ  <span style="color: red">*</span></label>
                    <div class="col-sm-4">
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="1">জরুরী</label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="2" >অতি জরুরী  </label>
                        <label class="radio-inline"><input type="radio" name="delivery_type" value="3" checked="checked"> সাধারন</label>
                    </div>
                    <label for="Application-type" class="col-sm-2 control-label">আবেদনের ধরণ    <span style="color: red">*</span></label>
                    <div class="col-sm-3">
                        <label class="radio-inline"><input type="radio" id="new_app" value="1" checked="checked">নতুন আবেদন</label>
                    </div>
                    <span class=""></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Owner-type" class="col-sm-3 control-label">প্রতিষ্ঠানের মালিকানার ধরণ<span style="color: red">*</span></label>
                    <div class="col-sm-9 has-feedback">
                        <select name="ownertype" id="type_val" class="form-control">
                            <option value="">চিহ্নিত করুন</option>
                            <option value="1">ব্যক্তি মালিকানাধীন</option>
                            <option value="2">যৌথ মালিকানা</option>
                            <option value="3">কোম্পানী</option>
                        </select>
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group ">
                    <div>
                        <label for="Institute-english-name" class="col-sm-3 control-label">প্রতিষ্ঠানের নাম (ইংরেজিতে )   <span style="color: red">*</span></label>
                        <div class="col-sm-3 has-feedback">
                            <input type="text" name="ecomname" id="ecomname" class="form-control" />
                            <span class=""></span>
                            <small name="help-block" class="help-block"></small>
                        </div>
                    </div>
                    <div>
                        <label for="Institute-bangla-name" class="col-sm-3 control-label">প্রতিষ্ঠানের নাম (বাংলায়)   <span style="color: red;">*</span></label>
                        <div class="col-sm-3 has-feedback">
                            <input type="text" name="bcomname" id="bcomname" class="form-control" />

                            <span class=""></span>
                            <small name="help-block" class="help-block"></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Tax-id" class="col-sm-6 control-label">মালিকের বাণিজ্যিক হোল্ডিং নং <span style="color: red">*</span></label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="taxid" id="taxid" class="form-control" maxlength='17' placeholder="ইংরেজিতে"  />
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="dokanNo" class="col-sm-6 control-label">দোকান নং <span style="color: red">*</span></label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="dokanNo" id="dokanNo" class="form-control" maxlength='17' placeholder="ইংরেজিতে"   />
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="btalikaNo" class="col-sm-6 control-label">ব্যবসায়ী তালিকা নং<span style="color: red">*</span></label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="btalikaNo" id="btalikaNo" class="form-control" maxlength='17' placeholder="ইংরেজিতে"  />
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bazarName" class="col-sm-6 control-label">বাজারের নাম <span style="color: red">*</span> </label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="bazarName" id="bazarName" class="form-control" maxlength='17' placeholder="ইংরেজিতে"   />
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>
            </div>

        </div>
        <div id="clearall">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div>
                            <label for="Owner-name-english" class="col-sm-3 control-label">মালিকের নাম ( ইংরেজিতে )   <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="ewname[]" id="ewname" class="form-control" placeholder=""  />
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                        <div>
                            <label for="Owner-name-bangla" class="col-sm-3 control-label">মালিকের নাম ( বাংলায় )  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="bwname[]" id="bwname" class="form-control" placeholder=""  />
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div>
                            <label for="Gender" class="col-sm-3 control-label">লিঙ্গ   <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <select name="gender[]" id="gender" class="form-control" >
                                    <option value="">চিহ্নিত করুন</option>
                                    <option value="male">পুরুষ</option>
                                    <option value="female">মহিলা</option>
                                    <option value="others">অন্যান্য</option>
                                </select>
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                        <div>
                            <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <select name="mstatus[]" id="mstatus" class="form-control" >
                                    <option value="">চিহ্নিত করুন</option>
                                    <option value="বিবাহিত">বিবাহিত</option>
                                    <option value="অবিবাহিত">অবিবাহিত</option>
                                    <option value="বিধবা">বিপত্নীক / বিধবা</option>
                                    <option value="তালাকপ্রাপ্ত">তালাকপ্রাপ্ত</option>
                                    <option value="নাই">দরকার নাই</option>
                                </select>
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="pitar_nam" style="display: block;">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div>
                            <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে)  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="efname[]" id="efname" class="form-control" placeholder=""/>
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                        <div>
                            <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="bfname[]" id="bfname" class="form-control" placeholder="" />
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row samir_nam" >
                <div class="col-sm-12">
                    <div class="form-group">
                        <div>
                            <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে) <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="esname[]" id="esname" class="form-control" placeholder=""/>
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                        <div>
                            <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামীর নাম (বাংলায়) <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="bsname[]" id="bsname" class="form-control" placeholder="" />
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div>
                            <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে)  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="emname[]" id="emname" class="form-control" placeholder=""/>
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                        <div>
                            <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  <span style="color: red">*</span></label>
                            <div class="col-sm-3 has-feedback">
                                <input type="text" name="bmname[]" id="bmname" class="form-control" placeholder="" />
                                <span class=""></span>
                                <small name="help-block" class="help-block"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="other_owner">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-9 ">
                        <input type="button" class="btn btn-primary" style="background-color: #022241" id='natun' name="ncompany" value='অন্যান্য মালিক' />
                    </div>
                </div>
            </div>
        </div>

        <div id="itemRows">

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div>
                        <label for="" class="col-sm-3 text-right">কর নির্ধারণের শুরুর অর্থবছর <span style="color: red">*</span></label>
                        <div class="col-sm-3 has-feedback">

                            <select name="tax_start_date" id="tax_start_date" class="form-control ">
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
                            <span class=""></span>
                            <small name="help-block" class="help-block"></small>
                        </div>
                    </div>
                    <div>
                        <label for="" class="col-sm-3 text-right">সর্বশেষ কর পরিষদের অর্থবছর <span style="color: red">*</span></label>
                        <div class="col-sm-3 has-feedback">

                            <select name="last_tax_pay_date" id="last_tax_pay_date" class="form-control ">
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
                            <span class=""></span>
                            <small name="help-block" class="help-block"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Vat-id" class="col-sm-6 control-label">ভ্যাট  আইডি (যদি থাকে) </label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="vatid" id="vatid" class="form-control" maxlength='17' placeholder="ইংরেজিতে"   />
                        <span class=""></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Vat-id" class="col-sm-6 control-label">ব্যবসার ধরন (বাংলায়) <span style="color: red">*</span> </label>
                    <div class="col-sm-6 has-feedback">
                        <select name="business_type" id="btypes" class="form-control ">
                            <option value="0">চিহ্নিত করুন</option>
                            @foreach($business_type as $business_types)
                                <option value="{{$business_types->id}}">{{$business_types->business_type}}</option>
                                @endforeach
                        </select>
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>
            </div>
            <div class=" col-sm-9 text-right">
                <label for="Vat-id" class="col-sm-6 control-label" style="color: blue">করের পরিমান(টাকায়)/বাৎসরিক </label>
                <div class="form-group text-right" >
                    <input type="text" name="tax_amount" style="color: red" id="tax_amount" class="form-control col-sm-6" readonly>
                </div>

            </div>
        </div>


        <div class="row" id="inpucompany">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Paid-up-capital" class="col-sm-3 control-label" style="color:red;">পরিশোধিত মূলধন (লিঃ কোম্পানির ক্ষেত্রে )<span > *</span></label>
                    <div class="col-sm-3 has-feedback">
                        <input type="text" name="pay_amount" value="0.00" class="form-control" placeholder=""/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row" style="text-align: center">
            <div class="col-sm-12">
                <div class="app-heading">
                    <b><u>ব্যবসার ঠিকানা</u></b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="app-sub-heading">
                            <b>( ইংরেজিতে )</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-english" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_gram" id="be_gram" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-sector-block" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_rbs" id="be_rbs" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_wordno" id="be_wordno" class="form-control"  placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_dis" id="be_dis" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_thana" id="be_thana" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="be_postof" id="be_postof" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
               <div class="row">
                   <div class="col-sm-offset-6 col-sm-6">
                       <div class="app-sub-heading">
                           <b>( বাংলায় )</b>
                       </div>
                   </div>
               </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-6 control-label">গ্রাম/মহল্লা </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_gram" id="bb_gram" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-sector-block-bangla" class="col-sm-6 control-label">রোড/ব্লক/সেক্টর</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_rbs" id="bb_rbs" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-6 control-label">ওয়ার্ড নং</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_wordno" id="bb_wordno" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-6 control-label">জেলা </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_dis" id="bb_dis" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-6 control-label">উপজেলা/থানা</label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_thana" id="bb_thana" class="form-control" placeholder=""/>
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-6 control-label">পোষ্ট অফিস </label>
                            <div class="col-sm-6 has-feedback">
                                <input type="text" name="bb_postof" id="bb_postof" class="form-control" placeholder=""/>
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
                    <b><u> যোগাযোগের ঠিকানা</u></b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mobile" class="col-sm-6 control-label">মোবাইল    <span style="color: red">*</span></label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="mob" id="mob" class="form-control" placeholder="ইংরেজিতে প্রদান করুন" />
                        <span class=""></span>
                        <small name="help-block" class="help-block"></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Phone" class="col-sm-6 control-label">ফোন (যদি থাকে ) </label>
                    <div class="col-sm-6 has-feedback">
                        <input type="text" name="phone" id="phone" class="form-control"   placeholder=""/>
                        <span class=""></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Email" class="col-sm-3 control-label">ইমেল</label>
                    <div class="col-sm-3 has-feedback">
                        <input type="text" name="email" id="email" class="form-control" placeholder=""/>
                        <span class=""></span>
                    </div>
                    <div class="clearfix"></div>
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

        $('#other_owner').hide();
        $('#inpucompany').hide();

        //Image
        $('#upload').on('click',function (e) {
            e.preventDefault();
            var up = $('#image').val();
            if($('#image').val() !='')
            {
                $('#image').parent().find('small').show().text('Image Uploded Successfully');
                console.log(up);
            }
            else{
                $('#image').parent().find('small').show().text('please select a Image First');
                console.log(up);
            }

        });

        var x = 0;
        $('#type_val').on('change',function () {
            if($('#type_val').val()==2 || $('#type_val').val()==3){
                $('#other_owner').show();
                $('#inpucompany').show();
            }
            else{
                $('#other_owner').hide();
                $('#inpucompany').hide();

            }
        });


        // clearall
        var max_fields = 30;
        $('#natun').on('click',function (e) {
            e.preventDefault();

            if(x<max_fields){
                x++;
                $('#clearall').append('<div id=""><button id="remove" style="margin-bottom: 15px; background-color: red" class="col-sm-0 col-sm-offset-11 btn btn-danger" >remove</button>\n' +
                    '            <div class="row">\n' +
                    '                <div class="col-sm-12">\n' +
                    '                    <div class="form-group">\n' +
                    '                        <label for="Owner-name-english" class="col-sm-3 control-label">মালিকের নাম ( ইংরেজিতে )   <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="ewname[]" id="ewname" class="form-control" placeholder=""  />\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                        <label for="Owner-name-bangla" class="col-sm-3 control-label">মালিকের নাম ( বাংলায় )  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="bwname[]" id="bwname" class="form-control" placeholder=""  />\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="row">\n' +
                    '                <div class="col-sm-12">\n' +
                    '                    <div class="form-group">\n' +
                    '                        <label for="Gender" class="col-sm-3 control-label">লিঙ্গ   <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <select name="gender[]" id="gender" class="form-control" >\n' +
                    '                                <option value="">চিহ্নিত করুন</option>\n' +
                    '                                <option value="male">পুরুষ</option>\n' +
                    '                                <option value="female">মহিলা</option>\n' +
                    '                                <option value="others">অন্যান্য</option>\n' +
                    '                            </select>\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                        <label for="Marital-status" class="col-sm-3 control-label">বৈবাহিক সম্পর্ক  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <select name="mstatus[]" id="mstatus" class="form-control" >\n' +
                    '                                <option value="">চিহ্নিত করুন</option>\n' +
                    '                                <option value="বিবাহিত">বিবাহিত</option>\n' +
                    '                                <option value="অবিবাহিত">অবিবাহিত</option>\n' +
                    '                                <option value="বিধবা">বিপত্নীক / বিধবা</option>\n' +
                    '                                <option value="তালাকপ্রাপ্ত">তালাকপ্রাপ্ত</option>\n' +
                    '                                <option value="নাই">দরকার নাই</option>\n' +
                    '                            </select>\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="row" id="pitar_nam" style="display: block;">\n' +
                    '                <div class="col-sm-12">\n' +
                    '                    <div class="form-group">\n' +
                    '                        <label for="Father-name-english" class="col-sm-3 control-label">পিতার নাম (ইংরেজিতে)  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="efname[]" id="efname" class="form-control" placeholder=""/>\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                        <label for="Father-name-bangla" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="bfname[]" id="bfname" class="form-control" placeholder="" />\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="row samir_nam" >\n' +
                    '                <div class="col-sm-12">\n' +
                    '                    <div class="form-group">\n' +
                    '                        <label for="Husband-name-english" class="col-sm-3 control-label">স্বামীর নাম (ইংরেজিতে) <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="esname[]" id="esname" class="form-control" placeholder=""/>\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                        <label for="Husband-name-bangla" class="col-sm-3 control-label"> স্বামীর নাম (বাংলায়) <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="bsname[]" id="bsname" class="form-control" placeholder="" />\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="row">\n' +
                    '                <div class="col-sm-12">\n' +
                    '                    <div class="form-group">\n' +
                    '                        <label for="Mother-name-english" class="col-sm-3 control-label">মাতার নাম (ইংরেজিতে)  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="emname[]" id="emname" class="form-control" placeholder=""/>\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                        <label for="Mother-name-bangla" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  <span style="color: red">*</span></label>\n' +
                    '                        <div class="col-sm-3">\n' +
                    '                            <input type="text" name="bmname[]" id="bmname" class="form-control" placeholder="" />\n' +
                    '                            <span class=""></span>\n' +
                    '                            <small name="help-block" class="help-block"></small>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '        </div>');
            }

        });

        $('#clearall').on("click","#remove", function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });

        //shamir name
        $('.samir_nam').hide();

        $('#gender').on('change',function () {
            if($('#gender').val()=='female' && $('#mstatus').val()=='বিবাহিত'){
                $('.samir_nam').show();
                $('#pitar_nam').hide();
            }
            else{
                $('.samir_nam').hide();
                $('#pitar_nam').show();
            }
        });
        $('#mstatus').on('change',function () {
            if($('#gender').val()=='female' && $('#mstatus').val()=='বিবাহিত'){
                $('.samir_nam').show();
                $('#pitar_nam').hide();
            }
            else{
                $('.samir_nam').hide();
                $('#pitar_nam').show();
            }
        });

        //validation
        $('#type_val').on('change',function () {
            if($('#type_val').val()!=''){
                $('#type_val').parent().parent().removeClass('has-error');
                $('#type_val').parent().parent().addClass('has-success');
                $('#type_val').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#type_val').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#type_val').parent().find('small').hide();
            }
            else{
                $('#type_val').parent().parent().removeClass('has-success');
                $('#type_val').parent().parent().addClass('has-error');
                $('#type_val').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#type_val').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#type_val').parent().find('small').show().text('The field is required..');
            }
        });

        $(document).on('keyup','#ecomname',function () {

            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('tradeEcomname')}}",
                data:{
                    'ecomname':$('#ecomname').val(),
                },
                success:function (result) {

                    console.log(result);

                    if($('#ecomname').val()!=''){
                        $('#ecomname').parent().parent().removeClass('has-error');
                        $('#ecomname').parent().parent().addClass('has-success');
                        $('#ecomname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#ecomname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#ecomname').parent().find('small').hide();

                        $('#submit_button').prop("disabled",false);

                        if(result == 'two'){

                            $('#ecomname').parent().parent().removeClass('has-success');
                            $('#ecomname').parent().parent().addClass('has-error');
                            $('#ecomname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                            $('#ecomname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                            $('#ecomname').parent().find('small').show().text('The Institution name is already exist.');

                            $('#submit_button').prop("disabled",true);
                        }
                    }

                    else{
                        $('#ecomname').parent().parent().removeClass('has-success');
                        $('#ecomname').parent().parent().addClass('has-error');
                        $('#ecomname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                        $('#ecomname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                        $('#ecomname').parent().find('small').show().text('The Institution name is required.');

                        $('#submit_button').prop("disabled",true);
                    }




                }
            });
        });

        $('#taxid').on('keyup',function () {
            if ($('#taxid').val() != '') {
                $('#taxid').parent().parent().removeClass('has-error');
                $('#taxid').parent().parent().addClass('has-success');
                $('#taxid').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#taxid').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#taxid').parent().find('small').hide();
            }
            else {
                $('#taxid').parent().parent().removeClass('has-success');
                $('#taxid').parent().parent().addClass('has-error');
                $('#taxid').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#taxid').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#taxid').parent().find('small').show().text('The Tax Id Name is required')
            }
        });
        $('#dokanNo').on('keyup',function () {
            if ($('#dokanNo').val() != '') {
                $('#dokanNo').parent().parent().removeClass('has-error');
                $('#dokanNo').parent().parent().addClass('has-success');
                $('#dokanNo').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#dokanNo').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#dokanNo').parent().find('small').hide();
            }
            else {
                $('#dokanNo').parent().parent().removeClass('has-success');
                $('#dokanNo').parent().parent().addClass('has-error');
                $('#dokanNo').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#dokanNo').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#dokanNo').parent().find('small').show().text('The Shop No  Name is required')
            }
        });
        $('#btalikaNo').on('keyup',function () {
            if ($('#btalikaNo').val() != '') {
                $('#btalikaNo').parent().parent().removeClass('has-error');
                $('#btalikaNo').parent().parent().addClass('has-success');
                $('#btalikaNo').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#btalikaNo').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#btalikaNo').parent().find('small').hide();
            }
            else {
                $('#btalikaNo').parent().parent().removeClass('has-success');
                $('#btalikaNo').parent().parent().addClass('has-error');
                $('#btalikaNo').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#btalikaNo').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#btalikaNo').parent().find('small').show().text('This Field is required')
            }
        });
        $('#bazarName').on('keyup',function () {
            if ($('#bazarName').val() != '') {
                $('#bazarName').parent().parent().removeClass('has-error');
                $('#bazarName').parent().parent().addClass('has-success');
                $('#bazarName').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bazarName').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bazarName').parent().find('small').hide();
            }
            else {
                $('#bazarName').parent().parent().removeClass('has-success');
                $('#bazarName').parent().parent().addClass('has-error');
                $('#bazarName').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bazarName').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bazarName').parent().find('small').show().text('This Field is required')
            }
        });










        $('#ewname').on('keyup',function () {
            if($('#ewname').val()!=''){
                $('#ewname').parent().parent().removeClass('has-error');
                $('#ewname').parent().parent().addClass('has-success');
                $('#ewname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#ewname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#ewname').parent().find('small').hide();
            }
            else {
                $('#ewname').parent().parent().removeClass('has-success');
                $('#ewname').parent().parent().addClass('has-error');
                $('#ewname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#ewname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#ewname').parent().find('small').show().text('The owner name field is required.');
            }
        });

        $('#bwname').on('keyup',function () {
            if($('#bwname').val()!=''){
                $('#bwname').parent().parent().removeClass('has-error');
                $('#bwname').parent().parent().addClass('has-success');
                $('#bwname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bwname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bwname').parent().find('small').hide();
            }
            else {
                $('#bwname').parent().parent().removeClass('has-success');
                $('#bwname').parent().parent().addClass('has-error');
                $('#bwname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bwname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bwname').parent().find('small').show().text('The owner name field is required.');
            }
        });

        $('#gender').on('change',function () {
            if ($('#gender').val() != '') {
                $('#gender').parent().parent().removeClass('has-error');
                $('#gender').parent().parent().addClass('has-success');
                $('#gender').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#gender').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#gender').parent().find('small').hide();
            }
            else {
                $('#gender').parent().parent().removeClass('has-success');
                $('#gender').parent().parent().addClass('has-error');
                $('#gender').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#gender').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#gender').parent().find('small').show().text('The gender is required.')
            }
        });

        $('#mstatus').on('change',function () {
            if ($('#mstatus').val() != '') {
                $('#mstatus').parent().parent().removeClass('has-error');
                $('#mstatus').parent().parent().addClass('has-success');
                $('#mstatus').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#mstatus').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#mstatus').parent().find('small').hide();
            }
            else {
                $('#mstatus').parent().parent().removeClass('has-success');
                $('#mstatus').parent().parent().addClass('has-error');
                $('#mstatus').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#mstatus').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#mstatus').parent().find('small').show().text('The Marital Status is required')
            }
        });

        $('#efname').on('keyup',function () {
            if ($('#efname').val() != '') {
                $('#efname').parent().parent().removeClass('has-error');
                $('#efname').parent().parent().addClass('has-success');
                $('#efname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#efname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#efname').parent().find('small').hide();
            }
            else {
                $('#efname').parent().parent().removeClass('has-success');
                $('#efname').parent().parent().addClass('has-error');
                $('#efname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#efname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#efname').parent().find('small').show().text('The Father Name is required')
            }
        });

        $('#bfname').on('keyup',function () {
            if ($('#bfname').val() != '') {
                $('#bfname').parent().parent().removeClass('has-error');
                $('#bfname').parent().parent().addClass('has-success');
                $('#bfname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bfname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bfname').parent().find('small').hide();
            }
            else {
                $('#bfname').parent().parent().removeClass('has-success');
                $('#bfname').parent().parent().addClass('has-error');
                $('#bfname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bfname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bfname').parent().find('small').show().text('The Father Name is required')
            }
        });

        $('#esname').on('keyup',function () {
            if ($('#esname').val() != '') {
                $('#esname').parent().parent().removeClass('has-error');
                $('#esname').parent().parent().addClass('has-success');
                $('#esname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#esname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#esname').parent().find('small').hide();
            }
            else {
                $('#esname').parent().parent().removeClass('has-success');
                $('#esname').parent().parent().addClass('has-error');
                $('#esname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#esname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#esname').parent().find('small').show().text('The Husband Name is required')
            }
        });
        $('#bsname').on('keyup',function () {
            if ($('#bsname').val() != '') {
                $('#bsname').parent().parent().removeClass('has-error');
                $('#bsname').parent().parent().addClass('has-success');
                $('#bsname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bsname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bsname').parent().find('small').hide();
            }
            else {
                $('#bsname').parent().parent().removeClass('has-success');
                $('#bsname').parent().parent().addClass('has-error');
                $('#bsname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bsname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bsname').parent().find('small').show().text('The Husband Name is required')
            }
        });
        $('#emname').on('keyup',function () {
            if ($('#emname').val() != '') {
                $('#emname').parent().parent().removeClass('has-error');
                $('#emname').parent().parent().addClass('has-success');
                $('#emname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#emname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#emname').parent().find('small').hide();
            }
            else {
                $('#emname').parent().parent().removeClass('has-success');
                $('#emname').parent().parent().addClass('has-error');
                $('#emname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#emname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#emname').parent().find('small').show().text('The Mother Name is required')
            }
        });
        $('#bmname').on('keyup',function () {
            if ($('#bmname').val() != '') {
                $('#bmname').parent().parent().removeClass('has-error');
                $('#bmname').parent().parent().addClass('has-success');
                $('#bmname').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bmname').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bmname').parent().find('small').hide();
            }
            else {
                $('#bmname').parent().parent().removeClass('has-success');
                $('#bmname').parent().parent().addClass('has-error');
                $('#bmname').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#bmname').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#bmname').parent().find('small').show().text('The Mother Name is required')
            }
        });


        $('#vatid').on('keyup',function () {
            if ($('#vatid').val() != '') {
                $('#vatid').parent().parent().addClass('has-success');
                $('#vatid').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#btypes').on('change',function () {
            if ($('#btypes').val() != 0) {
                $('#btypes').parent().parent().removeClass('has-error');
                $('#btypes').parent().parent().addClass('has-success');
                $('#btypes').parent().find('span').removeClass('glyphicon glyphicon-remove form-control-feedback');
                $('#btypes').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('#btypes').parent().find('small').hide();
            }
            else {
                $('#btypes').parent().parent().removeClass('has-success');
                $('#btypes').parent().parent().addClass('has-error');
                $('#btypes').parent().find('span').removeClass('glyphicon glyphicon-ok form-control-feedback');
                $('#btypes').parent().find('span').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#btypes').parent().find('small').show().text('The Business Type field is required')
            }
        });

        $('#be_gram').on('keyup',function () {
            if ($('#be_gram').val() != '') {
                $('#be_gram').parent().parent().addClass('has-success');
                $('#be_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#be_rbs').on('keyup',function () {
            if ($('#be_rbs').val() != '') {
                $('#be_rbs').parent().parent().addClass('has-success');
                $('#be_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#be_wordno').on('keyup',function () {
            if ($('#be_wordno').val() != '') {
                $('#be_wordno').parent().parent().addClass('has-success');
                $('#be_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#be_dis').on('keyup',function () {
            if ($('#be_dis').val() != '') {
                $('#be_dis').parent().parent().addClass('has-success');
                $('#be_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#be_thana').on('keyup',function () {
            if ($('#be_thana').val() != '') {
                $('#be_thana').parent().parent().addClass('has-success');
                $('#be_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#be_postof').on('keyup',function () {
            if ($('#be_postof').val() != '') {
                $('#be_postof').parent().parent().addClass('has-success');
                $('#be_postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_gram').on('keyup',function () {
            if ($('#bb_gram').val() != '') {
                $('#bb_gram').parent().parent().addClass('has-success');
                $('#bb_gram').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_rbs').on('keyup',function () {
            if ($('#bb_rbs').val() != '') {
                $('#bb_rbs').parent().parent().addClass('has-success');
                $('#bb_rbs').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_wordno').on('keyup',function () {
            if ($('#bb_wordno').val() != '') {
                $('#bb_wordno').parent().parent().addClass('has-success');
                $('#bb_wordno').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_dis').on('keyup',function () {
            if ($('#bb_dis').val() != '') {
                $('#bb_dis').parent().parent().addClass('has-success');
                $('#bb_dis').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_thana').on('keyup',function () {
            if ($('#bb_thana').val() != '') {
                $('#bb_thana').parent().parent().addClass('has-success');
                $('#bb_thana').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#bb_postof').on('keyup',function () {
            if ($('#bb_postof').val() != '') {
                $('#bb_postof').parent().parent().addClass('has-success');
                $('#bb_postof').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#phone').on('keyup',function () {
            if ($('#phone').val() != '') {
                $('#phone').parent().parent().addClass('has-success');
                $('#phone').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });
        $('#email').on('keyup',function () {
            if ($('#email').val() != '') {
                $('#email').parent().parent().addClass('has-success');
                $('#email').parent().find('span').addClass('glyphicon glyphicon-ok form-control-feedback');
            }

        });

        $('#btypes').on('change',function () {
            var token = "{{csrf_token()}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"{{route('tradeTax_amount')}}",
                data:{
                    'tax_amount':$('#btypes').val(),
                },
                success:function (result) {
                    if(result !=""){
                        $('#tax_amount').val(result.amount);
                    }
                    else {
                        $('#tax_amount').val(0);
                    }

                }
            });
        })









    </script>
@endsection