<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminBusinessController;
use App\Http\Controllers\Admin\AdminDepartmentController;
use App\Http\Controllers\Admin\AdminFamilyController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminPersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin_')->group(function () {
    Route::resources([
        'articles' => AdminArticleController::class,
        'businesses' => AdminBusinessController::class,
        'families' => AdminFamilyController::class,
        'items' => AdminItemController::class,
        'persons' => AdminPersonController::class,
        'departments' => AdminDepartmentController::class,
    ]);
});
