<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userCon;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',[userCon::class,'index'])->name('user');
Route::get('/user/editProfile',[userCon::class,'showEditPage'])->name('editProfile');
Route::post('/user/saveEditUser/32/898',[userCon::class,'saveEditPage'])->name('save_edit_user');




