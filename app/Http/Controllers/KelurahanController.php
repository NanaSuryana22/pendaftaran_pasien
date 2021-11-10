<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Session;

class KelurahanController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Kelurahan::orderBy('created_at', 'desc')->paginate(10);
        return view('kelurahan.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelurahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Kelurahan();
        $data->nama_kelurahan = $request->nama_kelurahan;
        $data->nama_kecamatan = $request->nama_kecamatan;
        $data->nama_kota = $request->nama_kota;
        $data->save();

        Session::flash("notice", "Data kelurahan $data->nama_kelurahan Berhasil Dibuat.");
        return redirect()->route("kelurahan.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        return view('kelurahan.edit', compact('kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kelurahan::find($id);
        $data->nama_kelurahan = $request->nama_kelurahan;
        $data->nama_kecamatan = $request->nama_kecamatan;
        $data->nama_kota = $request->nama_kota;
        $data->save();

        Session::flash("notice", "Data kelurahan $data->nama_kelurahan Berhasil Diubah.");
        return redirect()->route("kelurahan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = Kelurahan::find($id);
        $count_kel = $kelurahan->pasien()->count();
        if ($count_kel >= 1) {
            Session::flash("error", "Data Kelurahan terpilih memiliki data pasien, data gagal dihapus !");
            return redirect()->route("kelurahan.index");
        } else {
            $kelurahan->pasien()->delete();
            $kelurahan->delete();
            Session::flash("notice", "Data kelurahan terpilih berhasil dihapus");
            return redirect()->route("kelurahan.index");
        }
    }
}
