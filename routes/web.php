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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('front/home', 'FrontEndController');


});
    Route::resource('nagorik_abedon', 'NagorikAbedonController');
    Route::resource('trade_license_abedon', 'TradeLicenseAbedonController');
    Route::resource('warish_sonod_abedon', 'WarishSonodAbedonController');
    Route::resource('others_sonod_abedon', 'OthersSonodAbedonController');
    Route::resource('mamla', 'MamlaController');


Route::get('mrittu_sonod', 'OthersSonodAbedonController@mrittusonod')->name('mrittu_sonod');
Route::get('charitrik_sonod', 'OthersSonodAbedonController@charitrik_sonod')->name('charitrik_sonod');
Route::get('obobahito_sonod', 'OthersSonodAbedonController@obobahito_sonod')->name('obobahito_sonod');
Route::get('vumihin_sonod', 'OthersSonodAbedonController@vumihin_sonod')->name('vumihin_sonod');
Route::get('pun_bibah_na_howa_sonod', 'OthersSonodAbedonController@pun_bibah_na_howa_sonod')->name('pun_bibah_na_howa_sonod');
Route::get('barshik_income', 'OthersSonodAbedonController@barshik_income')->name('barshik_income');
Route::get('eki_name', 'OthersSonodAbedonController@eki_name')->name('eki_name');
Route::get('sonaton_dhormo', 'OthersSonodAbedonController@sonaton_dhormo')->name('sonaton_dhormo');
Route::get('onumoti_potro', 'OthersSonodAbedonController@onumoti_potro')->name('onumoti_potro');
Route::get('prottyon_potro', 'OthersSonodAbedonController@prottyon_potro')->name('prottyon_potro');
Route::get('muktijoddha_sonod', 'OthersSonodAbedonController@muktijoddha_sonod')->name('muktijoddha_sonod');
Route::get('muktijoddha_possho_sonod', 'OthersSonodAbedonController@muktijoddha_possho_sonod')->name('muktijoddha_possho_sonod');
Route::get('bak_srobon_protibondhi', 'OthersSonodAbedonController@bak_srobon_protibondhi')->name('bak_srobon_protibondhi');

//nagorik abedon
Route::get('New_nagorik_abedon','NagorikAbedonController@New_nagorik_abedon')->name('New_nagorik_abedon');

//New_TradeLicense_abedon
Route::get('New_TradeLicense_abedon','TradeLicenseAbedonController@New_TradeLicense_abedon')->name('New_TradeLicense_abedon');

//New_warish_abedon
Route::get('New_warish_abedon','WarishSonodAbedonController@New_warish_abedon')->name('New_warish_abedon');



//abedon sonod jachay
Route::get('nagorik_abedon_jachay', 'NagorikAbedonController@nagorik_abedon_jachay');
Route::get('trade_lincense_jachay', 'TradeLicenseAbedonController@trade_lincense_jachay');

//dashboard
Route::get('mrittu_sonod_dash', 'OthersSonodAbedonController@mrittusonoddash')->name('mrittu_sonod_dash');
Route::get('mrittu_sonod_show/{id}', 'OthersSonodAbedonController@mrittusonodshow');
Route::get('mrittu_sonod_edit/{id}', 'OthersSonodAbedonController@mrittu_sonod_edit');


Route::get('charitrik_sonod_dash', 'OthersSonodAbedonController@charitriksonoddash')->name('charitrik_sonod_dash');
Route::get('charitrik_sonod_show/{id}', 'OthersSonodAbedonController@charitriksonodshow');
Route::get('charitrik_sonod_edit/{id}', 'OthersSonodAbedonController@charitrik_sonod_edit');

Route::get('obibahito_sonod_dash', 'OthersSonodAbedonController@obibahitosonoddash')->name('obibahitosonoddash');
Route::get('obibahito_sonod_show/{id}', 'OthersSonodAbedonController@obibahitosonodshow');
Route::get('obibahito_sonod_edit/{id}', 'OthersSonodAbedonController@obibahito_sonod_edit');

Route::get('vumihin_sonod_dash', 'OthersSonodAbedonController@vumihinsonoddash')->name('vumihinsonoddash');
Route::get('vumihin_sonod_show/{id}', 'OthersSonodAbedonController@vumihinsonodshow');
Route::get('vumihin_sonod_edit/{id}', 'OthersSonodAbedonController@vumihin_sonod_edit');

Route::get('pun_bibah_na_sonod_dash', 'OthersSonodAbedonController@punbibahnasonoddash')->name('punbibahnasonoddash');
Route::get('pun_bibah_show/{id}', 'OthersSonodAbedonController@pun_bibah_show');
Route::get('pun_bibah_edit/{id}', 'OthersSonodAbedonController@pun_bibah_edit');

Route::get('barshik_ay', 'OthersSonodAbedonController@barshikay')->name('barshikay');
Route::get('barshik_ay_show/{id}', 'OthersSonodAbedonController@barshik_ay_show');
Route::get('barshik_ay_edit/{id}', 'OthersSonodAbedonController@barshik_ay_edit');

