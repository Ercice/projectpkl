<?php

namespace App\Http\Controllers;

use App\IzinPenting;
use App\Pegawai;
use Illuminate\Http\Request;
use PDF;

class IzinPentingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword= $request->get('keyword');
        $izinpenting = IzinPenting::where('selama','LIKE', '%'.$keyword.'%')->paginate(10);

        return view('izinpenting/index', compact('izinpenting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::all();
        return view('izinpenting/create', compact('pegawais'));
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
            'pegawaiptg_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'tglmulai'=> 'required',
            'tglakhir'=> 'required',
            'selama'=> 'required',
            'jenis_cuti'=> 'required'
        ], [
            'pegawaiptg_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tglakhir.required' => 'Tanggal Akhir tidak boleh kosong',
            'selama.required' => 'Selama tidak boleh kosong',
            'jenis_cuti.required' => 'Jenis Cuti tidak boleh kosong'
        ]);

        // cara 3 : Quick Mass Assigment -> syarat foeld tabel dan nama inputan harus sama
        IzinPenting::create($request->all());
        return redirect('izinpenting')->with('status', 'Data Izin Cuti Penting Berhasil ditambah!');
        //return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IzinPenting  $izinPenting
     * @return \Illuminate\Http\Response
     */
    public function show(IzinPenting $izinpenting)
    {
        $izinpenting->makeHidden(['pegawai_id']);
        return view('izinpenting/show', compact('izinpenting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IzinPenting  $izinPenting
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinPenting $izinpenting)
    {
        $pegawais = Pegawai::all();
        return view('izinpenting/edit', compact('izinpenting', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IzinPenting  $izinPenting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IzinPenting $izinpenting)
    {
        $request->validate([
            'pegawaiptg_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            'tglmulai'=> 'required',
            'tglakhir'=> 'required',
            'selama'=> 'required',
            'jenis_cuti'=> 'required'
        ], [
            'pegawaiptg_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tglakhir.required' => 'Tanggal Akhir tidak boleh kosong',
            'selama.required' => 'Selama tidak boleh kosong',
            'jenis_cuti.required' => 'Jenis Cuti tidak boleh kosong'
        ]);
        
        IzinPenting::where('id', $izinpenting->id)
        ->update([
        'pegawaiptg_id' => $request->pegawaiptg_id,
        'tglsurat' => $request->tglsurat,
        'no_surat' => $request->no_surat,
        'tglmulai' => $request->tglmulai,
        'tglakhir' => $request->tglakhir,
        'selama' => $request->selama,
        'jenis_cuti' => $request->jenis_cuti,
        ]);

        return redirect('izinpenting')->with('status', 'Data Izin Cuti Penting berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IzinPenting  $izinPenting
     * @return \Illuminate\Http\Response
     */
    public function destroy(IzinPenting $izinpenting)
    {
        $izinpenting->delete();

        return redirect('izinpenting')->with('status', 'Data Izin Cuti Penting Berhasil dihapus!');
    }

    public function trash()
    {
        //$izinbelajar = IzinBelajar::all();
        $izinpenting = IzinPenting::onlyTrashed()->get();

        return view('izinpenting/trash', compact('izinpenting'));
    }

    public function restore($id = null)
    {
        if($id != null) {
            $izinpenting = IzinPenting::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $izinpenting = IzinPenting::onlyTrashed()->restore();
        }

        return redirect('izinpenting/trash')->with('status', 'Data Izin Penting Berhasil direstore!');
    }

    public function delete($id = null)
    {
        if($id != null) {
            $izinpenting = IzinPenting::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $izinpenting = IzinPenting::onlyTrashed()->forceDelete();
        }

        return redirect('izinpenting/trash')->with('status', 'Data Izin Penting Berhasil dihapus Permanen!');
    }

    public function cetak()
    {
        $izinpenting = IzinPenting::all();

        if(is_null($izinpenting)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Penting.pdf";
            $pdf = PDF::loadview('izinpenting/cetak', compact('izinpenting'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetaksurat()
    {
        $izinpenting = IzinPenting::first();
        if(is_null($izinpenting)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Surat Izin Penting.pdf";
            $pdf = PDF::loadview('izinpenting/cetaksurat', compact('izinpenting'));
            $pdf->setPaper('F4', 'potrait');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetakPeriode($tglawal, $tglakhir){
        $izinpenting = IzinPenting::with('pegawaiptg')->whereBetween('tglsurat',[$tglawal, $tglakhir])->latest()->get();

        if(is_null($izinpenting)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Belajar.pdf";
            $pdf = PDF::loadview('izinpenting/cetakperiode', compact('izinpenting'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
}
