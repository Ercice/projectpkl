<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzinSakit extends Model
{
    
    protected $table = 'tbizinsakits';
    protected $fillable = ['file','pegawaiskt_id', 'tglsurat', 'no_surat', 'kategori', 'jenis_sakit','tglmulai','tempat',];
    // protected $primaryKey = 'id';
    // protected $fillable = array('file_path', 'created_at', 'update_at');
    use SoftDeletes;

    
    // protected $guarded = [];
    protected $hidden = ['created_at', 'update_at'];

    public function pegawaiskt()
    {
        return $this->belongsTo('App\Pegawai');
    }
}

