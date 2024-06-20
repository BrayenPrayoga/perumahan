<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MasterDocument extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['domisili'] = DB::table('surat_domisili')->whereIn('status', [1,2])->count();
        $data['menikah'] = DB::table('surat_menikah')->whereIn('status', [1,2])->count();

        return view('rukun_warga.surat.index', $data);
    }

    public function index_domisili(){
        $data['no'] = 1;
        $data['domisili'] = DB::table('surat_domisili')->where('status','!=', 0)->get();

        return view('rukun_warga.surat.index_domisili', $data);
    }

    public function edit_domisili(Request $request){
        if($request->status == 2){
            $data = [
                'status'    => $request->status,
                'catatan'   => $request->catatan,
            ];
        }else{
            $data = [
                'status'    => $request->status,
            ];
        }
        $upd = DB::table('surat_domisili')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus_domisili($id){
        $del = DB::table('surat_domisili')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Data Delete']);
    }

    public function index_menikah(){
        $data['no'] = 1;
        $data['menikah'] = DB::table('surat_menikah')->where('status','!=', 0)->get();

        return view('rukun_warga.surat.index_menikah', $data);
    }

    public function getDetail(){
        $id = $_GET['id'];
        $data = $_GET['data'];

        $detail = DB::table('detail_surat_menikah')->where('id_menikah', $id)->where('data', $data)->get();

        return $detail;
    }

    public function edit_menikah(Request $request){
        if($request->status == 2){
            $data = [
                'status'    => $request->status,
                'catatan'   => $request->catatan,
            ];
        }else{
            $data = [
                'status'    => $request->status,
            ];
        }
        $upd = DB::table('surat_menikah')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus_menikah($id){
        $surat = DB::table('surat_menikah')->where('id', $id)->delete();

        $detail = DB::table('detail_surat_menikah')->where('id_menikah', $id)->delete();

        return redirect()->back()->with(['success'=>'Data Delete']);
    }
}
