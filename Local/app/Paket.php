<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    //
    protected $table ='paket';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_paket',
       	'nama_paket', 
        'tipe',	
        'foto_studio',
       	'harga_paket', 	
       	'dp', 	
       	'keterangan',
        'gambar', 	
       	
       	
     ];
}
