<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get("/", [AuthController::class, 'showFormLogin'])->name("showFormLogin");
Route::post("/", [AuthController::class, 'doLogin'])->name("doLogin");
Route::get("/quen-mat-khau", [AuthController::class, 'showFormForget'])->name("showFormForget");
Route::post("/quen-mat-khau", [AuthController::class, 'doForget'])->name("doForget");
Route::get("/reset-mat-khau", [AuthController::class,"showFormReset"])->name("showFormReset");
Route::post("/reset-mat-khau", [AuthController::class,"doReset"])->name("doReset");

Route::get("/trang-chu", function() {
    return view("home");
})->name("home");

