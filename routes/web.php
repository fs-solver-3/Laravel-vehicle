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
    return redirect(app()->getLocale());
    // return view('welcome');
});
Route::get('/home', function () {
    return redirect(app()->getLocale());
    // return view('welcome');
});

// Route::get('/facebook_redirect', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');

// google login
Route::get('google', function () {
    return view('googleAuth');
});



Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('auth/vk', 'Auth\LoginController@redirectToVk');
Route::get('auth/vk/callback', 'Auth\LoginController@handleVkCallback');
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/callback', 'Auth\LoginController@handleFacebookCallback');
Route::post('/driver_message', 'ChatsController@sendMessage')->name('message.store');
Route::post('/saveLocation', 'HomeController@saveLocation')->name('saveLocation');
Route::post('paypal', 'PaymentController@payWithpaypal')->name('paywithpaypal');
Route::get('state', 'PaymentController@payMembership')->name('payMembership');
Route::post('withdrawwithpaypal', 'PaymentController@withdraw')->name('withdrawwithpaypal');
Route::post('replenish', 'PaymentController@replenish')->name('replenishtinkoff');
Route::post('withdrawapprove', 'PaymentController@withdrawApprove')->name('withdraws.approve');
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');
Route::get('test', 'HomeController@test')->name('test');
Route::post('/currency_save', 'HomeController@currencySave')->name('saveCurrency');
Route::post('/more_news', 'HomeController@moreNews')->name('more_news');
Route::post('/more_posts', 'HomeController@morePosts')->name('more_posts');
Route::post('ajax/set_current_time_zone', array('as' => 'ajaxsetcurrenttimezone','uses' => 'HomeController@setCurrentTimeZone'));
Route::get('/verify/{token}', 'VerifyController@VerifyEmail')->name('verify');
Auth::routes(['verify' => true]);





Route::middleware(['auth'])->group(function () {
    Route::post('/settings', 'SettingController@store')->name('settings.store');
    Route::post('/add_car', 'ProfileController@saveCar')->name('addCar');
    Route::post('/savePaypalemail', 'ProfileController@savePaypalemail')->name('savePaypalemail');
    Route::post('/update_car', 'ProfileController@updateCar')->name('profile.car.update');
    Route::post('/updatePreference', 'ProfileController@updatePreference')->name('profile.preference.update');
    Route::post('/saveComplain', 'ProfileController@saveComplain')->name('profile.complain.save');
    Route::post('/more_reviews', 'ProfileController@moreReviews')->name('more_reviews');
    Route::post('/more_transactions', 'ProfileController@moreTransactions')->name('more_transactions');
    Route::post('/book', 'ProfileController@book')->name('savebook');
    Route::post('/demandRegister', 'ProfileController@demandRegister')->name('demandRegister');
    Route::post('/infosave', 'ProfileController@infoSave')->name('info.save');
    Route::post('/save_search', 'ProfileController@saveSearch')->name('save_search_trip');
    Route::post('/phone_verify', 'ProfileController@phoneVerify')->name('phone.verify');
    Route::post('withdrawwithpaypal', 'PaymentController@withdraw')->name('withdrawwithpaypal');
    Route::post('/blog_comment', 'HomeController@blogComment')->name('blog_comment');
    Route::post('/comment_reply', 'HomeController@commentReply')->name('comment-reply');

    Route::get('/fetch_message', 'ChatsController@fetchMessages')->name('message.fetch');
    Route::get('/fetch_driver_message', 'ChatsController@fetchDriverMessages')->name('message.fetch.driver');
    Route::get('/fetch_admin_message', 'ChatsController@fetchAdminMessages')->name('message.fetch.admin');
    Route::get('/fetch_rooms', 'ChatsController@fetchRooms')->name('message.fetch.room');
    Route::get('/fetch_rooms_drivers', 'ChatsController@fetchDriverRooms')->name('message.fetch.room.driver');
    Route::get('/fetch_fellowers', 'ChatsController@fetchFellowers')->name('message.fetch.fellowers');
    Route::get('/unread_total', 'ChatsController@unreadTotal')->name('message.unread.total');

    // message routes
    Route::post('/admin_message', 'ChatsController@adminSendMessage')->name('message.store');
    Route::post('/message_unread', 'ChatsController@unRead')->name('message.unread');
    Route::post('/message_unread_user', 'ChatsController@unReadUser')->name('message.unread.user');
    Route::post('/messageEdit', 'ChatsController@edit')->name('message.edit');
    Route::post('/roomArchive', 'ChatsController@roomArchive')->name('message.roomArchive');
    Route::post('/adminroomArchive', 'ChatsController@adminroomArchive')->name('message.adminroomArchive');
    Route::post('/messageDelete', 'ChatsController@delete')->name('message.delete');
    Route::post('/messageDeleteMulti', 'ChatsController@deleteMulti')->name('message.deleteMulti');
    Route::post('/support_admin_message', 'SupportMessageController@supportSendMessage')->name('support.admin.message.store');
    Route::get('/fetch_admin_message_notifcation', 'ChatsController@fetchAdminNotification')->name('admin.fetch.notification');

    Route::get('/fetch_models', 'Admin\CarModelsController@fetch');
    Route::get('/fetch_models2', 'Admin\CarModelsController@fetch2');

    Route::get('/fetch_cars', 'Admin\ListingsController@fetchCar');

    Route::post('users/loginas', 'Admin\UsersController@loginAs')->name('loginAs');
});


