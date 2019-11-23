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

Route::get('/', 'FrontEndController@index')->name('home');

Auth::routes();

//Route::group(['middleware' => ['auth','except'=>'role:public']], function() {
//
//});


Route::get('/admin', 'HomeController@index')->name('admin');
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
Route::resource('banijjik_tax', 'BanijjikTaxController');
Route::resource('doridro', 'DoridroController');
Route::resource('sanitationDhoron', 'SanitationDhoronController');
Route::resource('upmember', 'UPmemberController');


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

//nagorikValueRegfrom
Route::post('nagorikValueRegfrom','NagorikAbedonController@nagorikValueRegfrom')->name('nagorikValueRegfrom');
//nagorikSonodPrint
Route::post('nagorikSonodPrint','NagorikAbedonController@nagorikSonodPrint')->name('nagorikSonodPrint');

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

//Route::get('asif',function (){
//    return view('pages.aaaa');
//});
Route::get('aaa','NagorikAbedonController@aaa')->name('aaa');

Route::post('mamlaShow','MamlaController@mamlaShow')->name('mamlaShow');

//bosot_kor_aday_table_ajax
Route::post('bosot_kor_aday','TaxController@bosot_kor_aday')->name('bosot_kor_aday');

//bosot_member_no
Route::post('bosot_member_no','TaxController@bosot_member_no')->name('bosot_member_no');

//trade_license_tax
Route::get('trade_license_tax','TaxController@trade_license_tax')->name('trade_license_tax');


Route::get('tax/holding_tax_pay/{holding}/{word}/{member}/{tax_amount}','TaxController@holding_tax_pay')->name('holding_tax_pay');
Route::get('trade_license_tax/tradeLicense_tax_pay/{taxid}/{word_no}/{dokan}/{tax_amount}/{btalikaNo}','TradeLicenseTaxController@tradeLicense_tax_pay')->name('tradeLicense_tax_pay');

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

//sanitationShow
Route::post('sanitationShow','SanitationDhoronController@sanitationShow')->name('sanitationShow');

//sanitation_name
Route::post('sanitation_name','SanitationDhoronController@sanitation_name')->name('sanitation_name');

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
Route::post('trade_license_kor_aday','TradeLicenseTaxController@trade_license_kor_aday')->name('trade_license_kor_aday');

//trade_license_tax_fee
Route::get('trade_license_tax_fee','TradeLicenseTaxController@trade_license_tax_fee')->name('trade_license_tax_fee');

//tradeLicenseFeestore
Route::post('tradeLicenseFeestore','TradeLicenseTaxController@tradeLicenseFeestore')->name('tradeLicenseFeestore');

//tradeLienseType_name
Route::post('tradeLienseType_name','TradeLicenseTaxController@tradeLienseType_name')->name('tradeLienseType_name');

//tradeLicenseFeeShow
Route::post('tradeLicenseFeeShow','TradeLicenseTaxController@tradeLicenseFeeShow')->name('tradeLicenseFeeShow');

//tradeTax_amount
Route::post('tradeTax_amount','TradeLicenseAbedonController@tradeTax_amount')->name('tradeTax_amount');

//trade_license_tax_payment
Route::post('trade_license_tax_payment','TradeLicenseTaxController@trade_license_tax_payment')->name('trade_license_tax_payment');

//tradeLcense_tax_pay_list
Route::post('tradeLcense_tax_pay_list','TradeLicenseTaxController@tradeLcense_tax_pay_list')->name('tradeLcense_tax_pay_list');

//doridroShow
Route::post('doridroShow','DoridroController@doridroShow')->name('doridroShow');
Route::post('hotoDoridroShow','DoridroController@hotoDoridroShow')->name('hotoDoridroShow');


// Banijjik Kor
Route::group(['prefix'=>'kor/banijjikkor'],function () {

    Route::resource('banijjik_tax', 'BanijjikTaxController');
    Route::post('banijjik_kor_aday','BanijjikTaxController@banijjik_kor_aday')->name('banijjik_kor_aday');
    Route::get('banijjik_tax/banijjik_holding_tax_pay/{holding_no}/{word_no}/{tax_amount}','BanijjikTaxController@banijjik_holding_tax_pay')->name('banijjik_holding_tax_pay');
    Route::post('banijjik_tax_payment','BanijjikTaxController@banijjik_tax_payment')->name('banijjik_tax_payment');
    Route::post('banijjik_tax_pay_list','BanijjikTaxController@banijjik_tax_pay_list')->name('banijjik_tax_pay_list');

});

