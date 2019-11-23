<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav" >
        <ul id="sidebarnav">
            <li class="nav-small-cap">PERSONAL</li>
            <li>
                <a class="has-arrow" href="{{route('admin')}}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">ড্যাশবোর্ড </span></a>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">আবেদন ফরম
									</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('nagorikFormDash')}}" aria-expanded="false" >নাগরিক আবেদন</a>

                    </li>
                    <li><a href="{{route('trade_license_form_dash')}}" aria-expanded="false" >ট্রেড লাইসেন্স আবেদন</a>

                    </li>
                    <li><a href="#" aria-expanded="false" >ওয়ারিশ সনদের আবেদন</a>

                    </li>
                    <li><a href="#" aria-expanded="false" >অন্যান্য সনদের আবেদন</a>

                    </li>

                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">আবেদন সেবাসমূহ
									</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#" aria-expanded="false" class="has-arrow">নাগরিক আবেদন</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('New_nagorik_abedon')}}">নতুন আবেদনকারীগন</a></li>
                            <li><a href="{{route('nagorik_abedon.index')}}">সনদ গ্রহণকারীগন</a></li>
                        </ul>
                    </li>
                    <li><a href="#" aria-expanded="false" class="has-arrow">ট্রেড লাইসেন্স আবেদন</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('New_TradeLicense_abedon')}}">নতুন আবেদনকারীগন</a></li>
                            <li><a href="{{route('trade_license_abedon.index')}}">সনদ গ্রহণকারীগন</a></li>
                            <li><a href="{{route('nagorik_abedon.index')}}">নবায়ন আবেদনকারীগন</a></li>
                            <li><a href="{{route('nagorik_abedon.index')}}">মেয়াদ উত্তীর্ণ ট্রেড লাইসেন্স</a></li>
                        </ul>
                    </li>
                    <li><a href="#" aria-expanded="false" class="has-arrow">ওয়ারিশ সনদের আবেদন</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('New_warish_abedon')}}">নতুন আবেদনকারীগন</a></li>
                            <li><a href="{{route('warish_sonod_abedon.index')}}">সনদ গ্রহণকারীগন</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="three-column">
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">অন্যান্য সেবাসমূহ</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('others_sonod_abedon.index')}}">নতুন আবেদনকারীগন</a></li>
                    <li></li>
                    <li></li>
                    <li><a href="{{url('mrittu_sonod_dash')}}">মৃত্যু সনদ তালিকা</a></li>
                    <li><a href="{{url('charitrik_sonod_dash')}}">চারিত্রিক সনদ তালিকা</a></li>
                    <li><a href="{{url('obibahito_sonod_dash')}}">অবিবাহিত সনদ</a></li>
                    <li><a href="{{url('vumihin_sonod_dash')}}">ভূমিহীন সনদ তালিকা</a></li>
                    <li><a href="{{url('pun_bibah_na_sonod_dash')}}">পুনঃ বিবাহ না হওয়া সনদ তালিকা</a></li>
                    <li><a href="{{url('barshik_ay')}}">বার্ষিক আয়ের প্রত্যয়ন তালিকা</a></li>
                    <li><a href="{{url('aki_namer_talika')}}">একই নামের প্রত্যয়ন তালিকা</a></li>
                    <li><a href="{{url('bak_srobon_protibondhi_dash')}}">প্রকৃত বাকঁ ও শ্রবন প্রতিবন্ধী তালিকা</a></li>
                    <li><a href="{{url('sonaton_dhormo_dash')}}">সনাতন ধর্ম  অবলম্বী তালিকা</a></li>
                    <li><a href="{{url('onumoti_porto_dash')}}">অনুমতি পত্র তালিকা</a></li>
                    <li><a href="{{url('prottyon_potro_dash')}}">প্রত্যয়ন পত্র তালিকা</a></li>
                    <li><a href="{{url('muktijoddha_sonod_dash')}}">মুক্তিযোদ্ধা সনদ তালিকা</a></li>
                    <li><a href="{{url('muktijoddha_possho_sonod_dash')}}">মুক্তিযোদ্ধা পোষ্য সনদ তালিকা</a></li>
                </ul>
            </li>
            <li class="three-column">
                <a class="has-arrow" href="{{route('mamla.create')}}" aria-expanded="false"><i class="glyphicon glyphicon-tags"></i><span class="hide-menu">মামলার নোটিশ তৈরি </span></a>

            </li>
            <li>
                <a class="has-arrow " href="{{route('registrationForm')}}" aria-expanded="false"><i class="fa fa-paper-plane"></i><span class="hide-menu">রেজিস্ট্রেশন ফরম</span></a>

            </li>
            <li>
                <a class="has-arrow " href="{{route('public')}}" aria-expanded="false"><i class="fa fa-paper-plane"></i><span class="hide-menu">পাবলিক</span></a>

            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="glyphicon glyphicon-tags"></i><span class="hide-menu">কর
									</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#" aria-expanded="false" class="has-arrow">কর আদায়</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('tax.create')}}">হোল্ডিং টেক্স</a></li>
                            <li><a href="{{route('trade_license_tax.create')}}">ট্রেড লাইসেন্স কর</a></li>
                            <li><a href="{{route('banijjik_tax.create')}}">বাণিজ্যিক কর</a></li>
                            <li><a href="{{route('business_tax.create')}}">ব্যবসায়ী কর</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('tax_assesment_form')}}" aria-expanded="false">ট্যাক্স এ্যাসেসমেন্ট ফরম</a></li>

                    <li><a href="#" aria-expanded="false" class="has-arrow">টেক্সধারীদের তালিকা</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('holding_tax_dhariTalika')}}">হোল্ডিং টেক্সধারীদের তালিকা</a></li>
                            <li><a href="{{route('banijjik_tax_dhari_talika')}}">বাণিজ্যিক টেক্সধারীদের তালিকা</a></li>
                            <li><a href="{{route('business_tax_dhari_talika')}}">ব্যবসায়ী টেক্সধারীদের তালিকা</a></li>
                        </ul>
                    </li>
                    <li><a href="#" aria-expanded="false" class="has-arrow">কর অনাদায়ী তালিকা</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('holding_tax_onadayeTalika')}}">হোল্ডিং টেক্স অনাদায়ী তালিকা</a></li>
                            <li><a href="{{route('banijjik_tax_onadayeTalika')}}">বাণিজ্যিক টেক্স অনাদায়ী তালিকা</a></li>
                            <li><a href="{{route('business_tax_onadayeTalika')}}">ব্যবসায়ী টেক্স অনাদায়ী তালিকা</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="glyphicon glyphicon-edit"></i><span class="hide-menu">দৈনিক হিসাব</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">দৈনিক জমা</a></li>
                    <li><a href="#">দৈনিক খরচ</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="glyphicon glyphicon-edit"></i><span class="hide-menu">সেটআপ মেনু</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('trade_license_tax_fee')}}">ব্যবসায়ী কর নির্ধারণ</a></li>
                    <li><a href="{{route('holdingTaxFee.create')}}">বসতভিটার ফি নির্ধারণ</a></li>
                    {{--<li><a href="table-footable.html">আয়ের মূল খাত </a></li>--}}
                    {{--<li><a href="table-jsgrid.html">আয়ের আনুসাঙ্গিক খাত</a></li>--}}
                    {{--<li><a href="table-responsive.html">খরচের মূল খাত</a></li>--}}
                    {{--<li><a href="table-bootstrap.html">খরচের আনুসাঙ্গিক খাত</a></li>--}}
                    <li><a href="{{route('upmember.create')}}">ইউনিয়ন পরিষদ সদস্য যোগ করুন</a></li>
                    <li><a href="{{route('bosotVitarDhoron.create')}}">বসতভিটার ধরন</a></li>
                    <li><a href="{{route('occupation.create')}}">পেশা</a></li>
                    <li><a href="{{route('taxClass.create')}}">করের শ্রেণী</a></li>
                    <li><a href="{{route('education.create')}}">শিক্ষাগত যোগ্যতা</a></li>
                    <li><a href="{{route('familyClass.create')}}">পরিবারের শ্রেণী</a></li>
                    <li><a href="{{route('doridro.create')}}">দরিদ্র/হতদরিদ্র শ্রেণী</a></li>
                    <li><a href="{{route('sanitationDhoron.create')}}">স্যানিটেশনের ধরন</a></li>
                </ul>
            </li>
            <li class="nav-devider"></li>
            <li class="one-column">
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">রেজিস্ট্রেশন</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('roleCreate')}}">রোল তৈরি করুন</a></li>
                    <li><a href="{{route('userCreate')}}">অ্যাডমিন তৈরি করুন</a></li>
                    <li><a href="{{route('userList')}}">অ্যাডমিনের তালিকা</a></li>
                    <li><a href="{{route('publicCreate')}}">পাবলিক ইউজার তৈরি করুন</a></li>
                </ul>
            <li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>