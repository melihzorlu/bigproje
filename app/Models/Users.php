<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    protected $fillable = [
        'id, name, email, password','tc_no','birth_date','phone','role','created_at'
    ];


}
