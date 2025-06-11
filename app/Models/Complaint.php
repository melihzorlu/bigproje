<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Complaint extends Model
{
    protected $fillable = [
        'user_id', 'company_id', 'title', 'description', 'status', 'slug',
    ];

    // Slug oluşturma (otomatik)
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($complaint) {
            if (empty($complaint->slug)) {
                $complaint->slug = Str::slug($complaint->title) . '-' . uniqid();
            }
        });
    }

    // İlişkiler
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'complaint_categories');
    }

    public function files()
    {
        return $this->hasMany(ComplaintFile::class);
    }

    public function videos()
    {
        return $this->hasMany(ComplaintVideo::class);
    }

    public function replies()
    {
        return $this->hasMany(ComplaintReply::class);
    }
}
