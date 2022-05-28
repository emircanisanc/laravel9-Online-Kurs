<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
