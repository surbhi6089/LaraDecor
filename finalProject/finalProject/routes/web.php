<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WebsiteController;

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


//*************Routes for all users**********/
Route::get('/',[WebsiteController::class, 'redirect']);
Route::get('/home',[ProductController::class, 'index']);
Route::get('/categories/{id}',[ProductController::class, 'show']);
Route::get('/redirect',[LandingPageController::class, 'index']);

//search
Route::get('/search',[ProductController::class, 'search']);
Route::get('/dashboard-search',[SearchController::class, 'search']);

//website
Route::get('/aboutus',[WebsiteController::class, 'aboutus']);
Route::get('/contactus',[WebsiteController::class, 'contactus']);

//newsletter subscription
Route::post('/newsletter',[WebsiteController::class, 'newsletter']);

//admin-only
Route::group(['middleware'=>['auth','admin']], function(){
    Route::get('/all-users',[AdminController::class, 'indexUser'])->middleware('admin');
    //delete user
    Route::get('/delete-user/{id}',[UserController::class, 'destroy'])->middleware('admin');
});

//editor or admin
Route::group(['middleware'=>['auth','editor-or-admin']], function(){
    //view
    Route::get('/all-products',[AdminController::class, 'index']);
    Route::get('all-categories',[AdminController::class, 'indexCategory']);
    //add products
    Route::get('/add-product',[ProductController::class, 'create']);
    Route::post('create-product',[ProductController::class, 'store']);
    //add category
    Route::get('/add-category',[CategoryController::class, 'create']);
    Route::post('create-category',[CategoryController::class, 'store']);
    //edit products
    Route::get('/edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('/update-product/{id}',[ProductController::class, 'update']);
    //edit category
    Route::get('/edit-category/{id}',[CategoryController::class, 'edit']);
    Route::put('/update-category/{id}',[CategoryController::class, 'update']);
    //delete products
    Route::get('/delete-product/{id}',[ProductController::class, 'destroy']);
    //delete category
    Route::get('/delete-category/{id}',[CategoryController::class, 'destroy']);
});

//user home page
Route::get('/dashboard', [LandingPageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
