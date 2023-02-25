<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Agama;
use App\Enums\GolonganDarah;
use App\Enums\JenisKelamin;
use App\Enums\Pekerjaan;
use App\Enums\PendidikanTerakhir;
use App\Enums\StatusPerkawinan;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
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
        // dd($request->all());
        $inputVal = $request->validate([
            'role_id' => 'required',
        ]);

        $inputVal['aktif'] = '2';

        if ($request->role_id == 5) {
            return redirect(route('registerPelanggan.create'));
        }

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

    public function registerPelangganCreate()
    {
        return view('auth.register-pelanggan.register');
    }

    public function registerPelangganStore(Request $request)
    {
        $inputVal = $request->validate([
                'nama_pengurus' => ['required'],
                'alamat_rumah_pengurus' => ['required'],
                'no_hp' => ['required', 'unique:pelanggans,no_hp'],
                'email' => ['required', 'unique:pelanggans,email'],
                'password' => 'required',
                'photo_diri' => ['required'],
                'nama_rumah_ibadah' => ['required'],
                'alamat_rumah_ibadah' => ['required'],
                'alamat_lengkap_rumah_ibadah' => ['required'],
                'photo_rumah_ibadah' => ['required'],
                'photo_rumah_ibadah' => ['required'],
            ],
            [
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

        $inputVal['password'] = Hash::make($request->password);
        if ($request->has('photo_diri')) {
            $photoDiri = "photo-diri-" . time() . '.' . request()->photo_diri->getClientOriginalExtension();
            $request->photo_diri->storeAs('public/pelanggan/photo-diri', $photoDiri);
            $inputVal['photo_diri'] = $photoDiri;
        }
        if ($request->has('photo_rumah_ibadah')) {
            $photoRumahIbadah = "photo-rumah-ibadah-" . time() . '.' . request()->photo_rumah_ibadah->getClientOriginalExtension();
            $request->photo_rumah_ibadah->storeAs('public/pelanggan/photo-rumah-ibadah', $photoRumahIbadah);
            $inputVal['photo_rumah_ibadah'] = $photoRumahIbadah;
        }
        $inputVal['no_pelanggan'] = 'P-'.date('dmY') .str_pad(Pelanggan::next(), 4, '0', STR_PAD_LEFT);

        try {
            Pelanggan::create($inputVal);
            return redirect(route('login'));
        } catch (\Throwable $th) {
            dd($th);
        }
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
        $inputVal = $request->validate(
            [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => ['required', 'unique:users,nik'],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            ],
            [
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

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
        $inputVal = $request->validate(
            [
            'id_provinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rt_rw' => 'required',
            'alamat_sesuai_ktp' => 'required',
            'alamat_saat_ini' => 'required',
        ],
            [
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

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
        $inputVal = $request->validate(
            [
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
        ],
            [
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

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
        $inputVal = $request->validate(
            [
            'email' => ['required', 'unique:users,email'],
            'no_hp' => ['required', 'unique:users,no_hp'],
            'password' => 'required',
        ],
            [
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

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
        $laravolt = [
            'provinsi' => $provinsi->name,
            'kota' => $kota->name,
            'kecamatan' => $kecamatan->name,
            'kelurahan' => $kelurahan->name,
        ];
        // dd($registerUser, $laravolt);
        return view('auth.register.step-5', compact('registerUser', 'laravolt'));
    }

    public function storeStep5(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        if (!isset($registerUser->photo_diri)) {
            $request->validate(
                [
                'photo_diri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'persetujuan1' => 'accepted',
                'persetujuan2' => 'accepted',
            ],
                [
                    'accepted'  => 'Ceklis terlebih dahulu',
                    'required'  => ':attribute Harus di isi.',
                    'unique'    => 'Maaf :attribute anda sudah terdaftar'
                    ]
            );

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
