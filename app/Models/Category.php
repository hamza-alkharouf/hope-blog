<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // One-to-Many (category has name Posts)
    public function posts()
    {
        return $this->hasMany(
            Post::class,  //Related Model
            'category_id',//FK is the related model
            'id'          // PK in the current model
        );
    }
    public function parent()
    {
        return $this->belongsTo(
            Category::class,  
            'parent_id',
            'id'          
        )->withDefault();
    }
    public function childern()
    {
        return $this->hasMany(
            Category::class,  
            'parent_id',
            'id'          
        );
    }
}
