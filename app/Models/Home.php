<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'complaints';

    protected $fillable = [
        'user_id',
        'company_id',
        'title',
        'description',
        'status',
        'view_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // User modeli varsa
    }

    public function company()
    {
        return $this->belongsTo(Company::class); // Company modeli varsa
    }
}
