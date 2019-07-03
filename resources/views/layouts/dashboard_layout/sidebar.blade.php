<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav" >
        <ul id="sidebarnav">
            <li class="nav-small-cap">PERSONAL</li>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">ড্যাশবোর্ড </span></a>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">আবেদন ফরম
									</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('nagorikFormDash')}}" aria-expanded="false" >নাগরিক আবেদন</a>

                    </li>
                    <li><a href="#" aria-expanded="false" >ট্রেড লাইসেন্স আবেদন</a>

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
                <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">অন্যান্য সেবাসমূহ</span></a>
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
                <a class="has-arrow" href="{{route('mamla.create')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">মামলার নোটিশ তৈরি </span></a>

            </li>

            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-gears"></i><span class="hide-menu">কর</span></a>

                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('tax.create')}}" aria-expanded="false">কর আদায় </a></li>
                    <li><a href="#" aria-expanded="false">ট্যাক্স এ্যাসেসমেন্ট ফরম</a></li>

                    <li><a href="#" aria-expanded="false" class="has-arrow">টেক্সধারীদের তালিকা</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('New_TradeLicense_abedon')}}">হোল্ডিং টেক্সধারীদের তালিকা</a></li>
                            <li><a href="{{route('trade_license_abedon.index')}}">বাণিজ্যিক টেক্সধারীদের তালিকা</a></li>
                            <li><a href="{{route('nagorik_abedon.index')}}">ব্যবসায়ী টেক্সধারীদের তালিকা</a></li>
                        </ul>
                    </li>
                    <li><a href="#" aria-expanded="false" class="has-arrow">কর অনাদায়ী তালিকা</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('New_TradeLicense_abedon')}}">হোল্ডিং টেক্স অনাদায়ী তালিকা</a></li>
                            <li><a href="{{route('trade_license_abedon.index')}}">বাণিজ্যিক টেক্স অনাদায়ী তালিকা</a></li>
                            <li><a href="{{route('nagorik_abedon.index')}}">ব্যবসায়ী টেক্স অনাদায়ী তালিকা</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="table-basic.html">Basic Tables</a></li>
                    <li><a href="table-layout.html">Table Layouts</a></li>
                    <li><a href="table-data-table.html">Data Tables</a></li>
                    <li><a href="table-footable.html">Footable</a></li>
                    <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                    <li><a href="table-responsive.html">Responsive Table</a></li>
                    <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                    <li><a href="table-editable-table.html">Editable Table</a></li>
                </ul>
            </li>
            <li class="nav-devider"></li>
            <li class="nav-small-cap">EXTRA COMPONENTS</li>
            <li class="two-column">
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Pages</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="starter-kit.html">Starter Kit</a></li>
                    <li><a href="pages-profile.html">Profile page</a></li>
                    <li><a href="pages-animation.html">Animation</a></li>
                    <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                    <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                    <li><a href="pages-invoice.html">Invoice</a></li>
                    <li><a href="pages-treeview.html">Treeview</a></li>
                    <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                    <li><a href="pages-search-result.html">Search result</a></li>
                    <li><a href="pages-scroll.html">Scrollbar</a></li>
                    <li><a href="pages-pricing.html">Pricing</a></li>
                    <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                    <li><a href="pages-gallery.html">Gallery</a></li>
                    <li><a href="pages-faq.html">Faqs</a></li>
                    <li><a href="#" class="has-arrow">Error Pages</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="pages-error-400.html">400</a></li>
                            <li><a href="pages-error-403.html">403</a></li>
                            <li><a href="pages-error-404.html">404</a></li>
                            <li><a href="pages-error-500.html">500</a></li>
                            <li><a href="pages-error-503.html">503</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="has-arrow">Authentication <span class="label label-rounded label-success">6</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="pages-login.html">Login 1</a></li>
                            <li><a href="pages-login-2.html">Login 2</a></li>
                            <li><a href="pages-register.html">Register</a></li>
                            <li><a href="pages-register2.html">Register 2</a></li>
                            <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                            <li><a href="pages-recover-password.html">Recover password</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Extra</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false">Widgets</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="widget-apps.html">Widget Apps</a></li>
                            <li><a href="widget-data.html">Widget Data</a></li>
                            <li><a href="widget-charts.html">Widget Charts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false">Maps</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="map-google.html">Google Maps</a></li>
                            <li><a href="map-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false">Icons</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="icon-material.html">Material Icons</a></li>
                            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                            <li><a href="icon-themify.html">Themify Icons</a></li>
                            <li><a href="icon-linea.html">Linea Icons</a></li>
                            <li><a href="icon-weather.html">Weather Icons</a></li>
                            <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                            <li><a href="icon-flag.html">Flag Icons</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow " href="#" aria-expanded="false">Charts</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="chart-morris.html">Morris Chart</a></li>
                            <li><a href="chart-chartist.html">Chartis Chart</a></li>
                            <li><a href="chart-echart.html">Echarts</a></li>
                            <li><a href="chart-flot.html">Flot Chart</a></li>
                            <li><a href="chart-knob.html">Knob Chart</a></li>
                            <li><a href="chart-chart-js.html">Chartjs</a></li>
                            <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                            <li><a href="chart-extra-chart.html">Extra chart</a></li>
                            <li><a href="chart-peity.html">Peity Charts</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">item 1.1</a></li>
                    <li><a href="#">item 1.2</a></li>
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">item 1.3.1</a></li>
                            <li><a href="#">item 1.3.2</a></li>
                            <li><a href="#">item 1.3.3</a></li>
                            <li><a href="#">item 1.3.4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">item 1.4</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>