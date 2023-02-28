<?php

use App\Http\Controllers\AnggaranDasarController;
use App\Http\Controllers\AnggaranRumahTanggaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\DpdController;
use App\Http\Controllers\DppController;
use App\Http\Controllers\GeneralCleaningController;
use App\Http\Controllers\HumasController;
use App\Http\Controllers\KartuTandaAnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KorlapController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Pelanggan\KartuPelangganController;
use App\Http\Controllers\Pelanggan\ProfilePelangganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasanganCctvController;
use App\Http\Controllers\PengecatanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RekeningBankController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\ServiceAirConditionerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahDpdController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('attemptLogin');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');
Route::get('districts', [DependantDropdownController::class, 'districts'])->name('districts');
Route::get('villages', [DependantDropdownController::class, 'villages'])->name('villages');

Route::group(['middleware' => ['guest']], function () {
    Route::get('register', [RegisterController::class, 'createStep0'])->name('register.create.step-0');
    Route::post('register', [RegisterController::class, 'storeStep0'])->name('register.store.step-0');
    Route::get('register/pelanggan', [RegisterController::class, 'registerPelangganCreate'])->name('registerPelanggan.create');
    Route::post('register/pelanggan', [RegisterController::class, 'registerPelangganStore'])->name('registerPelanggan.store');
    Route::get('register/1', [RegisterController::class, 'createStep1'])->name('register.create.step-1');
    Route::post('register/1', [RegisterController::class, 'storeStep1'])->name('register.store.step-1');
    Route::get('register/2', [RegisterController::class, 'createStep2'])->name('register.create.step-2');
    Route::post('register/2', [RegisterController::class, 'storeStep2'])->name('register.store.step-2');
    Route::get('register/3', [RegisterController::class, 'createStep3'])->name('register.create.step-3');
    Route::post('register/3', [RegisterController::class, 'storeStep3'])->name('register.store.step-3');
    Route::get('register/4', [RegisterController::class, 'createStep4'])->name('register.create.step-4');
    Route::post('register/4', [RegisterController::class, 'storeStep4'])->name('register.store.step-4');
    Route::get('register/5', [RegisterController::class, 'createStep5'])->name('register.create.step-5');
    Route::post('register/5', [RegisterController::class, 'storeStep5'])->name('register.store.step-5');
});

