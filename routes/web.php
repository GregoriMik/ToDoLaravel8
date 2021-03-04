<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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

Route::get('/', [TodosController::class,'todo'])->name('todos');

Route::post('/create', [TodosController::class,'create'])->name('create');

Route::post('/delete/{id}', [TodosController::class,'destroy'])->name('delete');
