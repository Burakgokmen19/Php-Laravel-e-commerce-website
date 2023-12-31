<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable,HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug',
        'category_id',
        'short_text',
        'price',
        'size',
        'color',
        'qyt',
        'status',
        'content'



     ];
     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
