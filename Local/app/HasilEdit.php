<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilEdit extends Model
{
    //
    protected $table ='hasiledit';
    protected $fillable = ['id_pesan','filename'];
    public function detailpemesanan()
	{
		return $this->belongsTo('App\DetailPemesanan');
	}
}
