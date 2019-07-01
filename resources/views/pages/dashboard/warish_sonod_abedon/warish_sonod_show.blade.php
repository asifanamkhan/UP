@extends('layouts.dashboard_layout.master')

@section('content')
    <div class="panel-body all-input-form">

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-2 control-label">সরবরাহের ধরণ :</label>

                    @if($warishSonodAbedon->delivery_type==1)
                        জরুরী
                    @elseif($warishSonodAbedon->delivery_type==1)
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

                    {{$warishSonodAbedon->nationid}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-no" class="col-sm-4 control-label">জন্ম নিবন্ধন নং : </label>

                    {{$warishSonodAbedon->bcno}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Passport-no" class="col-sm-4 control-label">পাসপোর্ট নং : </label>

                    {{$warishSonodAbedon->pno}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-4 control-label">জম্ম তারিখ : </label>

                    {{$warishSonodAbedon->dofb}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Name-english" class="col-sm-4 control-label">মৃত ব্যাক্তির নাম(ইংরেজিতে):  </label>

                    {{$warishSonodAbedon->ename}}
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group">
                    <label for="Name-bangla" class="col-sm-4 control-label">মৃত ব্যাক্তির নাম(বাংলায়): </label>

                    {{$warishSonodAbedon->bname}}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Gender" class="col-sm-4 control-label">লিঙ্গ :  </label>

                    @if($warishSonodAbedon->gender==1)
                        পুরুষ
                    @elseif($warishSonodAbedon->gender==2)
                        মহিলা
                    @else
                        অন্যান্য
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Marital-status" class="col-sm-4 control-label">বৈবাহিক সম্পর্ক : </label>

                    @if($warishSonodAbedon->mstatus==1)
                        বিবাহিত
                    @elseif($warishSonodAbedon->mstatus==2)
                        অবিবাহিত
                    @elseif($warishSonodAbedon->mstatus==3)
                        বিপত্নীক / বিধবা
                    @elseif($warishSonodAbedon->mstatus==4)
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

                    {{$warishSonodAbedon->eWname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <label for="Wife-name-bangla" class="col-sm-4 control-label">স্ত্রীর নাম (বাংলায়) : </label>

                    {{$warishSonodAbedon->bWname}}
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2" >
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-4 control-label">স্বামীর নাম (ইংরেজিতে) : </label>
                    {{$warishSonodAbedon->eHname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-bangla" class="col-sm-4 control-label"> স্বামী নাম (বাংলায়) : </label>

                    {{$warishSonodAbedon->bHname}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-english" class="col-sm-4 control-label">পিতার নাম (ইংরেজিতে) : </label>
                    {{$warishSonodAbedon->efname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-bangla" class="col-sm-4 control-label">পিতার নাম (বাংলায়) : </label>
                    {{$warishSonodAbedon->bfname}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-english" class="col-sm-4 control-label">মাতার নাম (ইংরেজিতে) : </label>
                    {{$warishSonodAbedon->emname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-bangla" class="col-sm-4 control-label">মাতার নাম (বাংলায়) : </label>

                    {{$warishSonodAbedon->bmane}}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-4 control-label">পেশা :</label>

                    {{$warishSonodAbedon->ocupt}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Resident" class="col-sm-4 control-label">বাসিন্দা :   </label>

                    @if($warishSonodAbedon->bashinda==1)
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

                            {{$warishSonodAbedon->p_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>

                            {{$warishSonodAbedon->p_rbs}}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$warishSonodAbedon->p_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$warishSonodAbedon->p_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$warishSonodAbedon->p_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$warishSonodAbedon->p_postof}}
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
                            {{$warishSonodAbedon->pb_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$warishSonodAbedon->pb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$warishSonodAbedon->pb_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$warishSonodAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$warishSonodAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস </label>
                            {{$warishSonodAbedon->pb_postof}}

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
                            {{$warishSonodAbedon->per_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর : </label>
                            {{$warishSonodAbedon->per_rbs}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$warishSonodAbedon->per_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$warishSonodAbedon->per_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$warishSonodAbedon->per_thana}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$warishSonodAbedon->per_postof}}

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
                            {{$warishSonodAbedon->perb_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$warishSonodAbedon->perb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$warishSonodAbedon->perb_wordno}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$warishSonodAbedon->perb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$warishSonodAbedon->perb_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$warishSonodAbedon->perb_postof}}

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
                    <label for="English Applicant Name" class="col-sm-4 control-label small-font"> আবেদনকারীর নাম(ইংরেজিতে):</label>
                    {{$warishSonodAbedon->english_applicant_name}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <label for="Bangla Applicant Name" class="col-sm-4 control-label small-font">আবেদনকারীর নাম(বাংলায়):</label>
                    {{$warishSonodAbedon->bangla_applicant_name}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="English Applicant Father Name" class="col-sm-4 control-label small-font"> আবেদনকারীর পিতার নাম(ইংরেজিতে):</label>
                    {{$warishSonodAbedon->english_applicant_father_name}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Bangla Applicant Father Name" class="col-sm-3 control-label small-font">আবেদনকারীর পিতার নাম(বাংলায়): </label>
                    {{$warishSonodAbedon->bangla_applicant_father_name}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mobile" class="col-sm-4 control-label">মোবাইল :   </label>
                    {{$warishSonodAbedon->mob}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-4 control-label">ইমেল :</label>
                    {{$warishSonodAbedon->email}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10" style="text-align:center;">
                <div class="app-heading">
                    <b><u> ওয়ারিশগনের তালিকা</u></b>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="col-sm-3">
                        নাম : {{$warishSonodAbedon->warishname}}
                    </div>
                    <div class="col-sm-3">
                        সম্পর্ক : {{$warishSonodAbedon->warishrel}}
                    </div>
                    <div class="col-sm-3">
                        বয়স : {{$warishSonodAbedon->warishage}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection