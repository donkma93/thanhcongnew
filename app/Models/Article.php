<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'meta_title',
        'meta_description',
        'slug',
        'content',
        'category_id',
        'thumbnail',
        'is_scholarship',
        'status',
        'published_at',
    ];

    protected $casts = [
        'is_scholarship' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