// Tax Dhari Talika
Route::group(['prefix'=>'kor/tax_dhari/'],function () {

    Route::get('holding_tax_dhariTalika','TaxController@HoldingtaxDhariTalika')->name('holding_tax_dhariTalika');
    Route::post('taxDhariTalika','TaxController@HoldingtaxDhariTalikaShow')->name('taxDhariTalika');
    Route::get('holding_Tax_print/{word_no}','TaxController@holding_Tax_print');

    Route::get('banijjik_tax_dhari_talika','BanijjikTaxController@banijjik_tax_dhari_talika')->name('banijjik_tax_dhari_talika');
    Route::post('banijjikTaxDhariTalika','BanijjikTaxController@banijjikTaxDhariTalika')->name('banijjikTaxDhariTalika');
    Route::get('banijjik_Tax_print/{word_no}','BanijjikTaxController@banijjik_Tax_print')->name('banijjik_Tax_print');

    Route::get('business_tax_dhari_talika','BusinessTaxController@business_tax_dhari_talika')->name('business_tax_dhari_talika');
    Route::post('BusinesstaxDhariTalika','BusinessTaxController@BusinesstaxDhariTalika')->name('BusinesstaxDhariTalika');
    Route::get('business_Tax_print/{word_no}','BusinessTaxController@business_Tax_print')->name('business_Tax_print');

});
//tax_onadayeTalika
Route::group(['prefix'=>'kor/tax_onadaye/'],function () {

    Route::get('holding_tax_onadayeTalika','TaxController@holding_tax_onadayeTalika')->name('holding_tax_onadayeTalika');
    Route::post('taxOandayeTalikaShow','TaxController@taxOandayeTalikaShow')->name('taxOandayeTalikaShow');
    Route::get('holding_Tax_onadaye_print/{word_no}/{last_tax_pay_date}','TaxController@holding_Tax_onadaye_print');

    Route::get('banijjik_tax_onadayeTalika','BanijjikTaxController@banijjik_tax_onadayeTalika')->name('banijjik_tax_onadayeTalika');
    Route::post('BanijjiktaxOandayeTalikaShow','BanijjikTaxController@BanijjiktaxOandayeTalikaShow')->name('BanijjiktaxOandayeTalikaShow');
    Route::get('banijjik_Tax_onadaye_print/{word_no}/{last_tax_pay_date}','BanijjikTaxController@banijjik_Tax_onadaye_print')->name('banijjik_Tax_onadaye_print');

    Route::get('business_tax_onadayeTalika','BusinessTaxController@business_tax_onadayeTalika')->name('business_tax_onadayeTalika');
    Route::post('BusinesstaxOandayeTalikaShow','BusinessTaxController@BusinesstaxOandayeTalikaShow')->name('BusinesstaxOandayeTalikaShow');
    Route::get('business_Tax_onadaye_print/{word_no}/{last_tax_pay_date}','BusinessTaxController@business_Tax_onadaye_print')->name('business_Tax_onadaye_print');

});

// Business tax
Route::group(['prefix'=>'kor/business'],function () {

    Route::resource('business_tax', 'BusinessTaxController');
    Route::post('business_kor_aday', 'BusinessTaxController@business_kor_aday')->name('business_kor_aday');
    Route::get('business_tax/business_tax_pay/{holding_no}/{word_no}/{roomNo}/{tax_amount}','BusinessTaxController@business_tax_pay')->name('business_tax_pay');
    Route::post('business_tax_payment','BusinessTaxController@business_tax_payment')->name('business_tax_payment');
    Route::post('business_tax_pay_list','BusinessTaxController@business_tax_pay_list')->name('business_tax_pay_list');


});

