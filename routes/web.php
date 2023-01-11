<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\DpdController;
use App\Http\Controllers\DppController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KartuTandaAnggotaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
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

Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');
Route::get('districts', [DependantDropdownController::class, 'districts'])->name('districts');
Route::get('villages', [DependantDropdownController::class, 'villages'])->name('villages');

Route::group(['middleware' => ['guest']], function () {
    Route::get('register', [RegisterController::class, 'createStep0'])->name('register.create.step-0');
    Route::post('register', [RegisterController::class, 'storeStep0'])->name('register.store.step-0');
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('edit-profile', [UserController::class, 'editProfile'])->name('user.editProfile');
    Route::match(['patch', 'put'], 'edit-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::resource('user', UserController::class);

    Route::group(['middleware' => ['role:1,2']], function () {
        Route::resource('jabatan', JabatanController::class);
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

        Route::resource('dpd', DpdController::class)->only('index');
        Route::match(['patch', 'put'], 'dpd/{dpd}/updateJabatan', [DpdController::class, 'updateJabatan'])->name('dpd.updateJabatan');
        Route::resource('dpp', DppController::class)->only('index');
        Route::match(['patch', 'put'], 'dpp/{dpp}/updateJabatan', [DppController::class, 'updateJabatan'])->name('dpp.updateJabatan');

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
    });
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('kartuTandaAnggota', KartuTandaAnggotaController::class);
});
