<?php

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

//List all Waterfalls
Route::get('waterfalls', 'WaterfallController@index');

//All waterfalls with pagination
Route::get('waterfalls/paginate/{number}', 'WaterfallController@listWithPaginate')->where(['number' => '[0-9]+']);

//List Single Waterfall
Route::get('waterfall/{id}', 'WaterfallController@show');

//Search by name
<<<<<<< HEAD
Route::get('waterfalls/name/{name}', 'WaterfallController@searchByname');
=======
Route::get('waterfalls/search/{name}', 'WaterfallController@searchByname');
>>>>>>> ff68a5bc080005ece5777ee70fbce5a52baadcf8

//List waterfalls in a community
Route::get('waterfalls/community/{community}', 'WaterfallController@listByCommunity');

//Get a list of waterfall near to coordinates
Route::get('waterfalls/longitude/{longitude}/latitude/{latitude}','WaterfallController@listByCoordinates')
->where(['longitude' => '^-?[0-9]\d*(\.\d+)?$', 'latitude' => '^-?[0-9]\d*(\.\d+)?$']);

<<<<<<< HEAD
//-------------------------------------------------------------------------------------------------------------------------

=======
>>>>>>> ff68a5bc080005ece5777ee70fbce5a52baadcf8
//List all Live Music Venues
Route::get('livemusic', 'LiveMusicVenueController@index');

//List a Live Music Venues with Id
Route::get('livemusic/{id}', 'LiveMusicVenueController@show');

//List Live Music Venue in a city
Route::get('livemusic/city/{city}', 'LiveMusicVenueController@listByCity');

//All Live Music Venue with pagination
Route::get('livemusic/paginate/{number}', 'LiveMusicVenueController@listWithPaginate')->where(['number' => '[0-9]+']);

//Search Music Venue by name
<<<<<<< HEAD
Route::get('livemusic/name/{name}', 'LiveMusicVenueController@searchByname');

//Get a list of Live Music Venues near 500M to coordinates
Route::get('livemusic/longitude/{longitude}/latitude/{latitude}','LiveMusicVenueController@listByCoordinates')
->where(['longitude' => '^-?[0-9]\d*(\.\d+)?$', 'latitude' => '^-?[0-9]\d*(\.\d+)?$']);

//------------------------------------------------------------------------------------------------------------------------------

//List all Campgrounds
Route::get('campgrounds', 'CampgroundController@index');

//List a single Campgrounds with id
Route::get('campground/{id}', 'CampgroundController@show');

//List Campgrounds in a community
Route::get('campgrounds/community/{city}', 'CampgroundController@listByCommunity');

//All Campgrounds with pagination
Route::get('campgrounds/paginate/{number}', 'CampgroundController@listWithPaginate')->where(['number' => '[0-9]+']);

//Search Campgrounds by name
Route::get('campgrounds/name/{name}', 'CampgroundController@searchByname');

//Get a list of campgrounds with 500M of the provided coordinates
Route::get('campgrounds/longitude/{longitude}/latitude/{latitude}','CampgroundController@listByCoordinates')
->where(['longitude' => '^-?[0-9]\d*(\.\d+)?$', 'latitude' => '^-?[0-9]\d*(\.\d+)?$']);

//---------------------------------------------------------------------------------------------------------------------------------

//List all Bikeways
Route::get('bikeways', 'BikewayController@index');

//List a single Bikeways with id
Route::get('bikeway/{id}', 'BikewayController@show');

//Search Bikeways by name
Route::get('bikeways/name/{name}', 'BikewayController@searchByname');

//Search Bikeways by type
Route::get('bikeways/type/{type}', 'BikewayController@searchByType');

//Search Bikeways by ward
Route::get('bikeways/ward/{type}', 'BikewayController@searchByWard');

//Search Bikeways by length
Route::get('bikeways/lessthan/{length}', 'BikewayController@lessThanGivenLength')->where(['length' => '^-?[0-9]\d*(\.\d+)?$']);
Route::get('bikeways/morethan/{length}', 'BikewayController@moreThanGivenLength')->where(['length' => '^-?[0-9]\d*(\.\d+)?$']);
=======
Route::get('livemusic/search/{name}', 'LiveMusicVenueController@searchByname');

//Get a list of Live Music Venues near 500M to coordinates
Route::get('livemusic/longitude/{longitude}/latitude/{latitude}','LiveMusicVenueController@listByCoordinates')
->where(['longitude' => '^-?[0-9]\d*(\.\d+)?$', 'latitude' => '^-?[0-9]\d*(\.\d+)?$']);
>>>>>>> ff68a5bc080005ece5777ee70fbce5a52baadcf8
