<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorVideo extends Model
{
    use HasFactory;

    protected $table = 'author_video';

    protected $fillable = [
        'author_id',
        'video_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
