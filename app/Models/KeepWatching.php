<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeepWatching extends Model
{
    use HasFactory;

    protected $table = 'keep_watching';

    protected $fillable = [
        'video_id',
        'profile_id',
        'minute',
    ];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
