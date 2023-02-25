<?php

namespace App\Http\Controllers;

use App\Models\ServiceAirConditioner;
use Illuminate\Http\Request;

class ServiceAirConditionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->role_id) {
            $serviceAirConditioner = ServiceAirConditioner::where('pelanggan_id', auth()->user()->id)->get();
        }
        elseif (auth()->user()->hak_akses_id == 3) {
            $serviceAirConditioner = ServiceAirConditioner::where('humas_aprove', 1)->get();
        } else {
            $serviceAirConditioner = ServiceAirConditioner::all();
        }
        $data = [
            'datas' => $serviceAirConditioner,
            'actived' => 'Data Service Air Conditioner',
        ];
        return view('pelanggan.service-ac.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.service-ac.create');
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
            'jumlah_service' => ['required'],
            'ada_ac_rucak' => ['required'],
        ]);

        try {
            auth()->user()->serviceAc()->create($inputVal);
            return redirect(route('serviceAc.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceAirConditioner  $serviceAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceAirConditioner = ServiceAirConditioner::whereId($id)->firstOrFail();
        return view('pelanggan.service-ac.show', compact('serviceAirConditioner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceAirConditioner  $serviceAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceAirConditioner $serviceAirConditioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceAirConditioner  $serviceAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceAirConditioner $serviceAirConditioner)
    {
        //
    }


    public function updateAprove(Request $request, ServiceAirConditioner $serviceAirConditioner)
    {
        if (auth()->user()->hak_akses_id == 2) {
            $inputVal['humas_aprove'] = $request->status_aprove;
        } elseif (auth()->user()->hak_akses_id == 3) {
            $inputVal['korlap_aprove'] = $request->status_aprove;
        };

        try {
            $serviceAirConditioner->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceAirConditioner  $serviceAirConditioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceAirConditioner $serviceAirConditioner)
    {
        //
    }
}
