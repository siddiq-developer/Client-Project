<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Blog extends Model
// {
//     use HasFactory;
// }


// class Blog extends Model
// {
//     protected $fillable = ['title', 'content', 'author', 'date', 'image', 'type'];
// }

class Blog extends Model {
    protected $fillable = ['title', 'content', 'author', 'date', 'type', 'slug'];

    
    public static function boot() {
        parent::boot();
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title, '-');
        });
    }
}