Route::get('aki_namer_talika', 'OthersSonodAbedonController@akinamertalika')->name('akinamertalika');
Route::get('aki_namer_show/{id}', 'OthersSonodAbedonController@aki_namer_show');
Route::get('aki_namer_edit/{id}', 'OthersSonodAbedonController@aki_namer_edit');

Route::get('bak_srobon_protibondhi_dash', 'OthersSonodAbedonController@baksrobonprotibondhi')->name('baksrobonprotibondhi');
Route::get('bak_srobon_show/{id}', 'OthersSonodAbedonController@bak_srobon_show');
Route::get('bak_srobon_edit/{id}', 'OthersSonodAbedonController@bak_srobon_edit');

Route::get('sonaton_dhormo_dash', 'OthersSonodAbedonController@sonatondhormodash')->name('sonatondhormodash');
Route::get('sonaton_dhormo_show/{id}', 'OthersSonodAbedonController@sonaton_dhormo_show');
Route::get('sonaton_dhormo_edit/{id}', 'OthersSonodAbedonController@sonaton_dhormo_edit');

Route::get('onumoti_porto_dash', 'OthersSonodAbedonController@onumotiportodash')->name('onumotiportodash');
Route::get('onumoti_potro_show/{id}', 'OthersSonodAbedonController@onumoti_potro_show');
Route::get('onumoti_potro_edit/{id}', 'OthersSonodAbedonController@onumoti_potro_edit');

Route::get('prottyon_potro_dash', 'OthersSonodAbedonController@prottyonpotrodash')->name('prottyonpotrodash');
Route::get('prottyon_potro_show/{id}', 'OthersSonodAbedonController@prottyon_potro_show');
Route::get('prottyon_potro_edit/{id}', 'OthersSonodAbedonController@prottyon_potro_edit');

Route::get('muktijoddha_sonod_dash', 'OthersSonodAbedonController@muktijoddhasonoddash')->name('muktijoddhasonoddash');
Route::get('muktijoddha_show/{id}', 'OthersSonodAbedonController@muktijoddha_show');
Route::get('muktijoddha_edit/{id}', 'OthersSonodAbedonController@muktijoddha_edit');

Route::get('muktijoddha_possho_sonod_dash', 'OthersSonodAbedonController@muktijoddhaposshosonoddash')->name('muktijoddhaposshosonoddash');
Route::get('muktijoddha_possho_show/{id}', 'OthersSonodAbedonController@muktijoddha_possho_show');
Route::get('muktijoddha_possho_edit/{id}', 'OthersSonodAbedonController@muktijoddha_possho_edit');

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
Route::post('akiNameAbedon','OthersSonodAbedonController@akiNameAbedon')->name('akiNameAbedon');
Route::post('bak_srobon_Abedon','OthersSonodAbedonController@bak_srobon_Abedon')->name('bak_srobon_Abedon');
Route::post('barshikAyAbedon','OthersSonodAbedonController@barshikAyAbedon')->name('barshikAyAbedon');
Route::post('charitrikAbedon','OthersSonodAbedonController@charitrikAbedon')->name('charitrikAbedon');
Route::post('mrittuAbedon','OthersSonodAbedonController@mrittuAbedon')->name('mrittuAbedon');
Route::post('muktijoddhaPosshoAbedon','OthersSonodAbedonController@muktijoddhaPosshoAbedon')->name('muktijoddhaPosshoAbedon');
Route::post('muktijoddhaAbedon','OthersSonodAbedonController@muktijoddhaAbedon')->name('muktijoddhaAbedon');
Route::post('obibahitoAbedon','OthersSonodAbedonController@obibahitoAbedon')->name('obibahitoAbedon');
Route::post('onumotiAbedon','OthersSonodAbedonController@onumotiAbedon')->name('onumotiAbedon');
Route::post('prottyonAbedon','OthersSonodAbedonController@prottyonAbedon')->name('prottyonAbedon');
Route::post('punBibahAbedon','OthersSonodAbedonController@punBibahAbedon')->name('punBibahAbedon');
Route::post('sonatonAbedon','OthersSonodAbedonController@sonatonAbedon')->name('sonatonAbedon');
Route::post('vumiAbedon','OthersSonodAbedonController@vumiAbedon')->name('vumiAbedon');

//nagorik Mobile Ajax
Route::post('nagorikMob','NagorikAbedonController@nagorikMob')->name('nagorikMob');

//Nagorik nagorikBcno ajax
Route::post('nagorikBcno','NagorikAbedonController@nagorikBcno')->name('nagorikBcno');

//Nagorik nagorikPno ajax
Route::post('nagorikPno','NagorikAbedonController@nagorikPno')->name('nagorikPno');

//nagorikFormDash
Route::get('nagorikFormDash','NagorikAbedonController@nagorikFormDash')->name('nagorikFormDash');

//Route::get('asif',function (){
//    view('pages.aaaa');
//});
Route::get('aaa','NagorikAbedonController@aaa')->name('aaa');

