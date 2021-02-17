<?php

namespace App\Http\Controllers;

use App\IzinBelajar;
use App\Pegawai;
use Illuminate\Http\Request;
use PDF;

class IzinBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $izinbelajar = IzinBelajar::paginate(10);
        //return $izinbelajar;
        $keyword= $request->get('keyword');
        $izinbelajar = IzinBelajar::where('nama_kampus','LIKE', '%'.$keyword.'%')->paginate(10);
        
        return view('izinbelajar/index', compact('izinbelajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('izinbelajar/create', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawaibk_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'nama_kampus'=> 'required',
            'kota'=> 'required',
            'cabang'=> 'required',
            'fakultas'=> 'required',
            'program_studi'=> 'required'
        ], [
            'pegawaibk_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'nama_kampus.required' => 'Nama Kampus tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
            'cabang.required' => 'Cabang tidak boleh kosong',
            'fakultas.required' => 'Fakultas tidak boleh kosong',
            'program_studi.required' => 'Program Studi tidak boleh kosong'
        ]);

        IzinBelajar::create($request->all());
        return redirect('izinbelajar')->with('status', 'Data Izin Belajar/Kuliah Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IzinBelajar  $izinBelajar
     * @return \Illuminate\Http\Response
     */
    public function show(IzinBelajar $izinbelajar)
    {
        //return $izinbelajar;
        $izinbelajar->makeHidden(['pegawai_id']);
        return view('izinbelajar/show', compact('izinbelajar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IzinBelajar  $izinBelajar
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinBelajar $izinbelajar)
    {
        $pegawais = Pegawai::all();
        return view('izinbelajar/edit', compact('izinbelajar', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IzinBelajar  $izinBelajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IzinBelajar $izinbelajar)
    {
        $request->validate([
            'pegawaibk_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'nama_kampus'=> 'required',
            'kota'=> 'required',
            'cabang'=> 'required',
            'fakultas'=> 'required',
            'program_studi'=> 'required'
        ], [
            'pegawaibk_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'nama_kampus.required' => 'Nama Kampus tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
            'cabang.required' => 'Cabang tidak boleh kosong',
            'fakultas.required' => 'Fakultas tidak boleh kosong',
            'program_studi.required' => 'Program Studi tidak boleh kosong'
        ]);

        IzinBelajar::where('id', $izinbelajar->id)
        ->update([
        'pegawaibk_id' => $request->pegawaibk_id,
        'tglsurat' => $request->tglsurat,
        'no_surat' => $request->no_surat,
        'nama_kampus' => $request->nama_kampus,
        'kota' => $request->kota,
        'cabang' => $request->cabang,
        'fakultas' => $request->fakultas,
        'program_studi' => $request->program_studi,
        ]);

        return redirect('izinbelajar')->with('status', 'Data Izin Belajar/Kuliah Berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IzinBelajar  $izinBelajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(IzinBelajar $izinbelajar)
    {
        $izinbelajar->delete();

        return redirect('izinbelajar')->with('status', 'Data Izin Belajar/Kuliah Berhasil dihapus!');

    }

    public function trash()
    {
        //$izinbelajar = IzinBelajar::all();
        $izinbelajar = IzinBelajar::onlyTrashed()->get();

        return view('izinbelajar/trash', compact('izinbelajar'));
    }

    public function restore($id = null)
    {
        if($id != null) {
            $izinbelajar = IzinBelajar::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $izinbelajar = IzinBelajar::onlyTrashed()->restore();
        }

        return redirect('izinbelajar/trash')->with('status', 'Data Izin Belajar/Kuliah Berhasil direstore!');
    }

    public function delete($id = null)
    {
        if($id != null) {
            $izinbelajar = IzinBelajar::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $izinbelajar = IzinBelajar::onlyTrashed()->forceDelete();
        }

        return redirect('izinbelajar/trash')->with('status', 'Data Izin Belajar/Kuliah Berhasil dihapus Permanen!');
    }

    public function cetak()
    {
        $izinbelajar = IzinBelajar::all();

        if(is_null($izinbelajar)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Belajar.pdf";
            $pdf = PDF::loadview('izinbelajar/cetak', compact('izinbelajar'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }

        
    }

    public function cetaksurat()
    {
        $izinbelajar = IzinBelajar::first();
        if(is_null($izinbelajar)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Surat Izin Belajar.pdf";
            $pdf = PDF::loadview('izinbelajar/cetaksurat', compact('izinbelajar'));
            $pdf->setPaper('F4', 'potrait');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetakPeriode($tglawal, $tglakhir){
        $izinbelajar = IzinBelajar::with('pegawaibk')->whereBetween('tglsurat',[$tglawal, $tglakhir])->latest()->get();

        if(is_null($izinbelajar)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Belajar.pdf";
            $pdf = PDF::loadview('izinbelajar/cetakperiode', compact('izinbelajar'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }

        //dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);

        // $izinbelajar = IzinBelajar::with('pegawaibk')->whereBetween('tglsurat',[$tglawal, $tglakhir])->latest()->get();
        // return view('izinbelajar/cetakperiode', compact('izinbelajar'));
    }
}
