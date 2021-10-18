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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('\App\Http\Controllers\Api\V1')->group(function () {

    Route::prefix('v1')->group(function () {

        //Contact API
        Route::post('contact', 'ContactController@store')->name('contact');
        //category
        Route::prefix('category')->group(function () {
            Route::get('/all', 'CategoryController@index')->name('allCategory');
            Route::get('/category-have-news', 'CategoryController@catHaveNews')->name('catHaveNews');
        });
        //sub-category
        Route::prefix('sub-category')->group(function () {
            Route::get('/all', 'SubCategoryController@index')->name('allSubCategory');
        });
        //tag
        Route::prefix('tag')->group(function () {
            Route::get('/all', 'TagController@index')->name('allTag');
        });
        Route::prefix('news')->group(function () {
            Route::get('/all', 'NewsController@index')->name('allStories');
            Route::get('/view/{id}', 'NewsController@view')->name('viewStory');
            Route::get('/category/{id}', 'NewsController@categoryWiseStory')->name('categoryStory');
            Route::get('/sub-category/{id}', 'NewsController@subCategoryWiseStory')->name('subCategoryStory');
            Route::get('/search/', 'NewsController@newsSearch')->name('newsSearch');


            //latest story book api
            Route::get('book/recent/all', 'NewsController@recentStoryBook')->name('recentStoryBooks');
        });

        Route::prefix('device')->group(function () {
            Route::get('/all-information', 'DeviceInformationController@index')->name('allDevice');
            Route::post('/all-information/store', 'DeviceInformationController@store')->name('deviceinformation.store');
        });

        Route::prefix('notification')->group(function () {
            Route::get('/news', 'NotificationController@index')->name('notifiation.latestnews');
        });
    });
});
