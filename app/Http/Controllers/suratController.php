<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratMenikah;
use DB;
use Auth;
use PDF;

class suratController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('warga.surat.index');
    }

    //Surat Domisili
    public function index_domisili(){

        $data['no'] = 1;
        $data['surat'] = DB::table('surat_domisili')->where('id_users', Auth::guard('user')->user()->id)->get();

        return view('warga.surat.domisili.index', $data);
    }

    public function store_domisili(Request $request){
        $data = [
            'nama'          => $request->nama,
            'id_users'      => Auth::guard('user')->user()->id,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'agama'         => $request->agama,
            'status'        => 0,
        ];

        $simpan = DB::table('surat_domisili')->insert($data);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function edit_domisili(Request $request){
        $data = [
            'nama'          => $request->nama,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'agama'         => $request->agama,
        ];

        $edit = DB::table('surat_domisili')->where('id', $request->id)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function kirim_domisili($id){
        $kirim = DB::table('surat_domisili')->where('id', $id)->update(['status'=>1]);

        return redirect()->back()->with(['success'=>'Data Kirim']);
    }

    public function cetak_surat_domisili($id){

        $data['surat'] = DB::table('surat_domisili')->where('id', $id)->first();

        // return view('warga.surat.domisili.surat-domisili', $data);
        $pdf = PDF::loadView('warga.surat.domisili.surat-domisili', $data);
        return $pdf->stream('surat-domisili.pdf');
    }

    //Surat Menikah
    public function index_menikah(){
        $data['no'] = 1;
        $data['surat'] = DB::table('surat_menikah')->where('id_users', Auth::guard('user')->user()->id)->get();

        return view('warga.surat.Menikah.index', $data);
    }

    public function store_menikah(Request $request){
        $id_users = Auth::guard('user')->user()->id;
        $kelamin = Auth::guard('user')->user()->jenis_kelamin;
        $day = date('w',strtotime($request->tanggal));
        
        $umum = [
            "id_users" => $id_users,
            "hari" => getDayInDate($day),
            "tanggal" => $request->tanggal,
            "nama_kua" => $request->nama_kua,
            "kecamatan" => $request->kecamatan,
            "walikota" => $request->walikota,
            "provinsi" => $request->provinsi,
            "status_nikah" => $request->status_nikah,
            "status" => 0,
        ];
        $id_menikah = suratMenikah::create($umum);

        $diri = [
            "id_menikah" => $id_menikah->id,
            "nama" => $request->nama,
            "tempat_lahir" => $request->tmp_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "jenis_kelamin" => ($kelamin==1) ? 'Laki Laki' : 'Perempuan',
            "bin_binti" => $request->bin_binti,
            "nik_ktp" => Auth::guard('user')->user()->nik_ktp,
            "agama" => $request->agama,
            "pekerjaan" => $request->pekerjaan,
            "alamat" => $request->alamat,
            "data" => 'diri',
        ];
        DB::table('detail_surat_menikah')->insert($diri);

        $pasangan = [
            "id_menikah" => $id_menikah->id,
            "nama" => $request->nama_p,
            "tempat_lahir" => $request->tmp_lahir_p,
            "tgl_lahir" => $request->tgl_lahir_p,
            "jenis_kelamin" => $request->jenis_kelamin_p,
            "bin_binti" => $request->bin_binti_p,
            "nik_ktp" => $request->nik_p,
            "agama" => $request->agama_p,
            "pekerjaan" => $request->pekerjaan_p,
            "alamat" => $request->alamat_p,
            "data" => 'pasangan',
        ];
        DB::table('detail_surat_menikah')->insert($pasangan);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function getDetail(){
        $id = $_GET['id'];
        $data = $_GET['data'];

        $detail = DB::table('detail_surat_menikah')->where('id_menikah', $id)->where('data', $data)->get();

        return $detail;
    }

    public function update_menikah(Request $request){
        $id_users = Auth::guard('user')->user()->id;
        $kelamin = Auth::guard('user')->user()->jenis_kelamin;
        $day = date('w',strtotime($request->tanggal));
        
        $umum = [
            "hari" => getDayInDate($day),
            "tanggal" => $request->tanggal,
            "nama_kua" => $request->nama_kua,
            "kecamatan" => $request->kecamatan,
            "walikota" => $request->walikota,
            "provinsi" => $request->provinsi,
            "status_nikah" => $request->status_nikah,
            "status" => 0,
        ];
        suratMenikah::where('id', $request->id)->where('id_users',$id_users)->update($umum);

        $diri = [
            "nama" => $request->nama,
            "tempat_lahir" => $request->tmp_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "bin_binti" => $request->bin_binti,
            "agama" => $request->agama,
            "pekerjaan" => $request->pekerjaan,
            "alamat" => $request->alamat,
        ];
        DB::table('detail_surat_menikah')->where('id_menikah', $request->id)->where('data','diri')->update($diri);

        $pasangan = [
            "nama" => $request->nama_p,
            "tempat_lahir" => $request->tmp_lahir_p,
            "tgl_lahir" => $request->tgl_lahir_p,
            "jenis_kelamin" => $request->jenis_kelamin_p,
            "bin_binti" => $request->bin_binti_p,
            "nik_ktp" => $request->nik_p,
            "agama" => $request->agama_p,
            "pekerjaan" => $request->pekerjaan_p,
            "alamat" => $request->alamat_p,
        ];
        DB::table('detail_surat_menikah')->where('id_menikah', $request->id)->where('data','pasangan')->update($pasangan);

        return redirect()->back()->with(['success'=>'Data Simpan']);
    }

    public function kirim_menikah($id){
        $kirim = suratMenikah::where('id', $id)->update(['status'=>1]);

        return redirect()->back()->with(['success'=>'Data Kirim']);
    }

    public function cetak_surat_menikah($id){

        $data['date'] = date('Y-m-d');
        $data['hari'] = date('w',strtotime($data['date']));

        $data['umum'] = DB::table('surat_menikah')->where('id_users', Auth::guard('user')->user()->id)->first();

        $data['diri'] = DB::table('detail_surat_menikah')->where('id_menikah', $id)->where('data', 'diri')->first();

        $data['pasangan'] = DB::table('detail_surat_menikah')->where('id_menikah', $id)->where('data', 'pasangan')->first();

        // return view('warga.surat.Menikah.surat-menikah', $data);
        $size_paper = array(0, 0, 595, 905);
        $pdf = PDF::loadView('warga.surat.Menikah.surat-menikah', $data)->setPaper($size_paper, 'potrait');
        return $pdf->stream('surat-menikah.pdf');
    }
}
