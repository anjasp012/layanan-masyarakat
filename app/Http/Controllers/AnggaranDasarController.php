<?php

namespace App\Http\Controllers;

use App\Models\AnggaranDasar;
use Illuminate\Http\Request;

class AnggaranDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'datas' => AnggaranDasar::all(),
            'active' => 'Anggaran Dasar'
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
            'active' => 'Anggaran Dasar'
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
            $anggaranDasar = "anggaran-dasar" . time() . '.' . 'pdf';
            $request->file->storeAs('public/anggaran-dasar', $anggaranDasar);
            $inputVal['file'] = $anggaranDasar;
        }

        try {
            AnggaranDasar::create($inputVal);
            return redirect(route('anggaranDasar.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggaranDasar  $anggaranDasar
     * @return \Illuminate\Http\Response
     */
    public function show(AnggaranDasar $anggaranDasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggaranDasar  $anggaranDasar
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggaranDasar $anggaranDasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggaranDasar  $anggaranDasar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggaranDasar $anggaranDasar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggaranDasar  $anggaranDasar
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggaranDasar $anggaranDasar)
    {
        //
    }
}
