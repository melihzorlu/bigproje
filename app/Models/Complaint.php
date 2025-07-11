<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ComplaintCategory;


class Complaint extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'title',
        'slug',
        'description',
        'status',
        'view_count',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


}
