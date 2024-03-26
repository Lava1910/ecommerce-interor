<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_image',
        'category_image_detail',
        'description_main',
        'topic1',
        'description_topic1',
        'topic2',
        'description_topic2'
    ];

    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
