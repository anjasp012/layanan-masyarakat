<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use App\Notifications\aktifasiNotification;
use App\Notifications\nonAktifNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:1');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::where('role_id', 2  )->where('aktif', 1)->get(),
            'actived' => 'Staff Aktif',
        ];
        return view('user.index', $data);
    }

    public function userNonAktif()
    {
        $data = [
            'user' => User::where('role_id', 2)->where('aktif', 0)->get(),
            'actived' => 'Staff NonAktif',
            'jabatan' => Jabatan::all()
        ];
        return view('user.index', $data);
    }

    public function userPending()
    {
        $data = [
            'user' => User::where('role_id', 2)->where('aktif', 2)->get(),
            'actived' => 'Staff Pending',
            'jabatan' => Jabatan::all()
        ];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        return view('user.create.step-1', compact('registerUser'));
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

        $inputVal['role_id'] = '2';
        $inputVal['aktif'] = '1';
        $inputVal['no_kta'] = date('dm') .' ' .date('Y') .' ' .str_pad(User::next(), 4, '0', STR_PAD_LEFT);

        if (empty($request->session()->get('registerUser'))) {
            $registerUser = new User();
            $registerUser->fill($inputVal);
            $request->session()->put('registerUser', $registerUser);
        } else {
            $registerUser = $request->session()->get('registerUser');
            $registerUser->fill($inputVal);
            $request->session()->put('registerUser', $registerUser);
        }
        return redirect()->route('anggota.create.step-2');
    }

    public function createStep2(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        return view('user.create.step-2', compact('registerUser'));
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
        return redirect()->route('anggota.create.step-3');
    }

    public function createStep3(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        return view('user.create.step-3', compact('registerUser'));
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
        return redirect()->route('anggota.create.step-4');
    }

    public function createStep4(Request $request)
    {
        // dd($request->session()->get('registerUser'));
        $registerUser = $request->session()->get('registerUser');
        return view('user.create.step-4', compact('registerUser'));
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
        return redirect()->route('anggota.create.step-5');
    }

    public function createStep5(Request $request)
    {
        $registerUser = $request->session()->get('registerUser');
        return view('user.create.step-5', compact('registerUser'));
    }

    public function storeStep5(Request $request)
    {
        // dd($request->all());
        $registerUser = $request->session()->get('registerUser');
        if (!isset($registerUser->photo_diri)) {
            $request->validate([
                'photo_diri' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileName = "photo_diri-" . time() . '.' . request()->photo_diri->getClientOriginalExtension();

            $request->photo_diri->storeAs('public/photo_diri', $fileName);

            $registerUser = $request->session()->get('registerUser');

            $registerUser->photo_diri = $fileName;
            $request->session()->put('registerUser', $registerUser);
        }
        $registerUser->save();
        $request->session()->forget('registerUser');
        return redirect()->route('staff.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nik' => 'required',
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
            'no_hp' => 'required',
        ]);

        try {
            $user->update($inputVal);
            return redirect(route('staff.index'));
        } catch (\Exception $th) {
            return redirect(route('staff.index'));
        }
    }

    public function statusAktif(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'aktif' => 'required'
        ]);
        $inputVal['no_kta'] = date('dm') .' ' .date('Y') .' ' .str_pad($id, 4, '0', STR_PAD_LEFT);
        try {
            $user->update($inputVal);
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
        $inputVal['jabatan_id'] = null;
        try {
            $user->update($inputVal);
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
