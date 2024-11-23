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
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PromedioController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AsistenciaEstudianteController;
use App\Http\Controllers\AsistenciaDocenteController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\MensajeController;

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

    Route::resource('roles', RolesController::class);
    Route::resource('admins', AdminsController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('cursos/{id}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('cursos/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    Route::resource('admin/cursos', CursoController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('estudiantes', EstudianteController::class);
    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::get('estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
    Route::post('estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('estudiantes/{estudiante}', [EstudianteController::class, 'show'])->name('estudiantes.show');
    Route::get('estudiantes/{estudiante}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::put('estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
  Route::resource('notas', NotaController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
  Route::resource('promedios', PromedioController::class);
  Route::get('promedios/generar/{registroEstudianteId}/{cursoId}', [PromedioController::class, 'generarPromedio'])->name('promedios.generar');
});


Route::prefix('admin')->name('admin.')->group(function () {
  Route::get('docentes', [DocenteController::class, 'index'])->name('docentes.index'); // Esta es la ruta que falta
  Route::get('docentes/create', [DocenteController::class, 'create'])->name('docentes.create');
  Route::post('docentes', [DocenteController::class, 'store'])->name('docentes.store');
  Route::get('docentes/{docente}/edit', [DocenteController::class, 'edit'])->name('docentes.edit');
  Route::put('docentes/{docente}', [DocenteController::class, 'update'])->name('docentes.update');
  Route::delete('docentes/{docente}', [DocenteController::class, 'destroy'])->name('docentes.destroy');
});




Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
  Route::resource('asistencias', AsistenciaEstudianteController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
  Route::resource('asistencias_docentes', AsistenciaDocenteController::class);
});






  //  Route::prefix('admin')->group(function () {
   // Route::get('RegistroCurso', [RegistroCursoController::class, 'index'])->name('admin.RegistroCurso.index');
//});

//Route::prefix('cursos/{curso_id}')->group(function () {
  //  Route::get('horarios', [HorarioController::class, 'index'])->name('horarios.index');
    //Route::get('horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
    //Route::post('horarios', [HorarioController::class, 'store'])->name('horarios.store');
//});

    // Resource routes for roles and admins
    //Route::resource('roles', RolesController::class);
    //Route::resource('admins', AdminsController::class);
    //Route::resource('usuario', UsuarioController::class);
    //Route::resource('curso', Registro_CursoController::class);
    //Route::resource('horario', Registro_HorarioController::class);
    //Route::resource('estudiantes', EstudianteController::class);
    //Route::resource('docentes', DocenteController::class);
    //Route::resource('notas', NotaController::class)->only(['create', 'store', 'destroy']);
    //Route::resource('promedios', PromedioController::class);


    // Login Routes
    //Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    //Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');

    // Logout Routes
    //Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout.submit');

    // Password Reset Routes
    //Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    //Route::post('/password/reset/submit', [ForgotPasswordController::class, 'reset'])->name('password.update');




//Route::get('notas', [NotaController::class, 'index'])->name('admin.notas.index');
  //  Route::get('notas/create', [NotaController::class, 'create'])->name('admin.notas.create');
    //Route::post('notas', [NotaController::class, 'store'])->name('admin.notas.store');
    //Route::get('notas/{nota}/edit', [NotaController::class, 'edit'])->name('admin.notas.edit');
    //Route::put('notas/{nota}', [NotaController::class, 'update'])->name('admin.notas.update');
    //Route::delete('notas/{nota}', [NotaController::class, 'destroy'])->name('admin.notas.destroy');
