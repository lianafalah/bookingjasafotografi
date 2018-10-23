<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];
 
    public function member()
    {
        return $this->belongsTo('App\Member', 'user_id');
    }
}
