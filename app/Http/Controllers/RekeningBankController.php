<?php

namespace App\Http\Controllers;

use App\Models\RekeningBank;
use Illuminate\Http\Request;

class RekeningBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'rekening' => RekeningBank::all(),
        ];
        return view('rekening-bank.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekening-bank.create');
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
            'nama_bank' => ['required'],
            'no_rekening' => ['required'],
            'saldo' => ['required'],
        ]);

        try {
            RekeningBank::create($inputVal);
            return redirect(route('rekening.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function show(RekeningBank $rekeningBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekeningBank = RekeningBank::where('id', $id)->firstOrFail();
        return view('rekening-bank.edit', compact('rekeningBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rekeningBank = RekeningBank::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'nama_bank' => ['required'],
            'no_rekening' => ['required'],
            'saldo' => ['required'],
        ]);

        try {
            $rekeningBank->update($inputVal);
            return redirect(route('rekening.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekeningBank  $rekeningBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekeningBank = RekeningBank::where('id', $id)->firstOrFail();
        try {
            $rekeningBank->delete();
            return redirect(route('rekening.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
