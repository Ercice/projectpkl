<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IzinSakit;
// use App\Http\Middleware\CekLevel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home2');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/new-login', function(){
    return view('newLogin');
});

Route::get('/new-register', function(){
    return view('newRegister');
});

Route::get('/new-forget', function(){
    return view('newForget');
});

Auth::routes();
// Route::get('home', 'HomeController@index')->name('home');

// Route::get('home', function () {
//     return view('home');
// });

// Route::get('datapegawai', 'PegawaiController@data');
// Route::get('datapegawai/add', 'PegawaiController@add');
// Route::post('datapegawai', 'PegawaiController@addProcess');
// Route::get('datapegawai/edit/{id}', 'PegawaiController@edit');
// Route::patch('datapegawai/{id}', 'PegawaiController@editProcess');
// Route::delete('datapegawai/{id}', 'PegawaiController@delete');

//PEGAWAI
// Route::get('/', 'PegawaiController@index');

Route::group(['middleware' => ['auth','ceklevel:admin,operator']], function(){
    //IZIN CUTI
    Route::get('izincuti/trash', 'IzinCutiController@trash');
    Route::get('izincuti/restore/{id?}', 'IzinCutiController@restore');
    Route::get('izincuti/delete/{id?}', 'IzinCutiController@delete');
    Route::get('/izincuti/cetak', 'IzinCutiController@cetak')->name('izincuti/cetak');
    Route::get('/izincuti/cetaksurat', 'IzinCutiController@cetaksurat')->name('izincuti/cetaksurat');

    Route::get('/cetak-periode/{tglawal}/{tglakhir}','IzinCutiController@cetakPeriode')->name('cetak-periode');
    Route::resource('izincuti', 'IzinCutiController');

    //IZIN BELAJAR/KULIAH
    Route::get('izinbelajar/trash', 'IzinBelajarController@trash');
    Route::get('izinbelajar/restore/{id?}', 'IzinBelajarController@restore');
    Route::get('izinbelajar/delete/{id?}', 'IzinBelajarController@delete');
    Route::get('/izinbelajar/cetak', 'IzinBelajarController@cetak')->name('izinbelajar/cetak');
    Route::get('/izinbelajar/cetaksurat', 'IzinBelajarController@cetaksurat')->name('izinbelajar/cetaksurat');

    Route::get('/cetak-periode/{tglawal}/{tglakhir}','IzinBelajarController@cetakPeriode')->name('cetak-periode');
    Route::resource('izinbelajar', 'IzinBelajarController');

    //IZIN SAKIT
  

    Route::get('izinsakit/trash', 'IzinSakitController@trash');
    Route::get('izinsakit/restore/{id?}', 'IzinSakitController@restore');
    Route::get('izinsakit/delete/{id?}', 'IzinSakitController@delete');
    Route::get('/izinsakit/cetak', 'IzinSakitController@cetak')->name('izinsakit/cetak');
    Route::get('/izinsakit/cetaksurat', 'IzinSakitController@cetaksurat')->name('izinsakit/cetaksurat');
    // Route::get('/upload-file', 'IzinSakitController@createForm');
    // Route::post('/upload-file', 'IzinSakitController@fileUpload')->name('fileUpload');
    // Route::post('upload', 'IzinSakitController@upload');
    Route::get('/cetak-periode/{tglawal}/{tglakhir}','IzinSakitController@cetakPeriode')->name('cetak-periode');
    //Route::get('file/download/{file}', 'IzinSakitController@download');
   
    
    Route::resource('izinsakit', 'IzinSakitController');

    //IZIN PENTING
    Route::get('izinpenting/trash', 'IzinPentingController@trash');
    Route::get('izinpenting/restore/{id?}', 'IzinPentingController@restore');
    Route::get('izinpenting/delete/{id?}', 'IzinPentingController@delete');
    Route::get('/izinpenting/cetak', 'IzinPentingController@cetak')->name('izinpenting/cetak');
    Route::get('/izinpenting/cetaksurat', 'IzinPentingController@cetaksurat')->name('izinpenting/cetaksurat');

    Route::get('/cetak-periode/{tglawal}/{tglakhir}','IzinPentingController@cetakPeriode')->name('cetak-periode');
    Route::resource('izinpenting', 'IzinPentingController');
});

    Route::group(['middleware' => ['auth','ceklevel:admin, user']], function(){
    Route::get('datapegawai/trash', 'PegawaiController@trash');
    Route::get('datapegawai/restore/{id?}', 'PegawaiController@restore');
    Route::get('datapegawai/delete/{id?}', 'PegawaiController@delete');
    Route::get('/datapegawai/cetak', 'PegawaiController@cetak')->name('datapegawai/cetak');
    // Route::get('/cetak-filter/{pangkat}','PegawaiController@cetakFilter')->name('cetak-filter');
    Route::resource('datapegawai', 'PegawaiController');
});

// Route::get('/', function (){
//     return view('welcome');
// });

// Route::post('upload', 'HomeController@upload');

// Route::post('upload', 'HomeController@upload');
// Route::get('list', 'HomeController@list');
// Route::get('lihat/{file}', 'HomeController@lihat');
// Route::get('copy', 'HomeController@copy');
// Route::get('move', 'HomeController@move');
// Route::get('download', 'HomeController@download');
// Route::get('hapus', 'HomeController@hapus');



//UPLOADS
// Route::get('/files/create', 'DocumentController@create');
// Route::post('/files', 'DocumentController@store');
// Route::get('/files', 'DocumentController@index');

// Route::get('/files/{id}', 'DocumentController@show');

// Route::get('/file/download/{id}', 'DocumentController@download');

