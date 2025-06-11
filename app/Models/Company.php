<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function complaints()
    {
        return $this->hasMany(Home::class);
    }

}
