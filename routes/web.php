<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.front_end.home');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', 'HomeController@index')->name('home');

});
    Route::resource('nagorik_abedon', 'NagorikAbedonController');
    Route::resource('trade_license_abedon', 'TradeLicenseAbedonController');
    Route::resource('warish_sonod_abedon', 'WarishSonodAbedonController');
    Route::resource('others_sonod_abedon', 'OthersSonodAbedonController');
    Route::resource('mamla', 'MamlaController');
    Route::resource('tax', 'TaxController');
    Route::resource('front/home', 'FrontEndController');
    Route::resource('bosotVitarDhoron', 'BosotVitarDhoronController');
    Route::resource('taxClass', 'TaxClassController');
    Route::resource('occupation', 'OccupationController');
    Route::resource('holdingTaxFee', 'HoldingTaxFeeController');
    Route::resource('education', 'EducationController');
    Route::resource('familyClass', 'FamilyClassController');
    Route::resource('trade_license_tax', 'TradeLicenseTaxController');



Route::get('mrittu_sonod', 'others_controller\MrittuSonodController@mrittusonod')->name('mrittu_sonod');

Route::get('charitrik_sonod', 'others_controller\CharitrikSonodController@charitrik_sonod')->name('charitrik_sonod');

Route::get('obobahito_sonod', 'others_controller\ObibahitoSonodController@obobahito_sonod')->name('obobahito_sonod');

Route::get('vumihin_sonod', 'others_controller\VumihinSonodController@vumihin_sonod')->name('vumihin_sonod');

Route::get('pun_bibah_na_howa_sonod', 'others_controller\PunBibahNaHowaSonodController@pun_bibah_na_howa_sonod')->name('pun_bibah_na_howa_sonod');

Route::get('barshik_income', 'others_controller\BarshikIncomeSonodController@barshik_income')->name('barshik_income');

Route::get('eki_name', 'others_controller\EkiNamerSonodController@eki_name')->name('eki_name');

Route::get('sonaton_dhormo', 'others_controller\SonatonDhormoSonodController@sonaton_dhormo')->name('sonaton_dhormo');

Route::get('onumoti_potro', 'others_controller\OnumotiPotroSonodController@onumoti_potro')->name('onumoti_potro');

Route::get('prottyon_potro', 'others_controller\ProttyonPotroSonodController@prottyon_potro')->name('prottyon_potro');

Route::get('muktijoddha_sonod', 'others_controller\MuktijoddhaSonodController@muktijoddha_sonod')->name('muktijoddha_sonod');

Route::get('muktijoddha_possho_sonod', 'others_controller\MuktijoddhaPosshoSonodController@muktijoddha_possho_sonod')->name('muktijoddha_possho_sonod');

Route::get('bak_srobon_protibondhi', 'others_controller\BakSrobonProtibondhiSonodController@bak_srobon_protibondhi')->name('bak_srobon_protibondhi');

//nagorik abedon new
Route::get('New_nagorik_abedon','NagorikAbedonController@New_nagorik_abedon')->name('New_nagorik_abedon');

//New_TradeLicense_abedon
Route::get('New_TradeLicense_abedon','TradeLicenseAbedonController@New_TradeLicense_abedon')->name('New_TradeLicense_abedon');

//New_warish_abedon
Route::get('New_warish_abedon','WarishSonodAbedonController@New_warish_abedon')->name('New_warish_abedon');



//abedon sonod jachay
Route::get('nagorik_abedon_jachay', 'NagorikAbedonController@nagorik_abedon_jachay');
Route::get('trade_lincense_jachay', 'TradeLicenseAbedonController@trade_lincense_jachay');

//dashboard
Route::get('mrittu_sonod_dash', 'others_controller\MrittuSonodController@mrittusonoddash')->name('mrittu_sonod_dash');
Route::get('mrittu_sonod_show/{id}', 'others_controller\MrittuSonodController@mrittusonodshow');
Route::get('mrittu_sonod_edit/{id}', 'others_controller\MrittuSonodController@mrittu_sonod_edit');


Route::get('charitrik_sonod_dash', 'others_controller\CharitrikSonodController@charitriksonoddash')->name('charitrik_sonod_dash');
Route::get('charitrik_sonod_show/{id}', 'others_controller\CharitrikSonodController@charitriksonodshow');
Route::get('charitrik_sonod_edit/{id}', 'others_controller\CharitrikSonodController@charitrik_sonod_edit');

