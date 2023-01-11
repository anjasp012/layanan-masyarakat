<?php

namespace App\Http\Controllers;

use App\Models\KartuTandaAnggota;
use Illuminate\Http\Request;

class KartuTandaAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kta = KartuTandaAnggota::first();
        $user = auth()->user();
        return view('kartu-tanda-anggota.index', compact('user', 'kta'));
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
     * @param  \App\Models\KartuTandaAnggota  $kartuTandaAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(KartuTandaAnggota $kartuTandaAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KartuTandaAnggota  $kartuTandaAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(KartuTandaAnggota $kartuTandaAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KartuTandaAnggota  $kartuTandaAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kartuTandaAnggota = KartuTandaAnggota::where('id', $id)->firstOrFail();
        $request->validate([
            'kta_depan' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kta_belakang' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->has('kta_depan')) {
            $ktaDepan = "template-kta" . time() . '.' . 'png';
            $request->kta_depan->storeAs('public/template-kta', $ktaDepan);
            $inputVal['kta_depan'] = $ktaDepan;
        }
        if ($request->has('kta_belakang')) {
            $ktaBelakang = "template-kta" . time() . '.' . 'png';
            $request->kta_belakang->storeAs('public/template-kta', $ktaBelakang);
            $inputVal['kta_belakang'] = $ktaBelakang;
        }
        $kartuTandaAnggota->update($inputVal);
        try {
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KartuTandaAnggota  $kartuTandaAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(KartuTandaAnggota $kartuTandaAnggota)
    {
        //
    }
}
