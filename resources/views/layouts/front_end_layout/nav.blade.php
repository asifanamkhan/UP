<div class="menu"> <!-- Menu Start-->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container" style="background-color:#003A6A;width:100%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse" id="menubar" >
                <ul class="nav navbar-nav nav" >
                    <li><a href="{{url('/')}}"><i class="fa fa-home fa-lg" style="font-size:15px;vertical-align: 0px;color: white"> &nbsp;প্রথম পাতা</i> &nbsp; </a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white">আবেদন পত্র &nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('nagorik_abedon.create')}}">নাগরিক আবেদন</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('trade_license_abedon.create')}}">ট্রেড লাইসেন্স আবেদন</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('warish_sonod_abedon.create')}}">ওয়ারিশ সনদের আবেদন</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('others_sonod_abedon.create')}}">অন্যান্য সনদের আবেদন ফরম  </a></li>
                            <li class="divider"></li>
                            <li class="dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white">অন্যান্য সেবাসমূহ &nbsp;
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" style="overflow-y: scroll;height: 400px">
                                    <li><a href="{{url('mrittu_sonod')}}">মৃত্যু সনদ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('charitrik_sonod')}}">চারিত্রিক সনদ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('obobahito_sonod')}}">অবিবাহিত সনদ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('vumihin_sonod')}}">ভূমিহীন সনদ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('pun_bibah_na_howa_sonod')}}">পুনঃ বিবাহ না হওয়া সনদ </a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('barshik_income')}}">বার্ষিক আয়ের প্রত্যয়ন</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('eki_name')}}">একই নামের প্রত্যয়ন</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('bak_srobon_protibondhi')}}">প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('sonaton_dhormo')}}">সনাতন ধর্ম  অবলম্বী</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('onumoti_potro')}}">অনুমতি পত্র</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('prottyon_potro')}}">প্রত্যয়ন পত্র</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('muktijoddha_sonod')}}">মুক্তিযোদ্ধা সনদ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('muktijoddha_possho_sonod')}}">মুক্তিযোদ্ধা পোষ্য সনদ</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </li>



                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white">আবেদন যাচাই &nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('nagorik_abedon_jachay')}}">নাগরিক আবেদন যাচাই</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('trade_lincense_jachay')}}">ট্রেড লাইসেন্স আবেদন যাচাই</a></li>
                            <li class="divider"></li>
                            <li><a href="">ওয়ারিশ সনদের আবেদন  যাচাই</a></li>
                            <li class="divider"></li>
                            <li><a href="">অন্যান্য সেবাসমূহর আবেদন  যাচাই</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                    <li class="dropdown" >
                        <a href="{{route('sdgDesignFrontEnd')}}"  data-delay="100" data-close-others="false" style="color: white;">এসডিজি
                        </a>
                    </li>


                    {{--<li class="dropdown ">--}}
                        {{--<a href="{{route('frontendRegistration')}}"  data-delay="100" data-close-others="false" style="color: white"> &nbsp;রেজিস্ট্রেশন ফরম--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white">সনদপত্র যাচাই &nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="home/filternagorikcertificate.html">নাগরিক  সনদপত্র  যাচাই </a></li>
                            <li class="divider"></li>
                            <li><a href="home/filtertradecertificate.html">ট্রেড লাইসেন্স সনদপত্র  যাচাই </a></li>
                            <li class="divider"></li>
                            <li><a href="home/filteroarishcertificate.html">ওয়ারিশ সনদপত্র যাচাই </a></li>
                            <li class="divider"></li>
                            <li><a href="home/filterOtherServiceCertificate.html">অন্যান্য সেবাসমূহর সনদপত্র যাচাই </a></li>
                            <li class="divider"></li>
                            <li><a href="home/jacaiMamlaNotice.html">মামলার নোটিশ যাচাই</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('sonodHoldingTaxVerify')}}">হোল্ডিং ট্যাক্স যাচাই</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white;">ইউনিয়ন পরিষদ &nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="home/voterList.html">ভোটার তালিকা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/fighters.html">মুক্তিযোদ্ধা তালিকা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/motherVata.html">মাতৃত্বকালীন ভাতা </a></li>
                            <li class="divider"></li>
                            <li><a href="home/autistic.html">প্রতিবন্ধী ভাতা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/autisticStudent.html">প্রতিবন্ধী ছাত্র/ছাত্রী</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                    <li class="" style="padding-top: 10px">
                        <select name="" id="division" class="form-control">
                            <option value="#">সিলেক্ট করুন</option>
                            <option value="https://facebook.com">ঢাকা</option>
                            <option value="https://youtube.com">রাজশাহী</option>
                            <option value="https://google.com">খুলনা</option>
                            <option value="https://daraz.com">রংপুর</option>
                            <option value="https://facebook.com">সিলেট</option>
                            <option value="w">ময়মনসিংহ</option>
                            <option value="s">বরিশাল</option>
                            <option value="y">চট্টগ্রাম</option>
                        </select>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false" style="color: white;">প্রোফাইল&nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::check())
                                <li class="dropdown">
                                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i>লআউট</a></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            @else
                                <li class="dropdown">
                                    <a href="{{route('login')}}" style="color: white;">লগইন&nbsp;</a>
                                </li>
                            @endif
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!--this is header content End -->
<div class="slid_show"><!-- Slide Show Start-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('images/front_end/Banner-2.jpg')}}"  style="width:100%;" class="img-responsive" />
                <div class="carousel-caption"></div>
            </div>
            <div class="item">
                <img src="{{asset('images/front_end/Final Banner.jpg')}}" alt="Union Parishad" style="width:100%;" class="img-responsive">
                <div class="carousel-caption"></div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        <div class="main-div hidden-xs hidden-sm visible-md visible-lg">
            <div class="main-div-inner">
                <div class="logo">
                    <a href=" "><img src="{{asset('images/front_end/logo.png')}}" alt="logo" height="68px" width="70px" /></a>
                </div>
                <div class="site-name-wrapper">
                    <span id="sitename">
                        <a href="#">৩ নং রুদাঘরা ইউন‌িয়ন পর‌িষদ</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .main-div{
        background-color: rgba(0, 0, 0, 0.5);
        margin-bottom: 0;
        padding: 10px 20px 10px 15px;
        position: absolute;
        left: 20px;
        top: 15px;
        z-index: 100;
    }
    .main-div-inner{
        margin:0px;
        position:relative;
        box-sizing: border-box;
    }
    .main-div-inner a{
        color: #fff;
        text-decoration:none;
    }
    .logo{
        float:left;
        margin-right:10px;
        padding:0px;
    }
    .site-name-wrapper{
        float:left;
        padding-top: 5px;
    }
    #sitename a{
        color: #fff;
        font-size:120%;
        font-weight:400;
    }
</style>

<div class="scroll_news"><!-- Scrool News Start-->
    <div class="row">
        <div class="col-md-2">
            <p class="text-center" >
                <a style="color: blue" href="home/all_news.html" style="text-decoration:none;"><i class="fa fa-newspaper-o"></i>&nbsp; সকল খবর  &nbsp; <i class="fa fa-chevron-right"></i></a>
            </p>
        </div>
        <div class="col-md-10">
            <table width="100%" border="0">
                <tr>
                    <td width="100%" >
                        <marquee behavior="scroll" align="middle" direction="left" scrollamount="6" onmouseover="this.stop()" onmouseout="this.start()">
                            <p style="color: #ff0202"><b><i>*** ওয়েব সাইট খোলা  ***</i></b></p>
                        </marquee>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    $('#division').on('change',function () {
        var url=($(this).val());
        window.open(url,'_blank')
    })
</script>