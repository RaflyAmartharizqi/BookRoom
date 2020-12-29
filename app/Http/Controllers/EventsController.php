<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Events;
use App\Ruang;
use Calendar;
use DB;
class EventsController extends Controller
{
    public function index(){
        $ruang = DB::table('ruang')->get();
    	$events = Events::all();
    	$event_list = [];
    	foreach ($events as $key => $event) {
    		$event_list[] = Calendar::event(
                $event->event_name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.' +1 day')
            );
    	}
    	$calendar_details = Calendar::addEvents($event_list); 
 
        return view('events', compact('calendar_details'),['ruang' => $ruang] );
    }

    public function addEvent(Request $request)
    {
        DB::table('events')->insert([
            'event_name' => $request->event_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'id_ruang' => $request->id_ruang,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/home');
       
    }
    public function update($id, Request $request)
    {
        $ruang = DB::table('ruang')->get();
        $halaman = 'events';
        $events = Events::findOrFail($id);
        return view('event.edit', compact('halaman','events'),['ruang' => $ruang]);
    }
    public function editEvent($id, Request $request)
    {
        
        $halaman = 'events';
        $events = Events::findOrFail($id);
        $events->event_name = $request->event_name;
        $events->start_date = $request->start_date;
        $events->end_date = $request->end_date;
        $events->status = $request->status;
        $events->id_ruang = $request->id_ruang;
        $events->save();
        return redirect('events');
    }
    public function delete($id){
        $events = Events::findOrFail($id);
        $events->delete();
        return redirect('/home');
    }
}
