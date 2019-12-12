<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
   public function index($limit = 10, $offset = 0)
   {
       $data["count"] = Siswa::count();
       $siswa = array();

        foreach(Siswa::take($limit)->skip($offset)->get() as $p) {
            $item = [
                "id"               => $p->id,
                "nis"              => $p->nis,
                "nama_siswa"       => $p->nama_siswa,
                "kelas"            => $p->kelas,
                'created_at'       => $p->created_at,
				'updated_at'       => $p->updated_at,
            ];
            array_push($siswa, $item);
        }
        $data["siswa"] = $siswa;
        $data["status"] = 1;
        return response($data);
   }

   public function store(Request $request)
   {
       $siswa = new Siswa([
           'nis'         => $request->nis,
           'nama_siswa'  => $request->nama_siswa,
           'kelas'       => $request->kelas,
       ]);

       $siswa->save();
       return response()->json([
        'status'  => '1',
        'message' => 'Data Siswa Berhasil Ditambahkan' 
       ]);
   }

   public function show($id)
   {
       $siswa = Siswa::where('id', $id)->get();

       $dataSiswa = array();
       foreach($siswa as $p) {
            $item = [
                'id'          => $p->id,
                'nis'         => $p->nis,
                'nama_siswa'  => $p->nama_siswa,
                'kelas'       => $p->kelas,
            ];
            array_push($dataSiswa, $item);
       }

       $data["Data Siswa"] = $dataSiswa;
       $data["status"] = 1;
       return response($data);
   }

   public function update($id, Request $request)
   {
       $siswa = Siswa::where('id', $id)->first();
       
       $siswa->nis             = $request->nis;
       $siswa->nama_siswa      = $request->nama_siswa;
       $siswa->kelas           = $request->kelas;
       $siswa->updated_at      = now()->timestamp;

       $siswa->save();

       return response()->json([
        'status'  => '1',
        'message' => 'Data Siswa Berhasil Diubah' 
       ]);
   }

   public function destroy($id) 
   {
        $siswa = Siswa::where('id', $id)->first();

        $siswa->delete();

        return response()->json([
            'status'  => '1',
            'message' => 'Data Siswa Berhasil Dihapus' 
        ]);
   }
}
