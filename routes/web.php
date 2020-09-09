<?php

Auth::routes();
Route::get('/',function (){
    return Redirect::to('/login');
});
//Route::get('/', 'HomeController@index');


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
        Route::get('/posts', 'Admin\PostController@index')->name('admin.posts.index');
        Route::post('/posts', 'Admin\PostController@store')->name('admin.posts.store');
        Route::get('/posts/{id}/edit', 'Admin\PostController@edit')->name('admin.posts.edit');
        Route::put('/posts/{id}', 'Admin\PostController@update')->name('admin.posts.update');
        Route::delete('/posts/{id}', 'Admin\PostController@destroy')->name('admin.posts.destroy');

        //News
        Route::get('/news', 'Admin\NewsController@index')->name('admin.news.index');
        Route::post('/news', 'Admin\NewsController@store')->name('admin.news.store');
        Route::get('/news/{id}/edit', 'Admin\NewsController@edit')->name('admin.news.edit');
        Route::put('/news/{id}', 'Admin\NewsController@update')->name('admin.news.update');
        Route::delete('/news/{id}', 'Admin\NewsController@destroy')->name('admin.news.destroy');


        Route::get('/news/status/{id}', 'Admin\NewsController@status')->name('admin.news.status');

        //galleries
        Route::get('/galleries', 'Admin\GalleryController@index')->name('admin.galleries.index');
        Route::post('/galleries', 'Admin\GalleryController@store')->name('admin.galleries.store');
        Route::get('/galleries/{id}/edit', 'Admin\GalleryController@edit')->name('admin.galleries.edit');
        Route::put('/galleries/{id}', 'Admin\GalleryController@update')->name('admin.galleries.update');
        Route::delete('/galleries/{id}', 'Admin\GalleryController@destroy')->name('admin.galleries.destroy');
        
        //gallery images
        Route::get('/galleryImages', 'Admin\GalleryImageController@index')->name('admin.galleryImages.index');
        Route::post('/galleryImages', 'Admin\GalleryImageController@store')->name('admin.galleryImages.store');
        Route::get('/galleryImages/{id}/edit', 'Admin\GalleryImageController@edit')->name('admin.galleryImages.edit');
        Route::put('/galleryImages/{id}', 'Admin\GalleryImageController@update')->name('admin.galleryImages.update');
        Route::delete('/galleryImages/{id}', 'Admin\GalleryImageController@destroy')->name('admin.galleryImages.destroy');

        Route::get('/galleryImages/status/{id}', 'Admin\GalleryImageController@status')->name('admin.galleryImages.status');

        //events
        Route::get('/events', 'Admin\EventController@index')->name('admin.events.index');
        Route::post('/events', 'Admin\EventController@store')->name('admin.events.store');
        Route::get('/events/{id}/edit', 'Admin\EventController@edit')->name('admin.events.edit');
        Route::put('/events/{id}', 'Admin\EventController@update')->name('admin.events.update');
        Route::delete('/events/{id}', 'Admin\EventController@destroy')->name('admin.events.destroy');

        Route::get('/events/status/{id}', 'Admin\EventController@status')->name('admin.events.status');

        //navbar menu types
        Route::get('/navbarMenuTypes', 'Admin\NavbarMenuTypeController@index')->name('admin.navbarMenuTypes.index');
        Route::post('/navbarMenuTypes', 'Admin\NavbarMenuTypeController@store')->name('admin.navbarMenuTypes.store');
        Route::get('/navbarMenuTypes/{id}/edit', 'Admin\NavbarMenuTypeController@edit')->name('admin.navbarMenuTypes.edit');
        Route::put('/navbarMenuTypes/{id}', 'Admin\NavbarMenuTypeController@update')->name('admin.navbarMenuTypes.update');
        Route::delete('/navbarMenuTypes/{id}', 'Admin\NavbarMenuTypeController@destroy')->name('admin.navbarMenuTypes.destroy');

        //navbar menus
        Route::get('/navbarMenus', 'Admin\NavbarMenuController@index')->name('admin.navbarMenus.index');
        Route::post('/navbarMenus', 'Admin\NavbarMenuController@store')->name('admin.navbarMenus.store');
        Route::get('/navbarMenus/{id}/edit', 'Admin\NavbarMenuController@edit')->name('admin.navbarMenus.edit');
        Route::put('/navbarMenus/{id}', 'Admin\NavbarMenuController@update')->name('admin.navbarMenus.update');
        Route::delete('/navbarMenus/{id}', 'Admin\NavbarMenuController@destroy')->name('admin.navbarMenus.destroy');

        Route::get('/navbarMenus/status/{id}', 'Admin\NavbarMenuController@status')->name('admin.navbarMenus.status');

        //pages
        Route::get('/pages', 'Admin\PageController@index')->name('admin.pages.index');
        Route::post('/pages', 'Admin\PageController@store')->name('admin.pages.store');
        Route::get('/pages/{id}/edit', 'Admin\PageController@edit')->name('admin.pages.edit');
        Route::put('/pages/{id}', 'Admin\PageController@update')->name('admin.pages.update');
        Route::delete('/pages/{id}', 'Admin\PageController@destroy')->name('admin.pages.destroy');

        Route::get('/pages/status/{id}', 'Admin\PageController@status')->name('admin.pages.status');
    });

});
