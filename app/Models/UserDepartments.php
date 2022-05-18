<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDepartments extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function departments()
    {
        return $this->belongsTo(department::class , 'dept_id' , 'id');
    }
}
