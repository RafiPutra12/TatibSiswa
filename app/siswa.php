<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = "siswa";

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'poin',
    ];

    public function poins(){
        return $this->hasMany('App\poinSiswa', 'id_siswa', 'id');
    }
}
