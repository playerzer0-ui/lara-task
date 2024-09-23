<?php

use App\Http\Controllers\Main;
use App\Http\Controllers\Tasks;
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

Route::get("/", [Main::class, "Index"])->name("welcome");
Route::get("/register", [Main::class, "Register"])->name("register");
Route::get("/login", [Main::class, "Login"])->name("login");
Route::post("/registerData", [Main::class, "RegisterData"])->name("registerData");
Route::post("/loginData", [Main::class, "LoginData"])->name("loginData");
Route::get("/logout", [Main::class, "Logout"])->name("logout");

Route::group(["middleware" => "auth"], function(){
    // Only authenticated users can access these routes
    Route::get("/dashboard", [Main::class, "Dashboard"])->name("dashboard");
    Route::get("/updatePage", [Main::class, "UpdatePage"])->name("updatePage");
    Route::post("/create", [Tasks::class, "create"])->name("create");
    Route::get("/delete", [Tasks::class, "delete"])->name("delete");
    Route::post("/update", [Tasks::class, "update"])->name("update");
});