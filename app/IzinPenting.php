<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzinPenting extends Model
{
    protected $table = 'tbizinpentings';

    use SoftDeletes;

    protected $guarded = [];
    protected $hidden = ['created_at', 'update_at'];
    
    public function pegawaiptg()
    {
        return $this->belongsTo('App\Pegawai');
    }
}
