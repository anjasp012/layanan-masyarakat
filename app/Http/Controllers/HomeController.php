<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'anggotaAktif' => User::where('role_id', 3)->where('aktif', 1)->count(),
            'anggotaNonAktif' => User::where('role_id', 3)->where('aktif', 0)->count(),
            'anggotaPending' => User::where('role_id', 3)->where('aktif', 2)->count(),
            'relawanAktif' => User::where('role_id', 4)->where('aktif', 1)->count(),
            'relawanNonAktif' => User::where('role_id', 4)->where('aktif', 0)->count(),
            'relawanPending' => User::where('role_id', 4)->where('aktif', 2)->count(),
            'jumlahPengumuman' => Pengumuman::count(),
            'pengumuman' => Pengumuman::get()->last()
        ];
        return view('home', $data);
    }
}
