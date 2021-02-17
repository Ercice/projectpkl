<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
    }

    public function upload(Request $request)
    {
        // $pegawais = Pegawai::all();

        

    //     try {
    //         // $path = $request->file('image')->store('public');
    //     // $path = Storage::putFile('public', $request->file('image'));
    //     $file = $request->file('image');
    //     $name = time();
    //     $extension = $file->getClientOriginalExtension();
    //     $newName = $name . '.' . $extension;
    //     // $path = $request->file('image')->storeAs('public', $newName);
    //     $size = $file->getClientSize();
    //     $path = Storage::putFileAs('public', $request->file('image'), $newName);
        
    //     $data = [
    //         'path' => $path,
    //         'size' => $size
    //     ];
    //         return IzinSakit::create($data);
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
        
    }

    public function list()
    {
        // $files = Storage::allFiles('');
        // $directories = Storage::allDirectories('');
        // $directory = Storage::makeDirectory('image');
        // dd($directory);
    }

    public function lihat()
    {
        // $path = Storage::url('1612751704.png');
        // return '<img src="' . asset('/storage/1612751704.png'). '" alt="">';
    }

    public function copy()
    {
        // try {
        //     Storage::copy('public/1612751704.png', 'image/copy-image.jpg');
        //     return 'success';
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
    }

    public function move()
    {
    //     try {
    //         Storage::move('image/copy-image.jpg', 'public/move-image.jpg');
    //         return 'success';
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    }

    public function download()
    {
        // try {
        //     return Storage::disk('local')->download('public/1612751704.png');
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
    }

    public function hapus()
    {
        // try {
        //     Storage::disk('local')->delete('public/1612751704.png');
        //     return 'Deleted';
        // } catch (\Exception $e) {
        //     return $e->getMessage();
        // }
    }
}
