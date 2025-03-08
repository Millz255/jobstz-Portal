<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'video',
        'caption',
        'thumbnail',
        'slug', 
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);

            $originalSlug = $article->slug;
            $count = 1;

            while (static::where('slug', $article->slug)->exists()) {
                $article->slug = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
             $originalSlug = $article->slug;
            $count = 1;
             while (static::where('slug', $article->slug)->where('id', '!=', $article->id)->exists()) {
                $article->slug = $originalSlug . '-' . $count++;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}