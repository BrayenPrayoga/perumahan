<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class suratMenikah extends Model
{
    protected $primary = 'id';

    protected $table = 'surat_menikah';

    protected $guarded = [];
    // protected $fillable = ['id', 'id_users', 'hari','tanggal','nama_kua','kecamatan','walikota','provinsi','status_nikah','status','catatan'];
    // public $timestamps = false;
}
