<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\RekeningBank;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'transaksi' => Transaksi::all(),
        ];
        return view('transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kategori' => Kategori::all(),
            'rekening' => RekeningBank::all(),
        ];
        return view('transaksi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->tanggal);
        $inputVal = $request->validate([
            'tanggal' => ['required'],
            'jenis' => ['required'],
            'kategori_id' => ['required'],
            'rekening_bank_id' => ['required'],
            'nominal' => ['required'],
            'keterangan' => ['required'],
            'bukti_transaksi' => ['required'],
        ]);

        if ($request->has('bukti_transaksi')) {
            $buktiTransaksi = "bukti_transaksi" . time() . '.' . 'jpg';
            $request->bukti_transaksi->storeAs('public/bukti_transaksi', $buktiTransaksi);
            $inputVal['bukti_transaksi'] = $buktiTransaksi;
        }

        $rekeningBank = RekeningBank::where('id', $request->rekening_bank_id)->firstOrFail();
        if ($request->jenis == '0') {
            if ($rekeningBank->saldo < $request->nominal) {
                return redirect()->back()->with('error', 'Saldo Tidak Cukup');
            } else {
                $updateSaldoBank['saldo'] = $rekeningBank->saldo - $request->nominal;
            }
        } else {
            $updateSaldoBank['saldo'] = $rekeningBank->saldo + $request->nominal;
        }

        try {
            $rekeningBank->update($updateSaldoBank);
            Transaksi::create($inputVal);
            return redirect(route('transaksi.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $data = [
            'transaksi' => $transaksi,
            'kategori' => Kategori::all(),
            'rekening' => RekeningBank::all(),
        ];
        return view('transaksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $inputVal = $request->validate([
            'tanggal' => ['required'],
            'jenis' => ['required'],
            'kategori_id' => ['required'],
            'rekening_bank_id' => ['required'],
            'nominal' => ['required'],
            'keterangan' => ['required'],
        ]);

        if ($request->has('bukti_transaksi')) {
            $buktiTransaksi = "bukti_transaksi" . time() . '.' . 'pdf';
            $request->bukti_transaksi->storeAs('public/bukti_transaksi', $buktiTransaksi);
            $inputVal['bukti_transaksi'] = $buktiTransaksi;
        } else {
            $inputVal['bukti_transaksi'] = $transaksi->bukti_transaksi;
        }

        try {
            $transaksi->update($inputVal);
            return redirect(route('transaksi.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
