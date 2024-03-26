<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        "product_name",
        "product_slug",
        "product_price",
        "product_thumbnail",
        "product_description",
        "product_qty",
        "product_author",
        "product_price_after_discount",
        "product_material",
        "product_image1",
        "product_image2",
        "category_id"
    ];

    public function sluggable(): array
    {
        return [
            'product_slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public function Category(){ // model relationship
        return $this->belongsTo(Category::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_product_mapping', 'product_id', 'project_id');
    }
}
