<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'name',
        'language_id',
        'user_id',
        'classification_id',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function profileLikes()
    {
        return $this->hasMany(ProfileLikes::class);
    }

    public function keepWatching()
    {
        return $this->hasMany(KeepWatching::class);
    }
}
