@extends('layouts.dashboard_layout.master')

@section('content')
    <div class="panel-body all-input-form">
        <div class="row"  style="margin-top: 10px;">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Picture" class="col-sm-4 control-label">ছবি</label>
                    {{$nagorikAbedon->image}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-2 control-label">সরবরাহের ধরণ :</label>

                    @if($nagorikAbedon->delivery_type==1)
                        জরুরী
                    @elseif($nagorikAbedon->delivery_type==1)
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
                    <label for="National-id-english" class="col-sm-4 control-label">ন্যাশনাল আইডি :  </label>

                    {{$nagorikAbedon->nationid}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-no" class="col-sm-4 control-label">জন্ম নিবন্ধন নং : </label>

                    {{$nagorikAbedon->bcno}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Passport-no" class="col-sm-4 control-label">পাসপোর্ট নং : </label>

                    {{$nagorikAbedon->pno}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-4 control-label">জম্ম তারিখ : </label>

                    {{$nagorikAbedon->dofb}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Name-english" class="col-sm-4 control-label">নাম ( ইংরেজিতে ) :  </label>

                    {{$nagorikAbedon->ename}}
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group">
                    <label for="Name-bangla" class="col-sm-4 control-label">নাম ( বাংলায় ) : </label>

                    {{$nagorikAbedon->bname}}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Gender" class="col-sm-4 control-label">লিঙ্গ :  </label>

                    @if($nagorikAbedon->gender==1)
                        পুরুষ
                    @elseif($nagorikAbedon->gender==2)
                        মহিলা
                    @else
                        অন্যান্য
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Marital-status" class="col-sm-4 control-label">বৈবাহিক সম্পর্ক : </label>

                    @if($nagorikAbedon->mstatus==1)
                        বিবাহিত
                    @elseif($nagorikAbedon->mstatus==2)
                        অবিবাহিত
                    @elseif($nagorikAbedon->mstatus==3)
                        বিপত্নীক / বিধবা
                    @elseif($nagorikAbedon->mstatus==4)
                        তালাকপ্রাপ্ত
                    @else
                        দরকার নাই
                    @endif
                </div>
            </div>
        </div>
        <div class="row" id="wife" style="display: none;" data-topic="1" >
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Wife-name-english" class="col-sm-4 control-label">স্ত্রীর  নাম (ইংরেজিতে) : </label>

                    {{$nagorikAbedon->eWname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <label for="Wife-name-bangla" class="col-sm-4 control-label">স্ত্রীর নাম (বাংলায়) : </label>

                    {{$nagorikAbedon->bWname}}
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2" >
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-4 control-label">স্বামীর নাম (ইংরেজিতে) : </label>
                    {{$nagorikAbedon->eHname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-bangla" class="col-sm-4 control-label"> স্বামী নাম (বাংলায়) : </label>

                    {{$nagorikAbedon->bHname}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-english" class="col-sm-4 control-label">পিতার নাম (ইংরেজিতে) : </label>
                    {{$nagorikAbedon->efname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-bangla" class="col-sm-4 control-label">পিতার নাম (বাংলায়) : </label>
                    {{$nagorikAbedon->bfname}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-english" class="col-sm-4 control-label">মাতার নাম (ইংরেজিতে) : </label>
                    {{$nagorikAbedon->emname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-bangla" class="col-sm-4 control-label">মাতার নাম (বাংলায়) : </label>

                    {{$nagorikAbedon->bmane}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-4 control-label">পেশা :</label>

                    {{$nagorikAbedon->ocupt}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Education-qualification" class="col-sm-4 control-label">শিক্ষাগত যোগ্যতা :</label>

                    {{$nagorikAbedon->qualification}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Religion" class="col-sm-4 control-label">ধর্ম :   </label>

                    {{$nagorikAbedon->religion}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Resident" class="col-sm-4 control-label">বাসিন্দা :   </label>

                    @if($nagorikAbedon->bashinda==1)
                        অস্থায়ী
                    @else
                        স্থায়ী
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10" style="text-align:center;">
                <div class="app-heading">
                    <br ><b><u>বর্তমান ঠিকানা</u></b><br>
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

                            {{$nagorikAbedon->p_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>

                            {{$nagorikAbedon->p_rbs}}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$nagorikAbedon->p_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$nagorikAbedon->p_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$nagorikAbedon->p_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$nagorikAbedon->p_postof}}
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
                            {{$nagorikAbedon->pb_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$nagorikAbedon->pb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$nagorikAbedon->pb_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$nagorikAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$nagorikAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস </label>
                            {{$nagorikAbedon->pb_postof}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="permaHeading">
            <div class="col-sm-10" style="text-align:center;">
                <div class="app-heading">
                    <b><u>স্থায়ী  ঠিকানা</u></b>
                </div>
            </div>
        </div>

        <div class="row" id="permanentAddress">
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
                            {{$nagorikAbedon->per_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর : </label>
                            {{$nagorikAbedon->per_rbs}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$nagorikAbedon->per_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$nagorikAbedon->per_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$nagorikAbedon->per_thana}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$nagorikAbedon->per_postof}}

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
                            <label for="Village-bangla" class="col-sm-4 control-label">গ্রাম/মহল্লা :</label>
                            {{$nagorikAbedon->perb_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$nagorikAbedon->perb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$nagorikAbedon->perb_wordno}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$nagorikAbedon->perb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$nagorikAbedon->perb_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$nagorikAbedon->perb_postof}}

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
                    {{$nagorikAbedon->mob}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-4 control-label">ইমেল :</label>
                    {{$nagorikAbedon->email}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Designation" class="col-sm-4 control-label">সংযুক্তি :</label>
                    {{$nagorikAbedon->attachment}}
                </div>
            </div>
        </div>
    </div>
@endsection