<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
    protected $table = "pelanggaran";

    protected $fillable = [
        'nama_pelanggaran',
        'kategori',
        'poin',
    ];

    public function poinSiswas(){
        return $this->hasMany('App\poinSiswa', 'id_pelanggaran', 'id');
    }
}
