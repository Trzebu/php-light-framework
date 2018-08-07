<?php

use Libs\Route;

//All app routes

Route::get("/", [
    "uses" => "App\Http\Controllers\Home@index",
    "as" => "home.index"
]);

Route::get("/login", [
    "uses" => "App\Http\Controllers\AuthController@loginIndex",
    "as" => "auth.login"
]);

Route::post("/login", [
    "uses" => "App\Http\Controllers\AuthController@getLoginPost",
    "as" => "auth.login"
]);

Route::get("/register", [
    "uses" => "App\Http\Controllers\AuthController@registerIndex",
    "as" => "auth.register"
]);

Route::post("/register", [
    "uses" => "App\Http\Controllers\AuthController@getRegisterPost",
    "as" => "auth.register"
]);