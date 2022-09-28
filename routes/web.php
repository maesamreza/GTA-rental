<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::group(['middleware' => 'AdminGuest'], function () {

        // Route::get('/login',['as'=>'admin.login','uses'=>'\App\Http\Controllers\Admin\AuthController@login']);
        // Route::post('/attempt',['as'=>'admin.attempt','uses'=>'\App\Http\Controllers\Admin\AuthController@login_process']);
        // Route::get('/forgotpassword',['as'=>'admin.forget_password','uses'=>'\App\Http\Controllers\Admin\AuthController@forgotPage']);
        // Route::post('/forgotpassword_process',['as'=>'admin.forgotpassword_process','uses'=>'\App\Http\Controllers\Admin\AuthController@forgot']);
        // Route::get('/reset-password',['as'=>'admin.password.reset','uses'=>'\App\Http\Controllers\Admin\AuthController@resetPage']);
        // Route::post('/reset/attempt',['as'=>'admin.resetAttempt','uses'=>'\App\Http\Controllers\Admin\AuthController@resetpass']);
        // Route::get('/register',['as'=>'admin.register','uses'=>'\App\Http\Controllers\Admin\AuthController@register']);
        // Route::post('/register/process',['as'=>'admin.register.process','uses'=>'\App\Http\Controllers\Admin\AuthController@store']);
    });

    Route::group(['middleware' => "AdminAuth"], function () {
        // Route::get('/logout',['as'=>'admin.logout','uses'=>'\App\Http\Controllers\Admin\AuthController@logout']);
        // Route::get('/profile',['as'=>'admin.profile','uses'=>'\App\Http\Controllers\Admin\ProfileController@index']);
        // Route::post('/update_profile',['as'=>'admin.update.profile','uses'=>'\App\Http\Controllers\Admin\ProfileController@update']);
        // Route::post('/change_password',['as'=>'admin.change.password','uses'=>'\App\Http\Controllers\Admin\ProfileController@change_password']);

    });
});


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::group(['middleware' => 'AdminGuest'], function () {

         Route::get('/login',['as'=>'admin.login','uses'=>'\App\Http\Controllers\Admin\AuthController@login']);
         Route::post('/attempt',['as'=>'admin.attempt','uses'=>'\App\Http\Controllers\Admin\AuthController@login_process']);
        // Route::get('/forgotpassword',['as'=>'admin.forget_password','uses'=>'\App\Http\Controllers\Admin\AuthController@forgotPage']);
        // Route::post('/forgotpassword_process',['as'=>'admin.forgotpassword_process','uses'=>'\App\Http\Controllers\Admin\AuthController@forgot']);
        // Route::get('/reset-password',['as'=>'admin.password.reset','uses'=>'\App\Http\Controllers\Admin\AuthController@resetPage']);
        // Route::post('/reset/attempt',['as'=>'admin.resetAttempt','uses'=>'\App\Http\Controllers\Admin\AuthController@resetpass']);
        // Route::get('/register',['as'=>'admin.register','uses'=>'\App\Http\Controllers\Admin\AuthController@register']);
        // Route::post('/register/process',['as'=>'admin.register.process','uses'=>'\App\Http\Controllers\Admin\AuthController@store']);
    });

    Route::group(['middleware' => "AdminAuth"], function () {
        Route::get('/logout',['as'=>'admin.logout','uses'=>'\App\Http\Controllers\Admin\AuthController@logout']);
        Route::get('/profile',['as'=>'admin.profile','uses'=>'\App\Http\Controllers\Admin\ProfileController@index']);
        Route::post('/update_profile',['as'=>'admin.update.profile','uses'=>'\App\Http\Controllers\Admin\ProfileController@update']);
        // Route::post('/change_password',['as'=>'admin.change.password','uses'=>'\App\Http\Controllers\Admin\ProfileController@change_password']);
        Route::get('/dashboard',['as'=>'admin.dashboard','uses'=>'\App\Http\Controllers\Admin\DashboardController@index']);
        Route::get('/addlandlord',['as'=>'admin.addlandlord','uses'=>'\App\Http\Controllers\Admin\LandlordController@addView']);
        Route::post('/addlandlordprocess',['as'=>'admin.addlandlordprocess','uses'=>'\App\Http\Controllers\Admin\LandlordController@store']);
        Route::get('/landlord',['as'=>'admin.landlord','uses'=>'\App\Http\Controllers\Admin\LandlordController@index']);
        Route::get('/editlandlord/{id}',['as'=>'admin.editlandlord','uses'=>'\App\Http\Controllers\Admin\LandlordController@edit']);
        Route::post('/editlandlordprocess',['as'=>'admin.editlandlordprocess','uses'=>'\App\Http\Controllers\Admin\LandlordController@update']);
        Route::get('/deletelandlord/{id}',['as'=>'admin.deletelandlord','uses'=>'\App\Http\Controllers\Admin\LandlordController@delete']);

        Route::get('/addrental',['as'=>'admin.addrental','uses'=>'\App\Http\Controllers\Admin\CustomerController@addView']);
        Route::post('/addrentalprocess',['as'=>'admin.addrentalprocess','uses'=>'\App\Http\Controllers\Admin\CustomerController@store']);
        Route::get('/rental',['as'=>'admin.rental','uses'=>'\App\Http\Controllers\Admin\CustomerController@index']);
        Route::get('/editrental/{id}',['as'=>'admin.editrental','uses'=>'\App\Http\Controllers\Admin\CustomerController@edit']);
        Route::post('/editrentalprocess',['as'=>'admin.editrentalprocess','uses'=>'\App\Http\Controllers\Admin\CustomerController@update']);
        Route::get('/deleterental/{id}',['as'=>'admin.deleterental','uses'=>'\App\Http\Controllers\Admin\CustomerController@delete']);

        // property route
        Route::get('/addproperty',['as'=>'admin.addproperty','uses'=>'\App\Http\Controllers\Admin\PropertyController@addView']);
        Route::post('/addpropertyprocess',['as'=>'admin.addpropertyprocess','uses'=>'\App\Http\Controllers\Admin\PropertyController@store']);
         Route::get('/property',['as'=>'admin.property','uses'=>'\App\Http\Controllers\Admin\PropertyController@index']);
         Route::get('/editproperty/{id}',['as'=>'admin.editproperty','uses'=>'\App\Http\Controllers\Admin\PropertyController@edit']);
         Route::post('/editpropertyprocess',['as'=>'admin.editpropertyprocess','uses'=>'\App\Http\Controllers\Admin\PropertyController@update']);
         Route::get('/deleteproperty/{id}',['as'=>'admin.deleteproperty','uses'=>'\App\Http\Controllers\Admin\PropertyController@delete']);
        Route::post('/uploadpropertyImage',['as'=>'admin.uploadpropertyImage','uses'=>'\App\Http\Controllers\Admin\PropertyController@fileStore']);
        Route::post('/removepropertyImage',['as'=>'admin.removepropertyImage','uses'=>'\App\Http\Controllers\Admin\PropertyController@remvoeFile']);
        Route::post('/removepropertyImageById',['as'=>'admin.removepropertyImageById','uses'=>'\App\Http\Controllers\Admin\PropertyController@remvoeImageByid']);
        Route::get('/property/status/change',['as'=>'admin.property.status.change','uses'=>'\App\Http\Controllers\Admin\PropertyController@statusChange']);
        // end property route
        Route::post('/contact/email',['as'=>'admin.contact.email','uses'=>'\App\Http\Controllers\Admin\ContactUsController@contact_us']);

    });
});

