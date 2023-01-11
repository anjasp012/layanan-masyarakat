<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\aktifasiNotification;
use App\Notifications\nonAktifNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class RelawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:1')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::where('role_id', 4)->where('aktif', 1)->get(),
            'actived' => 'Relawan Aktif',
        ];
        return view('user.index', $data);
    }

    public function userNonAktif()
    {
        $data = [
            'user' => User::where('role_id', 4)->where('aktif', 0)->get(),
            'actived' => 'Relawan NonAktif',
        ];
        return view('user.index', $data);
    }

    public function userPending()
    {
        $data = [
            'user' => User::where('role_id', 4)->where('aktif', 2)->get(),
            'actived' => 'Relawan Pending',
        ];
        return view('user.index', $data);
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
        $user = User::where('id', $id)->firstOrFail();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_Kelamin' => 'required',
            'golongan_darah' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rt_rw' => 'required',
            'alamat_sesuai_ktp' => 'required',
            'alamat_saat_ini' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_hp' => 'required',
        ]);

        try {
            $user->update($inputVal);
            return redirect(route('relawan.index'));
        } catch (\Exception $th) {
            return redirect(route('relawan.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusAktif(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'aktif' => 'required'
        ]);
        $user->update($inputVal);
        try {
            Notification::route('mail', [
                $user->email => $user->nama_lengkap,
            ])->notify(new aktifasiNotification());
            return redirect()->back();
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }
    public function statusNonAktif(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'aktif' => 'required'
        ]);
        $user->update($inputVal);
        try {
            Notification::route('mail', [
                $user->email => $user->nama_lengkap,
            ])->notify(new nonAktifNotification());
            return redirect()->back();
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
