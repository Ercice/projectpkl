<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzinBelajar extends Model
{
    protected $table = 'tbizinbelajars';
 

    use SoftDeletes;

    protected $guarded = [];
    protected $hidden = ['created_at', 'update_at'];

    public function pegawaibk()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
