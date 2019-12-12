<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\poinSiswa;
use App\Pelanggaran;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data["Jumlah Petugas"] = User::count();
        $data["Jumlah Siswa"] = Siswa::count();
        $data["Jumlah Data Pelanggaran"] = Pelanggaran::count();
        $data["Jumlah Pelanggaran Hari Ini"] = poinSiswa::count();

        return response($data);
    }
}
