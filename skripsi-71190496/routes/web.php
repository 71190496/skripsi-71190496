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

route::get('/dashboard/reguler', [DashboardReguler::class, 'index'])->middleware('auth')->name('dashboard.reguler.index');
Route::get('/dashboard/reguler/presensi/{id_pelatihan}/{aksi}', [DashboardReguler::class, 'aturPresensi'])
    ->name('dashboard.reguler.presensi');
Route::get('/dashboard/reguler/{id}', [DashboardReguler::class, 'show'])->name('dashboard.reguler.show');
route::resource('/dashboard/permintaan', DashboardPermintaan::class)->except(['create', 'destroy']);
Route::delete('/dashboard/permintaan/{id}', [DashboardPermintaan::class, 'destroy'])->name('dashboard.permintaan.destroy');
route::get('/dashboard/permintaan/{id}/create', [DashboardPermintaan::class, 'create'])->name('dashboard.permintaan.create');
route::get('/dashboard/permintaan/{id}/peserta', [DashboardPermintaan::class, 'peserta'])->name('dashboard.permintaan.peserta');
route::post('/dashboard/permintaan/simpan', [DashboardPermintaan::class, 'simpan'])->name('dashboard.permintaan.simpan');
route::get('/dashboard/permintaan', [DashboardPermintaan::class, 'index'])->middleware('auth')->name('dashboard.permintaan.index');
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
Route::view('/dashboard/evaluasi/formEval', 'dashboard.evaluasi.createPermintaan');
Route::get('/dashboard/evaluasi/showPermintaan/{id}', [DashboardEvaluasi::class, 'showPermintaan'])->name('dashboard.evaluasi.showPermintaan');
Route::get('/dashboard/evaluasi/showKonsultasi/{id}', [DashboardEvaluasi::class, 'showKonsultasi'])->name('dashboard.evaluasi.showKonsultasi');
Route::get('/dashboard/evaluasi/create/{id_pelatihan}', [DashboardEvaluasi::class, 'create'])->name('dashboard.evaluasi.create'); 
Route::get('/dashboard/evaluasi/createPermintaan/{id}', [DashboardEvaluasi::class, 'createPermintaan'])->name('dashboard.evaluasi.createPermintaan'); 
Route::get('/dashboard/evaluasi/createKonsultasi/{id}', [DashboardEvaluasi::class, 'createKonsultasi'])->name('dashboard.evaluasi.createKonsultasi'); 
Route::post('/dashboard/evaluasi/saveform', [DashboardEvaluasi::class, 'store'])->name('dashboard.evaluasi.store'); 
Route::post('/dashboard/evaluasi', [DashboardEvaluasi::class, 'storePermintaan'])->name('dashboard.evaluasi.storePermintaan'); 
Route::post('/dashboard/evaluasi/savepermintaan', [DashboardEvaluasi::class, 'saveForm'])->name('dashboard.evaluasipermintaan.save');
Route::post('/dashboard/evaluasi/savekonsultasi', [DashboardEvaluasi::class, 'saveFormKonsultasi'])->name('dashboard.evaluasikonsultasi.save');

Route::view('/dashboard/evaluasi/edit-konsultasi/{id}', 'dashboard.evaluasi.editkonsultasi');
Route::get('/dashboard/evaluasi/editkonsultasi/{id}', [DashboardEvaluasi::class, 'editKonsultasi'])->name('dashboard.evaluasi.editkonsultasi'); 
Route::post('/dashboard/evaluasi/updatekonsultasi/{id}', [DashboardEvaluasi::class, 'updateKonsultasi'])->name('dashboard.evaluasi.updatekonsultasi');

Route::view('/dashboard/evaluasi/edit-reguler/{id}', 'dashboard.evaluasi.editreguler');
Route::get('/dashboard/evaluasi/editreguler/{id}', [DashboardEvaluasi::class, 'editReguler'])->name('dashboard.evaluasi.editreguler'); 
Route::post('/dashboard/evaluasi/updatereguler/{id}', [DashboardEvaluasi::class, 'updateReguler'])->name('dashboard.evaluasi.updatereguler');

Route::view('/dashboard/evaluasi/edit-permintaan/{id}', 'dashboard.evaluasi.editpermintaan');
Route::get('/dashboard/evaluasi/editpermintaan/{id}', [DashboardEvaluasi::class, 'editPermintaan'])->name('dashboard.evaluasi.editpermintaan'); 
Route::post('/dashboard/evaluasi/updatepermintaan/{id}', [DashboardEvaluasi::class, 'updatePermintaan'])->name('dashboard.evaluasi.updatepermintaan');
// Route::post('/dashboard/evaluasi ', [DashboardEvaluasi::class, 'store'])->name('dashboard.evaluasi.store');

