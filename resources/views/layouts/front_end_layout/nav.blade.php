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

            <div class="navbar-collapse collapse" id="menubar">
                <ul class="nav navbar-nav nav" >
                    <li><a href="show.html"><i class="fa fa-home fa-lg" style="font-size:15px;vertical-align: 0px;"> &nbsp;প্রথম পাতা</i> &nbsp; </a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">আবেদন পত্র &nbsp;
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
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">অন্যান্য সেবাসমূহ &nbsp;
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
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
                    <!---
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">অন্যান্য সেবাসমূহ &nbsp;
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">

                            <li><a href="home/otherService?service=1">মৃত্যু সনদ</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=2">চারিত্রিক সনদ</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=3">অবিবাহিত সনদ</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=4">ভূমিহীন সনদ</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=5">পুনঃ বিবাহ না হওয়া সনদ</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=6">বার্ষিক আয়ের প্রত্যয়ন</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=7">একই নামের প্রত্যয়ন</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=8">প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=9">সনাতন ধর্ম  অবলম্বী</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=10">অনুমতি পত্র</a></li>
                            <li class="divider"></li>
                            <li><a href="home/otherService?service=11">প্রত্যয়ন পত্র</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>-->

                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">আবেদন যাচাই করুন &nbsp;
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

                    <li class="dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">সনদপত্র যাচাই করুন &nbsp;
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
                            <li><a href="home/verify_holding_tax.html">হোল্ডিং ট্যাক্স যাচাই</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="false">ইউনিয়ন পরিষদ &nbsp;
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="home/voterList.html">ভোটার তালিকা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/fighters.html">মুক্তিযোদ্ধা তালিকা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/poorman.html">দুস্থদের তালিকা </a></li>
                            <li class="divider"></li>
                            <li><a href="home/widow.html">বিধবাদের তালিকা </a></li>
                            <li class="divider"></li>
                            <li><a href="home/foreignMan.html">প্রবাসীদের তালিকা </a></li>
                            <li class="divider"></li>
                            <li><a href="home/oldmanStipend.html">বয়স্কভাতা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/motherVata.html">মাতৃত্বকালীন ভাতা </a></li>
                            <li class="divider"></li>
                            <li><a href="home/autistic.html">প্রতিবন্ধী ভাতা</a></li>
                            <li class="divider"></li>
                            <li><a href="home/autisticStudent.html">প্রতিবন্ধী ছাত্র/ছাত্রী</a></li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function isNumber(evt){
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

<!--this is header content End -->
<div class="slid_show"><!-- Slide Show Start-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{asset('images/front_end/m_mosqe.jpg')}}"  style="width:100%;" class="img-responsive" />
                <div class="carousel-caption"></div>
            </div>
            <div class="item">
                <img src="{{asset('images/front_end/m_shool.jpg')}}" alt="Union Parishad" style="width:100%;" class="img-responsive">
                <div class="carousel-caption"></div>
            </div>

        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <div class="main-div hidden-xs hidden-sm visible-md visible-lg">
            <div class="main-div-inner">
                <div class="logo">
                    <a href=" "><img src="all/logo/logo.html" alt="logo" height="68px" width="70px" /></a>
                </div>
                <div class="site-name-wrapper">
						<span id="sitename">
							<a href="#">১নং গাজীপুর ইউন‌িয়ন পর‌িষদ</a>
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
            <p class="text-center">
                <a href="home/all_news.html" style="text-decoration:none;"><i class="fa fa-newspaper-o"></i>&nbsp; সকল খবর  &nbsp; <i class="fa fa-chevron-right"></i></a>
            </p>

        </div>
        <div class="col-md-10">
            <table width="100%" border="0">
                <tr>
                    <td width="100%">
                        <marquee behavior="scroll" align="middle" direction="left" scrollamount="6" onmouseover="this.stop()" onmouseout="this.start()">

                        </marquee>
                    </td>

                </tr>
            </table>
        </div>
    </div>
</div>