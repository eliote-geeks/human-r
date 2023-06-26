<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

    //employee
    Route::get('employees',[EmployeeController::class,'index'])->name('employees');
    Route::get('add-employee',[EmployeeController::class,'add_employee'])->name('add-employee');
    Route::get('employee-teams',[EmployeeController::class,'employeeTeams'])->name('employeeTeams');
    Route::post('createTeam',[EmployeeController::class,'createTeam'])->name('createTeam');
    Route::get('deleteTeam/{id}',[employeeController::class,'deleteTeam'])->name('deleteTeam');
    Route::post('edit/team/{id}',[employeeController::class,'editTeam'])->name('editTeam');
});
