<?php

use App\Http\Controllers\DashboardDaftarHadir;
use App\Http\Controllers\DashboardDaftarPelatihan;
use App\Http\Controllers\DashboardEvaluasi;
use App\Http\Controllers\DashboardFasilitator;
use App\Http\Controllers\DashboardStudiDampak;
use App\Http\Controllers\DashboardSurvey;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaDaftarHadir;
use App\Http\Controllers\PesertaPelatihan;
use App\Http\Controllers\PesertaEvaluasi;
use App\Http\Controllers\PesertaStudi;
use App\Http\Controllers\PesertaSurveyKepuasan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

route::resource('/dashboard/daftarpelatihan', DashboardDaftarPelatihan::class);

route::resource('/dashboard/evaluasi', DashboardEvaluasi::class);

route::resource('/dashboard/surveykepuasan', DashboardSurvey::class);

route::resource('/dashboard/studidampak', DashboardStudiDampak::class);

route::resource('/dashboard/daftarhadir', DashboardDaftarHadir::class);

route::resource('/dashboard/fasilitator', DashboardFasilitator::class);


Route::get('/peserta', function () {
    return view('peserta.index');
});

route::resource('/peserta/daftarpelatihan', PesertaPelatihan::class);

route::resource('/peserta/evaluasi', PesertaEvaluasi::class);

route::resource('/peserta/studidampak', PesertaStudi::class);

route::resource('/peserta/surveykepuasan', PesertaSurveyKepuasan::class);

route::resource('/peserta/daftarhadir', PesertaDaftarHadir::class);



route::get('/login', [LoginController::class, 'index'])->middleware('guest');
route::post('/login', [LoginController::class, 'authenticate']);
route::post('/logout', [LoginController::class, 'logout']);

