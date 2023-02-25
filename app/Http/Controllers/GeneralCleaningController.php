<?php

namespace App\Http\Controllers;

use App\Models\GeneralCleaning;
use Illuminate\Http\Request;

class GeneralCleaningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->role_id) {
            $generalCleaning = GeneralCleaning::where('pelanggan_id', auth()->user()->id)->get();
        } elseif (auth()->user()->hak_akses_id == 3) {
            $generalCleaning = GeneralCleaning::where('status_aprove', '!=', 'menunggu')->get();
        } elseif (auth()->user()->hak_akses_id == 2) {
            $generalCleaning = GeneralCleaning::all();
        } elseif (auth()->user()->role_id == 1) {
            $generalCleaning = GeneralCleaning::where('status_aprove', '!=', 'menunggu')->where('status_aprove', '!=', 'progres')->get();
        };
        $data = [
            'datas' => $generalCleaning,
            'actived' => 'Data General Cleaning',
        ];
        return view('pelanggan.general-cleaning.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.general-cleaning.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(auth()->user());
        $inputVal = $request->validate([
            'nama_pemohon' => ['required'],
            'nama_rumah_ibadah' => ['required'],
            'alamat_rumah_ibadah' => ['required'],
            'tanggal_jam_pelaksanaan' => ['required'],
            'titik_lokasi_akurat' => ['required'],
            'ada_persediaan_tangga' => ['required'],
        ]);

        $inputVal['status_aprove'] = 'menunggu';

        try {
            auth()->user()->generalCleaning()->create($inputVal);
            return redirect(route('generalCleaning.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralCleaning  $generalCleaning
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralCleaning $generalCleaning)
    {
        return view('pelanggan.general-cleaning.show', compact('generalCleaning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralCleaning  $generalCleaning
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralCleaning $generalCleaning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralCleaning  $generalCleaning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralCleaning $generalCleaning)
    {
        //
    }

    public function updateAprove(Request $request, GeneralCleaning $generalCleaning)
    {
        if ($request->status_aprove == 0) {
            $inputVal['status_aprove'] = 'ditolak';
        } elseif (auth()->user()->hak_akses_id == 2) {
            $inputVal['status_aprove'] = 'progres';
        } elseif (auth()->user()->hak_akses_id == 3) {
            $inputVal['status_aprove'] = 'survey lokasi';
        } elseif (auth()->user()->role_id == 1) {
            $inputVal['status_aprove'] = 'disetujui';
        };

        try {
            $generalCleaning->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralCleaning  $generalCleaning
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralCleaning $generalCleaning)
    {
        //
    }
}
