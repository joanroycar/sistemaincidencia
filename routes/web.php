<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\SubcategoryController;
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

Route::resource('areas',AreaController::class)->names('areas');
Route::resource('priorities',PriorityController::class)->names('priorities');
Route::resource('category',CategoryController::class)->names('categories');
Route::resource('subcategory',SubcategoryController::class)->names('subcategories');
Route::resource('employee',EmployeeController::class)->names('employees');
