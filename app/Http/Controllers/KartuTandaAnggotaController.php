<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KartuTandaAnggotaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::whereId(auth()->user()->id)->firstOrFail();
        return view('kartu-tanda-anggota.index', compact('user'));
    }
}
