<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
class UserController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$users = DB::table('users')->get();
 
    	// mengirim data pegawai ke view index
    	return view('users',['users' => $users]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:20',
            'email' => 'required',
            'role' => 'required|numeric',
            'password' => 'required',

         ]);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => $request->password,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/users');
    }
    public function delete($id){
        $cek_hapus = User::where('id',$id)->delete();
        if($cek_hapus){
            Session::flash('alert_pesan','Sukses menghapus data');
        } else {
            Session::flash('alert_pesan','Gagal menghapus data');
        }
        return redirect('User');
    }
}
