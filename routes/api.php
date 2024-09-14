<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

////////  there routes login and register and logout
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',  [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

//////// there routes about enter the user information
Route::post('/enterGender' , [UserController::class , 'EnterGender']);
Route::post('/enterWeight' , [UserController::class , 'Enter_Weight_height']);
Route::post('/enterLanguage' , [UserController::class , 'EnterLanguage']);
Route::post('/enterFocusArea' , [UserController::class , 'EnterFocusArea']);
Route::post('/enterMainGoal' , [UserController::class , 'EnterMainGoal']);
Route::post('/enterLevel' , [UserController::class , 'EnterLevel']);

//////// Show the Home Page 

Route::get('/showFocusArea', [UserController::class, 'GetFocusArea']);
Route::get('/showAllExer', [UserController::class, 'GetAllExercises']);
Route::get('/showFood', [UserController::class, 'Food']);

/////// buy exercises
Route::post('/paid', [UserController::class, 'Paid']);
Route::get('/showWeightLoss', [UserController::class, 'getWeightLoss']);
Route::get('/showWarmUp', [UserController::class, 'getWarmup']);
// Route::post('/editSetting', [UserController::class, 'setting']);
Route::get('/defaultReport', [UserController::class, 'defaultReport']);
Route::post('/editReport', [UserController::class, 'editReport']);

Route::post('/editSetting',[App\Http\Controllers\UserController::class,'editSetting']);
