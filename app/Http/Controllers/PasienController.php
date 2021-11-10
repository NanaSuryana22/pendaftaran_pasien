<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Carbon;
use Session;
use PDF;

class PasienController extends Controller
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
        $datas = Pasien::orderBy('created_at', 'desc')->paginate(10);
        return view('pasien.index')->with('datas', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table_no = Pasien::count()+1;
        $tgl = Carbon\Carbon::parse(Carbon\carbon::now())->format('ym');
        $auto_number= $tgl.'000'.$table_no;
        $kelurahan = Kelurahan::orderBy('nama_kelurahan', 'asc')->get();
        return view('pasien.create')->with('kelurahan', $kelurahan)->with('auto_number', $auto_number);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pasien();
        $data->id = $request->id_pasien;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->rt = $request->rt;
        $data->rw = $request->rw;
        $data->kelurahan_id = $request->kelurahan_id;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        Session::flash("notice", "Data pasien $data->nama Berhasil Dibuat.");
        return redirect()->route("pasien.show", $request->id_pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $kelurahan = Kelurahan::orderBy('nama_kelurahan', 'asc')->get();
        return view('pasien.edit', compact('pasien'))->with('kelurahan', $kelurahan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pasien::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->rt = $request->rt;
        $data->rw = $request->rw;
        $data->kelurahan_id = $request->kelurahan_id;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();

        Session::flash("notice", "Data pasien $data->nama Berhasil Dibuat.");
        return redirect()->route("pasien.show", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        Session::flash("notice", "Data pasien terpilih berhasil dihapus.");
        return redirect()->route("pasien.index");
    }

    public function printPDF($id)
    {
        $pasien = Pasien::find($id);
        $data = [
            'id' => $pasien->id,
            'nama' => $pasien->nama,
            'alamat' => $pasien->alamat,
            'rt' => $pasien->rt,
            'rw' => $pasien->rw,
            'kelurahan_id' => $pasien->kelurahan_id,
            'tanggal_lahir' => $pasien->tanggal_lahir,
            'jenis_kelamin' => $pasien->jenis_kelamin,
            'nama_kelurahan' => $pasien->nama_kelurahan,
            'nama_kecamatan' => $pasien->nama_kecamatan,
            'nama_kota' => $pasien->nama_kota,
        ];
        $pdf = PDF::loadView('myPDF', $data);
        $pdf->setPaper('A5', 'landscape');

        return $pdf->download('Data Pasien '.$pasien->nama.'.pdf');
    }
}
