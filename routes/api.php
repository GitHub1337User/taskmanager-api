<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Status;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/tasks/{status?}', [TaskController::class,'index'])->whereNumber('status');
Route::post('/task', [TaskController::class,'store']);
Route::get('/task/{id}', [TaskController::class,'show'])->whereNumber('id');
Route::delete('/task/{id}', [TaskController::class,'destroy'])->whereNumber('id');
Route::put('/task/{id}',[TaskController::class,'update'])->whereNumber('id');

// Route::get('/status',function () {
//         return Status::all();
// });