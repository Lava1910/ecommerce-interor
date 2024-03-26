<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'project_name',
        'project_slug',
        'product_image',
        'product_banner',
        'product_description',
        'project_category_id'
    ];

    public function sluggable(): array
    {
        // TODO: Implement sluggable() method
        return [
            'project_slug' => [
                'source' => 'project_name'
            ]
        ];
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'project_product_mapping', 'project_id', 'product_id');
    }

    public function ProjectCategory(){ // model relationship
        return $this->belongsTo(ProjectCategory::class);
    }
}
