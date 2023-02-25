<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'datas' => Pelanggan::all(),
        ];
        return view('pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        ],
        [
            'required'  => ':attribute Harus di isi.',
            'unique'    => 'Maaf :attribute anda sudah terdaftar'
            ]
        );

        $inputVal['password'] = Hash::make($request->password);
        if ($request->has('photo_diri')) {
            $photoDiri = "photo-diri-" . time() . '.' . 'jpg';
            $request->photo_diri->storeAs('public/pelanggan/photo-diri', $photoDiri);
            $inputVal['photo_diri'] = $photoDiri;
        }
        if ($request->has('photo_rumah_ibadah')) {
            $photoRumahIbadah = "photo-rumah-ibadah-" . time() . '.' . 'jpg';
            $request->photo_rumah_ibadah->storeAs('public/pelanggan/photo-rumah-ibadah', $photoRumahIbadah);
            $inputVal['photo_rumah_ibadah'] = $photoRumahIbadah;
        }
        $inputVal['no_pelanggan'] = 'P-'.date('dmY') .str_pad(Pelanggan::next(), 4, '0', STR_PAD_LEFT);

        try {
            Pelanggan::create($inputVal);
            return redirect(route('pelanggan.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::whereId($id)->firstOrFail();
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::whereId($id)->firstOrFail();
        return view('pelanggan.edit', compact('pelanggan'));
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
        //
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