route::resource('/dashboard/tema', TemaController::class);
route::resource('/dashboard/kontak', DashboardKontak::class);

route::resource('/dashboard/surveykepuasan', DashboardSurvey::class);
Route::view('/dashboard/surveykepuasan/edit-reguler/{id}', 'dashboard.surveykepuasan.editreguler');
Route::get('/dashboard/surveykepuasan/editreguler/{id}', [DashboardSurvey::class, 'editReguler'])->name('dashboard.surveykepuasan.editreguler'); 
Route::post('/dashboard/surveykepuasan/updatereguler/{id}', [DashboardSurvey::class, 'updateReguler'])->name('dashboard.surveykepuasan.updatereguler');
Route::get('/dashboard/surveykepuasan/create/{id}', [DashboardSurvey::class, 'create'])->name('dashboard.surveykepuasan.create');
Route::get('/dashboard/surveykepuasan/show/{id}', [DashboardSurvey::class, 'show'])->name('dashboard.surveykepuasan.show');
Route::post('/dashboard/surveykepuasan/savereguler', [DashboardSurvey::class, 'store'])->name('dashboard.surveykepuasan.storereguler');
Route::get('/dashboard/surveykepuasan', [DashboardSurvey::class, 'index'])->name('dashboard.surveykepuasan.index');

Route::view('/dashboard/surveykepuasan/edit-permintaan/{id}', 'dashboard.surveykepuasan.editpermintaan');
Route::get('/dashboard/surveykepuasan/editpermintaan/{id}', [DashboardSurvey::class, 'editPermintaan'])->name('dashboard.surveykepuasan.editpermintaan'); 
Route::post('/dashboard/surveykepuasan/updatepermintaan/{id}', [DashboardSurvey::class, 'updatePermintaan'])->name('dashboard.surveykepuasan.updatepermintaan');
Route::get('/dashboard/surveykepuasan/showpermintaan/{id}', [DashboardSurvey::class, 'showPermintaan'])->name('dashboard.surveykepuasan.showpermintaan');
Route::get('/dashboard/surveykepuasan/createpermintaan/{id}', [DashboardSurvey::class, 'createPermintaan'])->name('dashboard.surveykepuasan.createpermintaan');
Route::post('/dashboard/surveykepuasan/savepermintaan', [DashboardSurvey::class, 'savePermintaan'])->name('dashboard.surveykepuasan.storepermintaan');

Route::view('/dashboard/surveykepuasan/edit-konsultasi/{id}', 'dashboard.surveykepuasan.editkonsultasi');
Route::get('/dashboard/surveykepuasan/editkonsultasi/{id}', [DashboardSurvey::class, 'editKonsultasi'])->name('dashboard.surveykepuasan.editkonsultasi'); 
Route::post('/dashboard/surveykepuasan/updatekonsultasi/{id}', [DashboardSurvey::class, 'updateKonsultasi'])->name('dashboard.surveykepuasan.updatekonsultasi');
Route::get('/dashboard/surveykepuasan/createkonsultasi/{id}', [DashboardSurvey::class, 'createKonsultasi'])->name('dashboard.surveykepuasan.createkonsultasi');
Route::get('/dashboard/surveykepuasan/showkonsultasi/{id}', [DashboardSurvey::class, 'showkonsultasi'])->name('dashboard.surveykepuasan.showkonsultasi');
Route::post('/dashboard/surveykepuasan/savekonsultasi', [DashboardSurvey::class, 'saveKonsultasi'])->name('dashboard.surveykepuasan.storekonsultasi');

route::resource('/dashboard/studidampak', DashboardStudiDampak::class);
Route::view('/dashboard/studidampak/edit-reguler/{id}', 'dashboard.studidampak.editreguler');
Route::get('/dashboard/studidampak/editreguler/{id}', [DashboardStudiDampak::class, 'editReguler'])->name('dashboard.studidampak.editreguler'); 
Route::post('/dashboard/studidampak/updatereguler/{id}', [DashboardStudiDampak::class, 'updateReguler'])->name('dashboard.studidampak.updatereguler');
Route::get('/dashboard/studidampak', [DashboardStudiDampak::class, 'index'])->name('dashboard.studidampak.index');
Route::get('/dashboard/studidampak/create/{id}', [DashboardStudiDampak::class, 'create'])->name('dashboard.studidampak.create');
Route::get('/dashboard/studidampak/show/{id}', [DashboardStudiDampak::class, 'show'])->name('dashboard.studidampak.show');
Route::post('/dashboard/studidampak/savereguler', [DashboardStudiDampak::class, 'storeReguler'])->name('dashboard.studidampak.storereguler');

