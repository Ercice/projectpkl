<?php

namespace App\Http\Controllers;

use App\IzinCuti;
use App\Pegawai;
use Illuminate\Http\Request;
use PDF;

class IzinCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$izincuti = IzinCuti::all();
        // $izincuti = IzinCuti::with('pegawai')->paginate(10);
        //return $izincuti;
        $keyword= $request->get('keyword');
        $izincuti = IzinCuti::where('selama','LIKE', '%'.$keyword.'%')->paginate(10);

        return view('izincuti/index', compact('izincuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('izincuti/create', compact('pegawais'));
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
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'pegawai_id' => 'required',
            'tglmulai'=> 'required',
            'tglakhir'=> 'required',
            'selama'=> 'required'
        ], [
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'pegawai_id.required' => 'Pilihan tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tglakhir.required' => 'Tanggal Akhir tidak boleh kosong',
            'selama.required' => 'Selama tidak boleh kosong'
        ]);

        //cara 1
        //return $request;
        // $izincuti = new IzinCuti;
        // $izincuti->pegawai_id = $request->pegawai_id;
        // $izincuti->selama = $request->selama;
        // $izincuti->tglmulai = $request->tglmulai;
        // $izincuti->tglakhir = $request->tglakhir;
        // $izincuti->save();

        //cara 3 : Quick Mass Assigment -> syarat foeld tabel dan nama inputan harus sama
        IzinCuti::create($request->all());
        return redirect('izincuti')->with('status', 'Data Cuti Berhasil ditambah!');
        //return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IzinCuti  $izinCuti
     * @return \Illuminate\Http\Response
     */
    public function show(IzinCuti $izincuti)
    {
        //return $izincuti;
        $izincuti->makeHidden(['pegawai_id']); 
        return view('izincuti/show', compact('izincuti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IzinCuti  $izinCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinCuti $izincuti)
    {
        $pegawais = Pegawai::all();
        return view('izincuti/edit', compact('izincuti', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IzinCuti  $izinCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IzinCuti $izincuti)
    {
        $request->validate([
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'pegawai_id' => 'required',
            'tglmulai'=> 'required',
            'tglakhir'=> 'required',
            'selama'=> 'required'
        ], [
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'pegawai_id.required' => 'Pilihan tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tglakhir.required' => 'Tanggal Akhir tidak boleh kosong',
            'selama.required' => 'Selama tidak boleh kosong'
        ]);

        IzinCuti::where('id', $izincuti->id)
        ->update([
        'tglsurat' => $request->tglsurat,
        'no_surat' => $request->no_surat,
        'pegawai_id' => $request->pegawai_id,
        'tglmulai' => $request->tglmulai,
        'tglakhir' => $request->tglakhir,
        'selama' => $request->selama,
        ]);

        return redirect('izincuti')->with('status', 'Data Cuti Berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IzinCuti  $izinCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(IzinCuti $izincuti)
    {
        $izincuti->delete();

        return redirect('izincuti')->with('status', 'Data Cuti Berhasil dihapus!');
    }

    public function trash()
    {
        $izincuti = IzinCuti::onlyTrashed()->get();
        return view('izincuti/trash', compact('izincuti'));
    }

    public function restore($id = null)
    {
        if($id != null){
            $izincuti = IzinCuti::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $izincuti = IzinCuti::onlyTrashed()->restore();
        }

        return redirect('izincuti/trash')->with('status', 'Data Cuti Berhasil di-restore!');

    }

    public function delete($id = null)
    {
        if($id != null){
            $izincuti = IzinCuti::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else {
            $izincuti = IzinCuti::onlyTrashed()->forceDelete();
        }

        return redirect('izincuti/trash')->with('status', 'Data Cuti Berhasil dihapus Permanen!');

    }

    public function cetak()
    {
        $izincuti = IzinCuti::all();

        if(is_null($izincuti)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Cuti.pdf";
            $pdf = PDF::loadview('izincuti/cetak', compact('izincuti'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetaksurat()
    {
        $izincuti = IzinCuti::first();
        if(is_null($izincuti)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Surat Izin Cuti.pdf";
            $pdf = PDF::loadview('izincuti/cetaksurat', compact('izincuti'));
            $pdf->setPaper('F4', 'potrait');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetakPeriode($tglawal, $tglakhir){
        $izincuti = IzinCuti::with('pegawai')->whereBetween('tglsurat',[$tglawal, $tglakhir])->latest()->get();

        if(is_null($izincuti)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Cuti Periode.pdf";
            $pdf = PDF::loadview('izincuti/cetakperiode', compact('izincuti'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
    
}

