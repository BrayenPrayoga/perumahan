<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MasterRandom extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index_biografi(){

        $biografi = DB::table('biografi_ketua')->get();

        return view('rukun_warga.biografi', compact('biografi'));
    }

    public function update_biografi(Request $request){
        if($request->image_crop){
            $destination = 'img';
            $imageBlob = explode(";", $request->image_crop);
            $image64 = explode(",", $imageBlob[1]);
            $image = base64_decode($image64[1]);
            $name_file = uniqid() . '.png';
            $move = $destination .'/'. $name_file;
            file_put_contents($move, $image);
        }else{
            $name_file = null;
        }

        $data = [
            "nama"      => $request->nama,
            "deskripsi" => $request->deskripsi,
            "biografi"  => $request->biografi,
            "image"     => $name_file,
        ];

        DB::table('biografi_ketua')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function index_video(){
        $video = DB::table('master_video')->get();

        return view('rukun_warga.video',compact('video'));
    }

    public function update_video(Request $request){

        $data = [
            "link"      => $request->link,
            "durasi" => $request->durasi,
        ];

        DB::table('master_video')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function index_organisasi(){
        $data['no'] = 1;
        $data['organisasi'] = DB::table('struktur_organisasi')->orderBy('id','ASC')->get();

        return view('rukun_warga.struktur_organisasi', $data);
    }

    public function update_organisasi(Request $request){
        $nama = implode("<br>",$request->nama);
        $data = [
            'name'  => $nama,
            'title' => $request->title,
            'color' => $request->color,
        ];

        $update = DB::table('struktur_organisasi')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }
}
