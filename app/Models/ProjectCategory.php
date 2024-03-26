<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'project_categories';
    protected $fillable = [
        'project_category_name',
        'slug',
        'project_category_thumbnail',
        'project_category_image',
        'project_category_description'
    ];

    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'project_category_name'
            ]
        ];
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
