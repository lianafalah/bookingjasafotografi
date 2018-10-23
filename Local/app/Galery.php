<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    //
    protected $table ='galery';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_galery',
       	'nama_galery', 	
        'tipe',
        'foto_studio',
       	'tanggal',
        'status',
        'terbaru',
        'slider',
       	'caption',
        'gambar', 	
       	
       	
     ];
}

