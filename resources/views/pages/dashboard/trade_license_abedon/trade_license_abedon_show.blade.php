@extends('layouts.dashboard_layout.master')

@section('content')
    <div class="panel-body all-input-form">
        <div class="row"  style="margin-top: 10px;">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Picture" class="col-sm-4 control-label">ছবি</label>
                    {{$tradeLicenseAbedon->image}}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-2 control-label">সরবরাহের ধরণ :</label>

                    @if($tradeLicenseAbedon->delivery_type==1)
                        জরুরী
                    @elseif($tradeLicenseAbedon->delivery_type==2)
                        অতি জরুরী
                    @else
                        সাধারন
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="National-id-english" class="col-sm-4 control-label">প্রতিষ্ঠানের মালিকানার ধরণ:  </label>
                    @if($tradeLicenseAbedon->type_val==1)
                        ব্যক্তি মালিকানাধীন
                    @elseif($tradeLicenseAbedon->type_val==2)
                        যৌথ মালিকানা
                    @else
                        কোম্পানী
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Passport-no" class="col-sm-4 control-label">প্রতিষ্ঠানের নাম(ইংরেজিতে): </label>

                    {{$tradeLicenseAbedon->ecomname}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-4 control-label">প্রতিষ্ঠানের নাম(বাংলায়): </label>

                    {{$tradeLicenseAbedon->bcomname}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Name-english" class="col-sm-4 control-label">মালিকের নাম(ইংরেজিতে):  </label>

                    {{$tradeLicenseAbedon->ewname}}
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group">
                    <label for="Name-bangla" class="col-sm-4 control-label">মালিকের নাম(বাংলায়): </label>

                    {{$tradeLicenseAbedon->bwname}}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Gender" class="col-sm-4 control-label">লিঙ্গ :  </label>

                    @if($tradeLicenseAbedon->gender==1)
                        পুরুষ
                    @elseif($tradeLicenseAbedon->gender==2)
                        মহিলা
                    @else
                        অন্যান্য
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Marital-status" class="col-sm-4 control-label">বৈবাহিক সম্পর্ক : </label>

                    @if($tradeLicenseAbedon->mstatus==1)
                        বিবাহিত
                    @elseif($tradeLicenseAbedon->mstatus==2)
                        অবিবাহিত
                    @elseif($tradeLicenseAbedon->mstatus==3)
                        বিপত্নীক / বিধবা
                    @elseif($tradeLicenseAbedon->mstatus==4)
                        তালাকপ্রাপ্ত
                    @else
                        দরকার নাই
                    @endif
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2" >
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-4 control-label">স্বামীর নাম (ইংরেজিতে) : </label>
                    {{$tradeLicenseAbedon->esname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-bangla" class="col-sm-4 control-label"> স্বামী নাম (বাংলায়) : </label>

                    {{$tradeLicenseAbedon->bsname}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-english" class="col-sm-4 control-label">পিতার নাম (ইংরেজিতে) : </label>
                    {{$tradeLicenseAbedon->efname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-bangla" class="col-sm-4 control-label">পিতার নাম (বাংলায়) : </label>
                    {{$tradeLicenseAbedon->bfname}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-english" class="col-sm-4 control-label">মাতার নাম (ইংরেজিতে) : </label>
                    {{$tradeLicenseAbedon->emname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-bangla" class="col-sm-4 control-label">মাতার নাম (বাংলায়) : </label>

                    {{$tradeLicenseAbedon->bmname}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-4 control-label">ভ্যাট  আইডি :</label>

                    {{$tradeLicenseAbedon->vatid}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Education-qualification" class="col-sm-4 control-label">ট্যাক্স আইডি :</label>

                    {{$tradeLicenseAbedon->taxid}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Business-type-bangla" class="col-sm-3 control-label">ব্যবসার ধরন (বাংলায়) :  </label>
                    {{$tradeLicenseAbedon->business_type}}
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-10" style="text-align:center;">
                <div class="app-heading">
                    <br ><b><u>ব্যবসার ঠিকানা</u></b><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        <b><u>( ইংরেজিতে )</u></b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-english" class="col-sm-4 control-label">গ্রাম/মহল্লা : </label>

                            {{$tradeLicenseAbedon->be_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>

                            {{$tradeLicenseAbedon->be_rbs}}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$tradeLicenseAbedon->be_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$tradeLicenseAbedon->be_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$tradeLicenseAbedon->be_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$tradeLicenseAbedon->be_postof}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="app-sub-heading">
                        <b><u>( বাংলায় )</u></b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Village-bangla" class="col-sm-4 control-label">গ্রাম/মহল্লা : </label>
                            {{$tradeLicenseAbedon->bb_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$tradeLicenseAbedon->bb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$tradeLicenseAbedon->bb_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$tradeLicenseAbedon->bb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$tradeLicenseAbedon->bb_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস </label>
                            {{$tradeLicenseAbedon->bb_postof}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10" style="text-align:center;">
                <div class="app-heading">
                    <b><u>যোগাযোগের ঠিকানা</u></b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mobile" class="col-sm-4 control-label">মোবাইল :   </label>
                    {{$tradeLicenseAbedon->mob}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-4 control-label">ইমেল :</label>
                    {{$tradeLicenseAbedon->email}}

                </div>
            </div>
        </div>

    </div>
@endsection