<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //
    protected $table ='pemesanan';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_pesan', 
       	'id_paket', 	
       	'id_member', 	
        'tanggal_foto',   
        'tanggal_pesan',  
        'pukul', 
       	'sisa', 	
       	'status', 	
       	'tanggal_ambil',
       	
     ];

     public function konfirmasi()
     {
      return $this->hasOne('App\KonfirmasiPembayaran','id_pesan','id_pesan');
     }

     public function member()
     {
      return $this->belongsTo('App\Member','id_member','id_member');
     }
}
