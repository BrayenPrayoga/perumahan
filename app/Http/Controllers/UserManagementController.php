<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class UserManagementController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['no'] = 1;
        $data['user'] = DB::table('users')->orderBy('id','ASC')->get();

        return view('rukun_warga.user_management', $data);
    }

    public function tambah(Request $request){
       
        $data = [
            'name'          => $request->nama,
            'nik_ktp'       => $request->nik,
            'email'         => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password'      => Hash::make($request->pw),
            'password_real' => $request->pw,
            'status'        => $request->status,
            'created_at'    => date('Y-m-d H:i:s'),
        ];

        $tambah = DB::table('users')->insert($data);

        return redirect()->back()->with(['success'=>'Data Tambah']);
    }

    public function update(Request $request){
        
        $data = [
            'name'          => $request->nama,
            'nik_ktp'       => $request->nik,
            'email'         => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status'        => $request->status,
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $tambah = DB::table('users')->where('id', $request->id_user)->update($data);

        return redirect()->back()->with(['success'=>'Data Update']);
    }

    public function hapus($id){
        $delete = DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Data Hapus']);
    }
}
