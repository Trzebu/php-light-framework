<?php

use Libs\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| You can use here the middleware group.
|
*/

Route::get("/", [
    "uses" => "App\Http\Controllers\Home@index",
    "as" => "home.index"
]);

Route::post("/language", [
    "uses" => "App\Http\Controllers\Home@language",
    "as" => "home.language"
]);

Route::get("/login", [
    "uses" => "App\Http\Controllers\AuthController@loginIndex",
    "as" => "auth.login",
    "middleware" => ["guest"]
]);

Route::post("/login", [
    "uses" => "App\Http\Controllers\AuthController@getLoginPost",
    "as" => "auth.login",
    "middleware" => ["guest"]
]);

Route::get("/register", [
    "uses" => "App\Http\Controllers\AuthController@registerIndex",
    "as" => "auth.register",
    "middleware" => ["guest"]
]);

Route::post("/register", [
    "uses" => "App\Http\Controllers\AuthController@getRegisterPost",
    "as" => "auth.register",
    "middleware" => ["guest"]
]);

Route::get("/logout", [
    "uses" => "App\Http\Controllers\AuthController@logout",
    "as" => "auth.logout",
    "middleware" => ["auth"]
]);

//user profile

Route::get("/profile/{userId}", [
    "uses" => "App\Http\Controllers\ProfileController@getProfile",
    "as" => "user.profile",
    "middleware" => ["auth"]
]);

Route::get("/profile", [
    "uses" => "App\Http\Controllers\ProfileController@getProfiles",
    "as" => "user.profiles",
    "middleware" => ["auth"]
]);

//Admin

Route::get("/admin", [
    "uses" => "App\Http\Controllers\AdminController@index",
    "as" => "admin.index",
    "middleware" => ["auth", "permissions"]
]);
