<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table ='foto';
    protected $fillable = ['foto_id', 'filename'];

    public function foto()
	{
		return $this->belongsTo('App\DetailPemesanan ');
	}
}
