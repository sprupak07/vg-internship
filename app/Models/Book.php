<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'cover_image',
        'isbn',
        'author_id',
        'category_id',
        'published_date',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
