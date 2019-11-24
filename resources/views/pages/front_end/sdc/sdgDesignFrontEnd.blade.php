@extends('layouts.front_end_layout.master')
@section('head_content')
    এসডিজি
@endsection
@section('content')
    <style>
        .dot {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border-color: black;
            display: block;
        }
        .mt{
            margin-top: 3%;
        }
        .dropdown-menu>li>a{
            color: black !important;
        }
    </style>
    <div class="panel panel-default mb-5">
        <div class="panel-body" >
            <div class="row" style="margin-bottom:10px;margin-top:10px;">
                <div class="col-sm-2 mt" >
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcDoridroPoribar')}}">দরিদ্র পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdchotoDoridroPoribar')}}">অতি দরিদ্র পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ২</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcOldVataGrohonkari')}}">বয়স্ক ভাতা গ্রহণকারীর তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcOldVataBonchito')}}">বয়স্ক ভাতা বঞ্চিতদের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcOldVataJoggoBonchito')}}">বয়স্ক ভাতার যোগ্য কিন্তু বঞ্চিত দের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৩</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdc0To5AgeNoBirthCerShishu')}}">০ থেকে ৫ বয়সী জন্ম নিবন্ধনহীন শিশুর তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdc0To5AgeKhorbitoShishu')}}">০ থেকে ৫ বয়সী খর্বিত শিশুর তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৪</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcBidhobaVataGrohon')}}">বিধবার ভাতা গ্রহণকারীর তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcBidhobaVataBonchito')}}">বিধবার ভাতা বঞ্চিতদের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৫</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcBiddutGrohon')}}">বিদ্যুৎ সুবিধা গ্রহণকারী পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcBiddutBonchito')}}">বিদ্যুৎ সুবিধা বঞ্চিত পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৬</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdc15To29EduBekar')}}">১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত শিক্ষিত বেকার তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdc15To29UnEduBekar')}}">১৫ থেকে ২৯ বছর বয়সী প্রশিক্ষণ প্রাপ্ত অশিক্ষিত বেকার তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt" >
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৭</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcNirapodPani')}}">নিরাপদ পানি পান করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcNirapodPaniNaPan')}}">নিরাপদ পানি পান না করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৮</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcInternetHa')}}">ইন্টারনেট সুবিধা পাওয়া পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcInternetNa')}}">ইন্টারনেট সুবিধা না পাওয়া পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ৯</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcSanitationHa')}}">স্বাস্থ্য সম্মত স্যানিটেশন ব্যবহার করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcSanitationNa')}}">স্বাস্থ্য সম্মত স্যানিটেশন ব্যবহার না করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <li class="dropdown ">
                                <img data-hover="dropdown" data-delay="100" data-close-others="false"  class="btn dot dropdown-toggle" data-toggle="dropdown" src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১০</b>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcPrithokSanitationHa')}}">পৃথক স্যানিটেশন ব্যবহার করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcPrithokSanitationNa')}}">পৃথক স্যানিটেশন ব্যবহার না করা পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('sdcSanitationDhoron')}}">স্যানিটেশন ধরন অনুযায়ী পরিবারের তালিকা</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcMashikAy')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১১</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcVumihin')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১২</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcNariKormojibi')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৩</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdc14To18Nari')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৪</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcPeshajibi')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৫</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcEducation')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৬</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcFreelancer')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৭</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcProbashi')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৮</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcBloodGroup')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ১৯</b>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 mt">
                    <div class=" " id="menubar" >
                        <ul class="nav navbar-nav nav" >
                            <a href="{{route('sdcNirokkhor15To45')}}" class="without_drop"><img  class="btn dot"src="{{url('images/sdg/CRT20190507164451OL.png')}}" alt="">
                                <b>এসডিজি ২০</b>
                            </a>
                        </ul>
                    </div>
                </div>

            </div>
        </div>



    </div>
@endsection
@section('script')

@endsection
