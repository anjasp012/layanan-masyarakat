<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\WilayahDpd;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => User::where('role_id', 3)->where('kepengurusan_id', 2)->where('aktif', 1)->get(),
            'actived' => 'Dpd',
            'hakAkses' => HakAkses::all(),
            'daerah' => WilayahDpd::all()
        ];
        return view('dpd.index', $data);
    }

    public function daerah($slug)
    {
        $wilayahDpd = WilayahDpd::whereSlug($slug)->firstOrFail();
        $data = [
            'user' => User::where('role_id', 3)->where('kepengurusan_id', 2)->where('wilayah_dpd_id', $wilayahDpd->id)->where('aktif', 1)->get(),
            'actived' => $wilayahDpd->nama,
            'slug' => $slug,
            'hakAkses' => HakAkses::all()
        ];
        return view('dpd.daerah', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdaerah()
    {
        $data = [
            'datas' => WilayahDpd::all(),
        ];
        // dd($data);
        return view('dpd.indexdaerah', $data);
    }

    public function createdaerah()
    {
        return view('dpd.createdaerah');
    }

    public function create($slug)
    {
        $wilayahDpd = WilayahDpd::whereSlug($slug)->firstOrFail();
        $data = [
            'user' => User::where('role_id', 3)->orWhere('kepengurusan_id', !1)->get(),
            'actived' => $wilayahDpd->nama,
            'slug' => $slug,
        ];
        return view('dpd.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedaerah(Request $request)
    {
        $inputVal = $request->validate([
            'nama' => ['required']
        ]);
        $str = strtolower($request->nama);
        $inputVal['slug'] = preg_replace("/^(\w+\s)/", "", $str);

        try {
            WilayahDpd::create($inputVal);
            return redirect(route('dpd.indexdaerah'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'user' => ['required'],
            'slug' => ['required']
        ]);
        $wilayahDpd = WilayahDpd::where('slug', $slug)->firstOrFail();
        $users = User::whereIn('id', $request->user)->get();

        try {
            foreach ($users as $user) {
                $user->kepengurusan_id = '2';
                $user->wilayah_dpd_id = $wilayahDpd->id;
                $user->save();
            }
            return redirect(route('dpd.daerah', $slug));
        } catch (\Throwable $th) {
            return redirect()->back();
        }
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

    public function updateDaerah(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if ($request->wilayah_dpd_id == 'null') {
            $inputVal['wilayah_dpd_id'] = null;
        } else {
            $inputVal = $request->validate([
                'wilayah_dpd_id' => 'required'
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
            'wilayah_dpd_id' => null,
        ];

        try {
            $user->update($inputVal);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function deletedaerah($slug)
    {
        $wilayahDpd = WilayahDpd::where('slug', $slug)->firstOrFail();
        try {
            if ($wilayahDpd->anggota()->get()->count() > 0) {
                dd('tidak bisa');
            } else {
                $wilayahDpd->delete();
                return redirect()->back();
            };
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function kosongkandaerah($slug)
    {
        $wilayahDpd = WilayahDpd::where('slug', $slug)->firstOrFail();
        $users = $wilayahDpd->anggota()->get();

        try {
            foreach ($users as $user) {
                $user->kepengurusan_id = null;
                $user->wilayah_dpd_id = null;
                $user->save();
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
