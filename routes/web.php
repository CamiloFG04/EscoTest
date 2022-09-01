<?php

use App\Http\Controllers\OperadorController;
use App\Http\Controllers\OrdenTrabController;
use App\Http\Controllers\TipoController;
use App\Models\OrdenTrab;
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
    $ordenes = OrdenTrab::all();
    return view('index',compact('ordenes'));
});
Route::resource('operador',OperadorController::class)->except('show');
Route::resource('tipo',TipoController::class)->except('show');
Route::resource('orden',OrdenTrabController::class)->except('show');
Route::post('orden.excel',[OrdenTrabController::class,'excel'])->name('orden.excel');