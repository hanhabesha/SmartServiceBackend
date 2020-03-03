<?php

use Carbon\Carbon;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/ionic-serviceCatagories', 'ionicServiceCatagories');
Route::resource('/ionic-serviceProviders', 'ionicServiceProviders');
Route::resource('/ionic-menuItems', 'ionicMenuItems');

Route::get('serviceProviderLogo/{filename}', 'CHRLServiceProvidersController@getLogo');
Route::get('menuItem/picture/{filename}', 'MenuItemsController@getPicture');
Route::get('ItemsGroup/picture/{filename}', 'MenuItemGroupController@getPicture');
Route::get('officialAds/picture/{filename}', 'OfficialAdsController@getPoster');
Route::get('/time', function (Request $request) {
    return Carbon::now('Africa/Addis_Ababa');
});
