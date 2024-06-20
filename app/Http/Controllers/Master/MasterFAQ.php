<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MasterFAQ extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['no'] = 1;
        $data['faq'] = DB::table('FAQ')->get();

        return view('rukun_warga.Master.master-faq', $data);
    }

    public function tambah(Request $request){
        $data = [
            'question'  => $request->question,
            'answer'    => $request->answer,
        ];
        $tambah = DB::table('FAQ')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function edit(Request $request){
        $data = [
            'question'  => $request->question,
            'answer'    => $request->answer,
        ];
        $edit = DB::table('FAQ')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus($id){
        $del = DB::table('FAQ')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Data Hapus']);
    }
}
