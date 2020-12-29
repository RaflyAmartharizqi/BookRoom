<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ruang;
use Session;

class RuangController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$ruang = DB::table('ruang')->get();
 
    	// mengirim data pegawai ke view index
    	return view('ruang',['ruang' => $ruang]);
 
    }
    public function store(Request $request)
    {
        DB::table('ruang')->insert([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruang' => $request->nama_ruang,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/ruang');
    }
    public function edit($id){
        $halaman = 'ruang';
        $ruang = Ruang::findOrFail($id);
        return view('ruang.update', compact('halaman','ruang'));
    }
    public function update($id, Request $request)
    {
        $halaman = 'ruang';
        $ruang = Ruang::findOrFail($id);
        $ruang->kode_ruangan = $request->kode_ruangan;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->save();
        return redirect('ruang');
    }
    public function delete($id){
        $cek_hapus = Ruang::where('id',$id)->delete();
        if($cek_hapus){
            Session::flash('alert_pesan','Sukses menghapus data');
        } else {
            Session::flash('alert_pesan','Gagal menghapus data');
        }
        return redirect('ruang');
    }
}