Route::view('/dashboard/studidampak/edit-permintaan/{id}', 'dashboard.studidampak.editpermintaan');
Route::get('/dashboard/studidampak/editpermintaan/{id}', [DashboardStudiDampak::class, 'editPermintaan'])->name('dashboard.studidampak.editpermintaan'); 
Route::post('/dashboard/studidampak/updatepermintaan/{id}', [DashboardStudiDampak::class, 'updatePermintaan'])->name('dashboard.studidampak.updatepermintaan');
Route::get('/dashboard/studidampak/createpermintaan/{id}', [DashboardStudiDampak::class, 'createPermintaan'])->name('dashboard.studidampak.createpermintaan');
Route::get('/dashboard/studidampak/showpermintaan/{id}', [DashboardStudiDampak::class, 'showPermintaan'])->name('dashboard.studidampak.showpermintaan');
Route::post('/dashboard/studidampak/savepermintaan', [DashboardStudiDampak::class, 'savePermintaan'])->name('dashboard.studidampak.savepermintaan');

Route::view('/dashboard/studidampak/edit-konsultasi/{id}', 'dashboard.studidampak.editkonsultasi');
Route::get('/dashboard/studidampak/editkonsultasi/{id}', [DashboardStudiDampak::class, 'editKonsultasi'])->name('dashboard.studidampak.editkonsultasi'); 
Route::post('/dashboard/studidampak/updatekonsultasi/{id}', [DashboardStudiDampak::class, 'updateKonsultasi'])->name('dashboard.studidampak.updatekonsultasi');
Route::get('/dashboard/studidampak/createkonsultasi/{id}', [DashboardStudiDampak::class, 'createKonsultasi'])->name('dashboard.studidampak.createkonsultasi');
Route::get('/dashboard/studidampak/showkonsultasi/{id}', [DashboardStudiDampak::class, 'showKonsultasi'])->name('dashboard.studidampak.showkonsultasi');
Route::post('/dashboard/studidampak/savekonsultasi', [DashboardStudiDampak::class, 'saveKonsultasi'])->name('dashboard.studidampak.savekonsultasi');

route::resource('/dashboard/daftarhadir', DashboardDaftarHadir::class);
// routes/web.php

Route::get('/dashboard/daftarhadir/show/{id}', [DashboardDaftarHadir::class, 'show'])->name('dashboard.daftarhadir.show');


route::resource('/dashboard/fasilitator', DashboardFasilitator::class);
Route::get('/dashboard/fasilitator/show/{id_fasilitator}', [DashboardFasilitator::class, 'show'])->name('dashboard.fasilitator.show');
Route::get('/dashboard/fasilitator/edit/{id_fasilitator}', [DashboardFasilitator::class, 'edit'])->name('dashboard.fasilitator.edit');
Route::post('/dashboard/fasilitator/{id_fasilitator}', [DashboardFasilitator::class, 'update'])->name('dashboard.fasilitator.update');

route::resource('/dashboard/postingan', PostinganController::class);

route::resource('/dashboard/konsultasi', DashboardKonsultasi::class);
Route::get('/dashboard/konsultasi/{id_konsultasi}/detail', [DashboardKonsultasi::class, 'detail'])->name('dashboard.konsultasi.detail');
Route::delete('/dashboard/konsultasi/{id}', [DashboardKonsultasi::class, 'destroy'])->name('dashboard.konsultasi.destroy');
route::get('/dashboard/konsultasi', [DashboardKonsultasi::class, 'index'])->name('dashboard.konsultasi.index');
route::get('/dashboard/konsultasi/show/{id}', [DashboardKonsultasi::class, 'show'])->name('dashboard.konsultasi.show');
route::get('/dashboard/konsultasi/{id}/create', [DashboardKonsultasi::class, 'create'])->name('dashboard.konsultasi.create');
route::get('/dashboard/konsultasi/{id_konsultasi}/peserta', [DashboardKonsultasi::class, 'peserta'])->name('dashboard.konsultasi.peserta');
route::post('/dashboard/konsultasi/simpan', [DashboardKonsultasi::class, 'simpan'])->name('dashboard.konsultasi.simpan');
// });

Route::resource('/peserta/beranda', BerandaController::class);
// Route::resource('/dashboard/beranda', DashboardBeranda::class);
// Route::resource('/dashboard/beranda', AdminUsersController::class);
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
route::get('/peserta/reguler/tanyapelatihan/{id}', [RegulerController::class, 'createEmail'])->name('peserta.reguler.email');
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
route::post('/logout', [LoginController::class, 'logout'])->name('logout');

route::get('/register', [RegisterController::class, 'create'])->name('register');
route::post('/register', [RegisterController::class, 'store'])->name('register');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