Route::prefix('landlord')->namespace('Landlord')->group(function () {
    Route::group(['middleware' => 'LandlordGuest'], function () {

        // Route::get('/login',['as'=>'landlord.login','uses'=>'\App\Http\Controllers\AuthController@login']);
        // Route::post('/attempt',['as'=>'landlord.attempt','uses'=>'\App\Http\Controllers\AuthController@login_process']);
        // Route::get('/forgotpassword',['as'=>'landlord.forget_password','uses'=>'\App\Http\Controllers\AuthController@forgotPage']);
        // Route::post('/forgotpassword_process',['as'=>'landlord.forgotpassword_process','uses'=>'\App\Http\Controllers\AuthController@forgot']);
        // Route::get('/reset-password',['as'=>'landlord.password.reset','uses'=>'\App\Http\Controllers\AuthController@resetPage']);
        // Route::post('/reset/attempt',['as'=>'landlord.resetAttempt','uses'=>'\App\Http\Controllers\AuthController@resetpass']);
        // Route::get('/register',['as'=>'landlord.register','uses'=>'\App\Http\Controllers\AuthController@register']);
        // Route::post('/register/process',['as'=>'landlord.register.process','uses'=>'\App\Http\Controllers\AuthController@store']);
    });

    Route::group(['middleware' => "LandlordAuth"], function () {
        // Route::get('/logout',['as'=>'landlord.logout','uses'=>'\App\Http\Controllers\Landlord\ProfileController@logout']);
        // Route::get('/profile',['as'=>'landlord.profile','uses'=>'\App\Http\Controllers\Landlord\ProfileController@index']);
        // Route::post('/update_profile',['as'=>'landlord.update.profile','uses'=>'\App\Http\Controllers\Landlord\ProfileController@update']);
        // Route::post('/change_password',['as'=>'landlord.change.password','uses'=>'\App\Http\Controllers\Landlord\ProfileController@change_password']);

    });
});


