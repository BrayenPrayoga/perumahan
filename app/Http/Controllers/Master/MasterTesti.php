<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class MasterTesti extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $id_users = Auth::guard('user')->user()->id;
        $testi = DB::table('master_testimoni')->where('id_users', $id_users)->get();
        $no = 1;

        return view('warga.Master.master-testi', compact('testi','no'));
    }

    public function store(Request $request){
        $users = Auth::guard('user')->user();

        $data = [
            'id_users'  => $users->id,
            'pesan'     => $request->testi,
            'status'    => null,
        ];

        DB::table('master_testimoni')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function update(Request $request){
        $users = Auth::guard('user')->user();

        $data = [
            'pesan'     => $request->testi,
        ];

        DB::table('master_testimoni')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }
    
    public function hapus($id){
        
        $del = DB::table('master_testimoni')->where('id', $id)->delete();
        if($del){
            return redirect()->back()->with(['success'=>'Data Hapus']);
        }else{
            return redirect()->back()->with(['error'=>'Gagal Hapus']);
        }
    }

    public function index_admin(){
        $testi = DB::table('master_testimoni')->get();
        $no = 1;

        return view('rukun_warga.Master.master-testi', compact('testi','no'));
    }

    public function update_admin(Request $request){

        $data = [
            'status'     => $request->status,
        ];

        DB::table('master_testimoni')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus_admin($id){
        
        $del = DB::table('master_testimoni')->where('id', $id)->delete();
        if($del){
            return redirect()->back()->with(['success'=>'Data Hapus']);
        }else{
            return redirect()->back()->with(['error'=>'Gagal Hapus']);
        }
    }
}
