<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileLike extends Model
{
    use HasFactory;

    protected $table = 'profile_like';

    protected $fillable = [
        'profile_id',
        'video_id',
        'add_my_list',
        'profile_reaction_id',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function profileReaction()
    {
        return $this->belongsTo(ProfileReaction::class);
    }
}
