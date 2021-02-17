<?php

namespace App\Http\Controllers;

use App\IzinSakit;
use App\Pegawai;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;


class IzinSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $izinsakit = IzinSakit::with('pegawai')->paginate(10);
        // $izinsakit = IzinSakit::paginate(10);
        
        
        
        $keyword = $request->get('keyword');
        $izinsakit = IzinSakit::where('jenis_sakit','LIKE', '%'.$keyword.'%')->paginate(10);

        

        return view('izinsakit/index', compact('izinsakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pegawais = Pegawai::all();
        return view('izinsakit/create', compact('pegawais'));
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
            'pegawaiskt_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            
            'jenis_sakit' => 'required',
            'tglmulai'=> 'required',
            'tempat'=> 'required'
            // 'gambar' => 'nimes:jpg, png, jpeg'
        ], [
            'pegawaiskt_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
          
            'jenis_sakit.required' => 'Jenis Sakit tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tempat.required' => 'Tempat tidak boleh kosong'
        ]);

        if ($request->hasFile('file')){
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
        $path = $request->file('file')->move('storage/', $filenameSimpan);
        }

        $data = new IzinSakit;
        $data->pegawaiskt_id = $request->input('pegawaiskt_id');
        $data->tglsurat = $request->input('tglsurat');
        $data->no_surat = $request->input('no_surat');
        $data->kategori = $request->input('kategori');
        $data->jenis_sakit = $request->input('jenis_sakit');
        $data->tglmulai = $request->input('tglmulai');
        $data->tempat = $request->input('tempat');
        $data->file = $filenameSimpan;
        $data->save();

        
        // if($request->file('file')){
        //     $file = $request->file('file');
        //     $filename = time().'.'.$file->getClientOriginalExtension();
        //     $request->file->storeAs('storage/', $filename);

        //     $request->file = $filename;
        // }

        // $request->save();
        // IzinSakit::create($request->all());
        
        return redirect('izinsakit')->with('status', 'Data Izin Cuti Sakit Berhasil ditambah!');

        // cara 3 : Quick Mass Assigment -> syarat foeld tabel dan nama inputan harus sama 
        // if ($request->file('gambar')) {
        //     $gambar = $request->file('gambar')->store('gambar', 'public');
        // } 
        // IzinSakit::create($request->all());

        // return redirect('izinsakit')->with('status', 'Data Izin Cuti Sakit Berhasil ditambah!');
        // return $request;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IzinSakit  $izinSakit
     * @return \Illuminate\Http\Response
     */
    public function show(IzinSakit $izinsakit)
    {
        $izinsakit->makeHidden(['pegawai_id']);
        return view('izinsakit/show', compact('izinsakit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IzinSakit  $izinSakit
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinSakit $izinsakit)
    {
        $pegawais = Pegawai::all();
        
        return view('izinsakit/edit', compact('izinsakit', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IzinSakit  $izinSakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IzinSakit $izinsakit)
    {
        $request->validate([
            'pegawaiskt_id' => 'required',
            'tglsurat' => 'required',
            'no_surat' => 'required',
            
            'jenis_sakit' => 'required',
            'tglmulai'=> 'required',
            'tempat'=> 'required'
        ], [
            'pegawaiskt_id.required' => 'Pilihan tidak boleh kosong',
            'tglsurat.required' => 'Tanggal Surat tidak boleh kosong',
            'no_surat.required' => 'Nomor Surat tidak boleh kosong',
            
            'jenis_sakit.required' => 'Jenis Sakit tidak boleh kosong',
            'tglmulai.required' => 'Tanggal Mulai tidak boleh kosong',
            'tempat.required' => 'Tempat tidak boleh kosong'
        ]);

        // $path = $request->file('file')->store('projectpkl/storage');

        IzinSakit::where('id', $izinsakit->id)
        ->update([
        'pegawaiskt_id' => $request->pegawaiskt_id,
        'tglsurat' => $request->tglsurat,
        'no_surat' => $request->no_surat,
       
        'jenis_sakit' => $request->jenis_sakit,
        'tglmulai' => $request->tglmulai,
        'tempat' => $request->tempat,
        ]);

        // $izinsakit = $request->file('surat_dokter')->store('files');
        //     dd ($izinsakit);
        

        return redirect('izinsakit')->with('status', 'Data Izin Cuti Sakit berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IzinSakit  $izinSakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(IzinSakit $izinsakit)
    {
        $izinsakit->delete();

        return redirect('izinsakit')->with('status', 'Data Izin Cuti Sakit Berhasil dihapus!');

    }

    public function trash()
    {
    
        $izinsakit = IzinSakit::onlyTrashed()->get();

        return view('izinsakit/trash', compact('izinsakit'));
    }

    public function restore($id = null)
    {
        if($id != null) {
            $izinsakit = IzinSakit::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $izinsakit = IzinSakit::onlyTrashed()->restore();
        }

        return redirect('izinsakit/trash')->with('status', 'Data Izin Cuti Sakit Berhasil direstore!');
    }

    public function delete($id = null)
    {
        if($id != null) {
            $izinsakit = IzinSakit::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $izinsakit = IzinSakit::onlyTrashed()->forceDelete();
        }

        return redirect('izinsakit/trash')->with('status', 'Data Izin Cuti Sakit Berhasil dihapus Permanen!');
    }

    // public function upload()
    // {
    //     return view('')
    // }

    public function cetak()
    {
        $izinsakit = IzinSakit::all();

        if(is_null($izinsakit)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Cuti Sakit.pdf";
            $pdf = PDF::loadview('izinsakit/cetak', compact('izinsakit'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetaksurat()
    {
        $izinsakit = IzinSakit::first();
        if(is_null($izinsakit)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Surat Izin Cuti Sakit.pdf";
            $pdf = PDF::loadview('izinsakit/cetaksurat', compact('izinsakit'));
            $pdf->setPaper('F4', 'potrait');
            
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    public function cetakPeriode($tglawal, $tglakhir){
        $izinsakit = IzinSakit::with('pegawai')->whereBetween('tglsurat',[$tglawal, $tglakhir])->latest()->get();

        if(is_null($izinsakit)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Izin Sakit Periode.pdf";
            $pdf = PDF::loadview('izinsakit/cetakperiode', compact('izinsakit'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }

    // public function view($id){
    //     $data = IzinSakit::find($id);
    //     return view('izinsakit/view', compact('data'));
    // }

    

    // public function fileUpload()
    // {
    //     return view('fileUpload');
    // }

    // public function fileUploadPost(Request $request)
    // {
    //     $request->validate([
    //         'fileupload' => 'required|mimes:pdf,xlx,csv|max:5000',
    //     ]);
  
    //     $fileName = time().'.'.$request->fileupload->extension();  
   
    //     $request->file->move(public_path('uploads'), $fileName);
   
    //     return back()
    //         ->with('success','You have successfully upload file.')
    //         ->with('fileupload',$fileName);
   
    // }

    //-------------

    // public function createForm(){
    //     return view('file-upload');
    // }

    // public function fileUpload(Request $request){
    //     $request->validate([
    //         'file' => 'required|mimes:pdf,jpg,png|max:2048'
    //     ]);

    //     $fileModel = new IzinSakit;

    //     if($request->file()){
    //         $fileName = time().'_'.$request->file->getClientOriginalName();
    //         $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

    //         $fileModel->name = time().'_'.$request->file->getClientOriginalName();
    //         $fileModel->file_path = '/storage/' . $filePath;
    //         $fileModel->save();

    //         return back()
    //         ->with('success', 'File has been uploaded.')
    //         ->with('file', $fileName);
    //     }
    // }

    // public function createForm(Request $request)
    // {
    //     $request->validate([
    //         'filename' => 'required',
    //         'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
    //     ]);

    //     if ($request->hasfile('filename')) {            
    //         $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
    //         $request->file('filename')->move(public_path('uploads'), $filename);
    //          IzinSakit::create(
    //                 [                        
    //                     'file_path' =>$filename
    //                 ]
    //             );
    //         echo'Success';
    //     }else{
    //         echo'Gagal';
    //     }

}
