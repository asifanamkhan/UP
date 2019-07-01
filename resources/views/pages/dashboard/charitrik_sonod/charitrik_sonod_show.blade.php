@extends('layouts.dashboard_layout.master')

@section('content')
    <div class="panel-body all-input-form" style="color: black">
        <div class="row"  style="margin-top: 10px;">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Picture" class="col-sm-4 control-label">ছবি</label>
                    {{$othersSonodAbedon->image}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;margin-top:10px;">
                <div class="form-group">
                    <label for="Delivery-type" class="col-sm-2 control-label">সরবরাহের ধরণ :</label>

                    @if($othersSonodAbedon->delivery_type==1)
                        জরুরী
                    @elseif($othersSonodAbedon->delivery_type==1)
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
                    <label for="Income Measured" class="col-sm-4 control-label">আয়ের পরিমান(ইংরেজিতে): </label>
                    {{$othersSonodAbedon->incomeAmount}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Publish Name" class="col-sm-4 control-label">প্রকাশে নাম</label>
                    {{$othersSonodAbedon->publishName}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Work Placed" class="col-sm-4 control-label">কর্ম ক্ষেত্রের নাম</label>
                    {{$othersSonodAbedon->workPlace}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Death-date" class="col-sm-4 control-label">মৃত্যু তারিখ </label>
                    {{$othersSonodAbedon->ddfb}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="National-id-english" class="col-sm-4 control-label">ন্যাশনাল আইডি :  </label>

                    {{$othersSonodAbedon->nationid}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-no" class="col-sm-4 control-label">জন্ম নিবন্ধন নং : </label>

                    {{$othersSonodAbedon->bcno}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Passport-no" class="col-sm-4 control-label">পাসপোর্ট নং : </label>

                    {{$othersSonodAbedon->pno}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Birth-date" class="col-sm-4 control-label">জম্ম তারিখ : </label>

                    {{$othersSonodAbedon->dofb}}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Name-english" class="col-sm-4 control-label">নাম ( ইংরেজিতে ) :  </label>

                    {{$othersSonodAbedon->ename}}
                </div>
            </div>
            <div class="col-sm-6" >
                <div class="form-group">
                    <label for="Name-bangla" class="col-sm-4 control-label">নাম ( বাংলায় ) : </label>

                    {{$othersSonodAbedon->bname}}
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Gender" class="col-sm-4 control-label">লিঙ্গ :  </label>

                    @if($othersSonodAbedon->gender==1)
                        পুরুষ
                    @elseif($othersSonodAbedon->gender==2)
                        মহিলা
                    @else
                        অন্যান্য
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Marital-status" class="col-sm-4 control-label">বৈবাহিক সম্পর্ক : </label>

                    @if($othersSonodAbedon->mstatus==1)
                        বিবাহিত
                    @elseif($othersSonodAbedon->mstatus==2)
                        অবিবাহিত
                    @elseif($othersSonodAbedon->mstatus==3)
                        বিপত্নীক / বিধবা
                    @elseif($othersSonodAbedon->mstatus==4)
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

                    {{$othersSonodAbedon->eWname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">

                    <label for="Wife-name-bangla" class="col-sm-4 control-label">স্ত্রীর নাম (বাংলায়) : </label>

                    {{$othersSonodAbedon->bWname}}
                </div>
            </div>
        </div>

        <div class="row" id="husband" style="display: none;" data-topic="2" >
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-english" class="col-sm-4 control-label">স্বামীর নাম (ইংরেজিতে) : </label>
                    {{$othersSonodAbedon->eHname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Husband-name-bangla" class="col-sm-4 control-label"> স্বামী নাম (বাংলায়) : </label>

                    {{$othersSonodAbedon->bHname}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-english" class="col-sm-4 control-label">পিতার নাম (ইংরেজিতে) : </label>
                    {{$othersSonodAbedon->efname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Father-name-bangla" class="col-sm-4 control-label">পিতার নাম (বাংলায়) : </label>
                    {{$othersSonodAbedon->bfname}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-english" class="col-sm-4 control-label">মাতার নাম (ইংরেজিতে) : </label>
                    {{$othersSonodAbedon->emname}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Mother-name-bangla" class="col-sm-4 control-label">মাতার নাম (বাংলায়) : </label>

                    {{$othersSonodAbedon->bmane}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="profession" class="col-sm-4 control-label">পেশা :</label>

                    {{$othersSonodAbedon->ocupt}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Education-qualification" class="col-sm-4 control-label">শিক্ষাগত যোগ্যতা :</label>

                    {{$othersSonodAbedon->qualification}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Religion" class="col-sm-4 control-label">ধর্ম :   </label>

                    {{$othersSonodAbedon->religion}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Resident" class="col-sm-4 control-label">বাসিন্দা :   </label>

                    @if($othersSonodAbedon->bashinda==1)
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

                            {{$othersSonodAbedon->p_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>

                            {{$othersSonodAbedon->p_rbs}}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$othersSonodAbedon->p_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$othersSonodAbedon->p_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$othersSonodAbedon->p_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$othersSonodAbedon->p_postof}}
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
                            {{$othersSonodAbedon->pb_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$othersSonodAbedon->pb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$othersSonodAbedon->pb_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$othersSonodAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$othersSonodAbedon->pb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস </label>
                            {{$othersSonodAbedon->pb_postof}}

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
                            {{$othersSonodAbedon->per_gram}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-english" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর : </label>
                            {{$othersSonodAbedon->per_rbs}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-english" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$othersSonodAbedon->per_wordno}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-english" class="col-sm-4 control-label">জেলা :</label>
                            {{$othersSonodAbedon->per_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-english" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$othersSonodAbedon->per_thana}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-english" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$othersSonodAbedon->per_postof}}

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
                            {{$othersSonodAbedon->perb_gram}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Road-block-sector-bangla" class="col-sm-4 control-label">রোড/ব্লক/সেক্টর :</label>
                            {{$othersSonodAbedon->perb_rbs}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Word-no-bangla" class="col-sm-4 control-label">ওয়ার্ড নং :</label>
                            {{$othersSonodAbedon->perb_wordno}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="District-bangla" class="col-sm-4 control-label">জেলা :</label>
                            {{$othersSonodAbedon->perb_dis}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Thana-bangla" class="col-sm-4 control-label">উপজেলা/থানা :</label>
                            {{$othersSonodAbedon->perb_thana}}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Post-office-bangla" class="col-sm-4 control-label">পোষ্ট অফিস :</label>
                            {{$othersSonodAbedon->perb_postof}}

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
                    {{$othersSonodAbedon->mob}}

                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email" class="col-sm-4 control-label">ইমেল :</label>
                    {{$othersSonodAbedon->email}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Designation" class="col-sm-4 control-label">সংযুক্তি :</label>
                    {{$othersSonodAbedon->attachment}}
                </div>
            </div>
        </div>
    </div>
@endsection