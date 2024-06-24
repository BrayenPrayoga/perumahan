<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MasterBerita extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['berita'] = DB::table('master_berita')->get();

        $data['no']=1;

        return view('rukun_warga.Master.master-berita', $data);
    }

    public function store(Request $request){
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $name_file = uniqid().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads/master_berita';
            $file->move($path,$name_file);
        }else{
            $name_file = null;
        }

        $data = [
            "judul"         => $request->judul,
            "deskripsi"     => $request->deskripsi,
            "isi"           => $request->isi,
            "gambar"        => $name_file,
            "status"        => $request->status,
            "tanggal"       => $request->tanggal,
            "status_news"   => $request->status_news,
        ];
        DB::table('master_berita')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function update(Request $request){
        $data_berita = DB::table('master_berita')->where('id', $request->id_berita)->first();

        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $name_file = uniqid().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads/master_berita';
            $file->move($path,$name_file);
            
            // Unlink File
            if(file_exists($path.'/'.$data_berita->gambar)){
                if($data_berita->gambar!=null){
                    unlink($path.'/'.$data_berita->gambar);
                }
            }

            DB::table('master_berita')->where('id', $request->id_berita)->update([
                "gambar"    => $name_file,
            ]);
        }

        $data = [
            "judul"     => $request->judul,
            "deskripsi" => $request->deskripsi,
            "isi"       => $request->isi,
            "status"    => $request->status,
            "tanggal"       => $request->tanggal,
            "status_news"   => $request->status_news,
        ];

        DB::table('master_berita')->where('id', $request->id_berita)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus($id){
        $data_berita = DB::table('master_berita')->where('id', $id)->first();
        $destination = 'uploads/master_berita';

        // Unlink File
        if(file_exists($destination.'/'.$data_berita->gambar)){
            if($data_berita->gambar!=null){
                unlink($destination.'/'.$data_berita->gambar);
            }
        }

        //Delete
        DB::table('master_berita')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Data Delete']);
    }

    public function image_store(Request $request){
        $image_array_1 = explode(";", $request->image);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = 'uploads/master_berita/' . time() . '.png';

	    file_put_contents($image_name, $data);
        dd($image_name);

    dd($request);
    }
}
