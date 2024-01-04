<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::controller(UserController::class)->group(function(){
    Route::get('show', 'showUsers')->name('home');
    Route::get('/user/{id}','singleUsers')->name('view.user');
    Route::post('/add', 'addUser')->name('addUser');
    // Route::get('/update',  'updateUser');
    Route::post('/update/{id}',  'updateUser')->name('update.user');
    
    Route::get('/updatepage/{id}',  'updatePage')->name('update.page');
    Route::get('/delete/{id}', 'deletUser')->name('view.delete');
    Route::get('/delete',  'deleteAllUser');
});

Route::view('/newuser', 'adduser');


