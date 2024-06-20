<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use PDF;

class DashboardRTController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['user'] = Auth::user();
        
        return view('rukun_warga.dashboard_rt', $data);
    }
    
    public function getStruktur(){
        $data = DB::table('struktur_organisasi')->get();

        $series = [];
        $seriesData = [];

        foreach($data as  $d){
            $series['id'] = $d->id_noted;
            $series['title'] = $d->title;
            $series['name'] = $d->name;
            $series['color'] = $d->color;
            $series['column'] = $d->column;
            $series['height'] = $d->height;

        $seriesData[] = $series;
        $series=[];
        }

        echo json_encode([
            'org'   => $seriesData
        ]);
    }

    public function maps()
    {
        $series = [];
        $seriesData = [];

        $data = DB::table('data_covid')->select('id_provinsi','jumlah_kasus', 'jumlah_sembuh', 'jumlah_meninggal', 'jumlah_dirawat','shortlabel','label')->get();
        $last_data = DB::table('data_covid')->orderBy('jumlah_kasus','DESC')->first();
        $max_value = $last_data->jumlah_kasus;

        foreach($data as $d)
        {
            $seriesData['id'] = $d->id_provinsi;
            $seriesData['value'] = $d->jumlah_kasus;
            $seriesData['shortlabel'] = $d->shortlabel;
            $seriesData['fontcolor'] = "#000000";
            $seriesData['tooltext'] = '<b style="color:black;">'.$d->label.'</b>'
                                    .'<br>- Jumlah Kasus    : <b style="color:black;">'.number_format($d->jumlah_kasus,0,',','.').'</b>'
                                    .'<br>- Jumlah Sembuh   : <b style="color:black;">'.number_format($d->jumlah_sembuh,0,',','.').'</b>'
                                    .'<br>- Jumlah Meninggal: <b style="color:black;">'.number_format($d->jumlah_meninggal,0,',','.').'</b>'
                                    .'<br>- Jumlah Dirawat  : <b style="color:black;">'.number_format($d->jumlah_dirawat,0,',','.').'</b>';
            
            $series[] = $seriesData;
            $seriesData = [];
        }

        
        echo json_encode([
            'series' => $series,
            'maxvalue'  => $max_value
        ]);
    }
}