Route::get('obibahito_sonod_dash', 'others_controller\ObibahitoSonodController@obibahitosonoddash')->name('obibahitosonoddash');
Route::get('obibahito_sonod_show/{id}', 'others_controller\ObibahitoSonodController@obibahitosonodshow');
Route::get('obibahito_sonod_edit/{id}', 'others_controller\ObibahitoSonodController@obibahito_sonod_edit');

Route::get('vumihin_sonod_dash', 'others_controller\VumihinSonodController@vumihinsonoddash')->name('vumihinsonoddash');
Route::get('vumihin_sonod_show/{id}', 'others_controller\VumihinSonodController@vumihinsonodshow');
Route::get('vumihin_sonod_edit/{id}', 'others_controller\VumihinSonodController@vumihin_sonod_edit');

Route::get('pun_bibah_na_sonod_dash', 'others_controller\PunBibahNaHowaSonodController@punbibahnasonoddash')->name('punbibahnasonoddash');
Route::get('pun_bibah_show/{id}', 'others_controller\PunBibahNaHowaSonodController@pun_bibah_show');
Route::get('pun_bibah_edit/{id}', 'others_controller\PunBibahNaHowaSonodController@pun_bibah_edit');

Route::get('barshik_ay', 'others_controller\BarshikIncomeSonodController@barshikay')->name('barshikay');
Route::get('barshik_ay_show/{id}', 'others_controller\BarshikIncomeSonodController@barshik_ay_show');
Route::get('barshik_ay_edit/{id}', 'others_controller\BarshikIncomeSonodController@barshik_ay_edit');

Route::get('aki_namer_talika', 'others_controller\EkiNamerSonodController@akinamertalika')->name('akinamertalika');
Route::get('aki_namer_show/{id}', 'others_controller\EkiNamerSonodController@aki_namer_show');
Route::get('aki_namer_edit/{id}', 'others_controller\EkiNamerSonodController@aki_namer_edit');

Route::get('bak_srobon_protibondhi_dash', 'others_controller\BakSrobonProtibondhiSonodController@baksrobonprotibondhi')->name('baksrobonprotibondhi');
Route::get('bak_srobon_show/{id}', 'others_controller\BakSrobonProtibondhiSonodController@bak_srobon_show');
Route::get('bak_srobon_edit/{id}', 'others_controller\BakSrobonProtibondhiSonodController@bak_srobon_edit');

Route::get('sonaton_dhormo_dash', 'others_controller\SonatonDhormoSonodController@sonatondhormodash')->name('sonatondhormodash');
Route::get('sonaton_dhormo_show/{id}', 'others_controller\SonatonDhormoSonodController@sonaton_dhormo_show');
Route::get('sonaton_dhormo_edit/{id}', 'others_controller\SonatonDhormoSonodController@sonaton_dhormo_edit');

Route::get('onumoti_porto_dash', 'others_controller\OnumotiPotroSonodController@onumotiportodash')->name('onumotiportodash');
Route::get('onumoti_potro_show/{id}', 'others_controller\OnumotiPotroSonodController@onumoti_potro_show');
Route::get('onumoti_potro_edit/{id}', 'others_controller\OnumotiPotroSonodController@onumoti_potro_edit');

Route::get('prottyon_potro_dash', 'others_controller\ProttyonPotroSonodController@prottyonpotrodash')->name('prottyonpotrodash');
Route::get('prottyon_potro_show/{id}', 'others_controller\ProttyonPotroSonodController@prottyon_potro_show');
Route::get('prottyon_potro_edit/{id}', 'others_controller\ProttyonPotroSonodController@prottyon_potro_edit');

Route::get('muktijoddha_sonod_dash', 'others_controller\MuktijoddhaSonodController@muktijoddhasonoddash')->name('muktijoddhasonoddash');
Route::get('muktijoddha_show/{id}', 'others_controller\MuktijoddhaSonodController@muktijoddha_show');
Route::get('muktijoddha_edit/{id}', 'others_controller\MuktijoddhaSonodController@muktijoddha_edit');

Route::get('muktijoddha_possho_sonod_dash', 'others_controller\MuktijoddhaPosshoSonodController@muktijoddhaposshosonoddash')->name('muktijoddhaposshosonoddash');
Route::get('muktijoddha_possho_show/{id}', 'others_controller\MuktijoddhaPosshoSonodController@muktijoddha_possho_show');
Route::get('muktijoddha_possho_edit/{id}', 'others_controller\MuktijoddhaPosshoSonodController@muktijoddha_possho_edit');

