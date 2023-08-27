<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos',[AlumnoController::class, 'index']);
Route::get('/alumnos/{id}',[AlumnoController::class, 'getById']);
Route::post('/alumnos/crear',[AlumnoController::class, 'create']);
Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumnos/{id}', [AlumnoController::class, 'delete']);


Route::get('/maestros',[MaestroController::class, 'index']);
Route::get('/maestros/{id}',[MaestroController::class, 'getById']);
Route::post('/maestros/crear',[MaestroController::class, 'create']);
Route::put('/maestros/{id}', [MaestroController::class, 'update']);
Route::delete('/maestros/{id}', [MaestroController::class, 'delete']);


Route::get('/cursos',[CursoController::class, 'index']);
Route::get('/cursos/{id}',[CursoController::class, 'getById']);
Route::post('/cursos/crear',[CursoController::class, 'create']);
Route::put('/cursos/{id}', [CursoController::class, 'update']);
Route::delete('/cursos/{id}', [CursoController::class, 'delete']);


Route::get('/matriculas',[MatriculaController::class, 'index']);
Route::get('/matriculas/{id}',[MatriculaController::class, 'getById']);
Route::post('/matriculas/crear',[MatriculaController::class, 'create']);
Route::put('/matriculas/{id}', [MatriculaController::class, 'update']);
Route::delete('/matriculas/{id}', [MatriculaController::class, 'delete']);


Route::get('/asistencias',[AsistenciaController::class, 'index']);
Route::get('/asistencias/{id}',[AsistenciaController::class, 'getById']);
Route::post('/asistencias/crear',[AsistenciaController::class, 'create']);
Route::put('/asistencias/{id}', [AsistenciaController::class, 'update']);