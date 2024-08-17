<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'content'];

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',   // Cast 'title' as an array
        'content' => 'array', // Cast 'content' as an array
    ];
}
