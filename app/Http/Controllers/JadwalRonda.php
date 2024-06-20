<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RondaEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;

class JadwalRonda extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $ronda = DB::table('jadwal_ronda')->select('id_users')->get();
        $d = [];
        foreach($ronda as $a){
            $d[] = $a->id_users;
        }
        $data['jadwal'] = DB::table('jadwal_ronda')->select('tgl_ronda')->orderBy('tgl_ronda','ASC')->groupBy('tgl_ronda')->get();
        $data['users'] = DB::table('users')->whereNotIn('id', $d)->get();
        $data['users_edit'] = DB::table('users')->whereIn('id', $d)->get();
        $data['no'] = 1;

        return view('rukun_warga.jadwal_ronda', $data);
    }

    public function getData(){
        $tgl = $_GET['tgl'];
        $jadwal = DB::table('jadwal_ronda')->select('jadwal_ronda.id','jadwal_ronda.id_users','jadwal_ronda.tgl_ronda','users.name')
        ->join('users','users.id','jadwal_ronda.id_users')
        ->where('jadwal_ronda.tgl_ronda', $tgl)->get();

        return $jadwal;
    }

    public function store(Request $request){

        $data = [
            'id_users'  => $request->nama,
            'tgl_ronda' => $request->tgl,
        ];

        $simpan = DB::table('jadwal_ronda')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function edit(Request $request){
        $data = [
            'id_users'  => $request->nama,
            'tgl_ronda' => $request->tgl,
        ];

        $simpan = DB::table('jadwal_ronda')->where('id',$request->id)->update($data);
        
        return redirect()->back()->with(['success'=>'Data Edit']);
    }

    public function hapus($id){
        DB::table('jadwal_ronda')->where('id',$id)->delete();
        
        return redirect()->back()->with(['success'=>'Data Hapus']);
    }

    public function sendEmail($tgl){
        $besok = new \DateTime('tomorrow');
        $event = new \stdClass();

        $formatBesok = $besok->format('Y-m-d');
        $getDate = DB::table('jadwal_ronda')->where('jadwal_ronda.tgl_ronda', $tgl)->join('users','users.id','jadwal_ronda.id_users')->get();
        
        foreach($getDate as $g){
            $event->senderEmail = $g->email;
            $event->email = $g->email; 
            $event->senderName = 'Ketua RT 15';
            $event->subject = 'Pengumuman Jadwal Ronda';
            $event->message = '';  
            $event->name = $g->name;
            $event->tanggal = $g->tgl_ronda;       
        }
        Mail::send((new RondaEmail($event))->delay(30));
        return redirect()->back()->with(['success'=>'Terkirim']);
    }

    public function index_user(){
        $data['id_user'] = Auth::guard('user')->user()->id;
        $data['jadwal_sendiri'] = DB::table('jadwal_ronda')->select('tgl_ronda')->where('id_users', $data['id_user'])->first();
        $data['jadwal'] = DB::table('jadwal_ronda')->select('tgl_ronda')->orderBy('tgl_ronda','ASC')->groupBy('tgl_ronda')->get();
        $data['no'] = 1;

        return view('warga.jadwal_ronda', $data);
    }

    public function getData_user(){
        $tgl = $_GET['tgl'];
        $jadwal = DB::table('jadwal_ronda')->select('jadwal_ronda.id','jadwal_ronda.id_users','jadwal_ronda.tgl_ronda','users.name')
                ->join('users','users.id','jadwal_ronda.id_users')
                ->where('jadwal_ronda.tgl_ronda', $tgl)->get();

        return $jadwal;
    }
}
