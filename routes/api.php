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

Route::group(['middleware' => ['auth:api']], function(){

    //common route
    Route::get('/logout', 'App\Http\Controllers\Api\Authcontroller@logout');
     
     
     
    //end common route
    /// start landlord Route
     
    Route::post('/landlord/profile/update', 'App\Http\Controllers\Api\Landlord\Authcontroller@profile_update');
    Route::get('/landlord/profile/view', 'App\Http\Controllers\Api\Landlord\Authcontroller@profile_view');
    Route::post('/landlord/change/password', 'App\Http\Controllers\Api\Landlord\Authcontroller@passwordChange');
    // property route

    Route::post('/landlord/add/property','App\Http\Controllers\Api\PropertyController@store');
    Route::get('/landlord/veiw/property','App\Http\Controllers\Api\PropertyController@index');
    Route::get('/landlord/edit/property/{id}','App\Http\Controllers\Api\PropertyController@edit');
    Route::post('/landlord/edit/propertyprocess','App\Http\Controllers\Api\PropertyController@update');
    Route::get('/landlord/delete/property/{id}','App\Http\Controllers\Api\PropertyController@delete');
    Route::post('/landlord/upload/propertyImage','\App\Http\Controllers\Api\PropertyController@fileStore');
    Route::post('/landlord/remove/propertyImage','App\Http\Controllers\Api\PropertyController@remvoeFile');
    Route::post('/landlord/remove/propertyImageById','App\Http\Controllers\Api\PropertyController@remvoeImageByid');
    
     // end property route

   /// end landlord Route

    Route::post('/rental/profile/update', 'App\Http\Controllers\Api\Rental\Authcontroller@profile_update');
    //Route::get('/logout', 'App\Http\Controllers\Api\Authcontroller@logout');
    Route::get('/rental/profile/view', 'App\Http\Controllers\Api\Rental\Authcontroller@profile_view');
    Route::post('/rental/change/password', 'App\Http\Controllers\Api\Rental\Authcontroller@passwordChange');


   /// start Rental Route



   /// end Rental Route
});
