<?php

namespace App\Http\Controllers;

use App\Enums\Agama;
use App\Enums\GolonganDarah;
use App\Enums\JenisKelamin;
use App\Enums\Pekerjaan;
use App\Enums\PendidikanTerakhir;
use App\Enums\StatusPerkawinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereId(auth()->user()->id)->firstOrFail();
        $provinsi = \Indonesia::findProvince($user->id_provinsi);
        $kota = \Indonesia::findCity($user->id_kota);
        $kecamatan = \Indonesia::findDistrict($user->id_kecamatan);
        $kelurahan = \Indonesia::findVillage($user->id_kelurahan);
        $user['provinsi'] = $provinsi->name;
        $user['kota'] = $kota->name;
        $user['kecamatan'] = $kecamatan->name;
        $user['kelurahan'] = $kelurahan->name;
        // dd($user);
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function editProfile()
    {
        $jenisKelamin = JenisKelamin::getValues();
        $golonganDarah = GolonganDarah::getValues();
        $agama = Agama::getValues();
        $statusPerkawinan = StatusPerkawinan::getValues();
        $pekerjaan = Pekerjaan::getValues();
        $pendidikanTerakhir = PendidikanTerakhir::getValues();
        $user = User::whereId(auth()->user()->id)->firstOrFail();
        return view('profile.edit', compact('user', 'golonganDarah', 'jenisKelamin', 'agama', 'statusPerkawinan', 'pekerjaan', 'pendidikanTerakhir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $inputVal = $request->validate(
            [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => ['required', 'unique:users,nik,'.$user->id],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'id_provinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rt_rw' => 'required',
            'alamat_sesuai_ktp' => 'required',
            'alamat_saat_ini' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_hp' => ['required', 'unique:users,no_hp,'.$user->id],
        ],
            [
                'accepted'  => 'Ceklis terlebih dahulu',
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

        if ($request->has('photo_diri')) {
            $photoDiri = "photo_diri-" . time() . '.' . 'png';
            $request->photo_diri->storeAs('public/photo_diri', $photoDiri);
            $inputVal['photo_diri'] = $photoDiri;
        }

        try {
            $user->update($inputVal);
            return redirect(route('dashboard'));
        } catch (\Exception $th) {
            return redirect(route('user.index'));
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::whereId(auth()->user()->id)->firstOrFail();
        $inputVal = $request->validate(
            [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => ['required', 'unique:users,nik,'.$user->id],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required',
            'id_provinsi' => 'required',
            'id_kota' => 'required',
            'id_kecamatan' => 'required',
            'id_kelurahan' => 'required',
            'rt_rw' => 'required',
            'alamat_sesuai_ktp' => 'required',
            'alamat_saat_ini' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_hp' => ['required', 'unique:users,no_hp,'.$user->id],
        ],
            [
                'accepted'  => 'Ceklis terlebih dahulu',
                'required'  => ':attribute Harus di isi.',
                'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

        if ($request->has('photo_diri')) {
            $photoDiri = "photo_diri-" . time() . '.' . 'png';
            $request->photo_diri->storeAs('public/photo_diri', $photoDiri);
            $inputVal['photo_diri'] = $photoDiri;
        }

        try {
            $user->update($inputVal);
            return redirect(route('dashboard'));
        } catch (\Exception $th) {
            return redirect(route('user.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->photo_diri) {
            Storage::delete('public/photo_diri/'. $user->photo_diri);
        }
        $user->delete();
        return redirect()->back();
    }
}
