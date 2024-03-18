<?php

use App\Mail\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\Php;
use App\Http\Controllers\PesertaStudi;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\DashboardKontak;
use App\Http\Controllers\DashboardSurvey;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesertaEvaluasi;
use App\Http\Controllers\DashboardBeranda;
use App\Http\Controllers\DashboardReguler;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesertaPelatihan;
use App\Http\Controllers\PesertaPostingan;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardEvaluasi;
use App\Http\Controllers\PesertaSertifikat;
use App\Http\Controllers\RegulerController;
use App\Http\Controllers\PesertaDaftarHadir;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardKonsultasi;
use App\Http\Controllers\DashboardPermintaan;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\DashboardDaftarHadir;
use App\Http\Controllers\DashboardFasilitator;
use App\Http\Controllers\DashboardStudiDampak;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaSurveyKepuasan;
use App\Http\Controllers\PelatihanUserController;
use App\Http\Controllers\DashboardDaftarPelatihan;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\PostinganPesertaController;
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

// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
// Route untuk admin

route::resource('/dashboard/reguler', DashboardReguler::class);
Route::post('/dashboard/reguler/upload/image', [DashboardReguler::class, 'uploadImage'])->name('dashboard.reguler.upload.image');
Route::post('/dashboard/reguler/upload/file', [DashboardReguler::class, 'uploadFile'])->name('dashboard.reguler.upload.file');
Route::get('/download/{filename}', [DashboardReguler::class, 'downloadBuktiBayar'])->name('download.bukti_bayar');

route::get('/dashboard/reguler', [DashboardReguler::class, 'index'])->name('dashboard.reguler.index');
Route::get('/dashboard/reguler/presensi/{id_pelatihan}/{aksi}', [DashboardReguler::class, 'aturPresensi'])
    ->name('dashboard.reguler.presensi');
Route::get('/dashboard/reguler/{id}', [DashboardReguler::class, 'show'])->name('dashboard.reguler.show');
route::resource('/dashboard/permintaan', DashboardPermintaan::class)->except(['create']);
route::get('/dashboard/permintaan/{id}/create', [DashboardPermintaan::class, 'create'])->name('dashboard.permintaan.create');
route::get('/dashboard/permintaan/{id}/peserta', [DashboardPermintaan::class, 'peserta'])->name('dashboard.permintaan.peserta');
route::post('/dashboard/permintaan/simpan', [DashboardPermintaan::class, 'simpan'])->name('dashboard.permintaan.simpan');
route::get('/dashboard/permintaan', [DashboardPermintaan::class, 'index'])->name('dashboard.permintaan.index');
Route::get('/dashboard/permintaan/{id}', [DashboardPermintaan::class, 'show'])->name('dashboard.permintaan.show');
Route::get('/dashboard/permintaan/{id}/detail', [DashboardPermintaan::class, 'detail'])->name('dashboard.permintaan.detail');
Route::get('export/pelatihan/{id_pelatihan}', [DashboardDaftarPelatihan::class, 'exportPelatihan'])->name('export.pelatihan');
Route::get('export/survey/{id_pelatihan}', [DashboardSurvey::class, 'export'])->name('export.survey');
Route::get('export/studi/{id_pelatihan}', [DashboardStudiDampak::class, 'export'])->name('export.studi');
Route::get('export/daftarhadir/{id_pelatihan}', [DashboardDaftarHadir::class, 'export'])->name('export.daftarhadir');
Route::get('export/daftarhadir/{id_pelatihan}', [DashboardDaftarHadir::class, 'export'])->name('export.daftarhadir');

// route::get('/dashboard/evaluasi', DashboardEvaluasi::class);  
Route::get('/dashboard/evaluasi', [DashboardEvaluasi::class, 'index'])->name('dashboard.evaluasi.index');
Route::get('/dashboard/evaluasi/show/{id}', [DashboardEvaluasi::class, 'show'])->name('dashboard.evaluasi.show');
Route::get('/dashboard/evaluasi/create/{id_pelatihan}', [DashboardEvaluasi::class, 'create'])->name('dashboard.evaluasi.create'); 
Route::post('/dashboard/evaluasi', [DashboardEvaluasi::class, 'store'])->name('dashboard.evaluasi.store'); 
// Route::post('/dashboard/evaluasi ', [DashboardEvaluasi::class, 'store'])->name('dashboard.evaluasi.store');

route::resource('/dashboard/tema', TemaController::class);
route::resource('/dashboard/kontak', DashboardKontak::class);

