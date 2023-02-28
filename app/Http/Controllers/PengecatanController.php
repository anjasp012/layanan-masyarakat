<?php

namespace App\Http\Controllers;

use App\Models\Pengecatan;
use Illuminate\Http\Request;

class PengecatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->role_id) {
            $pengecatan = Pengecatan::where('pelanggan_id', auth()->user()->id)->get();
        } elseif (auth()->user()->hak_akses_id == 3) {
            $pengecatan = Pengecatan::all();
        } elseif (auth()->user()->hak_akses_id == 2) {
            $pengecatan = Pengecatan::where('aprove_humas', '1')->get();
        } elseif (auth()->user()->role_id == 1) {
            $pengecatan = Pengecatan::where('aprove_korlap', '1')->get();
        };

        $data = [
            'datas' => $pengecatan,
            'actived' => 'Data Request Pengecatan',
        ];
        return view('pelanggan.pengecatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.pengecatan.create');
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
            'file_pendukung' => ['required'],
        ]);

        if ($request->has('file_pendukung')) {
            $Pengecatan = "pendukung-pengecatan" . time() . '.' . 'pdf';
            $request->file_pendukung->storeAs('public/pendukung-pengecatan', $Pengecatan);
            $inputVal['file_pendukung'] = $Pengecatan;
        }

        try {
            auth()->user()->pengecatan()->create($inputVal);
            return redirect(route('pengecatan.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengecatan  $pengecatan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengecatan $pengecatan)
    {
        return view('pelanggan.pengecatan.show', compact('pengecatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengecatan  $pengecatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengecatan $pengecatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengecatan  $pengecatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengecatan $pengecatan)
    {
        //
    }

    public function updateAprove(Request $request, Pengecatan $pengecatan)
    {
        if (auth()->user()->hak_akses_id == 3) {
            $inputVal['aprove_humas'] = $request->status_aprove;
        } elseif (auth()->user()->hak_akses_id == 2) {
            $inputVal['aprove_korlap'] = $request->status_aprove;
        } elseif (auth()->user()->role_id == 1) {
            $inputVal['aprove_admin'] = $request->status_aprove;
        };

        try {
            $pengecatan->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengecatan  $pengecatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengecatan $pengecatan)
    {
        //
    }
}
