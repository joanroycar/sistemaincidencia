<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Subcategory;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('get-states', [IncidenceController::class, 'getStates'])->name('getStates');
Route::post('incidence/{incidence}/estado', [IncidenceController::class, 'estado'])->name('incidences.estado');
Route::get('incidence/internos', [IncidenceController::class, 'getIncidentes'])->middleware('can:Modulo Asuntos Internos')->name('incidente.index');
Route::get('incidence/ssoma', [IncidenceController::class, 'getIncidentesssoma'])->middleware('can:Modulo SSOMA')->name('incidentessoma.index');
Route::get('incidente/{incidence}/edit', [IncidenceController::class, 'editIncidente'])->name('incidente.edit');
Route::put('incidente/{incidence}/upload', [IncidenceController::class, 'addObservationFile'])->name('incidente.upload');
Route::get('incidente/{incidence}/view', [IncidenceController::class, 'viewResource'])->name('incidente.view');
Route::post('incidente/download', [IncidenceController::class, 'downloadResource'])->name('incidente.download');
Route::resource('areas',AreaController::class)->middleware('can:Modulo Areas')->names('areas');
Route::resource('priorities',PriorityController::class)->middleware('can:Modulo Prioridad')->names('priorities');
Route::resource('category',CategoryController::class)->middleware('can:Modulo Categorias')->names('categories');
Route::resource('subcategory',SubcategoryController::class)->middleware('can:Modulo Subcategorias')->names('subcategories');
Route::resource('employee',EmployeeController::class)->middleware('can:Modulo Empleados')->names('employees');
Route::resource('users',UserController::class)->middleware('can:Modulo Usuarios')->names('users');
Route::get('/users/{user}/editarol',[UserController::class, 'editrol'])->middleware('can:Modulo Usuarios')->name('users.roles');
Route::put('users/{user}/updaterol', [UserController::class, 'updaterol'])->middleware('can:Modulo Usuarios')->name('users.updaterole');
Route::resource('incidence',IncidenceController::class)->middleware('can:Modulo Incidencias')->names('incidences');
Route::resource('report',ReportController::class)->middleware('can:Modulo Usuarios')->names('reports');
Route::resource('role',RoleController::class)->middleware('can:Modulo Roles')->names('roles');

// Route::post('incidente/download', [IncidenceController::class, 'downloadResource'])->name('incidente.download');

