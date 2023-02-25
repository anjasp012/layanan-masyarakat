<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class DppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::where('role_id', 3)->where('kepengurusan_id', 1)->where('aktif', 1)->get(),
            'actived' => 'Dpp',
            'hakAkses' => HakAkses::all()
        ];
        return view('dpp.index', $data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateJabatan(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'jabatan' => 'sometimes'
        ]);
        try {
            $user->update($inputVal);
            return redirect()->back();
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    public function updateAkses(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if ($request->hak_akses_id == 'null') {
            $inputVal['hak_akses_id'] = null;
        } else {
            $inputVal = $request->validate([
                'hak_akses_id' => 'required'
            ]);
        }
        try {
            $user->update($inputVal);
            return redirect()->back();
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = [
            'kepengurusan_id' => null,
            'hak_akses_id' => null,
            'jabatan' => null,
        ];

        try {
            $user->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }

    }
}
