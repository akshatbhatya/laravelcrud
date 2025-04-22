<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    //
    protected $fillable=['name','email','password','image'];

  

    protected $casts=[
        'password'=>"hashed"
    ];
    protected $hidden = [
        "password",
        "created_at",
        "updated_at",
        "id"
       
    ];
}
