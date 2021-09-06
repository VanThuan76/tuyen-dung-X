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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::middleware(['auth','admin'])->group(function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/companies', [App\Http\Controllers\AdminController::class, 'companies'])->name('admin.companies');
    Route::get('/admin/admins', [App\Http\Controllers\AdminController::class, 'admins'])->name('admin.admins');
});

Route::middleware(['auth','company'])->group(function() {
    Route::get('/company/edit', [App\Http\Controllers\CompanyProfileController::class, 'edit'])->name('company.edit');
    Route::get('/company/changePassword', 'App\Http\Controllers\CompanyChangePasswordController@index')->name('company.password.edit');
    Route::get('/company/changePhoto', 'App\Http\Controllers\CompanyChangePhotoController@index')->name('company.photo.edit');
    Route::get('/company/changeUsername', 'App\Http\Controllers\CompanyChangeUsernameController@edit')->name('company.username.edit');
    Route::get('/company/{company}', [App\Http\Controllers\CompanyProfileController::class, 'show'])->name('company.show');
    Route::patch('/company/update', [App\Http\Controllers\CompanyProfileController::class, 'update'])->name('company.update');
});
Route::middleware(['auth','user'])->group(function() {
    Route::get('/user/edit', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('user.edit');
    Route::get('/user/changePassword', 'App\Http\Controllers\UserChangePasswordController@index')->name('user.password.edit');
    Route::get('/user/changePhoto', 'App\Http\Controllers\UserChangePhotoController@index')->name('user.photo.edit');

    Route::get('/user/changeUsername', 'App\Http\Controllers\UserChangeUsernameController@edit')->name('user.username.edit');
    Route::get('/user/{user}', [App\Http\Controllers\UserProfileController::class, 'show'])->name('user.show');
    Route::patch('/user/update', [App\Http\Controllers\UserProfileController::class, 'update'])->name('user.update');

});
Route::middleware(['auth'])->group(function(){
    Route::patch('/user/changePhoto/update', 'App\Http\Controllers\UserChangePhotoController@update')->name('user.photo.update');
    Route::patch('/user/changePhoto/destroy', 'App\Http\Controllers\UserChangePhotoController@destroy')->name('user.photo.destroy');
    Route::patch('/user/changeUsername/update', 'App\Http\Controllers\UserChangeUsernameController@update')->name('user.username.update');
    Route::patch('/user/changePassword/update', 'App\Http\Controllers\UserChangePasswordController@update')->name('user.password.update');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