Route::group(['middleware' => ['auth:user,pelanggan']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::match(['patch', 'put'], 'edit-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::resource('user', UserController::class);

    Route::group(['middleware' => ['role:1,2']], function () {
        Route::get('tambah-anggota/1', [AnggotaController::class, 'createStep1'])->name('anggota.create.step-1');
        Route::post('tambah-anggota/1', [AnggotaController::class, 'storeStep1'])->name('anggota.store.step-1');
        Route::get('tambah-anggota/2', [AnggotaController::class, 'createStep2'])->name('anggota.create.step-2');
        Route::post('tambah-anggota/2', [AnggotaController::class, 'storeStep2'])->name('anggota.store.step-2');
        Route::get('tambah-anggota/3', [AnggotaController::class, 'createStep3'])->name('anggota.create.step-3');
        Route::post('tambah-anggota/3', [AnggotaController::class, 'storeStep3'])->name('anggota.store.step-3');
        Route::get('tambah-anggota/4', [AnggotaController::class, 'createStep4'])->name('anggota.create.step-4');
        Route::post('tambah-anggota/4', [AnggotaController::class, 'storeStep4'])->name('anggota.store.step-4');
        Route::get('tambah-anggota/5', [AnggotaController::class, 'createStep5'])->name('anggota.create.step-5');
        Route::post('tambah-anggota/5', [AnggotaController::class, 'storeStep5'])->name('anggota.store.step-5');
        Route::get('anggota-non-aktif', [AnggotaController::class, 'userNonAktif'])->name('anggota.userNonAktif');
        Route::get('anggota-pending', [AnggotaController::class, 'userPending'])->name('anggota.userPending');
        Route::resource('anggota', AnggotaController::class)->except('create');
        Route::match(['patch', 'put'], 'anggota/{anggotum}/updateKepengurusan', [AnggotaController::class, 'updateKepengurusan'])->name('anggota.updateKepengurusan');
        Route::match(['patch', 'put'], 'anggota/{anggotum}/statusAktif', [AnggotaController::class, 'statusAktif'])->name('anggota.statusAktif');
        Route::match(['patch', 'put'], 'anggota/{anggotum}/statusNonAktif', [AnggotaController::class, 'statusNonAktif'])->name('anggota.statusNonAktif');

        Route::get('relawan-non-aktif', [RelawanController::class, 'userNonAktif'])->name('relawan.userNonAktif');
        Route::get('relawan-pending', [RelawanController::class, 'userPending'])->name('relawan.userPending');
        Route::resource('relawan', RelawanController::class)->except('create');
        Route::match(['patch', 'put'], 'relawan/{relawan}/statusAktif', [RelawanController::class, 'statusAktif'])->name('relawan.statusAktif');
        Route::match(['patch', 'put'], 'relawan/{relawan}/statusNonAktif', [RelawanController::class, 'statusNonAktif'])->name('relawan.statusNonAktif');

        // Route::get('dpd', [DpdController::class, 'index'])->name('dpd.index');
        Route::resource('dpd', DpdController::class)->only('index', 'destroy');
        Route::get('dpd/daftar-daerah', [DpdController::class, 'indexdaerah'])->name('dpd.indexdaerah');
        Route::get('dpd/tambah-daerah', [DpdController::class, 'createdaerah'])->name('dpd.createdaerah');
        Route::post('dpd/tambah-daerah', [DpdController::class, 'storedaerah'])->name('dpd.storedaerah');
        Route::delete('dpd/{slug}/delete-daerah', [DpdController::class, 'deletedaerah'])->name('dpd.deletedaerah');
        Route::delete('dpd/{slug}/kosongkan-daerah', [DpdController::class, 'kosongkandaerah'])->name('dpd.kosongkandaerah');
        Route::get('dpd/{slug}', [DpdController::class, 'daerah'])->name('dpd.daerah');
        Route::get('dpd/{daerah}/tambah', [DpdController::class, 'create'])->name('dpd.create');
        Route::post('dpd/{daerah}/tambah', [DpdController::class, 'store'])->name('dpd.store');
        Route::match(['patch', 'put'], 'dpd/{dpd}/updateJabatan', [DpdController::class, 'updateJabatan'])->name('dpd.updateJabatan');
        Route::match(['patch', 'put'], 'dpd/{dpd}/updateAkses', [DpdController::class, 'updateAkses'])->name('dpd.updateAkses');
        Route::match(['patch', 'put'], 'dpd/{dpd}/updateDaerah', [DpdController::class, 'updateDaerah'])->name('dpd.updateDaerah');
        Route::resource('dpp', DppController::class)->only('index', 'destroy');
        Route::match(['patch', 'put'], 'dpp/{dpp}/updateJabatan', [DppController::class, 'updateJabatan'])->name('dpp.updateJabatan');
        Route::match(['patch', 'put'], 'dpp/{dpp}/updateAkses', [DppController::class, 'updateAkses'])->name('dpp.updateAkses');

        Route::get('tambah-staff/1', [StaffController::class, 'createStep1'])->name('staff.create.step-1');
        Route::post('tambah-staff/1', [StaffController::class, 'storeStep1'])->name('staff.store.step-1');
        Route::get('tambah-staff/2', [StaffController::class, 'createStep2'])->name('staff.create.step-2');
        Route::post('tambah-staff/2', [StaffController::class, 'storeStep2'])->name('staff.store.step-2');
        Route::get('tambah-staff/3', [StaffController::class, 'createStep3'])->name('staff.create.step-3');
        Route::post('tambah-staff/3', [StaffController::class, 'storeStep3'])->name('staff.store.step-3');
        Route::get('tambah-staff/4', [StaffController::class, 'createStep4'])->name('staff.create.step-4');
        Route::post('tambah-staff/4', [StaffController::class, 'storeStep4'])->name('staff.store.step-4');
        Route::get('tambah-staff/5', [StaffController::class, 'createStep5'])->name('staff.create.step-5');
        Route::post('tambah-staff/5', [StaffController::class, 'storeStep5'])->name('staff.store.step-5');
        Route::get('staff-non-aktif', [StaffController::class, 'userNonAktif'])->name('staff.userNonAktif');
        Route::get('staff-pending', [StaffController::class, 'userPending'])->name('staff.userPending');
        Route::resource('staff', StaffController::class)->except('create');
        Route::match(['patch', 'put'], 'staff/{staff}/statusAktif', [StaffController::class, 'statusAktif'])->name('staff.statusAktif');
        Route::match(['patch', 'put'], 'staff/{staff}/statusNonAktif', [StaffController::class, 'statusNonAktif'])->name('staff.statusNonAktif');

        Route::get('pelanggan-non-aktif', [PelangganController::class, 'userNonAktif'])->name('pelanggan.userNonAktif');
        Route::get('pelanggan-pending', [PelangganController::class, 'userPending'])->name('pelanggan.userPending');
        Route::resource('pelanggan', PelangganController::class);
        Route::match(['patch', 'put'], 'pelanggan/{pelanggan}/statusAktif', [PelangganController::class, 'statusAktif'])->name('pelanggan.statusAktif');
        Route::match(['patch', 'put'], 'pelanggan/{pelanggan}/statusNonAktif', [PelangganController::class, 'statusNonAktif'])->name('pelanggan.statusNonAktif');
        Route::resource('bendahara', BendaharaController::class);
        Route::resource('humas', HumasController::class);
        Route::resource('korlap', KorlapController::class);
    });
    Route::group(['middleware' => ['role:1,2,3']], function () {
        Route::resource('anggaranDasar', AnggaranDasarController::class);
        Route::resource('anggaranRumahTangga', AnggaranRumahTanggaController::class);
    });
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('kartuTandaAnggota', KartuTandaAnggotaController::class);
});

Route::group(['middleware' => ['auth:user,pelanggan']], function () {
    Route::get('edit-pelangganProfile', [ProfilePelangganController::class, 'editProfile'])->name('profilePelanggan.editProfile');
    Route::resource('profilePelanggan', ProfilePelangganController::class);
    Route::resource('kartuPelanggan', KartuPelangganController::class);
    Route::match(['patch', 'put'], '/generalCleaning/{generalCleaning}/updateAprove', [GeneralCleaningController::class, 'updateAprove'])->name('generalCleaning.updateAprove');
    Route::resource('generalCleaning', GeneralCleaningController::class);
    Route::match(['patch', 'put'], '/serviceAc/{serviceAc}/updateAprove', [ServiceAirConditionerController::class, 'updateAprove'])->name('serviceAc.updateAprove');
    Route::resource('serviceAc', ServiceAirConditionerController::class);
    Route::match(['patch', 'put'], '/pemasanganCctv/{pemasanganCctv}/updateAprove', [PemasanganCctvController::class, 'updateAprove'])->name('pemasanganCctv.updateAprove');
    Route::resource('pemasanganCctv', PemasanganCctvController::class);
    Route::match(['patch', 'put'], '/pengecatan/{pengecatan}/updateAprove', [PengecatanController::class, 'updateAprove'])->name('pengecatan.updateAprove');
    Route::resource('pengecatan', PengecatanController::class);
    Route::match(['patch', 'put'], '/layanan/{layanan}/updateAprove', [LayananController::class, 'updateAprove'])->name('layanan.updateAprove');
    Route::resource('layanan', LayananController::class);
});

Route::group(['middleware' => ['auth:user']], function () {
    Route::group(['middleware' => ['role:1,2,3']], function () {
        Route::resource('kategori', KategoriController::class);
        Route::resource('rekening', RekeningBankController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('laporan', [LaporanController::class, 'index'])->name('laporan.filter');
    });
});
