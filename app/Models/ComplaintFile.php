<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ComplaintCategory;

class ComplaintFile extends Model
{
    public $timestamps = false; // 🔧 Bu satırı ekle

    protected $fillable = [
        'complaint_id',
        'reply',
        'employer_id',
    ];
}