route::resource('/dashboard/surveykepuasan', DashboardSurvey::class);
Route::get('/dashboard/surveykepuasan/show/{id}', [DashboardSurvey::class, 'show'])->name('dashboard.surveykepuasan.show');

route::resource('/dashboard/studidampak', DashboardStudiDampak::class);
Route::get('/dashboard/studidampak/show/{id}', [DashboardStudiDampak::class, 'show'])->name('dashboard.studidampak.show');

route::resource('/dashboard/daftarhadir', DashboardDaftarHadir::class);
// routes/web.php

Route::get('/dashboard/daftarhadir/show/{id}', [DashboardDaftarHadir::class, 'show'])->name('dashboard.daftarhadir.show');


route::resource('/dashboard/fasilitator', DashboardFasilitator::class);
Route::get('/dashboard/fasilitator/show/{id_fasilitator}', [DashboardFasilitator::class, 'show'])->name('dashboard.fasilitator.show');

route::resource('/dashboard/postingan', PostinganController::class);

route::resource('/dashboard/konsultasi', DashboardKonsultasi::class);
route::get('/dashboard/konsultasi/show/{id}', [DashboardKonsultasi::class, 'show'])->name('dashboard.konsultasi.show');
// });

Route::resource('/peserta/beranda', BerandaController::class);
// Route::resource('/dashboard/beranda', DashboardBeranda::class);
Route::resource('/dashboard/beranda', AdminUsersController::class);
// Route::resource('/admin/login', LoginController::class);



// Route::get('/dashboard/evaluasi', function () {
//     return view('dashboard.evaluasi.index',[
//         "title"=>"Evaluasi Pelatihan"
//     ]);
// });

route::resource('/dashboard/adminpelatihan', DashboardDaftarPelatihan::class);
// Route::get('/daftar-hadir/{id_pelatihan}', DashboardDaftarPelatihan::class)->name('daftar-hadir');


// route::get('/dashboard/daftarpelatihan/show/{id}', DashboardDaftarPelatihan::class, 'show');
// route::post('/save-data', function(Request $request) {
//     $names = $request->input('name');

//     // save data to PostgreSQL
//     foreach ($names as $name) {
//         DB::table('my_table')->insert([
//             'name_id' => $name,
//         ]);
//     }

//     return response()->json(['success' => true]);
// });



route::get('/peserta/postingan', [PostinganPesertaController::class, 'index']);




// Route::get('/peserta', function () {
//     return view('peserta.index');
// });

// Route::get('/peserta/daftarpelatihan', [PelatihanController::class,'index'])->name('daftarpelatihan.index');
// Route::get('/peserta/daftarpelatihan/create', [PelatihanController::class,'create'])->name('daftarpelatihan.create')->middleware('auth');
// Route::get('/peserta/daftarpelatihan/{id}', [PelatihanController::class,'show'])->name('daftarpelatihan.show');
// Route::post('/peserta/daftarpelatihan/store', [PelatihanController::class,'store'])->name('daftarpelatihan.store')->middleware('auth');

route::resource('/peserta/profil', ProfilController::class);

// route::get('/peserta/reguler/create/{pelatihan}', RegulerController::class)->name('reguler.create');
route::get('/peserta/pendaftaran/create/{pelatihan}', PendaftaranController::class)->name('pendaftaran.create');
Route::get('/get-provinsi/{negaraId}', [RegulerController::class, 'getProvinsi']);
Route::get('/get-kabupaten/{provinsiId}', [RegulerController::class, 'getKabupaten']);
route::resource('/peserta/reguler', RegulerController::class); 
route::post('/peserta/reguler', [RegulerController::class, 'store'])->name('peserta.reguler.store');
// route::get('/peserta/reguler/create', RegulerController::class, 'create')->middleware('auth');
// route::get('/peserta/daftarpelatihan/create/{pelatihan}', RegulerController::class);


// route::get('/peserta/daftarpelatihan/create/{id}', PesertaPelatihan::class)->name('daftarpelatihan.create');

// route::get('/peserta/reguler/{id}/create', [RegulerController::class, 'create'])->name('reguler.create');
// route::get('/peserta/reguler/{id}', [RegulerController::class, 'show'])->name('reguler.show');
// route::resource('/peserta/konsultasi', KonsultasiController::class)->middleware('auth');

// route::get('/peserta/reguler/create', [RegulerController::class, 'create'])->middleware('auth');
// route::get('/peserta/reguler/index', [RegulerController::class, 'index'])->middleware('guest');
// route::get('/peserta/reguler/show', [RegulerController::class, 'show'])->middleware('guest');
// route::get('/peserta/reguler/store', [RegulerController::class, 'store'])->middleware('auth');

