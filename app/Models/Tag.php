<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];
    public static function booted()
    {
        static::creating(function(Tag $tag){
            $tag->slug = Str::slug($tag->name);
        });
    }
        //Inverse Many-to-Many 
        public function posts()
        {
            return $this->belongsToMany(
                Post::class,  //Related Model
                'post_tag',  //Pivot table
                'tag_id',   //FK in pivot table for current model
                'post_id',    //FK in pivot table for Related model
                'id',        //PK for current model
                'id',        //PK for Related model
            );
        }
}
