<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/landlordlogin', '\App\Http\Controllers\Api\Authcontroller@landlordLogin');
Route::post('/rentalLogin', '\App\Http\Controllers\Api\Authcontroller@rentalLogin');
Route::post('/register', '\App\Http\Controllers\Api\Authcontroller@register');
Route::get('veiw/property','App\Http\Controllers\Api\PropertyController@index');
Route::get('detail/property/{id}','App\Http\Controllers\Api\PropertyController@edit');
Route::post('search/property/byaddess','App\Http\Controllers\Api\PropertyController@searchPropertyByAddress');
Route::post('search/property/advance','App\Http\Controllers\Api\PropertyController@searchPropertyByAdvanceFilter');

Route::group(['middleware' => ['auth:api']], function(){

    //common route
    Route::get('/logout', 'App\Http\Controllers\Api\Authcontroller@logout');
     
     
     
    //end common route
    /// start landlord Route
     
    Route::post('/landlord/profile/update', 'App\Http\Controllers\Api\Landlord\Authcontroller@profile_update');
    Route::get('/landlord/profile/view', 'App\Http\Controllers\Api\Landlord\Authcontroller@profile_view');
    Route::post('/landlord/change/password', 'App\Http\Controllers\Api\Landlord\Authcontroller@passwordChange');
    // property route
    Route::post('/landlord/add/propertynew','App\Http\Controllers\Api\Landlord\PropertyController@addView');
    Route::post('/landlord/add/property','App\Http\Controllers\Api\Landlord\PropertyController@store');
    Route::get('/landlord/veiw/property/{id}','App\Http\Controllers\Api\Landlord\PropertyController@index');
    Route::get('/landlord/edit/property/{id}','App\Http\Controllers\Api\Landlord\PropertyController@edit');
    Route::post('/landlord/edit/propertyprocess','App\Http\Controllers\Api\Landlord\PropertyController@update');
    Route::get('/landlord/delete/property/{id}','App\Http\Controllers\Api\Landlord\PropertyController@delete');
    Route::post('/landlord/upload/propertyImage','\App\Http\Controllers\Api\Landlord\PropertyController@fileStore');
    Route::post('/landlord/remove/propertyImage','App\Http\Controllers\Api\Landlord\PropertyController@remvoeFile');
    Route::post('/landlord/remove/propertyImageById','App\Http\Controllers\Api\Landlord\PropertyController@remvoeImageByid');
    
     // end property route

   /// end landlord Route

    Route::post('/rental/profile/update', 'App\Http\Controllers\Api\Rental\Authcontroller@profile_update');
    //Route::get('/logout', 'App\Http\Controllers\Api\Authcontroller@logout');
    Route::get('/rental/profile/view', 'App\Http\Controllers\Api\Rental\Authcontroller@profile_view');
    Route::post('/rental/change/password', 'App\Http\Controllers\Api\Rental\Authcontroller@passwordChange');


   /// start Rental Route



   /// end Rental Route
});
