<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth')->group(function (){
  Route::get('/',[TodoController::class,'index']);
});
Route::post('/todos',[TodoController::class, 'store']);
Route::patch('/todos/update',[TodoController::class, 'update']);
Route::delete('/todos/delete',[TodoController::class,'destroy']);

