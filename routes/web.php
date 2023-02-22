<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\Home;
use App\Http\Controllers\UserController;
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


Route::middleware([])->group(function () {
    Route::get('/', [Home::class, 'Index'])->name('home.page');
    Route::get('/home/seeProduct/{id}', [Home::class, 'SeeDetailsProduct'])->name('seemoreproduct.page');
});


// Route::get('/', function () {
//     return view('admin/layouts/template');
// })->middleware(['auth', 'role:user'])->name('dashboard');

// for excel 
Route::get('/file-import', [UserController::class, 'importView'])->name('import-view');

Route::get('/export-users', [UserController::class, 'exportUsers'])->name('export-users');

Route::middleware(['auth','role:admin'])->group(function () {
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


    // edit sub category
    Route::get('/admin/editsubcategory/{id}', [DatabaseController::class, 'EditSubCategory'])->name('editsubcategory.page');
    //update sub category
    Route::post('/admin/updatesubcategory', [DatabaseController::class, 'UpdateSubCategory'])->name('updatesubcategory.page');
    //delete sub category
    Route::get('/admin/deletesubcategory/{id}', [DatabaseController::class, 'DeleteSubCategory'])->name('deletesubcategory.page');

    //store product
    Route::post('/admin/storepoduct/', [ProductController::class, 'StoreProduct'])->name('storeproduct.page');

    //edit all product
    Route::get('/admin/editallProduct/{id}', [ProductController::class, 'EditProduct'])->name('editallproduct.page');
    //update product
    Route::post('/admin/updateProduct/', [ProductController::class, 'UpdateProduct'])->name('updateProduct.page');

    //delete from all product
    Route::get('/admin/deleteProduct/{id}', [ProductController::class, 'DeleteProduct'])->name('deleteallproduct.page');
    //see details product

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
