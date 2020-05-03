<?php

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

Route::get('/', 'Controller@index')->name('home');
Route::get('/page1', 'Controller@page1')->name('page1');
Route::get('/page2', 'Controller@page2')->name('page2');
Route::get('/page3', 'Controller@page3')->name('page3');
