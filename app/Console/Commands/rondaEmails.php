<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\RondaEmail;
use Illuminate\Support\Facades\Mail;
use DB;

class rondaEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email 1 Day Before';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $besok = new \DateTime('tomorrow');
        $event = new \stdClass();

        $formatBesok = $besok->format('Y-m-d');
        $getDate = DB::table('jadwal_ronda')->join('users','users.id','jadwal_ronda.id_users')->get();
        
        foreach($getDate as $g){
            $tgl_ronda = array("$g->tgl_ronda"=>"$g->tgl_ronda");
            
            $event->senderEmail = $g->email;
            if(array_search($formatBesok ,$tgl_ronda)){
            $event->email = $g->email; 
            }
            $event->senderName = 'Ketua RT 15';
            $event->subject = 'Pengumuman Jadwal Ronda';
            $event->message = '';  
            $event->name = $g->name;  
            $event->tanggal = $g->tgl_ronda;    
        }
        Mail::send((new RondaEmail($event))->delay(30));
        return redirect('/');
    }
}
