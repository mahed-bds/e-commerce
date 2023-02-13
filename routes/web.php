<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatabaseController;
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
    return view('admin.layouts.template');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard.page');

    Route::get('/admin/addCategory', [DashboardController::class, 'AddCategory'])->name('addcategory.page');

    Route::get('/admin/allCategory', [DashboardController::class, 'AllCategory'])->name('allcategory.page');

    Route::get('/admin/addSubCategory', [DashboardController::class, 'AddSubCategory'])->name('addsubcategory.page');

    Route::get('/admin/AllSubCategory', [DashboardController::class, 'AllSubCategory'])->name('allsubcategory.page');

    Route::get('/admin/addProduct', [DashboardController::class, 'AddProduct'])->name('addproduct.page');

    Route::get('/admin/allProduct', [DashboardController::class, 'AllProduct'])->name('allproduct.page');

    // controller for database functionality

    Route::Post('/admin/storeCategory', [DatabaseController::class, 'StoreCategory'])->name('storecategory.page');
    Route::get('/admin/editCategory/{id}', [DatabaseController::class, 'EditCategory'])->name('editcategory.page');
    Route::post('/admin/updatecategory', [DatabaseController::class, 'UpdateCategory'])->name('updatecategory.page');
    Route::get('/admin/deletecategory/{id}', [DatabaseController::class, 'DeleteCategory'])->name('deletecategory.page');
    Route::post('/admin/storesubcategory', [DatabaseController::class, 'StoreSubCategory'])->name('storesubcategory.page');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
