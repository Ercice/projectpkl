<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $keyword= $request->get('keyword');
        $datapegawai = Pegawai::where('nama_pegawai','LIKE', '%'.$keyword.'%')->paginate(10);
        
        return view('pegawai/index', compact('datapegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapegawai = Pegawai::all();
        return view('pegawai/create', compact('datapegawai'));
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
                'nama_pegawai' => 'required',
                'nip'=> 'required',
                'nrp'=> 'required',
                'tempatlahir'=> 'required',
                'tgllahir'=> 'required',
                'alamat'=> 'required',
                'hp'=> 'required',
                'pangkat'=> 'required',
                'golongan'=> 'required',
                'jabatan'=> 'required',
                'bagian'=> 'required',
                'tmt'=> 'required'
            ], [
                'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong',
                'nip.required' => 'NIP tidak boleh kosong',
                'nrp.required' => 'NRP tidak boleh kosong',
                'tempatlahir.required' => 'Tempat Lahir tidak boleh kosong',
                'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'hp.required' => 'No. HP tidak boleh kosong',
                'pangkat.required' => 'Pangkat tidak boleh kosong',
                'golongan.required' => 'Golongan tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'bagian.required' => 'Unit/Bagian tidak boleh kosong',
                'tmt.required' => 'TMT tidak boleh kosong'
            ]);

            if ($request->hasFile('file')){
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;
                $path = $request->file('file')->move('storage/', $filenameSimpan);
                }
        
                $data = new Pegawai;
                $data->nama_pegawai = $request->input('nama_pegawai');
                $data->nip = $request->input('nip');
                $data->nrp = $request->input('nrp');
                $data->tempatlahir = $request->input('tempatlahir');
                $data->tgllahir = $request->input('tgllahir');
                $data->alamat = $request->input('alamat');
                $data->hp = $request->input('hp');
                $data->pangkat = $request->input('pangkat');
                $data->golongan = $request->input('golongan');
                $data->jabatan = $request->input('jabatan');
                $data->bagian = $request->input('bagian');
                $data->tmt = $request->input('tmt');
                $data->file = $filenameSimpan;
                $data->save();

            // Pegawai::create($request->all());
            
        return redirect('datapegawai')->with('status', 'Data Pegawai Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $datapegawai)
    {
        //return $datapegawai;

        return view('pegawai/show', compact('datapegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $datapegawai)
    {
        //$datapegawai = Pegawai::all();
        return view('pegawai/edit', compact('datapegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $datapegawai)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'nip'=> 'required',
            'nrp'=> 'required',
            'ttl'=> 'required',
            'alamat'=> 'required',
            'hp'=> 'required',
            'pangkat'=> 'required',
            'golongan'=> 'required',
            'jabatan'=> 'required',
            'bagian'=> 'required',
            'tmt'=> 'required',
        ], [
            'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong',
            'nip.required' => 'NIP tidak boleh kosong',
            'nrp.required' => 'NRP tidak boleh kosong',
            'ttl.required' => 'TTL tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'hp.required' => 'No. HP tidak boleh kosong',
            'pangkat.required' => 'Pangkat tidak boleh kosong',
            'golongan.required' => 'Golongan tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'bagian.required' => 'Unit/Bagian tidak boleh kosong',
            'tmt.required' => 'TMT tidak boleh kosong',
        ]);

        Pegawai::where('id', $datapegawai->id)
        ->update([
        'nama_pegawai' => $request->nama_pegawai,
        'nip' => $request->nip,
        'nrp' => $request->nrp,
        'ttl' => $request->ttl,
        'alamat' => $request->alamat,
        'hp' => $request->hp,
        'pangkat' => $request->pangkat,
        'golongan' => $request->golongan,
        'jabatan' => $request->jabatan,
        'bagian' => $request->bagian,
        'tmt' => $request->tmt,
        ]);

        return redirect('datapegawai')->with('status', 'Data Pegawai Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $datapegawai)
    {
        $datapegawai->delete();

        return redirect('datapegawai')->with('status', 'Data Pegawai Berhasil dihapus!');
    }

    public function trash()
    {
        $datapegawai = Pegawai::onlyTrashed()->get();
        return view('pegawai/trash', compact('datapegawai'));
    }

    public function restore($id = null)
    {
        if($id != null){
            $datapegawai = Pegawai::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $datapegawai = Pegawai::onlyTrashed()->restore();
        }

        return redirect('datapegawai/trash')->with('status', 'Data Pegawai Berhasil di-restore!');

    }

    public function delete($id = null)
    {
        if($id != null){
            $datapegawai = Pegawai::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else {
            $datapegawai = Pegawai::onlyTrashed()->forceDelete();
        }

        return redirect('datapegawai/trash')->with('status', 'Data Pegawai Berhasil dihapus Permanen!');

    }

    public function cetak()
    {
        $datapegawai = Pegawai::all();

        if(is_null($datapegawai)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Pegawai.pdf";
            $pdf = PDF::loadview('pegawai/cetak', compact('datapegawai'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    // public function cetakFilter($pangkat){
    //     $datapegawai = Pegawai::whereBetween('pangkat',[$pangkat])->latest()->get();

    //     if(is_null($datapegawai)){
    //         Session::flash("flash_message", [
    //             "warna" => "alert-danger",
    //             "message"   => "Data Kosong Tidak Bisa Dicetak"
    //         ]);
    //         return redirect()->back();
    //     }else{
    //         $judul = "Laporan Data Pegawai Filter.pdf";
    //         $pdf = PDF::loadview('datapegawai/cetakfilter', compact('datapegawai'));
    //         $pdf->setPaper('F4', 'landscape');
    //         return $pdf->stream($judul, array("Attachment" => false));
    //     }
    // }
}
