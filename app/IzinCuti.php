<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzinCuti extends Model
{
    protected $table = 'tbizincutis';

    use SoftDeletes;
    
    protected $guarded = [];
    protected $hidden = ['created_at', 'update_at'];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }
}


