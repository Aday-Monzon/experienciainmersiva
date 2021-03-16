<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienciaController;
use App\Models\Comentario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
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

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/experiencia/descargar/{experiencium}',[ExperienciaController::class,'downloadFile'])->middleware(['auth']);
Route::resource('experiencia',ExperienciaController::class)->middleware(['auth']);
Route::get('/archivo/create',[ArchivoController::class,'create']);
Route::post('/archivo',[ArchivoController::class,'store']);

Route::get('/comentario/create',[ComentarioController::class,'create'])->middleware(['auth']);
Route::post('/comentario',[ComentarioController::class,'store'])->middleware(['auth']);
Route::get('/comentario/{experiencium}',[ComentarioController::class,'show'])->middleware(['auth']);

Route::get('/visor',function(){
    return view('visor');
});

Route::get('/visorthree', function () {
    return view('visorthree');
});
