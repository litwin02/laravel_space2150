<?php

use App\Http\Controllers\ProfileController;
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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('home');
});
Route::get('/message', function () {
    return view('/message', [HomeController::class, 'message']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/shipmodules/edit/{id}', [ShipModulesController::class, 'edit'])->middleware('auth');
    Route::get('/shipmodules/show/{id}', [ShipModulesController::class, 'show'])->middleware('auth');

    Route::get('/modulecrew/add', [ModuleCrewController::class, 'create'])->middleware('auth');
    Route::get('/modulecrew/edit/{id}', [ModuleCrewController::class, 'edit'])->middleware('auth');
    Route::get('/modulecrew/show/{id}', [ModuleCrewController::class, 'show'])->middleware('auth');

    Route::get('/crewskills/add', [CrewSkillsController::class, 'create'])->middleware('auth');
    Route::get('/crewskills/edit/{id}', [CrewSkillsController::class, 'edit'])->middleware('auth');
    Route::get('/crewskills/show/{id}', [CrewSkillsController::class, 'show'])->middleware('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/shipmodules/add', [ShipModulesController::class, 'create']) -> middleware('auth');
});

//Ship Modules
Route::get('/shipmodules/list', [ShipModulesController::class, 'index']);
Route::post('/shipmodules/save', [ShipModulesController::class, 'store']);

//Edit and update ship modules
Route::post('/shipmodules/update/{id}', [ShipModulesController::class, 'update']);

//Delete ship modules
Route::post('/shipmodules/delete/{id}', [ShipModulesController::class, 'destroy']);

//Show crew related to a module
Route::get('/shipmodules/crew/{id}', [ShipModulesController::class, 'showCrew']);



//Module crew
Route::get('/modulecrew/list', [ModuleCrewController::class, 'index']);
Route::post('/modulecrew/save', [ModuleCrewController::class, 'store']);

//Edit and update module crew
Route::post('/modulecrew/update/{id}', [ModuleCrewController::class, 'update']);

//Delete module crew
Route::post('/modulecrew/delete/{id}', [ModuleCrewController::class, 'destroy']);



//Crew skills
Route::get('/crewskills/list', [CrewSkillsController::class, 'index']);
Route::post('/crewskills/save', [CrewSkillsController::class, 'store']);

//Edit and update crew skills
Route::post('/crewskills/update/{id}', [CrewSkillsController::class, 'update']);

//Delete crew skills
Route::post('/crewskills/delete/{id}', [CrewSkillsController::class, 'destroy']);


//Auth::routes();
Route::get('/login', [HomeController::class, 'changeAuthState']);
Route::get('/logout', [HomeController::class, 'changeAuthState']);
Route::get('/register', [HomeController::class, 'register']);
require __DIR__.'/auth.php';
