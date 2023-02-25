<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\RekeningBank;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if (Route::is('laporan.filter')) {
            if ($request->mulai_tanggal && $request->sampai_tanggal && $request->kategori_id == "Semua Kategori" && $request->rekening_bank_id == 'Semua Bank') {
                $transaksi = Transaksi::where('tanggal', '>=', $request->mulai_tanggal)->where('tanggal', '<=', $request->sampai_tanggal)->get();
            }
            elseif ($request->mulai_tanggal && $request->sampai_tanggal && $request->kategori_id && $request->rekening_bank_id === 'Semua Bank') {
                $transaksi = Transaksi::where('tanggal', '>=', $request->mulai_tanggal)->where('tanggal', '<=', $request->sampai_tanggal)->where('kategori_id', $request->kategori_id)->get();
            }
            elseif ($request->mulai_tanggal && $request->sampai_tanggal && $request->kategori_id === 'Semua Kategori' && $request->rekening_bank_id) {
                $transaksi = Transaksi::where('tanggal', '>=', $request->mulai_tanggal)->where('tanggal', '<=', $request->sampai_tanggal)->where('rekening_bank_id', $request->rekening_bank_id)->get();
            }
            elseif ($request->mulai_tanggal && $request->sampai_tanggal && $request->kategori_id && $request->rekening_bank_id) {
                $transaksi = Transaksi::where('tanggal', '>=', $request->mulai_tanggal)->where('tanggal', '<=', $request->sampai_tanggal)->where('kategori_id', $request->kategori_id)->where('rekening_bank_id', $request->rekening_bank_id)->get();
            }
            else {
                $transaksi = Transaksi::limit(0);
            }



            $data = [
                'oldFilterMulai' => $request->mulai_tanggal,
                'oldFilterSampai' => $request->sampai_tanggal,
                'oldFilterKategori' => $request->kategori_id,
                'oldFilterBank' => $request->rekening_bank_id,
                'filterKategori' => Kategori::whereId($request->kategori_id)->first()->nama_kategori ?? $request->kategori_id,
                'filterBank' => RekeningBank::whereId($request->rekening_bank_id)->first()->nama_bank ?? $request->rekening_bank_id,
                'kategori' => Kategori::all(),
                'rekening' => RekeningBank::all(),
                'transaksi' => $transaksi,
            ];
        }else {
            $data = [
                'rekening' => RekeningBank::all(),
                'kategori' => Kategori::all(),
            ];
        };


        return view('laporan.index', $data);
    }
}