//ajax nagorik Abedon
Route::post('admin/nagorikNid','NagorikAbedonController@nagorikNid')->name('nagorikNid');
Route::post('agorikAbedonIndex','NagorikAbedonController@agorikAbedonIndex')->name('agorikAbedonIndex');
Route::post('NewagorikAbedonIndex','NagorikAbedonController@NewagorikAbedonIndex')->name('NewagorikAbedonIndex');

//nagorik sonod fee
Route::post('nagorikSonodFee/{id}','NagorikAbedonController@nagorikSonodFee')->name('nagorikSonodFee');
Route::get('NewNagorikSonodFeeDash/{id}','NagorikAbedonController@NewNagorikSonodFeeDash')->name('NewNagorikSonodFeeDash');

//ajax Trede License Abedon
Route::post('tradeLicenseIndex','TradeLicenseAbedonController@tradeLicenseIndex')->name('tradeLicenseIndex');
Route::post('NewTradeLicenseIndex','TradeLicenseAbedonController@NewTradeLicenseIndex')->name('NewTradeLicenseIndex');

//trade Ecomname ajax
Route::post('tradeEcomname','TradeLicenseAbedonController@tradeEcomname')->name('tradeEcomname');


//Trade License Fee

Route::get('NewTradeLicenseFeeDash/{id}','TradeLicenseAbedonController@NewTradeLicenseFeeDash')->name('NewTradeLicenseFeeDash');
Route::post('tradeFee/{id}','TradeLicenseAbedonController@tradeFee')->name('tradeFee');

//ajax Warish
Route::post('warishAbedonIndex','WarishSonodAbedonController@warishAbedonIndex')->name('warishAbedonIndex');
Route::post('NewWarishAbedonIndex','WarishSonodAbedonController@NewWarishAbedonIndex')->name('NewWarishAbedonIndex');

//Warish Sonod Fee
Route::get('NewWarishSonodFeeDash/{id}','WarishSonodAbedonController@NewWarishSonodFeeDash')->name('NewWarishSonodFeeDash');
Route::post('warishSonodFee/{id}','WarishSonodAbedonController@warishSonodFee')->name('warishSonodFee');

//Others Fee
Route::get('NewOthersFeeDash/{id}','OthersSonodAbedonController@NewOthersFeeDash')->name('NewOthersFeeDash');
Route::post('othersSonodFee/{id}','OthersSonodAbedonController@othersSonodFee')->name('othersSonodFee');


//Ajax others Abedon
Route::post('othersAbedonIndex','OthersSonodAbedonController@othersAbedonIndex')->name('othersAbedonIndex');

//Others Sonon Ajax
Route::post('akiNameAbedon','others_controller\EkiNamerSonodController@akiNameAbedon')->name('akiNameAbedon');
Route::post('bak_srobon_Abedon','others_controller\BakSrobonProtibondhiSonodController@bak_srobon_Abedon')->name('bak_srobon_Abedon');
Route::post('barshikAyAbedon','others_controller\BarshikIncomeSonodController@barshikAyAbedon')->name('barshikAyAbedon');
Route::post('charitrikAbedon','others_controller\CharitrikSonodController@charitrikAbedon')->name('charitrikAbedon');
Route::post('mrittuAbedon','others_controller\MrittuSonodController@mrittuAbedon')->name('mrittuAbedon');
Route::post('muktijoddhaPosshoAbedon','others_controller\MuktijoddhaPosshoSonodController@muktijoddhaPosshoAbedon')->name('muktijoddhaPosshoAbedon');
Route::post('muktijoddhaAbedon','others_controller\MuktijoddhaSonodController@muktijoddhaAbedon')->name('muktijoddhaAbedon');
Route::post('obibahitoAbedon','others_controller\ObibahitoSonodController@obibahitoAbedon')->name('obibahitoAbedon');
Route::post('onumotiAbedon','others_controller\OnumotiPotroSonodController@onumotiAbedon')->name('onumotiAbedon');
Route::post('prottyonAbedon','others_controller\ProttyonPotroSonodController@prottyonAbedon')->name('prottyonAbedon');
Route::post('punBibahAbedon','others_controller\PunBibahNaHowaSonodController@punBibahAbedon')->name('punBibahAbedon');
Route::post('sonatonAbedon','others_controller\SonatonDhormoSonodController@sonatonAbedon')->name('sonatonAbedon');
Route::post('vumiAbedon','others_controller\VumihinSonodController@vumiAbedon')->name('vumiAbedon');

