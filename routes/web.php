<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipModulesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/shipmodules/list', [ShipModulesController::class, 'index']);
Route::get('/shipmodules/add', [ShipModulesController::class, 'create']);
Route::post('/shipmodules/save', [ShipModulesController::class, 'store']);