Route::prefix('customer')->namespace('Customer')->group(function () {
    Route::group(['middleware' => 'CustomerGuest'], function () {

        // Route::get('/login',['as'=>'customer.login','uses'=>'\App\Http\ControllersD\AuthController@login']);
        // Route::post('/attempt',['as'=>'customer.attempt','uses'=>'\App\Http\Controllers\AuthController@login_process']);
        // Route::get('/forgotpassword',['as'=>'customer.forget_password','uses'=>'\App\Http\Controllers\AuthController@forgotPage']);
        // Route::post('/forgotpassword_process',['as'=>'customer.forgotpassword_process','uses'=>'\App\Http\Controllers\AuthController@forgot']);
        // Route::get('/reset-password',['as'=>'customer.password.reset','uses'=>'\App\Http\Controllers\AuthController@resetPage']);
        // Route::post('/reset/attempt',['as'=>'customer.resetAttempt','uses'=>'\App\Http\Controllers\AuthController@resetpass']);
        // Route::get('/register',['as'=>'customer.register','uses'=>'\App\Http\Controllers\AuthController@register']);
        // Route::post('/register/process',['as'=>'customer.register.process','uses'=>'\App\Http\Controllers\AuthController@store']);
    });

    Route::group(['middleware' => "CustomerAuth"], function () {
        // Route::get('/logout',['as'=>'customer.logout','uses'=>'\App\Http\Controllers\Customer\ProfileController@logout']);
        // Route::get('/profile',['as'=>'customer.profile','uses'=>'\App\Http\Controllers\Customer\ProfileController@index']);
        // Route::post('/update_profile',['as'=>'customer.update.profile','uses'=>'\App\Http\Controllers\Customer\ProfileController@update']);
        // Route::post('/change_password',['as'=>'customer.change.password','uses'=>'\App\Http\Controllers\Customer\ProfileController@change_password']);

    });
});
//Route::view('admin/property','Admin.pages.property.property');
//Route::view('admin/addproperty','Admin.pages.property.addproperty');
Route::view('admin/editproperty','Admin.pages.property.edit');
// Route::view('admin/landlord','Admin.pages.landlord.landlord');
// Route::view('admin/addlandlord','Admin.pages.landlord.addlandlord');
// Route::view('admin/editlandlord','Admin.pages.landlord.editlandlord');
// Route::view('admin/addrental','Admin.pages.rental.addrental');
// Route::view('admin/rental','Admin.pages.rental.rental');
// Route::view('admin/editrental','Admin.pages.rental.editrental');
//Route::view('admin/profile','Admin.pages.profile');
