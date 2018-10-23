<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Member extends Authenticatable
{
    //
    protected $table ='member';

    protected $primaryKey = 'id';

    protected $fillable = [ 
       	'id_member',
       	'nama', 	
        'alamat',
       	'email', 	
       	'no_telp', 	
       	'username',
        'password', 
       	'status'	

     ];

     public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
