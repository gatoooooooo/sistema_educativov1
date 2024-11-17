<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PromedioController;
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

// Public Routes
Auth::routes();

// Home Routes
//Route::get('/', [HomeController::class, 'redirectAdmin'])->name('index');
//Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin Authentication Routes (public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

// Admin Routes (protected by auth:admin)
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::prefix('admin')->group(function () {
    Route::get('notas', [NotaController::class, 'index'])->name('admin.notas.index');
});

    Route::prefix('admin')->group(function () {
    Route::get('RegistroCurso', [RegistroCursoController::class, 'index'])->name('admin.RegistroCurso.index');
});

Route::prefix('cursos/{curso_id}')->group(function () {
    Route::get('horarios', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('horarios', [HorarioController::class, 'store'])->name('horarios.store');
});

    // Resource routes for roles and admins
    Route::resource('roles', RolesController::class);
    Route::resource('admins', AdminsController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('curso', Registro_CursoController::class);
    Route::resource('horario', Registro_HorarioController::class);
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('notas', NotaController::class)->only(['create', 'store', 'destroy']);
    Route::resource('promedios', PromedioController::class);


    // Login Routes
    //Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    //Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');

    // Logout Routes
    //Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Password Reset Routes
    //Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    //Route::post('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('password.update');
});



//Route::get('notas', [NotaController::class, 'index'])->name('admin.notas.index');
  //  Route::get('notas/create', [NotaController::class, 'create'])->name('admin.notas.create');
    //Route::post('notas', [NotaController::class, 'store'])->name('admin.notas.store');    
    //Route::get('notas/{nota}/edit', [NotaController::class, 'edit'])->name('admin.notas.edit');
    //Route::put('notas/{nota}', [NotaController::class, 'update'])->name('admin.notas.update');
    //Route::delete('notas/{nota}', [NotaController::class, 'destroy'])->name('admin.notas.destroy');