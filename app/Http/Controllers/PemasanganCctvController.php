<?php

namespace App\Http\Controllers;

use App\Models\PemasanganCctv;
use Illuminate\Http\Request;

class PemasanganCctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->role_id) {
            $pemasanganCctv = PemasanganCctv::where('pelanggan_id', auth()->user()->id)->get();
        }
        elseif (auth()->user()->hak_akses_id == 3) {
            $pemasanganCctv = PemasanganCctv::where('humas_aprove', 1)->get();
        } else {
            $pemasanganCctv = PemasanganCctv::all();
        }
        $data = [
            'datas' => $pemasanganCctv,
            'actived' => 'Data Request Pemasangan Cctv',
        ];
        return view('pelanggan.pemasangan-cctv.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.pemasangan-cctv.create');
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
            'ada_persediaan_tangga' => ['required'],
            'jumlah_pasang' => ['required'],
            'file_pendukung' => ['required'],
        ]);

        if ($request->has('file_pendukung')) {
            $PemasanganCctv = "pendukung-pemasangan-cctv" . time() . '.' . 'pdf';
            $request->file_pendukung->storeAs('public/pendukung-pemasangan-cctv', $PemasanganCctv);
            $inputVal['file_pendukung'] = $PemasanganCctv;
        }

        try {
            auth()->user()->pemasanganCctv()->create($inputVal);
            return redirect(route('pemasanganCctv.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemasanganCctv  $pemasanganCctv
     * @return \Illuminate\Http\Response
     */
    public function show(PemasanganCctv $pemasanganCctv)
    {
        return view('pelanggan.pemasangan-cctv.show', compact('pemasanganCctv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemasanganCctv  $pemasanganCctv
     * @return \Illuminate\Http\Response
     */
    public function edit(PemasanganCctv $pemasanganCctv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemasanganCctv  $pemasanganCctv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemasanganCctv $pemasanganCctv)
    {
        //
    }

    public function updateAprove(Request $request, PemasanganCctv $pemasanganCctv)
    {
        if (auth()->user()->hak_akses_id == 2) {
            $inputVal['humas_aprove'] = $request->status_aprove;
        } elseif (auth()->user()->hak_akses_id == 3) {
            $inputVal['korlap_aprove'] = $request->status_aprove;
        };

        try {
            $pemasanganCctv->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemasanganCctv  $pemasanganCctv
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemasanganCctv $pemasanganCctv)
    {
        //
    }
}
