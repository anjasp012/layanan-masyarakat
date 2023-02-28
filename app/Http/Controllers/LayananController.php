<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->role_id) {
            $layanan = Layanan::where('pelanggan_id', auth()->user()->id)->get();
        } elseif (auth()->user()->hak_akses_id == 3) {
            $layanan = Layanan::all();
        } elseif (auth()->user()->hak_akses_id == 2) {
            $layanan = Layanan::where('aprove_humas', '1')->get();
        } elseif (auth()->user()->role_id == 1) {
            $layanan = Layanan::where('aprove_korlap', '1')->get();
        };

        $data = [
            'datas' => $layanan,
            'actived' => 'Data Request Layanan',
        ];
        return view('pelanggan.layanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.layanan.create');
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
            'nama_pemohon' => ['required'],
            'nama_rumah_ibadah' => ['required'],
            'alamat_rumah_ibadah' => ['required'],
            'tanggal_jam_pelaksanaan' => ['required'],
            'titik_lokasi_akurat' => ['required'],
            'kolom_komentar' => ['required'],
            'file_pendukung' => ['required'],
        ]);

        if ($request->has('file_pendukung')) {
            $layanan = "pendukung-layanan" . time() . '.' . 'pdf';
            $request->file_pendukung->storeAs('public/pendukung-layanan', $layanan);
            $inputVal['file_pendukung'] = $layanan;
        }

        try {
            auth()->user()->layanan()->create($inputVal);
            return redirect(route('layanan.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        return view('pelanggan.layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        //
    }

    public function updateAprove(Request $request, Layanan $layanan)
    {
        if (auth()->user()->hak_akses_id == 3) {
            $inputVal['aprove_humas'] = $request->status_aprove;
        } elseif (auth()->user()->hak_akses_id == 2) {
            $inputVal['aprove_korlap'] = $request->status_aprove;
        } elseif (auth()->user()->role_id == 1) {
            $inputVal['aprove_admin'] = $request->status_aprove;
        };

        try {
            $layanan->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        //
    }
}
