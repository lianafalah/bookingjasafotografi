<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiPembayaran extends Model
{
    //
    protected $table ='konfirmasi_pembayaran';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_pesan',
       	'nama',
       	'nama_bank',
       	'no_rekening',
       	'nominal',
       	'tanggal',
       	'foto_bukti',
        'status',
        'id_petugas'
       	
     ];
}
