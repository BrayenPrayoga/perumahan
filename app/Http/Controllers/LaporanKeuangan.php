<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LaporanKeuangan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // controller users
    public function index_user()
    {
        $data['user'] = Auth::user();

        return view('warga.laporan_keuangan',$data);
    }

    public function get_data_user()
    {
        $laporan = DB::table('laporan_keuangan')->orderBy('id','DESC')->get();

        return $laporan;
    }

    // controller admin
    public function index_admin()
    {
        $data['user'] = Auth::user();

        return view('rukun_warga.laporan_keuangan',$data);
    }

    public function get_data_admin()
    {
        $laporan = DB::table('laporan_keuangan')->orderBy('id','DESC')->get();

        return $laporan;
    }

    public function store_admin(Request $request)
    {
        $last_data = DB::table('laporan_keuangan')->orderBy('id','DESC')->first();
        $nominal = str_replace('.','',$request->nominal);
        if($request->bukti){
            $file = $request->file('bukti');
            $destination = 'uploads/bukti_laporan';
            $name_file = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination,$name_file);
        }else{
            $name_file = null;
        }

        try{
            if($request->laporan == 'pemasukan'){
                $saldo = ($last_data) ? $last_data->saldo + str_replace(',','.',$nominal) : str_replace(',','.',$nominal);
                $data = [
                    'jenis_laporan' => $request->laporan,
                    'keterangan'    => $request->keterangan,
                    'tanggal'       => date('Y-m-d'),
                    'pemasukan'     => str_replace(',','.',$nominal),
                    'saldo'         => $saldo,
                    'bukti'         => $name_file,
                    'created_at'    => date('Y-m-d H:i:s')
                ];
            }else{
                $saldo = ($last_data) ? $last_data->saldo - str_replace(',','.',$nominal) : str_replace(',','.',$nominal);
                $data = [
                    'jenis_laporan' => $request->laporan,
                    'keterangan'    => $request->keterangan,
                    'tanggal'       => date('Y-m-d'),
                    'pengeluaran'   => str_replace(',','.',$nominal),
                    'saldo'         => $saldo,
                    'bukti'         => $name_file,
                    'created_at'    => date('Y-m-d H:i:s')
                ];
            }

            DB::table('laporan_keuangan')->insert($data);

            return redirect()->back()->with(['success'=>'Data Tersimpan']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal'.$e]);
        }
    }

    public function update_admin(Request $request)
    {
        dd("BELUM DIBUAT");
    }
}
