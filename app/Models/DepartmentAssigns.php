<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentAssigns extends Model
{
    protected $fillable=["departmentid","userid"];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class, "departmentid", "id");
    }
}
