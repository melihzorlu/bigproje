<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    public $timestamps = false; // ✅ Laravel'e created_at ve updated_at kullanma diyoruz.

    protected $fillable = ['complaint_id', 'category_id'];
}
