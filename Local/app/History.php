<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    protected $table ='history';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_pesan',
       	'id_petugas',
       	'status',
       	'tanggal', 	
       	
       	
     ];
}
