<?php

namespace App\Http\Controllers;

use App\Models\AnggaranRumahTangga;
use Illuminate\Http\Request;

class AnggaranRumahTanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'datas' => AnggaranRumahTangga::all(),
            'active' => 'Anggaran Rumah Tangga'
        ];
        return view('anggaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'active' => 'Anggaran Rumah Tangga'
        ];
        return view('anggaran.create', $data);
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
            'file' => ['required'],
        ]);

        $inputVal['tanggal'] = now();
        if ($request->has('file')) {
            $anggaranRumahTangga = "anggaran-rumah-tangga" . time() . '.' . 'pdf';
            $request->file->storeAs('public/anggaran-rumah-tangga', $anggaranRumahTangga);
            $inputVal['file'] = $anggaranRumahTangga;
        }

        try {
            AnggaranRumahTangga::create($inputVal);
            return redirect(route('anggaranRumahTangga.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggaranRumahTangga  $anggaranRumahTangga
     * @return \Illuminate\Http\Response
     */
    public function show(AnggaranRumahTangga $anggaranRumahTangga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggaranRumahTangga  $anggaranRumahTangga
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggaranRumahTangga $anggaranRumahTangga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggaranRumahTangga  $anggaranRumahTangga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggaranRumahTangga $anggaranRumahTangga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggaranRumahTangga  $anggaranRumahTangga
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggaranRumahTangga $anggaranRumahTangga)
    {
        //
    }
}
