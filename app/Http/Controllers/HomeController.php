<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use DB;
use App\Events;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['datas']=Events::join('ruang','events.id_ruang','=','ruang.id',)
        ->select('events.id','events.event_name','events.start_date','events.end_date','events.status','ruang.nama_ruang')
        ->get();
 
    	// mengirim data pegawai ke view index
    	return view('home',$data);
 
    }
}
