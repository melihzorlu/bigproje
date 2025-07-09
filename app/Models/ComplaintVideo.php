<?php
// app/Models/ComplaintVideo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintVideo extends Model
{
    public $timestamps = false; // ← Laravel artık created_at ve updated_at beklemez

    protected $fillable = [
        'complaint_id',
        'video_path',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
