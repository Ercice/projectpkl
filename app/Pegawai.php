<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;
    
    protected $table = 'tbpegawais';

    // protected $guarded = [];

    protected $fillable = ['nama_pegawai, nrp, nip, tempatlahir, tgllahir, alamat, hp, pangkat, golongan, jabatan, bagian, tmt, file'];

    protected $hidden = ['created_at', 'updated_at'];

    // public function pegawai()
    // {
    //     return $this->belongsTo('App\Pegawai');
    // }
}
