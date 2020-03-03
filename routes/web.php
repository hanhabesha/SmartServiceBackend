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
    return redirect('/home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});
Route::group(['middleware' => ['superAdmin', 'auth']], function () {

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('serviceProviders', 'CHRLServiceProvidersController', ['except' => ['show', 'getLogo']]);
    Route::resource('companies', 'TVBroadCompsController', ['except' => ['show']]);
    Route::resource('ItemsGroup', 'MenuItemGroupController');

    Route::resource('serviceCatagories', 'ServiceCatagoriesController');
    Route::resource('OfficialPartners', 'OfficialPartnersController');
    Route::put('OfficialAds/status', ['as' => 'OfficialAds.status', 'uses' => 'OfficialAdsController@AdsStatus']);
    Route::resource('OfficialAds', 'OfficialAdsController');
    Route::put('addServiceProvider', 'UserController@addServiceProvider');
    Route::resource('OfficialAds', 'OfficialAdsController');
    Route::get('OfficialAds/PartnersAd/{partnerId}', ['as' => 'OfficialAds.PartnersAd', 'uses' => 'OfficialAdsController@PartnersAd']);
    Route::get('OfficialAds/PartnersAd/create/{partnerId}', ['as' => 'OfficialAds.PartnersAd.create', 'uses' => 'OfficialAdsController@CreatePartnersAd']);

    // Route::post('OfficialPartners/PartnersAd', ['as' => 'OfficialPartners.addPartnersAd', 'uses'+ => 'OfficialPartnersController@AddPartnersAd']);

    // Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    //     //
    // });

});
Route::group(['middleware' => ['auth', 'subAdmin']], function () {
    Route::put('SPprofile/updateLogo', ['as' => 'SPprofile.updateLogo', 'uses' => 'ServiceProviderProfileController@updateLogo']);
    Route::put('SPprofile/updateLocation', ['as' => 'SPprofile.updateLocation', 'uses' => 'ServiceProviderProfileController@updateLocation']);
    Route::put('menu/availability', ['as' => 'menu.availability', 'uses' => 'MenuItemsController@availability']);
    Route::resource('menu', 'MenuItemsController');
    Route::resource('SPprofile', 'ServiceProviderProfileController');
    Route::resource('happyHour', 'HappyHourController');
    Route::resource('happyHourItem', 'HappyHourItemController', ['except' => ['show']]);

    Route::resource('happyHourMenu', 'HappyHourMenuController');
    Route::resource('tables', 'TablesController');

    Route::resource('happyHourItemGroup', 'HappyHourItemGroupController');
    Route::resource('customerOrders', 'CustomerOrdersController');
    // Route::get('autocomplete', ['as' => 'autocomplete.menuItemsSearch', 'uses' => 'searchController@menuItemsSearch']);
    Route::get('autocomplete/menuItemsSearch', 'searchController@menuItemsSearch')->name('autocomplete.fetch');

});
Route::get('logo/{filename}', 'CHRLServiceProvidersController@getLogo');
Route::get('menuItem/picture/{filename}', 'MenuItemsController@getPicture');
Route::get('ItemsGroup/picture/{filename}', 'MenuItemGroupController@getPicture');
Route::resource('PendingSPRequest', 'PendingSPRequestController');
