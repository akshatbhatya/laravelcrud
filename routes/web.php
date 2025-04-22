<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\assignController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HandleLoginRequest;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/admin/signup",function(){
    return view("admin.signup");
})->name('adminSignup');

Route::get("/login",function(){
    return view("admin.login");
})->name('adminSignup');

Route::post("/admin/register",[AdminController::class,"createAdmin"])->name("registerAdmin");

Route::post("/login",[HandleLoginRequest::class,"LoginAttempt"])->name("login");

Route::get("/dashboard",function(){
    if (Auth::guard('admins')->check()) {
        $data = Auth::guard('admins')->user();
    }
   
    return view("dashboard.dashboard",compact("data"));
})->middleware("LoginVerify")->name("dashboard");

Route::get("/logout",[HandleLoginRequest::class,"logout"])->name("logout")->middleware("logout");

Route::post("/add/user",[UserController::class,"createUser"])->name('adduser');

Route ::get("/delete/user/{id}",[UserController::class,"deleteUser"])->name("deleteUser");

Route::post("/update/user/{id}",[UserController::class,"updateUser"])->name("updateuser");

Route::post("/add/department",[DepartmentController::class,"addDepartment"])->name("createdepartment");

Route::post("/assign/department",[assignController::class,"assign"])->name("assigndepartment");