//nagorik Mobile Ajax
Route::post('nagorikMob','NagorikAbedonController@nagorikMob')->name('nagorikMob');

//Nagorik nagorikBcno ajax
Route::post('nagorikBcno','NagorikAbedonController@nagorikBcno')->name('nagorikBcno');

//Nagorik nagorikPno ajax
Route::post('nagorikPno','NagorikAbedonController@nagorikPno')->name('nagorikPno');

//nagorikFormDash
Route::get('nagorikFormDash','NagorikAbedonController@nagorikFormDash')->name('nagorikFormDash');

Route::get('asif',function (){
    return view('pages.aaaa');
});
Route::get('aaa','NagorikAbedonController@aaa')->name('aaa');

Route::post('mamlaShow','MamlaController@mamlaShow')->name('mamlaShow');

//bosot_kor_aday_table_ajax
Route::post('bosot_kor_aday','TaxController@bosot_kor_aday')->name('bosot_kor_aday');

//bosot_member_no
Route::post('bosot_member_no','TaxController@bosot_member_no')->name('bosot_member_no');

//trade_license_tax
Route::get('trade_license_tax','TaxController@trade_license_tax')->name('trade_license_tax');

Route::get('tax/holding_tax_pay/{holding}/{word}/{member}/{tax_amount}','TaxController@holding_tax_pay')->name('holding_tax_pay');

//trade_license_form_dash
Route::get('tradelicense/form/dash','TradeLicenseAbedonController@trade_license_form_dash')->name('trade_license_form_dash');

//tax_assesment_form
Route::get('tax/assesment/form','TaxController@tax_assesment_form')->name('tax_assesment_form');

//bosotVitarDhoronShow
Route::post('bosotVitarDhoronShow','BosotVitarDhoronController@bosotVitarDhoronShow')->name('bosotVitarDhoronShow');
//bosot_vitar_name ajax
Route::post('bosot_vitar_name','BosotVitarDhoronController@bosot_vitar_name')->name('bosot_vitar_name');
//occupationShow show
Route::post('occupationShow','OccupationController@occupationShow')->name('occupationShow');
//peshar_name ajax
Route::post('peshar_name','OccupationController@peshar_name')->name('peshar_name');
//taxClassShow
Route::post('taxClassShow','TaxClassController@taxClassShow')->name('taxClassShow');
//taxClass_name ajax
Route::post('taxClass_name','TaxClassController@taxClass_name')->name('taxClass_name');
//holdingTaxFeeShow
Route::post('holdingTaxFeeShow','HoldingTaxFeeController@holdingTaxFeeShow')->name('holdingTaxFeeShow');
//bosot_vitar_fee ajax
Route::post('bosot_vitar_fee','HoldingTaxFeeController@bosot_vitar_fee')->name('bosot_vitar_fee');
//holding_tax_poriman ajax
Route::post('holding_tax_poriman','TaxController@holding_tax_poriman')->name('holding_tax_poriman');
//educationShow ajax
Route::post('educationShow','EducationController@educationShow')->name('educationShow');
//education_name ajax
Route::post('education_name','EducationController@education_name')->name('education_name');
//poribarClassShow ajax
Route::post('poribarClassShow','FamilyClassController@poribarClassShow')->name('poribarClassShow');
//poribar_class_name ajax
Route::post('poribar_class_name','FamilyClassController@poribar_class_name')->name('poribar_class_name');
//holding_tax_payment
Route::post('holding_tax_payment','TaxController@holding_tax_payment')->name('holding_tax_payment');
//taxAssesmentForm
Route::post('taxAssesmentForm','TaxController@taxAssesmentForm')->name('taxAssesmentForm');
//holding_tax_pay_list
Route::post('holding_tax_pay_list','TaxController@holding_tax_pay_list')->name('holding_tax_pay_list');
//trade_license_sonod_search ajax
Route::post('trade_license_sonod_search','TradeLicenseAbedonController@trade_license_sonod_search')->name('trade_license_sonod_search');
//trade_license_kor_aday
Route::post('trade_license_kor_aday','TradeLicenseAbedonController@trade_license_kor_aday')->name('trade_license_kor_aday');