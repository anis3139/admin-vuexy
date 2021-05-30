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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('\App\Http\Controllers\Frontend')->group(function () {

//    Route::get('/', 'FrontpageController@index')->name('frontpage.index');
    Route::get('/category-news/{id}', 'FrontpageController@categoryWise')->name('frontpage.categorywise');
    Route::get('/news-view/{id}', 'FrontpageController@newsView')->name('frontpage.newsview');
    Route::post('comment/store', 'FrontpageController@commentStore')->name('frontend.comment.store');
});

Route::namespace('\App\Http\Controllers\Admin')->middleware(['auth'])->group(function () {

    Route::prefix('category')->group(function () {
        Route::get('/list', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
    });
    Route::prefix('sub-category')->group(function () {
        Route::get('/list', 'SubCategoryController@index')->name('subcategory.index');
        Route::get('/create', 'SubCategoryController@create')->name('subcategory.create');
        Route::post('/create', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/edit/{id}', 'SubCategoryController@update')->name('subcategory.update');
        Route::delete('/delete/{id}', 'SubCategoryController@destroy')->name('subcategory.delete');

        //for catch subcategory image
        Route::get('/subcategory/list', 'SubCategoryController@ajaxGetData')->name('subcategory.ajaxdata');
    });

    Route::prefix('tag')->group(function () {
        Route::get('/list', 'TagController@index')->name('tag.index');
        Route::get('/create', 'TagController@create')->name('tag.create');
        Route::post('/create', 'TagController@store')->name('tag.store');
        Route::get('/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::post('/edit/{id}', 'TagController@update')->name('tag.update');
        Route::delete('/delete/{id}', 'TagController@destroy')->name('tag.delete');
    });

    Route::prefix('news')->group(function () {
        Route::get('/list', 'NewsController@index')->name('news.index');
        Route::get('/create', 'NewsController@create')->name('news.create');
        Route::post('/create', 'NewsController@store')->name('news.store');
        Route::get('/view/{id}', 'NewsController@view')->name('news.view');
        Route::get('/edit/{id}', 'NewsController@edit')->name('news.edit');
        Route::post('/edit/{id}', 'NewsController@update')->name('news.update');
        Route::delete('/delete/{id}', 'NewsController@destroy')->name('news.delete');
    });

    //manage user
    Route::prefix('user')->group(function () {
        Route::get('/list', 'Auth\UserController@index')->name('user.index');
        Route::get('/create', 'Auth\UserController@create')->name('user.create');
        Route::post('/create', 'Auth\UserController@store')->name('user.store');
        Route::get('/profile/{id}', 'Auth\UserController@profile')->name('user.profile');
        Route::get('/profile/update/{id}', 'Auth\UserController@edit')->name('user.edit');
        Route::post('/profile/update/{id}', 'Auth\UserController@update')->name('user.update');
        Route::delete('/delete/{id}', 'Auth\UserController@destroy')->name('user.delete');
        Route::post('/changePassword','Auth\UserController@changePassword')->name('user.changePassword');
        Route::post('/user-role/update/{id}', 'Auth\UserController@roleUpdate')->name('user.role.update');
    });

    //filter data
    Route::prefix('filter')->group(function () {
        Route::get('/list', 'FilterController@index')->name('filter.view');
        Route::get('/list/data', 'FilterController@filter')->name('filter.list');
        Route::get('/subcategory/list', 'FilterController@ajaxGetSubcategoryData')->name('filter.getsubcategory');

    });

    //manage setting
    Route::prefix('contact')->group(function () {
        Route::get('/list', 'ContactController@index')->name('contact.index');

    });

    //manage setting
    Route::prefix('setting')->group(function () {
        Route::get('/list', 'SettingController@index')->name('setting.index');
        Route::post('/list', 'SettingController@store')->name('setting.store');
        Route::post('/update/{id}', 'SettingController@update')->name('setting.update');

    });

    //manage comment
    Route::prefix('comment')->group(function () {
        Route::get('approve/list', 'CommentController@approveList')->name('comment.approve.list');
        Route::get('pending/list', 'CommentController@pendingList')->name('comment.pending.list');
        Route::get('pending/list/approve/{id}', 'CommentController@pendingListApprove')->name('comment.pending.list.approve');
        Route::delete('delete/{id}', 'CommentController@destroy')->name('comment.destroy');
    });
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});


Route::get('/user', function(){
    return view('index');
});
