<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeReaction extends Model
{
    use HasFactory;

    protected $table = 'type_reaction';

    protected $fillable = [
        'name',
    ];
}
