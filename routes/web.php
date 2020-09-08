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
        
    });

});