Route::group(['prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/search-car-sharing', 'SearchController@index')->name('search');
    Route::post('/search-trips', 'SearchController@searchtrips')->name('searchtrips');
    Route::post('/search-cargo-trips', 'SearchController@search_cargo_trips')->name('search_cargo_trips');
    Route::get('/search-car', 'SearchController@searchcar')->name('searchcar');
    Route::get('/search-car-where-leaving', 'SearchController@searchcar_whereleaving')->name('searchcar_whereleaving');
    Route::get('/search-cargo', 'SearchController@searchcargo')->name('searchcargo');
   

    Route::get('looking-for-employess', 'PagesController@looking')->name('looking');
    Route::get('faq', 'PagesController@faq')->name('faq');;
    Route::get('about-us', 'PagesController@about')->name('about');
    Route::get('terms', 'PagesController@terms')->name('terms');
    Route::get('policy', 'PagesController@policy')->name('policy');
    Route::get('service', 'PagesController@service')->name('service');
    Route::get('contact', 'PagesController@contact')->name('contact');

    Route::get('news/{id}', 'HomeController@blog')
        ->name('blog');
    Route::get('posts/{id}', 'HomeController@post')
        ->name('post');
    Route::get('news/', 'HomeController@blogAll')
    ->name('news-all');
    Route::get('posts/', 'HomeController@postAll')
    ->name('posts-all');

    Route::group(['middleware' => 'auth', 'prefix' => 'offer-ride'], function () {
        
        Route::get('/1', 'RideStepperController@getStepOne')->name('offer.step.one');
        Route::post('/1', 'RideStepperController@postStepOne');

        Route::group(['middleware' => 'check-ride-session'], function () {
            Route::get('/2', 'RideStepperController@getStepTwo')->name('offer.step.two');
            Route::post('/2', 'RideStepperController@postStepTwo');

            Route::get('/3', 'RideStepperController@getStepThree')->name('offer.step.three');
            Route::post('/3', 'RideStepperController@postStepThree');
        });
    });
    Route::get('/logout', 'Auth\LoginController@logout');
    
    Route::get('/admin', 'Admin\HomeController@index')->name('home');

    Route::post('register2', 'Auth\RegisterController@create')->name('register_2');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register_step2', 'Auth\RegisterStep2Controller@postForm')->name('register_step2');
    Route::post('send-sms', 'Auth\RegisterStep2Controller@sendSms')->name('send-sms');

    Route::middleware(['auth'])->group(function () {
        Route::get('/trip/{t_id}/{type?}', 'TripController@tripplan')->name('tripplan');
        Route::get('/trip-detail/{t_id}', 'TripController@tripDetail')->name('trip-detail');


        Route::get('personal-message', 'ChatsController@index')->name('personal-message');
        Route::get('messages', 'ChatsController@fetchMessages');

        Route::get('/management', 'ProfileController@personal_Control')->name('personal_Control');
        Route::get('/profile', 'ProfileController@profile')->name('profile');
        Route::get('profile/add-car/', 'ProfileController@addCar')->name('profile.car.add');
        Route::get('profile/car/{car}/edit', 'ProfileController@editCar')->name('profile.car.edit');
        Route::get('profile/truck/{truck}/edit', 'ProfileController@editTruck')->name('profile.truck.edit');
        Route::get('profile/review/edit', 'ProfileController@editReview')->name('profile.review.edit');
        Route::delete('profile/car/{car}', 'ProfileController@destroyCar')
        ->name('profile.car.destroy')->where('id', '[0-9]+');
        Route::delete('profile/truck/{truck}', 'ProfileController@destroyTruck')
        ->name('profile.truck.destroy')->where('id', '[0-9]+');
        Route::get('/bookings', 'ProfileController@bookings')->name('bookings');
        Route::get('/leavereview', 'ProfileController@leaveReview')->name('leave-review');

        Route::post('/save-user-settings', 'ProfileController@save_user_settings')->name('save_user_settings');
        Route::post('/save-user-alerts', 'ProfileController@save_user_alerts')->name('save_user_alerts');
        Route::post('/upload-personal-image', 'ProfileController@upload_personal_image')->name('upload_personal_image');
        Route::post('/save-mailing-address', 'ProfileController@save_mailing_address')->name('save_mailing_address');
        Route::post('/reset-password', 'ProfileController@reset_password')->name('reset_password');
        Route::post('/upload-passport', 'ProfileController@upload_passport')->name('upload_passport');
        Route::post('/upload-lisence', 'ProfileController@upload_lisence')->name('upload_lisence');
        Route::post('/close-account', 'ProfileController@close_account')->name('close_account');
        Route::post('/filter-booking', 'ProfileController@filter_booking')->name('filter_booking');
        Route::post('/filter-transaction', 'ProfileController@filter_transaction')->name('filter_transaction');
        Route::post('/filter-ticket', 'ProfileController@filter_support')->name('filter_support');
        Route::post('/review-save', 'ProfileController@saveReview')->name('review.store');
        Route::post('/review-update', 'ProfileController@updateReview')->name('review.update');
        Route::delete('/review/{review}', 'ProfileController@destroyReview')->name('review.destroy');
        Route::post('/release-funds', 'ProfileController@releaseFunds')->name('release-funds');
        Route::get('/trips', 'ProfileController@trips')->name('trips');
        Route::get('/old-trips', 'ProfileController@tripsOld')->name('trips.old');
        Route::get('/alerts', 'ProfileController@alerts')->name('trip-alerts');

        Route::get('/existing-trips', 'ListingController@existingTrips')->name('trips.exist');
        Route::get('/car-place/{trip_id}', 'CheckbookingController@car_place')->name('car_place');
        Route::get('/truck-place/{trip_id}', 'CheckbookingController@truck_place')->name('truck_place');
        Route::get('/checkbooking-passenger', 'CheckbookingController@checkbooking')->name('checkbooking');
        Route::get('/checkbooking-cargo/{trip_id}', 'CheckbookingController@checkbookingcargo')->name('checkbookingcargo');
        Route::post('/cancel-book/{trip_id}', 'CheckbookingController@cancelBook')->name('cancel-book');

        Route::get('/choose-type', 'ListingController@choosetype')->name('choosetype');
        Route::get('/suggest-from-passenger', 'ListingController@suggestFromPassenger')->name('suggestFromPassenger');
        Route::post('/suggest-to-passenger', 'ListingController@suggestToPassenger')->name('suggestToPassenger');
        Route::get('/suggest-from-cargo', 'ListingController@suggestFromCargo')->name('suggestFromCargo');
        Route::get('/suggest-to-cargo', 'ListingController@suggest_cargo_to')->name('suggest_cargo_to');
        Route::get('/suggest-late-to', 'ListingController@suggest_late_to')->name('suggest_late_to');
        
        Route::post('/suggest-save-from-cargo', 'ListingController@suggestToCargo')->name('suggestToCargo');
        Route::post('/drop-off-points', 'ListingController@deployPassenger')->name('deployPassenger');
        Route::get('/deploy-passenger-to', 'ListingController@deploy_passenger_to')->name('deploy_passenger_to');


        Route::post('/save_point-to-cargo', 'ListingController@deployCargo')->name('deployCargo');
        Route::get('/drop-off-points-cargo', 'ListingController@map_Deploy_Cargo')->name('map_Deploy_Cargo');
        Route::get('/suggest-to-detail', 'ListingController@toDetail')->name('to_detail');
        Route::get('/suggest-to-detail-cargo', 'ListingController@toDetailCargo')->name('to_detail_cargo');
        Route::post('/sugget-to-update', 'ListingController@toDetailUpdate')->name('toDetailUpdate');
        Route::post('/sugget-to-update-cargo', 'ListingController@toDetailUpdateCargo')->name('toDetailUpdateCargo');
        Route::post('/add-stops-passenger', 'ListingController@stopsPassenger')->name('stopsPassenger');
        Route::get('/add-stops-passenger-show', 'ListingController@stopsPassengerShow')->name('stopsPassenger.show');
        Route::post('/add-stops-cargo', 'ListingController@stopsCargo')->name('stopsCargo');
        Route::get('/stopslistings-cargo', 'ListingController@stopsListings_cargo')->name('stopsListings_cargo');
        Route::get('/stop-places-passenger', 'ListingController@stopPlacesPassenger')->name('stopPlacesPassenger');
        Route::get('/stop-places-cargo', 'ListingController@stopPlacesCargo')->name('stopPlacesCargo');
        Route::get('/when-trip-passenger', 'ListingController@whenTripPassenger')->name('whenTripPassenger');
        Route::get('/when-trip-cargo', 'ListingController@whenTripCargo')->name('whenTripCargo');
        Route::get('/choose-car-passenger', 'ListingController@chooseCarPassenger')->name('chooseCarPassenger');
        Route::get('/choose-car-passenger-2', 'ListingController@chooseCarPassengerAfterSetPrice')->name('chooseCarPassengerAfterSetPrice');
        Route::post('/save-date-cargo', 'ListingController@saveDateCargo')->name('saveDateCargo');
        Route::get('/choose-car-cargo', 'ListingController@chooseCarCargo')->name('chooseCarCargo');
        Route::get('/choose-car-cargo-2', 'ListingController@chooseCarCargoAfterSetPrice')->name('chooseCarCargoAfterSetPrice');
        Route::get('/change-price-passenger', 'ListingController@changePrice')->name('changePrice');
        Route::get('/change-price-cargo', 'ListingController@changePrice_cargo')->name('changePrice_cargo');
        Route::post('/save-price', 'ListingController@savePrice')->name('savePrice');
        Route::post('/updateStops', 'ListingController@updateStops')->name('updateStops');
        Route::post('/updateStopsCargo', 'ListingController@updateStopsCargo')->name('updateStopsCargo');
        Route::post('/save-price-cargo', 'ListingController@savePrice_cargo')->name('savePrice_cargo');
        Route::post('/save-price-total', 'ListingController@savePrice_total')->name('savePrice_total');
        Route::post('/save-price-total-cargo', 'ListingController@savePrice_total_cargo')->name('savePrice_total_cargo');
        Route::post('/save-car-cargo', 'ListingController@saveCar_cargo')->name('saveCar_cargo');
        Route::get('/add-a-photo', 'ListingController@addPhoto')->name('addPhoto');
        Route::get('/add-a-photo-cargo', 'ListingController@addPhoto_cargo')->name('addPhoto_cargo');
        Route::post('/save-ride', 'ListingController@uploadphoto')->name('uploadphoto');
        Route::post('/save-ride-cargo', 'ListingController@uploadphoto_cargo')->name('uploadphoto_cargo');
        Route::get('/add-comment', 'ListingController@addComment')->name('addComment');
        Route::get('/add-comment-cargo', 'ListingController@addComment_cargo')->name('addComment_cargo');
        Route::get('/set-return', 'ListingController@setReturn')->name('setReturn');
        Route::get('/set-return-cargo', 'ListingController@setReturn_cargo')->name('setReturn_cargo');
        Route::get('/set-return-trip', 'ListingController@setReturntrip')->name('setReturntrip');
        Route::get('/set-return-trip-cargo', 'ListingController@setReturntrip_cargo')->name('setReturntrip_cargo');
        Route::post('/save-comment', 'ListingController@saveComment')->name('saveComment');
        Route::post('/save-comment-cargo', 'ListingController@saveComment_cargo')->name('saveComment_cargo');
        Route::get('/clearSession', 'ListingController@clearSession')->name('clearSession');

        Route::delete('travel/{travel}', 'ListingController@destroy')->name('trip.destroy');
        Route::delete('save-search/{travel}', 'ProfileController@destroySearchTrip')->name('search.trip.destroy');
        Route::get('travel/{travel}/edit', 'ListingController@edit')->name('trip.edit');
        Route::get('travel/{travel}/drop-off-points-cargo', 'ListingController@edit_map_Deploy_Cargo')->name('edit.trip.map_Deploy_Cargo');
        Route::get('travel/add-stops-passenger', 'ListingController@edit_stopsPassenger')->name('stopsPassengerEdit');
        Route::put('travel/{travel}', 'ListingController@update')->name('trip.update');
        Route::get('travel/{travel}/copy', 'ListingController@copy')->name('trip.copy');
        Route::get('travel/{travel}/return', 'ListingController@return')->name('trip.return');
        Route::get('travel/{travel}/end', 'ListingController@endTrip')->name('trip.end');
    });

    Route::middleware(['admin'])->group(function () {

        Route::get('/admin', 'Admin\UsersController@index')->name('admin-dashboard');
        Route::get('/settings', 'SettingController@index')->name('admin.settings');

        Route::group([
            'prefix' => 'admin/users',
        ], function () {
            Route::get('/', 'Admin\UsersController@index')
                ->name('admin.users.index');
            Route::get('/create', 'Admin\UsersController@create')
                ->name('admin.users.create');
            Route::get('/show/{users}', 'Admin\UsersController@show')
                ->name('admin.users.show');
            Route::get('/chat/{users}', 'Admin\UsersController@chat')
                ->name('admin.users.chat');
            Route::get('/curator/{users}', 'Admin\UsersController@curator')
                ->name('admin.users.curator');
            Route::get('/level1/{users}', 'Admin\UsersController@level1')
                ->name('admin.users.level1');
            Route::get('/{users}/edit', 'Admin\UsersController@edit')
                ->name('admin.users.edit');
            Route::post('/', 'Admin\UsersController@store')
                ->name('admin.users.store');
            Route::put('users/{users}', 'Admin\UsersController@update')
                ->name('admin.users.update')->where('id', '[0-9]+');
            Route::delete('/users/{users}', 'Admin\UsersController@destroy')
                ->name('admin.users.destroy')->where('id', '[0-9]+');
            Route::post('users_mass_destroy', 'Admin\UsersController@massDestroy')
                ->name('admin.users.mass_destroy');
            Route::post('/{users}/edit-main', 'Admin\UsersController@edit_main')
                ->name('admin.users.edit_main');
            Route::post('/{users}/edit-car', 'Admin\UsersController@edit_car')
                ->name('admin.users.edit_car');
            Route::post('/{users}/edit-truck', 'Admin\UsersController@edit_truck')
                ->name('admin.users.edit_truck');
            Route::post('/{users}/edit-passport', 'Admin\UsersController@edit_passport')
                ->name('admin.users.edit_passport');
            Route::post('/{users}/edit-driver-lisence', 'Admin\UsersController@edit_lisence')
                ->name('admin.users.edit_lisence');
            Route::post('/{users}/replenish', 'Admin\UsersController@replenish')
                ->name('admin.users.replenish');
            Route::post('/{users}/withdraw', 'Admin\UsersController@withdraw')
                ->name('admin.users.withdraw');
            Route::post('/filter-users', 'Admin\UsersController@filter')
                ->name('admin.users.filter');
            Route::post('/filter-users-transaction', 'Admin\UsersController@transaction_filter')
                ->name('admin.users.transaction_filter');
            Route::post('/verify_pdf', 'Admin\UsersController@verify_pdf')
                ->name('admin.users.verify_pdf');
            Route::post('/verify_pdf_delete', 'Admin\UsersController@verify_pdf_delete')
                ->name('admin.users.verify_pdf_delete');
        });
        Route::group([
            'prefix' => 'admin/permissions',
        ], function () {
            Route::get('/', 'Admin\PermissionsController@index')
                ->name('admin.permissions.index');
            Route::get('/create', 'Admin\PermissionsController@create')
                ->name('admin.permissions.create');
            Route::get('/show/{permissions}', 'Admin\PermissionsController@show')
                ->name('admin.permissions.show');
            Route::get('/{permissions}/edit', 'Admin\PermissionsController@edit')
                ->name('admin.permissions.edit');
            Route::post('/', 'Admin\PermissionsController@store')
                ->name('admin.permissions.store');
            Route::put('admin/{permissions}', 'Admin\PermissionsController@update')
                ->name('admin.permissions.update')->where('id', '[0-9]+');
            Route::delete('/permissions/{permissions}', 'Admin\PermissionsController@destroy')
                ->name('admin.permissions.destroy')->where('id', '[0-9]+');
            Route::post('permissions_mass_destroy', 'Admin\permissionsController@massDestroy')
                ->name('admin.permissions.mass_destroy');
        });
    
        Route::group([
            'prefix' => 'admin/roles',
        ], function () {
            Route::get('/', 'Admin\RolesController@index')
                ->name('admin.roles.index');
            Route::get('/create', 'Admin\RolesController@create')
                ->name('admin.roles.create');
            Route::get('/show/{roles}', 'Admin\RolesController@show')
                ->name('admin.roles.show');
            Route::get('/{roles}/edit', 'Admin\RolesController@edit')
                ->name('admin.roles.edit');
            Route::post('/', 'Admin\RolesController@store')
                ->name('admin.roles.store');
            Route::put('roles/{roles}', 'Admin\RolesController@update')
                ->name('admin.roles.update')->where('id', '[0-9]+');
            Route::delete('/roles/{roles}', 'Admin\RolesController@destroy')
                ->name('admin.roles.destroy')->where('id', '[0-9]+');
            Route::post('roles_mass_destroy', 'Admin\RolesController@massDestroy')
                ->name('admin.roles.mass_destroy');
            Route::post('/filter-role', 'Admin\RolesController@filter')
                ->name('admin.roles.filter');
        });

        Route::group([
            'prefix' => 'admin/posts',
        ], function () {
            Route::get('/', 'Admin\PostsController@index')
                ->name('admin.posts.index');
            Route::get('/create', 'Admin\PostsController@create')
                ->name('admin.posts.create');
            Route::get('/show/{posts}', 'Admin\PostsController@show')
                ->name('admin.posts.show')->where('id', '[0-9]+');
            Route::get('/{posts}/edit', 'Admin\PostsController@edit')
                ->name('admin.posts.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\PostsController@store')
                ->name('admin.posts.store');
            Route::put('posts/{posts}', 'Admin\PostsController@update')
                ->name('admin.posts.update')->where('id', '[0-9]+');
            Route::delete('/posts/{posts}', 'Admin\PostsController@destroy')
                ->name('admin.posts.destroy')->where('id', '[0-9]+');
            Route::post('posts_mass_destroy', 'Admin\PostsController@massDestroy')
                ->name('admin.posts.mass_destroy');
        });
        
        Route::group([
            'prefix' => 'admin/news',
        ], function () {
            Route::get('/', 'Admin\NewsController@index')
                ->name('admin.news.index');
            Route::get('/create', 'Admin\NewsController@create')
                ->name('admin.news.create');
            Route::get('/show/{news}', 'Admin\NewsController@show')
                ->name('admin.news.show')->where('id', '[0-9]+');
            Route::get('/{news}/edit', 'Admin\NewsController@edit')
                ->name('admin.news.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\NewsController@store')
                ->name('admin.news.store');
            Route::put('news/{news}', 'Admin\NewsController@update')
                ->name('admin.news.update')->where('id', '[0-9]+');
            Route::delete('/news/{news}', 'Admin\NewsController@destroy')
                ->name('admin.news.destroy')->where('id', '[0-9]+');
            Route::post('blogs_mass_destroy', 'Admin\NewsController@massDestroy')
                ->name('admin.news.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/listings',
        ], function () {
            Route::get('/', 'Admin\ListingsController@index')
                ->name('admin.listing.index');
            Route::get('/create','Admin\ListingsController@create')
                ->name('admin.listing.create');
            Route::get('/show/{listing}','Admin\ListingsController@show')
                ->name('admin.listing.show')->where('id', '[0-9]+');
            Route::get('/{listing}/edit','Admin\ListingsController@edit')
                ->name('admin.listing.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\ListingsController@store')
                ->name('admin.listing.store');
            Route::post('/store-passenger-trip', 'Admin\ListingsController@store_listing')
                ->name('admin.listing.store_listing');
            Route::put('listing/{listing}', 'Admin\ListingsController@update')
                ->name('admin.listing.update')->where('id', '[0-9]+');
            Route::delete('/listing/{listing}','Admin\ListingsController@destroy')
                ->name('admin.listing.destroy')->where('id', '[0-9]+');
            Route::post('/filter-trips','Admin\ListingsController@filter')
                ->name('admin.listing.filter');
            Route::post('listing_mass_destroy', 'Admin\ListingsController@massDestroy')
                ->name('admin.listing.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/passports',
        ], function () {
            Route::get('/', 'Admin\PassportsController@index')
                ->name('admin.passport.index');
            Route::get('/create','Admin\PassportsController@create')
                ->name('admin.passport.create');
            Route::get('/show/{passport}','Admin\PassportsController@show')
                ->name('admin.passport.show')->where('id', '[0-9]+');
            Route::get('/{passport}/edit','Admin\PassportsController@edit')
                ->name('admin.passport.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\PassportsController@store')
                ->name('admin.passport.store');
            Route::put('passport/{passport}', 'Admin\PassportsController@update')
                ->name('admin.passport.update')->where('id', '[0-9]+');
            Route::delete('/passport/{passport}','Admin\PassportsController@destroy')
                ->name('admin.passport.destroy')->where('id', '[0-9]+');
            Route::post('/store-passport', 'Admin\PassportsController@store_passport')
                ->name('admin.passport.store_passport');
            Route::post('/filter-passport', 'Admin\PassportsController@filter')
                ->name('admin.passport.filter');
            Route::post('passport_mass_destroy', 'Admin\PassportsController@massDestroy')
                ->name('admin.passport.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/driver__lisences',
        ], function () {
            Route::get('/', 'Admin\DriverLisencesController@index')
                ->name('admin.driver__lisence.index');
            Route::get('/create','Admin\DriverLisencesController@create')
                ->name('admin.driver__lisence.create');
            Route::get('/show/{driverLisence}','Admin\DriverLisencesController@show')
                ->name('admin.driver__lisence.show')->where('id', '[0-9]+');
            Route::get('/{driverLisence}/edit','Admin\DriverLisencesController@edit')
                ->name('admin.driver__lisence.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DriverLisencesController@store')
                ->name('admin.driver__lisence.store');
            Route::put('driver__lisence/{driverLisence}', 'Admin\DriverLisencesController@update')
                ->name('admin.driver__lisence.update')->where('id', '[0-9]+');
            Route::delete('/driver__lisence/{driverLisence}','Admin\DriverLisencesController@destroy')
                ->name('admin.driver__lisence.destroy')->where('id', '[0-9]+');
            Route::post('/store-license', 'Admin\DriverLisencesController@store_lisence')
                ->name('admin.driver__lisence.store_lisence');
            Route::post('/filter-license', 'Admin\DriverLisencesController@filter')
                ->name('admin.driver__lisence.filter');
            Route::post('driver__lisence_mass_destroy', 'Admin\DriverLisencesController@massDestroy')
                ->name('admin.driver__lisence.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/cars',
        ], function () {
            Route::get('/', 'Admin\CarsController@index')
            ->name('admin.car.index');
            Route::get('/create', 'Admin\CarsController@create')
            ->name('admin.car.create');
            Route::get('/show/{car}', 'Admin\CarsController@show')
            ->name('admin.car.show')->where('id', '[0-9]+');
            Route::get('/{car}/edit', 'Admin\CarsController@edit')
            ->name('admin.car.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\CarsController@store')
            ->name('admin.car.store');
            Route::put('car/{car}', 'Admin\CarsController@update')
            ->name('admin.car.update')->where('id', '[0-9]+');
            Route::delete('/car/{car}', 'Admin\CarsController@destroy')
            ->name('admin.car.destroy')->where('id', '[0-9]+');
            Route::post('/filter-car', 'Admin\CarsController@filter')
                ->name('admin.car.filter');
            Route::post('car_mass_destroy', 'Admin\CarsController@massDestroy')
            ->name('admin.car.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/trucks',
        ], function () {
            Route::get('/', 'Admin\TrucksController@index')
            ->name('admin.truck.index');
            Route::get('/create', 'Admin\TrucksController@create')
            ->name('admin.truck.create');
            Route::get('/show/{truck}', 'Admin\TrucksController@show')
            ->name('admin.truck.show')->where('id', '[0-9]+');
            Route::get('/{truck}/edit', 'Admin\TrucksController@edit')
            ->name('admin.truck.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\TrucksController@store')
            ->name('admin.truck.store');
            Route::put('truck/{truck}', 'Admin\TrucksController@update')
            ->name('admin.truck.update')->where('id', '[0-9]+');
            Route::delete('/truck/{truck}', 'Admin\TrucksController@destroy')
            ->name('admin.truck.destroy')->where('id', '[0-9]+');
            Route::post('/filter-truck', 'Admin\TrucksController@filter')
                ->name('admin.truck.filter');
            Route::post('truck_mass_destroy', 'Admin\TrucksController@massDestroy')
            ->name('admin.truck.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/support',
        ], function () {
            Route::get('/', 'Admin\SupportController@index')
            ->name('admin.support.index');
            Route::get('/appeal', 'Admin\SupportController@appeal')
            ->name('admin.support.appeal');
            Route::get('/graph', 'Admin\SupportController@graph')
            ->name('admin.support.graph');
            Route::get('/category', 'Admin\SupportController@category')
            ->name('admin.support.category');
            Route::get('/chat', 'Admin\SupportController@support')->name('admin.support.chat');
            Route::get('/{demand}/edit', 'Admin\SupportController@edit')
            ->name('admin.demand.edit')->where('id', '[0-9]+');
            Route::put('demand/{demand}', 'Admin\SupportController@update')
            ->name('admin.demand.update')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'admin/demand_categories',
        ], function () {
            Route::get('/', 'Admin\DemandCategoriesController@index')
            ->name('admin.demand_categories.index');
            Route::get('/create', 'Admin\DemandCategoriesController@create')
            ->name('admin.demand_categories.create');
            Route::get('/show/{demandCategory}', 'Admin\DemandCategoriesController@show')
            ->name('admin.demand_categories.show')->where('id', '[0-9]+');
            Route::get('/right/{demandCategory}', 'Admin\DemandCategoriesController@right')
            ->name('admin.demand_categories.right')->where('id', '[0-9]+');
            Route::get('/{demandCategory}/edit', 'Admin\DemandCategoriesController@edit')
            ->name('admin.demand_categories.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DemandCategoriesController@store')
            ->name('admin.demand_categories.store');
            Route::put('demand_category/{demandCategory}', 'Admin\DemandCategoriesController@update')
            ->name('admin.demand_categories.update')->where('id', '[0-9]+');
            Route::put('demand_category/right/{demandCategory}', 'Admin\DemandCategoriesController@updateRight')
            ->name('admin.demand_categories.updateRight')->where('id', '[0-9]+');
            Route::delete('/demand_category/{demandCategory}', 'Admin\DemandCategoriesController@destroy')
            ->name('admin.demand_categories.destroy')->where('id', '[0-9]+');
            Route::post('demand_categories_mass_destroy', 'Admin\DemandCategoriesController@massDestroy')
            ->name('admin.demand_categories.mass_destroy');
        });
        Route::group([
            'prefix' => 'admin/demand_statuses',
        ], function () {
            Route::get('/', 'Admin\DemandStatusesController@index')
            ->name('admin.demand_status.index');
            Route::get('/create', 'Admin\DemandStatusesController@create')
            ->name('admin.demand_status.create');
            Route::get('/show/{demandStatus}', 'Admin\DemandStatusesController@show')
            ->name('admin.demand_status.show')->where('id', '[0-9]+');
            Route::get('/{demandStatus}/edit', 'Admin\DemandStatusesController@edit')
            ->name('admin.demand_status.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DemandStatusesController@store')
            ->name('admin.demand_status.store');
            Route::put('demand_status/{demandStatus}', 'Admin\DemandStatusesController@update')
            ->name('admin.demand_status.update')->where('id', '[0-9]+');
            Route::delete('/demand_status/{demandCategory}', 'Admin\DemandStatusesController@destroy')
            ->name('admin.demand_status.destroy')->where('id', '[0-9]+');
            Route::post('demand_status_mass_destroy', 'Admin\DemandStatusesController@massDestroy')
            ->name('admin.demand_status.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/demand_criticalities',
        ], function () {
            Route::get('/', 'Admin\DemandCriticalitiesController@index')
            ->name('admin.demand_criticality.index');
            Route::get('/create', 'Admin\DemandCriticalitiesController@create')
            ->name('admin.demand_criticality.create');
            Route::get('/show/{demandCriticality}', 'Admin\DemandCriticalitiesController@show')
            ->name('admin.demand_criticality.show')->where('id', '[0-9]+');
            Route::get('/{demandCriticality}/edit', 'Admin\DemandCriticalitiesController@edit')
            ->name('admin.demand_criticality.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DemandCriticalitiesController@store')
            ->name('admin.demand_criticality.store');
            Route::put('demand_criticality/{demandCriticality}', 'Admin\DemandCriticalitiesController@update')
            ->name('admin.demand_criticality.update')->where('id', '[0-9]+');
            Route::delete('/demand_criticality/{demandCriticality}', 'Admin\DemandCriticalitiesController@destroy')
            ->name('admin.demand_criticality.destroy')->where('id', '[0-9]+');
            Route::post('demand_criticality_mass_destroy', 'Admin\DemandCriticalitiesController@massDestroy')
            ->name('admin.demand_criticality.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/demand_complexities',
        ], function () {
            Route::get('/', 'Admin\DemandComplexitiesController@index')
            ->name('admin.demand_complexity.index');
            Route::get('/create', 'Admin\DemandComplexitiesController@create')
            ->name('admin.demand_complexity.create');
            Route::get('/show/{demandComplexity}', 'Admin\DemandComplexitiesController@show')
            ->name('admin.demand_complexity.show')->where('id', '[0-9]+');
            Route::get('/{demandComplexity}/edit', 'Admin\DemandComplexitiesController@edit')
            ->name('admin.demand_complexity.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DemandComplexitiesController@store')
            ->name('admin.demand_complexity.store');
            Route::put('demand_complexity/{demandComplexity}', 'Admin\DemandComplexitiesController@update')
            ->name('admin.demand_complexity.update')->where('id', '[0-9]+');
            Route::delete('/demand_complexity/{demandComplexity}', 'Admin\DemandComplexitiesController@destroy')
            ->name('admin.demand_complexity.destroy')->where('id', '[0-9]+');
            Route::post('demand_complexity_mass_destroy', 'Admin\DemandComplexitiesController@massDestroy')
            ->name('admin.demand_complexity.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/demand_scores',
        ], function () {
            Route::get('/', 'Admin\DemandScoresController@index')
            ->name('admin.demand_score.index');
            Route::get('/create', 'Admin\DemandScoresController@create')
            ->name('admin.demand_score.create');
            Route::get('/show/{demandScore}', 'Admin\DemandScoresController@show')
            ->name('admin.demand_score.show')->where('id', '[0-9]+');
            Route::get('/{demandScore}/edit', 'Admin\DemandScoresController@edit')
            ->name('admin.demand_score.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\DemandScoresController@store')
            ->name('admin.demand_score.store');
            Route::put('demand_score/{demandScore}', 'Admin\DemandScoresController@update')
            ->name('admin.demand_score.update')->where('id', '[0-9]+');
            Route::delete('/demand_score/{demandScore}', 'Admin\DemandScoresController@destroy')
            ->name('admin.demand_score.destroy')->where('id', '[0-9]+');
            Route::post('demand_score_mass_destroy', 'Admin\DemandScoresController@massDestroy')
            ->name('admin.demand_score.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/support_levels',
        ], function () {
            Route::get('/', 'Admin\SupportLevelsController@index')
            ->name('admin.support_levels.index');
            Route::get('/create', 'Admin\SupportLevelsController@create')
            ->name('admin.support_levels.create');
            Route::get('/show/{supportLevels}', 'Admin\SupportLevelsController@show')
            ->name('admin.support_levels.show')->where('id', '[0-9]+');
            Route::get('/{supportLevels}/edit', 'Admin\SupportLevelsController@edit')
            ->name('admin.support_levels.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\SupportLevelsController@store')
            ->name('admin.support_levels.store');
            Route::put('support_level/{supportLevels}', 'Admin\SupportLevelsController@update')
            ->name('admin.support_levels.update')->where('id', '[0-9]+');
            Route::delete('/support_levels/{supportLevels}', 'Admin\SupportLevelsController@destroy')
            ->name('admin.support_levels.destroy')->where('id', '[0-9]+');
        });

        Route::group([
            'prefix' => 'admin/fast_answers',
        ], function () {
            Route::get('/', 'Admin\FastAnswersController@index')
            ->name('admin.fast_answers.index');
            Route::get('/create', 'Admin\FastAnswersController@create')
            ->name('admin.fast_answers.create');
            Route::get('/show/{fastAnswer}', 'Admin\FastAnswersController@show')
            ->name('admin.fast_answers.show')->where('id', '[0-9]+');
            Route::get('/{fastAnswer}/edit', 'Admin\FastAnswersController@edit')
            ->name('admin.fast_answers.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\FastAnswersController@store')
            ->name('admin.fast_answers.store');
            Route::put('fast_answer/{fastAnswer}', 'Admin\FastAnswersController@update')
            ->name('admin.fast_answers.update')->where('id', '[0-9]+');
            Route::delete('/fast_answer/{fastAnswer}', 'Admin\FastAnswersController@destroy')
            ->name('admin.fast_answers.destroy')->where('id', '[0-9]+');
            Route::post('fast_answer_mass_destroy', 'Admin\FastAnswersController@massDestroy')
            ->name('admin.fast_answers.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/reviews',
        ], function () {
            Route::get('/', 'Admin\ReviewsController@index')
                    ->name('admin.reviews.index');
            Route::get('/create','Admin\ReviewsController@create')
                    ->name('admin.reviews.create');
            Route::get('/show/{reviews}','Admin\ReviewsController@show')
                    ->name('admin.reviews.show')->where('id', '[0-9]+');
            Route::get('/{reviews}/edit','Admin\ReviewsController@edit')
                    ->name('admin.reviews.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\ReviewsController@store')
                    ->name('admin.reviews.store');
            Route::post('/filter', 'Admin\ReviewsController@filter')
                    ->name('admin.reviews.filter');
            Route::put('reviews/{reviews}', 'Admin\ReviewsController@update')
                    ->name('admin.reviews.update')->where('id', '[0-9]+');
            Route::delete('/reviews/{reviews}','Admin\ReviewsController@destroy')
                    ->name('admin.reviews.destroy')->where('id', '[0-9]+');
            Route::post('review_mass_destroy', 'Admin\ReviewsController@massDestroy')
                ->name('admin.reviews.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/info',
        ], function () {
            Route::get('/', 'Admin\InfoController@index')
                    ->name('admin.info.index');
            Route::get('/create','Admin\InfoController@create')
                    ->name('admin.info.create');
            Route::get('/show/{info}','Admin\InfoController@show')
                    ->name('admin.info.show')->where('id', '[0-9]+');
            Route::get('/{info}/edit','Admin\InfoController@edit')
                    ->name('admin.info.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\InfoController@store')
                    ->name('admin.info.store');
            Route::post('/filter', 'Admin\InfoController@filter')
                    ->name('admin.info.filter');
            Route::put('info/{info}', 'Admin\InfoController@update')
                    ->name('admin.info.update')->where('id', '[0-9]+');
            Route::delete('/info/{info}','Admin\InfoController@destroy')
                    ->name('admin.info.destroy')->where('id', '[0-9]+');
            Route::post('info_mass_destroy', 'Admin\InfoController@massDestroy')
                ->name('admin.info.mass_destroy');
        });

        Route::group([
            'prefix' => 'admin/dashboard',
        ], function () {
            Route::get('/trips', 'Admin\DashboardController@trips')
            ->name('admin.dashboard.trips');
            Route::get('/profit', 'Admin\DashboardController@profit')
            ->name('admin.dashboard.profit');
            Route::get('/google', 'Admin\DashboardController@google')
            ->name('admin.dashboard.google');
            Route::get('/yandex', 'Admin\DashboardController@yandex')
            ->name('admin.dashboard.yandex');
            Route::get('/subscribe', 'Admin\DashboardController@subscribe')
            ->name('admin.dashboard.subscribe');
            Route::get('/bonus', 'Admin\DashboardController@bonus')
            ->name('admin.dashboard.bonus');
            Route::get('/withdraw', 'Admin\DashboardController@withdraw')
            ->name('admin.dashboard.withdraw');
            Route::get('/transaction', 'Admin\DashboardController@transaction')
            ->name('admin.dashboard.transaction');
            Route::get('/reviews', 'Admin\DashboardController@reviews')
            ->name('admin.dashboard.reviews');
            Route::get('/completed_trips', 'Admin\DashboardController@completedTrips')
            ->name('admin.dashboard.completed_trips');
            Route::get('/review_show/{listing}', 'Admin\DashboardController@reviewShow')
            ->name('admin.dashboard.reviewShow');
        });

        Route::group([
            'prefix' => 'admin/transactions',
        ], function () {
            Route::get('/', 'Admin\TransactionsController@index')
            ->name('admin.transactions.index');
            Route::get('/create', 'Admin\TransactionsController@create')
            ->name('admin.transactions.create');
            Route::get('/show/{transactions}', 'Admin\TransactionsController@show')
            ->name('admin.transactions.show')->where('id', '[0-9]+');
            Route::get('/{transactions}/edit', 'Admin\TransactionsController@edit')
            ->name('admin.transactions.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\TransactionsController@store')
            ->name('admin.transactions.store');
            Route::put('transactions/{transactions}', 'Admin\TransactionsController@update')
            ->name('admin.transactions.update')->where('id', '[0-9]+');
            Route::delete('/transactions/{transactions}', 'Admin\TransactionsController@destroy')
            ->name('admin.transactions.destroy')->where('id', '[0-9]+');
            Route::post('transactions_mass_destroy', 'Admin\TransactionsController@massDestroy')
            ->name('admin.transactions.mass_destroy');
            Route::post('/filter-transactions', 'Admin\TransactionsController@filter')
            ->name('admin.transactions.filter');
            Route::post('/replenish', 'Admin\TransactionsController@replenish')
            ->name('admin.transactions.replenish');
            Route::post('/withdraw', 'Admin\TransactionsController@withdraw')
            ->name('admin.transactions.withdraw');
        });

        Route::group([
            'prefix' => 'seo_alls',
        ], function () {
            Route::get('/', 'Admin\SeoAllController@index')
            ->name('admin.seo_all.index');
            Route::get('/create', 'Admin\SeoAllController@create')
            ->name('admin.seo_all.create');
            Route::get('/show/{seoAll}', 'Admin\SeoAllController@show')
            ->name('admin.seo_all.show')->where('id', '[0-9]+');
            Route::get('/{seoAll}/edit', 'Admin\SeoAllController@edit')
            ->name('admin.seo_all.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\SeoAllController@store')
            ->name('admin.seo_all.store');
            Route::put('seo_all/{seoAll}', 'Admin\SeoAllController@update')
            ->name('admin.seo_all.update')->where('id', '[0-9]+');
            Route::delete('/seo_all/{seoAll}', 'Admin\SeoAllController@destroy')
            ->name('admin.seo_all.destroy')->where('id', '[0-9]+');
            Route::post('seo_all_mass_destroy', 'Admin\SeoAllController@massDestroy')
            ->name('admin.seo_all.mass_destroy');
        });

        Route::group([
            'prefix' => 'seo_areas',
        ], function () {
            Route::get('/', 'Admin\SeoAreasController@index')
            ->name('admin.seo_area.index');
            Route::get('/create', 'Admin\SeoAreasController@create')
            ->name('admin.seo_area.create');
            Route::get('/show/{seoArea}', 'Admin\SeoAreasController@show')
            ->name('admin.seo_area.show')->where('id', '[0-9]+');
            Route::get('/{seoArea}/edit', 'Admin\SeoAreasController@edit')
            ->name('admin.seo_area.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\SeoAreasController@store')
            ->name('admin.seo_area.store');
            Route::put('seo_area/{seoArea}', 'Admin\SeoAreasController@update')
            ->name('admin.seo_area.update')->where('id', '[0-9]+');
            Route::delete('/seo_area/{seoArea}', 'Admin\SeoAreasController@destroy')
            ->name('admin.seo_area.destroy')->where('id', '[0-9]+');
            Route::post('seo_area_mass_destroy', 'Admin\SeoAreasController@massDestroy')
            ->name('admin.seo_area.mass_destroy');
        });

        Route::group([
            'prefix' => 'pages',
        ], function () {
            Route::get('/', 'Admin\PagesController@index')
                    ->name('admin.pages.index');
            Route::get('/create','Admin\PagesController@create')
                    ->name('admin.pages.create');
            Route::get('/show/{pages}','Admin\PagesController@show')
                    ->name('admin.pages.show')->where('id', '[0-9]+');
            Route::get('/{pages}/edit','Admin\PagesController@edit')
                    ->name('admin.pages.edit')->where('id', '[0-9]+');
            Route::post('/store', 'Admin\PagesController@store')
                    ->name('admin.pages.store');
            Route::put('pages/{pages}', 'Admin\PagesController@update')
                    ->name('admin.pages.update')->where('id', '[0-9]+');
            Route::delete('/pages/{pages}','Admin\PagesController@destroy')
                    ->name('admin.pages.destroy')->where('id', '[0-9]+');
            Route::post('pages_mass_destroy', 'Admin\PagesController@massDestroy')
            ->name('admin.pages.mass_destroy');
            Route::post('/import_csv','Admin\CsvImportController@UploadCsv_pages')
                    ->name('admin.pages.import');
            Route::post('/export_csv','Admin\CsvImportController@export')
                    ->name('admin.pages.export');
        });

        Route::group([
            'prefix' => 'car_brands',
        ], function () {
            Route::get('/', 'Admin\CarBrandsController@index')
            ->name('admin.car_brand.index');
            Route::get('/create', 'Admin\CarBrandsController@create')
            ->name('admin.car_brand.create');
            Route::get('/show/{carBrand}', 'Admin\CarBrandsController@show')
            ->name('admin.car_brand.show')->where('id', '[0-9]+');
            Route::get('/{carBrand}/edit', 'Admin\CarBrandsController@edit')
            ->name('admin.car_brand.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\CarBrandsController@store')
            ->name('admin.car_brand.store');
            Route::put('car_brand/{carBrand}', 'Admin\CarBrandsController@update')
            ->name('admin.car_brand.update')->where('id', '[0-9]+');
            Route::delete('/car_brand/{carBrand}', 'Admin\CarBrandsController@destroy')
            ->name('admin.car_brand.destroy')->where('id', '[0-9]+');
            Route::post('car_brand_mass_destroy', 'Admin\CarBrandsController@massDestroy')
            ->name('admin.car_brand.mass_destroy');
        });

        Route::group([
            'prefix' => 'car_models',
        ], function () {
            Route::get('/', 'Admin\CarModelsController@index')
            ->name('admin.car_model.index');
            Route::get('/create', 'Admin\CarModelsController@create')
            ->name('admin.car_model.create');
            Route::get('/show/{carModel}', 'Admin\CarModelsController@show')
            ->name('admin.car_model.show')->where('id', '[0-9]+');
            Route::get('/{carBrand}/edit', 'Admin\CarModelsController@edit')
            ->name('admin.car_model.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\CarModelsController@store')
            ->name('admin.car_model.store');
            Route::put('car_model/{carModel}', 'Admin\CarModelsController@update')
            ->name('admin.car_model.update')->where('id', '[0-9]+');
            Route::delete('/car_model/{carModel}', 'Admin\CarModelsController@destroy')
            ->name('admin.car_model.destroy')->where('id', '[0-9]+');
            Route::post('car_model_mass_destroy', 'Admin\CarModelsController@massDestroy')
            ->name('admin.car_model.mass_destroy');
        });

        Route::group([
            'prefix' => 'colors',
        ], function () {
            Route::get('/', 'Admin\ColorsController@index')
                 ->name('admin.colors.index');
            Route::get('/create','Admin\ColorsController@create')
                 ->name('admin.colors.create');
            Route::get('/show/{colors}','Admin\ColorsController@show')
                 ->name('admin.colors.show')->where('id', '[0-9]+');
            Route::get('/{colors}/edit','Admin\ColorsController@edit')
                 ->name('admin.colors.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\ColorsController@store')
                 ->name('admin.colors.store');
            Route::put('colors/{colors}', 'Admin\ColorsController@update')
                 ->name('admin.colors.update')->where('id', '[0-9]+');
            Route::delete('/colors/{colors}','Admin\ColorsController@destroy')
                 ->name('admin.colors.destroy')->where('id', '[0-9]+');
            Route::delete('/colors/{carModel}', 'Admin\ColorsController@destroy')
            ->name('admin.colors.destroy')->where('id', '[0-9]+');
            Route::post('colors_mass_destroy', 'Admin\ColorsController@massDestroy')
            ->name('admin.colors.mass_destroy');
        });

        Route::group([
            'prefix' => 'reasons',
        ], function () {
            Route::get('/', 'Admin\ReasonsController@index')
                 ->name('admin.reason.index');
            Route::get('/create','Admin\ReasonsController@create')
                 ->name('admin.reason.create');
            Route::get('/show/{reason}','Admin\ReasonsController@show')
                 ->name('admin.reason.show')->where('id', '[0-9]+');
            Route::get('/{reason}/edit','Admin\ReasonsController@edit')
                 ->name('admin.reason.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\ReasonsController@store')
                 ->name('admin.reason.store');
            Route::put('reason/{reason}', 'Admin\ReasonsController@update')
                 ->name('admin.reason.update')->where('id', '[0-9]+');
            Route::delete('/reason/{reason}','Admin\ReasonsController@destroy')
                 ->name('admin.reason.destroy')->where('id', '[0-9]+');
            Route::post('reason_mass_destroy', 'Admin\ReasonsController@massDestroy')
            ->name('admin.reason.mass_destroy');
        });

        Route::group([
            'prefix' => 'complains',
        ], function () {
            Route::get('/', 'Admin\ComplainsController@index')
                    ->name('admin.complains.index');
            Route::get('/all', 'Admin\ComplainsController@all')
                    ->name('admin.complains.all');
            Route::get('/create','Admin\ComplainsController@create')
                    ->name('admin.complains.create');
            Route::get('/show/{complains}','Admin\ComplainsController@show')
                    ->name('admin.complains.show')->where('id', '[0-9]+');
            Route::get('/{complains}/edit','Admin\ComplainsController@edit')
                    ->name('admin.complains.edit')->where('id', '[0-9]+');
            Route::post('/', 'Admin\ComplainsController@store')
                    ->name('admin.complains.store');
            Route::put('complains/{complains}', 'Admin\ComplainsController@update')
                    ->name('admin.complains.update')->where('id', '[0-9]+');
            Route::delete('/complains/{complains}','Admin\ComplainsController@destroy')
                    ->name('admin.complains.destroy')->where('id', '[0-9]+');
            Route::post('complain_mass_destroy', 'Admin\ComplainsController@massDestroy')
                    ->name('admin.complains.mass_destroy');
        });
        

    });
});

Route::get('/password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset/', 'Auth\ResetPasswordController@showLinkRequestForm')->name('password.update');

Route::get('api/users/search', 'Admin\UsersController@search')
->name('api.users.search');
Route::get('api/car_brands/search', 'Admin\CarBrandsController@search')
->name('api.car_brands.search');
Route::get('api/car_models/search', 'Admin\CarModelsController@search')
->name('api.car_models.search');











