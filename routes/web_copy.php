<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShipModulesController;
use App\Http\Controllers\ModuleCrewController;
use App\Http\Controllers\CrewSkillsController;
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

//Ship Modules
Route::get('/shipmodules/list', [ShipModulesController::class, 'index']);
Route::get('/shipmodules/add', [ShipModulesController::class, 'create']);
Route::post('/shipmodules/save', [ShipModulesController::class, 'store']);

//Edit and update ship modules
Route::get('/shipmodules/edit/{id}', [ShipModulesController::class, 'edit']);
Route::post('/shipmodules/update/{id}', [ShipModulesController::class, 'update']);

//Delete ship modules
Route::get('/shipmodules/show/{id}', [ShipModulesController::class, 'show']);
Route::post('/shipmodules/delete/{id}', [ShipModulesController::class, 'destroy']);

//Show crew related to a module
Route::get('/shipmodules/crew/{id}', [ShipModulesController::class, 'showCrew']);



//Module crew
Route::get('/modulecrew/list', [ModuleCrewController::class, 'index']);
Route::get('/modulecrew/add', [ModuleCrewController::class, 'create']);
Route::post('/modulecrew/save', [ModuleCrewController::class, 'store']);

//Edit and update module crew
Route::get('/modulecrew/edit/{id}', [ModuleCrewController::class, 'edit']);
Route::post('/modulecrew/update/{id}', [ModuleCrewController::class, 'update']);

//Delete module crew
Route::get('/modulecrew/show/{id}', [ModuleCrewController::class, 'show']);
Route::post('/modulecrew/delete/{id}', [ModuleCrewController::class, 'destroy']);



//Crew skills
Route::get('/crewskills/list', [CrewSkillsController::class, 'index']);
Route::get('/crewskills/add', [CrewSkillsController::class, 'create']);
Route::post('/crewskills/save', [CrewSkillsController::class, 'store']);

//Edit and update crew skills
Route::get('/crewskills/edit/{id}', [CrewSkillsController::class, 'edit']);
Route::post('/crewskills/update/{id}', [CrewSkillsController::class, 'update']);

//Delete crew skills
Route::get('/crewskills/show/{id}', [CrewSkillsController::class, 'show']);
Route::post('/crewskills/delete/{id}', [CrewSkillsController::class, 'destroy']);
