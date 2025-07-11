<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'tax_number',
        'mersis_no',
        'owner_id',
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
