<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "news_title",
        "news_short",
        "news_description",
        "news_slug",
        "news_thumbnail",
        "news_image",
        "published"
    ];

    public function sluggable(): array
    {
        return [
            'news_slug' => [
                'source' => 'news_title'
            ]
        ];
    }
}
