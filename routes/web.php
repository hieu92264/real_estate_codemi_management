<?php

use App\Http\Controllers\roles\RoleController;
use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\entity_management\BuyersController;
use App\Http\Controllers\entity_management\SellerController;

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

// Route::get("/", function () {
//     return view("welcome");
// });
Route::middleware('guest')->group(function () {
    Route::get("/", [AuthController::class, 'showFormLogin'])->name("showFormLogin");
    Route::post("/", [AuthController::class, 'doLogin'])->name("doLogin");
    Route::get("/quen-mat-khau", [AuthController::class, 'showFormForget'])->name("showFormForget");
    Route::post("/quen-mat-khau", [AuthController::class, 'doForget'])->name("doForget");
    Route::get("/reset-mat-khau", [AuthController::class, "showFormReset"])->name("showFormReset");
    Route::post("/reset-mat-khau", [AuthController::class, "doReset"])->name("doReset");
});
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/trang-chu", function () {
    return view("home");
})->name("home");
//trang quan li 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'showFormHome'])->name('showFormDashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/danh-sach-nguoi-mua', BuyersController::class);
    Route::resource('/danh-sach-nguoi-ban', SellerController::class);
});