//front end SDG
Route::group(['prefix'=>'sdc'],function () {


    Route::get('sdgDesignFrontEnd','FrontEndController@sdgDesignFrontEnd')->name('sdgDesignFrontEnd');


    Route::get('doridroPoribar','sdc\SdcDoridroPoribarController@sdcDoridroPoribar')->name('sdcDoridroPoribar');
    Route::post('sdcDoridroShow','sdc\SdcDoridroPoribarController@sdcDoridroShow')->name('sdcDoridroShow');
    Route::get('sdcDoridroChart','sdc\SdcDoridroPoribarController@sdcDoridroChart')->name('sdcDoridroChart');

    Route::get('sdchotoDoridroPoribar','sdc\SdcDoridroPoribarController@sdchotoDoridroPoribar')->name('sdchotoDoridroPoribar');
    Route::post('sdchotoDoridroShow','sdc\SdcDoridroPoribarController@sdchotoDoridroShow')->name('sdchotoDoridroShow');
    Route::get('sdcHotoDoridroChart','sdc\SdcDoridroPoribarController@sdcHotoDoridroChart')->name('sdcHotoDoridroChart');

    Route::get('sdcOldVataGrohonkari','sdc\OldVataController@sdcOldVataGrohonkari')->name('sdcOldVataGrohonkari');
    Route::post('sdcOldVataGrohonShow','sdc\OldVataController@sdcOldVataGrohonShow')->name('sdcOldVataGrohonShow');
    Route::get('sdcOldVataGrohonChart','sdc\OldVataController@sdcOldVataGrohonChart')->name('sdcOldVataGrohonChart');

    Route::get('sdcOldVataBonchito','sdc\OldVataController@sdcOldVataBonchito')->name('sdcOldVataBonchito');
    Route::post('sdcOldVataBonchitoShow','sdc\OldVataController@sdcOldVataBonchitoShow')->name('sdcOldVataBonchitoShow');
    Route::get('sdcOldVataBonchitoChart','sdc\OldVataController@sdcOldVataBonchitoChart')->name('sdcOldVataBonchitoChart');

    Route::get('sdcOldVataJoggoBonchito','sdc\OldVataController@sdcOldVataJoggoBonchito')->name('sdcOldVataJoggoBonchito');
    Route::post('sdcOldVataJoggoBonchitoShow','sdc\OldVataController@sdcOldVataJoggoBonchitoShow')->name('sdcOldVataJoggoBonchitoShow');
    Route::get('sdcOldVataJoggoBonchitoChart','sdc\OldVataController@sdcOldVataJoggoBonchitoChart')->name('sdcOldVataJoggoBonchitoChart');

    Route::get('sdc0To5AgeNoBirthCerShishu','sdc\ZeroToFiveAgeController@sdc0To5AgeNoBirthCerShishu')->name('sdc0To5AgeNoBirthCerShishu');
    Route::post('sdc0To5AgeNoBirthCerShishuShow','sdc\ZeroToFiveAgeController@sdc0To5AgeNoBirthCerShishuShow')->name('sdc0To5AgeNoBirthCerShishuShow');
    Route::get('sdc0To5AgeNoBirthCerShishuChart','sdc\ZeroToFiveAgeController@sdc0To5AgeNoBirthCerShishuChart')->name('sdc0To5AgeNoBirthCerShishuChart');

    Route::get('sdc0To5AgeKhorbitoShishu','sdc\ZeroToFiveAgeController@sdc0To5AgeKhorbitoShishu')->name('sdc0To5AgeKhorbitoShishu');
    Route::post('sdc0To5AgeKhorbitoShishuShow','sdc\ZeroToFiveAgeController@sdc0To5AgeKhorbitoShishuShow')->name('sdc0To5AgeKhorbitoShishuShow');
    Route::get('sdcKhorbitoShishuChart','sdc\ZeroToFiveAgeController@sdcKhorbitoShishuChart')->name('sdcKhorbitoShishuChart');

    Route::get('sdcBidhobaVataGrohon','sdc\SdcBidhobaController@sdcBidhobaVataGrohon')->name('sdcBidhobaVataGrohon');
    Route::post('sdcBidhobaVataGrohonShow','sdc\SdcBidhobaController@sdcBidhobaVataGrohonShow')->name('sdcBidhobaVataGrohonShow');
    Route::get('sdcBidhobaVataGrohonChart','sdc\SdcBidhobaController@sdcBidhobaVataGrohonChart')->name('sdcBidhobaVataGrohonChart');

    Route::get('sdcBidhobaVataBonchito','sdc\SdcBidhobaController@sdcBidhobaVataBonchito')->name('sdcBidhobaVataBonchito');
    Route::post('sdcBidhobaVataBonchitoShow','sdc\SdcBidhobaController@sdcBidhobaVataBonchitoShow')->name('sdcBidhobaVataBonchitoShow');
    Route::get('sdcBidhobaVataBonchitoChart','sdc\SdcBidhobaController@sdcBidhobaVataBonchitoChart')->name('sdcBidhobaVataBonchitoChart');

    Route::get('sdcBiddutGrohon','sdc\SdcBiddutController@sdcBiddutGrohon')->name('sdcBiddutGrohon');
    Route::post('sdcBiddutGrohonShow','sdc\SdcBiddutController@sdcBiddutGrohonShow')->name('sdcBiddutGrohonShow');
    Route::get('sdcBiddutGrohonChart','sdc\SdcBiddutController@sdcBiddutGrohonChart')->name('sdcBiddutGrohonChart');

    Route::get('sdcBiddutBonchito','sdc\SdcBiddutController@sdcBiddutBonchito')->name('sdcBiddutBonchito');
    Route::Post('sdcBiddutBonchitoShow','sdc\SdcBiddutController@sdcBiddutBonchitoShow')->name('sdcBiddutBonchitoShow');
    Route::get('sdcBiddutBonchitoChart','sdc\SdcBiddutController@sdcBiddutBonchitoChart')->name('sdcBiddutBonchitoChart');

    Route::get('sdc15To29EduBekar','sdc\SdcBekar15To29Controller@sdc15To29EduBekar')->name('sdc15To29EduBekar');
    Route::post('sdc15To29EduBekarShow','sdc\SdcBekar15To29Controller@sdc15To29EduBekarShow')->name('sdc15To29EduBekarShow');
    Route::get('sdc15To29EduBekarChart','sdc\SdcBekar15To29Controller@sdc15To29EduBekarChart')->name('sdc15To29EduBekarChart');

    Route::get('sdc15To29UnEduBekarChart','sdc\SdcBekar15To29Controller@sdc15To29UnEduBekarChart')->name('sdc15To29UnEduBekarChart');
    Route::post('sdc15To29UnEduBekarShow','sdc\SdcBekar15To29Controller@sdc15To29UnEduBekarShow')->name('sdc15To29UnEduBekarShow');
    Route::get('sdc15To29UnEduBekar','sdc\SdcBekar15To29Controller@sdc15To29UnEduBekar')->name('sdc15To29UnEduBekar');

    Route::get('sdcNirapodPani','sdc\SdcNirapodPaniController@sdcNirapodPani')->name('sdcNirapodPani');
    Route::Post('sdcNirapodPaniPanShow','sdc\SdcNirapodPaniController@sdcNirapodPaniPanShow')->name('sdcNirapodPaniPanShow');
    Route::get('sdcNirapodPaniPanChart','sdc\SdcNirapodPaniController@sdcNirapodPaniPanChart')->name('sdcNirapodPaniPanChart');

    Route::get('sdcNirapodPaniNaPan','sdc\SdcNirapodPaniController@sdcNirapodPaniNaPan')->name('sdcNirapodPaniNaPan');
    Route::post('sdcNirapodPaniNaPanShow','sdc\SdcNirapodPaniController@sdcNirapodPaniNaPanShow')->name('sdcNirapodPaniNaPanShow');
    Route::get('sdcNirapodPaniNaPanChart','sdc\SdcNirapodPaniController@sdcNirapodPaniNaPanChart')->name('sdcNirapodPaniNaPanChart');

    Route::get('sdcInternetHa','sdc\SdcInternetController@sdcInternetHa')->name('sdcInternetHa');
    Route::post('sdcInternetHaShow','sdc\SdcInternetController@sdcInternetHaShow')->name('sdcInternetHaShow');
    Route::get('sdcInternetHaChart','sdc\SdcInternetController@sdcInternetHaChart')->name('sdcInternetHaChart');

    Route::get('sdcInternetNa','sdc\SdcInternetController@sdcInternetNa')->name('sdcInternetNa');
    Route::post('sdcInternetNaShow','sdc\SdcInternetController@sdcInternetNaShow')->name('sdcInternetNaShow');
    Route::get('sdcInternetNaChart','sdc\SdcInternetController@sdcInternetNaChart')->name('sdcInternetNaChart');

    Route::get('sdcSanitationHa','sdc\SdcSanitationController@sdcSanitationHa')->name('sdcSanitationHa');
    Route::post('sdcSanitationHaShow','sdc\SdcSanitationController@sdcSanitationHaShow')->name('sdcSanitationHaShow');
    Route::get('sdcSanitationHaChart','sdc\SdcSanitationController@sdcSanitationHaChart')->name('sdcSanitationHaChart');

    Route::get('sdcSanitationNa','sdc\SdcSanitationController@sdcSanitationNa')->name('sdcSanitationNa');
    Route::post('sdcSanitationNaShow','sdc\SdcSanitationController@sdcSanitationNaShow')->name('sdcSanitationNaShow');
    Route::get('sdcSanitationNaChart','sdc\SdcSanitationController@sdcSanitationNaChart')->name('sdcSanitationNaChart');

    Route::get('sdcPrithokSanitationHa','sdc\SdcSanitationController@sdcPrithokSanitationHa')->name('sdcPrithokSanitationHa');
    Route::post('sdcPrithokSanitationHaShow','sdc\SdcSanitationController@sdcPrithokSanitationHaShow')->name('sdcPrithokSanitationHaShow');
    Route::get('sdcPrithokSanitationHaChart','sdc\SdcSanitationController@sdcPrithokSanitationHaChart')->name('sdcPrithokSanitationHaChart');

    Route::post('sdcPrithokSanitationNaShow','sdc\SdcSanitationController@sdcPrithokSanitationNaShow')->name('sdcPrithokSanitationNaShow');
    Route::get('sdcPrithokSanitationNa','sdc\SdcSanitationController@sdcPrithokSanitationNa')->name('sdcPrithokSanitationNa');
    Route::get('sdcPrithokSanitationNaChart','sdc\SdcSanitationController@sdcPrithokSanitationNaChart')->name('sdcPrithokSanitationNaChart');

    Route::get('sdcSanitationDhoron','sdc\SdcSanitationController@sdcSanitationDhoron')->name('sdcSanitationDhoron');
    Route::post('sdcSanitationDhoronShow','sdc\SdcSanitationController@sdcSanitationDhoronShow')->name('sdcSanitationDhoronShow');
    Route::post('sdcSanitationDhoronChart','sdc\SdcSanitationController@sdcSanitationDhoronChart')->name('sdcSanitationDhoronChart');

    Route::get('sdcMashikAy','sdc\SdcMashikAyController@sdcMashikAy')->name('sdcMashikAy');
    Route::post('sdcMashikAyShow','sdc\SdcMashikAyController@sdcMashikAyShow')->name('sdcMashikAyShow');

    Route::get('sdcVumihin','sdc\SdcVumihinController@sdcVumihin')->name('sdcVumihin');
    Route::post('sdcVumihinShow','sdc\SdcVumihinController@sdcVumihinShow')->name('sdcVumihinShow');
    Route::get('sdcVumihinChart','sdc\SdcVumihinController@sdcVumihinChart')->name('sdcVumihinChart');

    Route::get('sdcNariKormojibi','sdc\SdcNariKormojibiController@sdcNariKormojibi')->name('sdcNariKormojibi');
    Route::post('sdcNariKormojibiShow','sdc\SdcNariKormojibiController@sdcNariKormojibiShow')->name('sdcNariKormojibiShow');
    Route::get('sdcNariKormojibiChart','sdc\SdcNariKormojibiController@sdcNariKormojibiChart')->name('sdcNariKormojibiChart');

    Route::get('sdc14To18Nari','sdc\SdcNariKormojibiController@sdc14To18Nari')->name('sdc14To18Nari');
    Route::post('sdc14To18NariShow','sdc\SdcNariKormojibiController@sdc14To18NariShow')->name('sdc14To18NariShow');
    Route::get('sdc14To18NariChart','sdc\SdcNariKormojibiController@sdc14To18NariChart')->name('sdc14To18NariChart');

    Route::get('sdcPeshajibi','sdc\SdcPeshajibiController@sdcPeshajibi')->name('sdcPeshajibi');
    Route::post('sdcPeshajibiShow','sdc\SdcPeshajibiController@sdcPeshajibiShow')->name('sdcPeshajibiShow');

    Route::get('sdcEducation','sdc\SdcEducationController@sdcEducation')->name('sdcEducation');
    Route::post('sdcEducationShow','sdc\SdcEducationController@sdcEducationShow')->name('sdcEducationShow');

    Route::get('sdcFreelancer','sdc\SdcFreelancerController@sdcFreelancer')->name('sdcFreelancer');
    Route::post('sdcFreelancerShow','sdc\SdcFreelancerController@sdcFreelancerShow')->name('sdcFreelancerShow');
    Route::get('sdcFreelancerChart','sdc\SdcFreelancerController@sdcFreelancerChart')->name('sdcFreelancerChart');

    Route::get('sdcProbashi','sdc\SdcProbashiController@sdcProbashi')->name('sdcProbashi');
    Route::post('sdcProbashiShow','sdc\SdcProbashiController@sdcProbashiShow')->name('sdcProbashiShow');
    Route::get('sdcProbashiChart','sdc\SdcProbashiController@sdcProbashiChart')->name('sdcProbashiChart');

    Route::get('sdcBloodGroup','sdc\SdcBloodGroupController@sdcBloodGroup')->name('sdcBloodGroup');
    Route::post('sdcBloodGroupShow','sdc\SdcBloodGroupController@sdcBloodGroupShow')->name('sdcBloodGroupShow');

    Route::get('sdcNirokkhor15To45','sdc\SdcNirokkhor15To45Controller@sdcNirokkhor15To45')->name('sdcNirokkhor15To45');
    Route::get('sdc15To45NirokkhorChart','sdc\SdcNirokkhor15To45Controller@sdc15To45NirokkhorChart')->name('sdc15To45NirokkhorChart');
    Route::post('sdcNirokkhor15To45Show','sdc\SdcNirokkhor15To45Controller@sdcNirokkhor15To45Show')->name('sdcNirokkhor15To45Show');



});

