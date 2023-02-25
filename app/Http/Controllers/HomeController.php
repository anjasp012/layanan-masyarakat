<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use NumberFormatter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user,pelanggan');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemasukan = Transaksi::selectRaw('year(tanggal) year, month(tanggal) month, sum(nominal) nominal')
        ->where('jenis', '1')
        ->groupBy('year', 'month')
        ->orderBy('month', 'asc')
        ->get();
        $pengeluaran = Transaksi::selectRaw('year(tanggal) year, month(tanggal) month, sum(nominal) nominal')
        ->where('jenis', '0')
        ->groupBy('year', 'month')
        ->orderBy('month', 'asc')
        ->get();
        $chartPertahun = (now()->year-1) .','. (now()->year) .','. (now()->year+1);
        // dd($pemasukan);
        $chartPengeluaranPertahun = Transaksi::selectRaw('year(tanggal) year, sum(nominal) nominal')
        ->where('jenis', '0')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();
        $chartPemasukanPertahun = Transaksi::selectRaw('year(tanggal) year, sum(nominal) nominal')
        ->where('jenis', '1')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

        $pengeluaranPerbulan = Transaksi::selectRaw('year(tanggal) year, month(tanggal) month, sum(nominal) nominal')
        ->whereYear('tanggal', date('Y'))
        ->where('jenis', '0')
        ->groupBy('year', 'month')
        ->orderBy('month', 'asc')
        ->get();
        $pemasukanPerbulan = Transaksi::selectRaw('year(tanggal) year, month(tanggal) month, sum(nominal) nominal')
        ->whereYear('tanggal', date('Y'))
        ->where('jenis', '1')
        ->groupBy('year', 'month')
        ->orderBy('month', 'asc')
        ->get();
        $nominalPengeluaranPerbulan = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];
        foreach ($pengeluaranPerbulan as  $value) {
            if (isset($nominalPengeluaranPerbulan[$value->month])) {
                $nominalPengeluaranPerbulan[$value->month] = $value->nominal;
            };
        };
        $nominalPemasukanPerbulan = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];
        foreach ($pemasukanPerbulan as $value) {
            if (isset($nominalPemasukanPerbulan[$value->month])) {
                $nominalPemasukanPerbulan[$value->month] = $value->nominal;
            };
        };
        // dd($nominalPemasukanPerbulan);
        if (!auth()->user()->role_id) {
            $pengumuman = Pengumuman::where('jenis', '0')->get()->last();
        } else {
            $pengumuman = Pengumuman::where('jenis', '1')->get()->last();
        }
        $data = [
            'anggotaAktif' => User::where('role_id', 3)->where('aktif', 1)->count(),
            'anggotaNonAktif' => User::where('role_id', 3)->where('aktif', 0)->count(),
            'anggotaPending' => User::where('role_id', 3)->where('aktif', 2)->count(),
            'relawanAktif' => User::where('role_id', 4)->where('aktif', 1)->count(),
            'relawanNonAktif' => User::where('role_id', 4)->where('aktif', 0)->count(),
            'relawanPending' => User::where('role_id', 4)->where('aktif', 2)->count(),
            'jumlahPengumuman' => Pengumuman::count(),
            'pengumuman' => $pengumuman,
            'pemasukanHariIni' => Transaksi::where('jenis', '1')->where('tanggal', date('Y-m-d'))->sum('nominal'),
            'pemasukanBulanIni' => $pemasukan->where('month', date('m'))->where('year', date('Y'))->sum('nominal'),
            'pemasukanTahunIni' => $pemasukan->where('year', date('Y'))->sum('nominal'),
            'seluruhPemasukan' => $pemasukan->sum('nominal'),
            'pengeluaranHariIni' => Transaksi::where('jenis', '0')->where('tanggal', date('Y-m-d'))->sum('nominal'),
            'pengeluaranBulanIni' => $pengeluaran->where('month', date('m'))->where('year', date('Y'))->sum('nominal'),
            'pengeluaranTahunIni' => $pengeluaran->where('year', date('Y'))->sum('nominal'),
            'seluruhPengeluaran' => $pengeluaran->sum('nominal'),
            'chartPertahun' => $chartPertahun,
            'chartPemasukanPertahunNominal' => $chartPemasukanPertahun->pluck('nominal'),
            'chartPengeluaranPertahunNominal' => $chartPengeluaranPertahun->pluck('nominal'),
            'chartPengeluaranPerbulan' => collect($nominalPengeluaranPerbulan),
            'chartPemasukanPerbulan' => collect($nominalPemasukanPerbulan),
        ];

        // dd( array(now()->year-1, now()->year, now()->year+1));
        // dd($data);
        return view('home', $data);
    }
}
