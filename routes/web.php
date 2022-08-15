<?php

use App\Models\MyTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\MyTableController;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('/', [MyTableController::class, 'index']);
Route::get('/rute/{id}', [MyTableController::class, 'rute']);
Route::get('/titik/json', [MyTableController::class, 'titik']);
Route::get('/ambil/json/', [DataController::class, 'ambil']);
Route::get('/data', [DataController::class, 'index']);
Route::get('/detail/{id}', [DataController::class, 'detail']);
