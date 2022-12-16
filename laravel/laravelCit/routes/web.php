<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userCon;
use App\Http\Controllers\categoryCon;
use App\Http\Controllers\postCon;

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
Route::get('/trashUser',[userCon::class,'trashUser'])->name('trashUser');
Route::get('/user/editProfile',[userCon::class,'showEditPage'])->name('editProfile');
Route::post('/user/saveEditUser/32/898',[userCon::class,'saveEditPage'])->name('save_edit_user');
Route::post('/user/saveEditUser/image/78/uis',[userCon::class,'saveUserImage'])->name('save_edit_user_image');
Route::get('/userDelete/{id}',[userCon::class,'userDelete'])->name('userDelete');
Route::get('/userRestore/{id}',[userCon::class,'userRestore'])->name('userRestore');
Route::post('/userCheckDelete',[userCon::class,'userCheckDelete'])->name('userCheckDelete');
Route::get('/userHardDelete/{id}',[userCon::class,'userHardDelete'])->name('userHardDelete');
//Category
Route::get('/showCategory',[categoryCon::class,'showCategoryPage'])->name('category');
Route::post('/saveCategory/catego/youi/po/e',[categoryCon::class,'saveCategory'])->name('saveCategory');
Route::get('/deleteCategory/{id}',[categoryCon::class,'deleteCategory'])->name('deleteCategory');
Route::get('/editCategory/{id}',[categoryCon::class,'editCategory'])->name('editCategory');
Route::post('/saveEditCategory/{id}',[categoryCon::class,'saveEditCategory'])->name('saveEditCategory');
//Tag
Route::get('/showTag',[categoryCon::class,'showTagPage'])->name('tag');
Route::post('/saveTag',[categoryCon::class,'saveTag'])->name('saveTag');
Route::get('/deleteTag/{id}',[categoryCon::class,'deleteTag'])->name('deleteTag');

//role management
Route::get('/showRole',[categoryCon::class,'showRolePage'])->name('role');
Route::post('/saveRole',[categoryCon::class,'saveRole'])->name('saveRole');
Route::post('/savePermission',[categoryCon::class,'savePermission'])->name('savePermission');
Route::post('/saveAssignRole',[categoryCon::class,'saveAssignRole'])->name('saveAssignRole');

//post
Route::get('/post',[postCon::class,'showPost'])->name('post');
Route::get('/addpost',[postCon::class,'showAddPost'])->name('addPost');
Route::post('/savePost',[postCon::class,'savePost'])->name('savePost');
Route::get('/editpost/{id}',[postCon::class,'editpost'])->name('editpost');
Route::post('/saveEditPost',[postCon::class,'saveEditPost'])->name('saveEditPost');
