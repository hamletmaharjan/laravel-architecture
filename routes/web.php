<?php

Auth::routes();
// Route::get('/',function (){
//     return Redirect::to('/login');
// });
Route::get('/', 'Front\HomeController@index');

Route::resource('/posts', 'Front\PostController')->only([
    'index', 'show'
]);
Route::resource('/news', 'Front\NewsController')->only([
    'index', 'show'
]);
Route::resource('/galleries', 'Front\GalleryController')->only([
    'index', 'show'
]);
Route::resource('/events', 'Front\EventController')->only([
    'index', 'show'
]);
Route::resource('/notices', 'Front\NoticeController')->only([
    'index', 'show'
]);
Route::get('/pages/{slug}', 'Front\PageController@show');
Route::get('/about', function() {
    return view('front.about');
});
// // Route::get('/posts', 'Admin\PostController@getAll')->name('posts.index');
// Route::resources([
//     'posts' => 'Front\PostController'
// ]);
// Route::get('/news', 'Admin\NewsController@getAll')->name('news.index');
// Route::get('/events', 'Admin\EventController@getAll')->name('events.index');
// Route::get('/notices', 'Admin\NoticeController@getAll')->name('notices.index');

// Route::get('/galleries/{id}', 'Admin\GalleryController@getImages')->name('galleries.show');



Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('roles')->group(function () {
        Route::resource('/menu', 'Roles\MenuController');
        Route::get('/menu/menuControllerChangeStatus/{id}', 'Roles\MenuController@changeStatus');
        Route::resource('/group', 'Roles\UserGroupController');
        Route::get('/roleAccessIndex', 'Roles\RoleAccessController@index');
        Route::get('roleChangeAccess/{allowId}/{id}', 'Roles\RoleAccessController@changeAccess');
    });

    Route::resource('/user', 'UserController');
    Route::get('/user/status/{id}', 'UserController@status');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('profile/profilePic', 'UserController@profilePic');
    Route::post('/profile/password', 'UserController@password');

    Route::prefix('configurations')->group(function () {
        Route::resource('/designation', 'Configurations\DesignationController');
        Route::resource('/department', 'Configurations\DepartmentController');
        Route::resource('/fiscalYear', 'Configurations\FiscalYearController');
        Route::get('/fiscalYear/status/{id}', 'Configurations\FiscalYearController@status');
        Route::resource('/country', 'Configurations\CountryController');
        Route::get('/country/status/{id}', 'Configurations\CountryController@status');
        Route::resource('/pradesh', 'Configurations\PradeshController');
        Route::resource('/muniType', 'Configurations\MuniTypeController');
        Route::resource('/district', 'Configurations\DistrictController');
        Route::resource('/municipality', 'Configurations\MunicipalityController');
        Route::resource('/officeType', 'Configurations\OfficeTypeController');

        Route::resource('/office', 'Configurations\OfficeController');
        Route::get('/office/status/{id}', 'Configurations\OfficeController@status');


    });

    Route::prefix('logs')->group(function () {
        Route::get('/loginLogs', 'LogController@loginLogs');
        Route::get('/failLoginLogs', 'LogController@failLogin');
    });

    Route::resource('feedback','FeedbackController');


    //additional
    Route::prefix('admin')->group(function () {
        Route::resource('/posts', 'Admin\PostController', ['as' => 'admin']);

        //News
        Route::resource('/news', 'Admin\NewsController', ['as' => 'admin']);
        Route::get('/news/status/{id}', 'Admin\NewsController@status')->name('admin.news.status');

        //galleries
        Route::resource('/galleries', 'Admin\GalleryController', ['as' => 'admin']);
        
        //gallery images
        Route::resource('/galleryImages', 'Admin\GalleryImageController', ['as' => 'admin']);
        Route::get('/galleryImages/status/{id}', 'Admin\GalleryImageController@status')->name('admin.galleryImages.status');

        //events
        Route::resource('/events', 'Admin\EventController', ['as' => 'admin']);
        Route::get('/events/status/{id}', 'Admin\EventController@status')->name('admin.events.status');

        //navbar menu types
        Route::resource('/navbarMenuTypes', 'Admin\NavbarMenuTypeController', ['as' => 'admin']);

        //navbar menus
        Route::resource('/navbarMenus', 'Admin\NavbarMenuController', ['as' => 'admin']);
        Route::get('/navbarMenus/status/{id}', 'Admin\NavbarMenuController@status')->name('admin.navbarMenus.status');

        //pages
        Route::resource('/pages', 'Admin\PageController', ['as' => 'admin']);
        Route::get('/pages/status/{id}', 'Admin\PageController@status')->name('admin.pages.status');

        //notices
        Route::resource('/notices', 'Admin\NoticeController', ['as' => 'admin']);
        Route::get('/notices/status/{id}', 'Admin\NoticeController@status')->name('admin.notices.status');
    });

});
