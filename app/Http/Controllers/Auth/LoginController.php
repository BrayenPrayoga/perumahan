<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Mail\AktivasiLogin;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;


class LoginController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLogin()
    {
        return view('template.front_login.login');
    }

    public function cek_email()
    {
        $email = $_GET['mail'];
        $cek_user = DB::table('users')->where('email', $email)->get();

        if(count($cek_user) > 0){

            //update password dengan kode validasi
            $aktivasi = mt_rand();
            $update = DB::table('users')->where('email', $email)->update([
                'password' => Hash::make($aktivasi),
                'password_real' => $aktivasi,
            ]);

            //send email
            $user = DB::table('users')->where('email', $email)->first();
            $event = new \stdClass();

            $event->senderEmail = $email;
            $event->email = $email; 
            $event->senderName = 'Ketua RT 15';
            $event->subject = 'Kode Aktivasi Login RTKU15';
            $event->message = '';  
            $event->name = $user->name;
            $event->tanggal = date('Y-m-d H:i:s');
            $event->kode_aktivasi = $user->password_real;     
            
            Mail::send((new AktivasiLogin($event))->delay(30));
            return 'Silahkan Cek Kode Aktivasi di Email '.$email;
        }else{
            return 'tidak';
        }
    }

    public function postLogin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Attempt to log the user in
        // Passwordnya pake bcrypt
        if (Auth::check()) { }

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->intended('/dashboard-warga');
        } else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 2])) {
            return redirect()->intended('/dashboard-rt');
        } else {
            return redirect()->intended('/login');
        }
    }

    public function logout()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        return redirect('/');
    }
}
