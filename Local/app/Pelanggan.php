<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table ='pelanggan';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_pesan',
       	'nama', 
        'identitas',	
        'alamat',
       	'email', 	
       	'no_telp', 	
       	'tanggal_pesan',
        
       	
       	
     ];
}
