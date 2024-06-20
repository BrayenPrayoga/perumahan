<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardWargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user'] = Auth::user();
        return view('warga.dashboard_warga', $data);
    }

    public function grafikKelamin()
    {
        $series = [];
        $seriesData = [];
        $categori = [];

        $user = DB::table('users')->select('jenis_kelamin')->groupBy('jenis_kelamin')->get();

        foreach($user as $u){
            $categori[] = $u;
        }

        foreach($categori as $d){
                if($d->jenis_kelamin==1){
                    $jenis = 'Laki-Laki';
                    $jumlah = DB::table('users')->where('jenis_kelamin', 1)->count();
                }else{
                    $jenis = 'Perempuan';
                    $jumlah = DB::table('users')->where('jenis_kelamin', 2)->count();
                }
                
                $seriesData['name'] = $jenis;
                $seriesData['y'] = $jumlah;
                
        $series[] = $seriesData;
        $seriesData=[];
        }

        echo json_encode([
            'series'   => $series
        ]);
    }
}