route::resource('/peserta/konsultasi', KonsultasiController::class)->middleware('auth');
// route::post('/peserta/konsultasi', KonsultasiController::class, 'store')->name('peserta.konsultasi.store')->middleware('auth');
Route::get('/get-provinsi/{negaraId}', [KonsultasiController::class, 'getProvinsi']);
Route::get('/get-kabupaten/{provinsiId}', [KonsultasiController::class, 'getKabupaten']);


route::resource('/peserta/permintaan', PermintaanController::class)->middleware('auth');
// route::get('/peserta/permintaan/create', PermintaanController::class)->name('permintaan.create');
Route::post('/peserta/permintaan', [PermintaanController::class, 'store'])->name('peserta.permintaan.store');

route::resource('/peserta/evaluasi', PesertaEvaluasi::class);
Route::get('/peserta/pelatihan/peserta/evaluasi/create/{id_pelatihan}/{facilitatorIndex?}', [PesertaEvaluasi::class, 'create'])
    ->name('peserta.evaluasi.create');
Route::get('peserta/evaluasi/previous/{id}', [PesertaEvaluasi::class, 'previousFacilitator'])->name('peserta.evaluasi.previous');
Route::get('peserta/evaluasi/next/{id}', [PesertaEvaluasi::class, 'nextFacilitator'])->name('peserta.evaluasi.next');
Route::get('/peserta/pelatihan/peserta/evaluasi/create/{id}', [PesertaEvaluasi::class, 'create'])->name('peserta.evaluasi.create');

route::resource('/peserta/postingan', PesertaPostingan::class);

route::resource('/peserta/studidampak', PesertaStudi::class);

route::resource('/peserta/surveykepuasan', PesertaSurveyKepuasan::class);

// route::resource('/peserta/daftarhadir', PesertaDaftarHadir::class);

route::resource('/peserta/kontak', KontakController::class);
Route::post('/peserta/kontak', [KontakController::class, 'sendEmail'])->name('peserta.kontak.email');
// route::post('/peserta/kontak', KontakController::class, 'store')->name('peserta.kontak.store');

// route::resource('/peserta/pelatihan', PelatihanUserController::class);

Route::get('/peserta/pelatihan', [PelatihanUserController::class, 'index'])->name('peserta.pelatihan.index');
Route::get('/peserta/pelatihan/{id}', [PelatihanUserController::class, 'show'])->name('peserta.pelatihan.show');
Route::get('/peserta/pelatihan/{id}/download', [PelatihanUserController::class, 'download'])->name('peserta.pelatihan.download');

Route::get('/peserta/pelatihan/peserta/surveykepuasan/create/{id}', [PesertaSurveyKepuasan::class, 'create'])->name('peserta.surveykepuasan.create');
Route::post('/peserta/pelatihan/peserta/surveykepuasan', [PesertaSurveyKepuasan::class, 'store'])->name('peserta.surveykepuasan.store');
Route::get('/peserta/pelatihan/peserta/studidampak/create/{id}', [PesertaStudi::class, 'create'])->name('peserta.studidampak.create');
Route::post('/peserta/pelatihan/peserta/studidampak', [PesertaStudi::class, 'store'])->name('peserta.studidampak.store');
Route::get('/peserta/pelatihan/peserta/daftarhadir/create/{id}', [PesertaDaftarHadir::class, 'create'])->name('peserta.daftarhadir.create');
Route::post('/peserta/pelatihan/peserta/daftarhadir', [PesertaDaftarHadir::class, 'store'])->name('peserta.daftarhadir.store');
Route::get('/peserta/pelatihan/peserta/sertifikat/{id}', [PesertaSertifikat::class, 'show'])->name('peserta.sertifikat.show');
// Route::post('/peserta/pelatihan/peserta/daftarhadir', [PesertaDaftarHadir::class, 'store'])->name('peserta.daftarhadir.store');

route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
route::post('/login', [LoginController::class, 'authenticate']);
route::post('/logout', [LoginController::class, 'logout']);

route::get('/register', [RegisterController::class, 'create'])->name('register');
route::post('/register', [RegisterController::class, 'store'])->name('register');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

 


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('regulers')->name('regulers/')->group(static function() {
            Route::get('/',                                             'RegulerController@index')->name('index');
            Route::get('/create',                                       'RegulerController@create')->name('create');
            Route::post('/',                                            'RegulerController@store')->name('store');
            Route::get('/{reguler}/edit',                               'RegulerController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RegulerController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reguler}',                                   'RegulerController@update')->name('update');
            Route::delete('/{reguler}',                                 'RegulerController@destroy')->name('destroy');
        });
    });
});