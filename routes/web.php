<?php

use App\Http\Controllers\roles\RoleController;
use App\Http\Controllers\users\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\entity_management\BuyersController;
use App\Http\Controllers\entity_management\SellerController;
use App\Http\Controllers\properties\PropertiController;
use App\Http\Controllers\entity_management\TransactionController;
use App\Http\Controllers\report\PriceReportController;

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
// Route::get("/trang-chu", function () {
//     return view("layouts.dashboard");
// })->name("home");

Route::get("/trang-chu", [DashboardController::class, 'index'])->name('home');
//trang quan li 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'showFormHome'])->name('showFormDashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/danh-sach-nguoi-mua', BuyersController::class);
    Route::resource('/danh-sach-nguoi-ban', SellerController::class);
    Route::get('/lich-su-giao-dich/{id}', [TransactionController::class, 'showTransaction'])->name('lich-su-giao-dich.historyTransaction');
    Route::resource('bat-dong-san', PropertiController::class);
    Route::get('/tim-kiem-bat-dong-san', [PropertiController::class, 'search'])->name('searchProperties');
    Route::get('/tim-kiem', [UserController::class, 'search'])->name('search');
    Route::get('/doi-mat-khau', [AuthController::class, 'changePassword'])->name('change.password');
    Route::post('/doi-mat-khau', [AuthController::class, 'savePassword']);
    // Route::get('/thong-ke-theo-trang-thai', [DashboardController::class, ''])
    Route::get('/thong-ke-theo-gia', [PriceReportController::class, 'index'])->name('priceReport');
    // Route::resource('/bat-dong-san', PropertiController::class);
});
