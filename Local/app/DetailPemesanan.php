<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
	protected $table ='detailpemesanan';
    protected $fillable = ['id_pesan', 'status','keterangan'];

    
}
