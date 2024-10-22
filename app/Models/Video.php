<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'classification_id',
        'url_video',
        'key_video',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function keepWatching()
    {
        return $this->hasMany(KeepWatching::class);
    }

    public function myList()
    {
        return $this->hasMany(MyList::class);
    }

    public function authorVideo()
    {
        return $this->hasMany(AuthorVideo::class);
    }
    
}
