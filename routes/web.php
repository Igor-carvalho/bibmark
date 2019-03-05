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
// frontend
Route::get('/', 'WebController@profilePage');

Route::middleware(['guest'])->group(function() {
    Route::get('/join', 'WebController@joinPage');
    Route::post('login', 'WebController@doLogin')->name('dologin');
    Route::get('/forgot-password', 'WebController@forgotPasswordPage');
});
Route::get('/login', 'WebController@loginPage')->middleware('frontauth')->name('login');

Route::middleware(['auth'])->group(function() {
    Route::get('/profile', 'WebController@profilePage');
    Route::get('/profile/edit-account', 'WebController@editAccountPage');
    Route::patch('profile/{id}', 'ProfileController@update');
    Route::get('doLogout', 'WebController@doLogout')->name('doLogout');
    Route::get('/profile/permission', 'ProfileController@getPermission');
    Route::post('/profile/editPhoto', 'ProfileController@editPhoto');
    Route::get('/profile/getPhoto', 'ProfileController@getPhoto');
    Route::get('/profile/my-events', 'WebController@myEventsPage');
    Route::get('/profile/my-events/{id}', 'ProfileController@getEvents');
    Route::post('/profile/my-events/{id}', 'ProfileController@updateConfirmationNumber');
});

Route::get('/reset-password/{token}/{email}', 'WebController@resetPasswordPage');
Route::get('/reset-password', 'WebController@showResetForm');
Route::group([  'prefix' => 'password'], function () {
    Route::post('create', 'PasswordResetController@create');
    // Route::get('find/{token}', 'PasswordResetController@find');
    // Route::post('reset', 'PasswordResetController@reset');
});

// backend
Route::namespace('Admin')->middleware(['auth'])->group(function() {
    Route::prefix('dashboard')->group(function() {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        // account
        Route::get('/account/{account_id}/home', 'AdminController@dashboardAccount');
        Route::middleware(['superadmin'])->group(function() {
            Route::resource('accounts', 'AccountController')->only(['index', 'show', 'create', 'edit']);
            Route::prefix('accounts/{account_id}/users')->group(function() {
                Route::get('create', 'AccountController@createUser')->name('accounts.user.create');
                Route::get('{user_id}', 'AccountController@editUser')->name('accounts.user.edit');
            });
        });

        Route::resource('charities', 'CharityController')->only(['index', 'show', 'create', 'edit']);
        Route::get('/charity/{charity_id}/home', 'AdminController@dashboardCharity');
        Route::resource('events', 'EventController')->only(['index', 'show', 'create', 'edit']);
        Route::get('/event/{event_id}/home', 'AdminController@dashboardEvent');
        Route::resource('users', 'UserController')->only(['index', 'show', 'create', 'edit']);
        Route::resource('products', 'ProductController')->only(['index', 'show', 'create', 'edit']);
        Route::resource('locations', 'LocationController')->only(['index', 'show', 'create', 'edit']);
        Route::resource('orders', 'OrderController')->only(['index', 'show', 'create', 'edit']);
        Route::resource('designs', 'DesignController')->only(['index', 'show', 'create', 'edit']);
    });
});


//Route::get('admin/password/reset/{token}', 'Admin\AdminController@resetPassword');
Route::post('/forgot-password', 'Admin\AdminController@forgotPassword');
Route::post('/reset-password', 'Admin\AdminController@resetPassword');

Route::prefix('internal')->group(function() {

    Route::middleware(['auth'])->group(function() {
        // account
        Route::get('accounts', 'InternalController@accounts');
        Route::get('account/{account_id}', 'InternalController@accountDetails');
        Route::get('account/{account_id}/users', 'InternalController@usersWithAccountId');
        Route::post('account/user', 'InternalController@createOrUpdateUserUnderAccount');
        Route::post('account', 'InternalController@createOrUpdateAccount');
        Route::delete('account/{account_id}', 'InternalController@deleteAccount');

        // charity
        Route::get('charities', 'InternalController@charities');
        Route::get('charity/{charity_id}', 'InternalController@charityDetails');
        Route::post('charity', 'InternalController@createOrUpdateCharity');
        Route::delete('charity/{charity_id}', 'InternalController@deleteCharity');

        // event
        Route::get('events', 'InternalController@events');
        Route::get('event/{event_id}', 'InternalController@eventDetails');
        Route::post('event', 'InternalController@createOrUpdateEvent');
        Route::delete('event/{event_id}', 'InternalController@deleteEvent');
        Route::post('event/register', 'InternalController@registerEvent');

        // user
        Route::get('users', 'InternalController@users');
        Route::delete('user/{user_id}', 'InternalController@deleteUser');
        Route::post('user', 'InternalController@createOrUpdateUser');
        Route::get('/user/{user_id}/dashboard_achievements', 'InternalController@dashboardAchievements');

        // product
        Route::get('products', 'InternalController@products');
        Route::post('product', 'InternalController@createOrUpdateProduct');
        Route::delete('product/{product_id}', 'InternalController@deleteProduct');
        Route::put('product/{product_id}/category/{category_id}', 'InternalController@addProductToCategory');
        Route::delete('product/{product_id}/category/{category_id}', 'InternalController@deleteProductFromCategory');
        Route::put('product/{product_id}/size/{size_id}', 'InternalController@addProductToSize');
        Route::delete('product/{product_id}/size/{size_id}', 'InternalController@deleteProductFromSize');

        // location
        Route::get('locations', 'InternalController@locations');
        Route::post('address', 'InternalController@createAddress');
        Route::post('location', 'InternalController@createOrUpdateLocation');
        Route::delete('location/{location_id}', 'InternalController@deleteLocation');

        // order
        Route::get('orders', 'InternalController@orders');
        Route::post('order/item', 'InternalController@createOrUpdateOrderItem');
        Route::post('order', 'InternalController@updateOrder');
        Route::post('order/place', 'InternalController@placeOrder');
        Route::get('order/{order_id}/shipping_rate', 'InternalController@getLowestCarrierRate');

        // billing
        Route::post('billing', 'InternalController@createBilling');
        Route::get('account/{account_id}/billing', 'InternalController@getBillingsWithAccountId');
        Route::get('account/{user_id}/billing', 'InternalController@getBillingsWithUserId');

        // design
        Route::get('designs', 'InternalController@designs');
        Route::post('design/upload', 'InternalController@uploadDesignFile');
        Route::post('design', 'InternalController@createOrUpdateDesign');
        Route::delete('design/{design_id}', 'InternalController@deleteDesign');

        // extra
        Route::post('image/upload', 'InternalController@uploadImage');
        Route::post('password/create', 'PasswordResetController@create');
        Route::post('password/reset', 'PasswordResetController@reset');

        // profile
        Route::get('profile', 'ProfileController@index')->name('profile');
    });
});
