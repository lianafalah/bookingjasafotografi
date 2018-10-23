<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $table ='testimoni';

    protected $primaryKey = 'id';

    protected $fillable = [ 
   
       	'nama', 
       	'email',
        'isi',	
        'status',
       
       	
     ];
}
