<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Agama;
use App\Enums\GolonganDarah;
use App\Enums\JenisKelamin;
use App\Enums\Pekerjaan;
use App\Enums\PendidikanTerakhir;
use App\Enums\StatusPerkawinan;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\registerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    public function createStep0(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        return view('auth.register.step-0', compact('registerUser'));
    }

    public function storeStep0(Request $request)
    {
        $inputVal = $request->validate([
            'role_id' => 'required',
        ]);

        $inputVal['aktif'] = '2';

        if (empty($request->session()->get('registerUser'))) {
            $registerUser = new User();
            $registerUser->fill($inputVal);
            $request->session()->put('registerUser', $registerUser);
        } else {
            $registerUser = $request->session()->get('registerUser');
            $registerUser->fill($inputVal);
            $request->session()->put('registerUser', $registerUser);
        }
        return redirect()->route('register.create.step-1');
    }

    public function createStep1(Request $request)
    {
        $jenisKelamin = JenisKelamin::getValues();
        $golonganDarah = GolonganDarah::getValues();
        $registerUser = $request->session()->get('registerUser');
        return view('auth.register.step-1', compact('registerUser', 'jenisKelamin', 'golonganDarah'));
    }

    public function storeStep1(Request $request)
    {
        $inputVal = $request->validate([
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
        ]);

        $registerUser = $request->session()->get('registerUser');
        $registerUser->fill($inputVal);
        $request->session()->put('registerUser', $registerUser);
        return redirect()->route('register.create.step-2');
    }

    public function createStep2(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        // dd($request->session()->get('registerUser'));
        return view('auth.register.step-2', compact('registerUser'));
    }

    public function storeStep2(Request $request)
    {
        $inputVal = $request->validate([
            'id_provinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rt_rw' => 'required',
            'alamat_sesuai_ktp' => 'required',
            'alamat_saat_ini' => 'required',
        ]);

        $registerUser = $request->session()->get('registerUser');
        $registerUser->fill($inputVal);
        $request->session()->put('registerUser', $registerUser);
        return redirect()->route('register.create.step-3');
    }

    public function createStep3(Request $request)
    {
        $agama = Agama::getValues();
        $statusPerkawinan = StatusPerkawinan::getValues();
        $pekerjaan = Pekerjaan::getValues();
        $pendidikanTerakhir = PendidikanTerakhir::getValues();
        $registerUser = $request->session()->get('registerUser');
        return view('auth.register.step-3', compact('registerUser', 'agama', 'statusPerkawinan', 'pekerjaan', 'pendidikanTerakhir'));
    }

    public function storeStep3(Request $request)
    {
        $inputVal = $request->validate([
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        $registerUser = $request->session()->get('registerUser');
        $registerUser->fill($inputVal);
        $request->session()->put('registerUser', $registerUser);
        return redirect()->route('register.create.step-4');
    }

    public function createStep4(Request $request)
    {
        // dd($request->session()->get('registerUser'));
        $registerUser = $request->session()->get('registerUser');
        return view('auth.register.step-4', compact('registerUser'));
    }

    public function storeStep4(Request $request)
    {
        $inputVal = $request->validate([
            'email' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        $inputVal['password'] = Hash::make($request->password);

        $registerUser = $request->session()->get('registerUser');
        $registerUser->fill($inputVal);
        $request->session()->put('registerUser', $registerUser);
        return redirect()->route('register.create.step-5');
    }

    public function createStep5(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        $provinsi = \Indonesia::findProvince($registerUser->id_provinsi);
        $kota = \Indonesia::findCity($registerUser->id_kota);
        $kecamatan = \Indonesia::findDistrict($registerUser->id_kecamatan);
        $kelurahan = \Indonesia::findVillage($registerUser->id_kelurahan);
        $registerUser['provinsi'] = $provinsi->name;
        $registerUser['kota'] = $kota->name;
        $registerUser['kecamatan'] = $kecamatan->name;
        $registerUser['kelurahan'] = $kelurahan->name;
        dd($registerUser);
        return view('auth.register.step-5', compact('registerUser'));
    }

    public function storeStep5(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        if (!isset($registerUser->photo_diri)) {
            $request->validate([
                'photo_diri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'persetujuan1' => 'required',
                'persetujuan2' => 'required',
            ]);

            $fileName = "photo_diri-" . time() . '.' . request()->photo_diri->getClientOriginalExtension();

            $request->photo_diri->storeAs('public/photo_diri', $fileName);

            $registerUser = $request->session()->get('registerUser');

            $registerUser->photo_diri = $fileName;
            $request->session()->put('registerUser', $registerUser);
        }
        $registerUser->save();
        Notification::route('mail', [
            $registerUser->email => $registerUser->nama_lengkap,
        ])->notify(new registerNotification($registerUser));
        $request->session()->forget('registerUser');
        return redirect()->route('login');
    }
}