Route::get('registrationForm','TaxController@registrationForm')->name('registrationForm');

Route::group(['prefix'=>'sonodPortoJachayholding_tax_pay'],function () {

    //unionHoldingTaxVerify
    Route::get('sonodHoldingTaxVerify','sonodPortoJachay\SonodHoldingTaxVerifyController@sonodHoldingTaxVerify')->name('sonodHoldingTaxVerify');
    Route::get('front/holding_tax_pay/{holding}/{word}/{member}/{tax_amount}','sonodPortoJachay\SonodHoldingTaxVerifyController@holding_tax_pay')->name('front/holding_tax_pay');
    Route::post('front/holding_tax_payment','sonodPortoJachay\SonodHoldingTaxVerifyController@holding_tax_payment')->name('front/holding_tax_payment');

});


Route::post('upmemberShow','UPmemberController@upmemberShow')->name('upmemberShow');
//upMemberInfo
Route::get('upMemberInfo/{id}','UPmemberController@upMemberInfo')->name('upMemberInfo');

// admin registration
Route::group(['prefix'=>'admin/registration','middleware' => ['auth']],function () {

    Route::get('roleCreate','AdminRegistrationController@roleCreate')->name('roleCreate');
    Route::post('adminCreate','AdminRegistrationController@adminCreate')->name('adminCreate');
    Route::get('userCreate','AdminRegistrationController@userCreate')->name('userCreate');
    Route::post('roleShow','AdminRegistrationController@roleShow')->name('roleShow');
    Route::get('userList','AdminRegistrationController@userList')->name('userList');
    Route::post('userListShow','AdminRegistrationController@userListShow')->name('userListShow');
    Route::get('rolePermissionEdit/{id}','AdminRegistrationController@rolePermissionEdit')->name('rolePermissionEdit');
    Route::post('adminUpdate/{id}','AdminRegistrationController@adminUpdate')->name('adminUpdate');
    Route::post('userAuthCreate','AdminRegistrationController@userAuthCreate')->name('userAuthCreate');

    Route::get('publicCreate','AdminRegistrationController@publicCreate')->name('publicCreate');
    Route::post('publicReg','AdminRegistrationController@publicReg')->name('publicReg');
    Route::post('userPublicCreate','AdminRegistrationController@userPublicCreate')->name('userPublicCreate');

});

Route::get('frontendRegistration','TaxController@frontendRegistration')->name('frontendRegistration');
Route::get('public','AdminRegistrationController@publicShow')->name('public');
Route::post('publicInfo','AdminRegistrationController@publicInfo')->name('publicInfo');
Route::get('publicStatus/{id}','AdminRegistrationController@publicStatus')->name('publicStatus');
Route::post('publicStatusChange/{id}','AdminRegistrationController@publicStatusChange')->name('publicStatusChange');


