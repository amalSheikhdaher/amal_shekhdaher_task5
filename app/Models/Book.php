<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'category_id',
        'published',
        'pages',
        'description'
    ];
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
