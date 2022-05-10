<?php

use App\Http\Controllers\API\ChatController;

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\Student2Controller;
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
Route::put('/update-student/{id}', [Student2Controller::class, 'updateStudent']);
Route::delete('/delete-student/{id}', [Student2Controller::class, 'deleteStudent']);
Route::get('/edit-students/{id}', [Student2Controller::class, 'editStudent']);
Route::get('/students', [Student2Controller::class, 'beat']);
Route::post('/add-student', [Student2Controller::class, 'come']);
Route::put('/update-admin/{id}', [AdminController::class, 'updateAdmin']);
Route::delete('/delete-admin/{id}', [AdminController::class, 'deleteAdmin']);
Route::get('/admins', [AdminController::class, 'head']);
Route::get('/edit-admin/{id}', [AdminController::class, 'nate']);
Route::post('/login', [AdminController::class, 'getIn']);
Route::post('/add-message', [ChatController::class, 'right']);

Route::post('/add-admin', [AdminController::class, 'rude']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
