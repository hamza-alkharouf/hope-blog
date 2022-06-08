<?php

namespace App\Models;

use App\Models\Scopes\PublishedScope;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

class Post extends Model
{
    //import HasFactory and incloud him this class --
    //use inside class :import  blog of trait 
    //use outside class :import  class that i make use from namespace in which I am 
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title','slug','content','category_id','status','image',
    ];
    //Attibute Accessors get[namefile]Attribute
    //$post->image_url =>imageurl =>getImageUrlAttribute
    public function getImageUrlAttribute(){
        if (empty($this->image)) {
            return asset('admin-assets/images/default-image.jpg' );
        }else{
            return asset('storage/'.$this->image );
            //return Storage::disk('public')->url($this->image);
        }

    }

    protected static function booted()
    {
        // static::addGlobalScope('published', function(Builder $builder){
        //     $builder->where('status', '=', 'published');
        // });
        
           // can call of any model
        //static::addGlobalScope(new PublishedScope());  
        // static::saving(function (Post $post){
        //     $post->slug = Str::slug($post->title);

        // });       
        // static::forceDeleted(function (Post $post){
        //     if ($post->image) {
        //         Storage::disk('public')->delete($post->image);
        //     }
        // });  
        static::observe(new PostObserver());

    }

    //Local scop  scope{filename}
    // public function scopePublished(Builder $builder){
    //     $builder->where('status', '=', 'published');

    // }

    // public function scopeDraft(Builder $builder){
    //     $builder->where('status', '=', 'draft');


    // }

    public function scopeStatus(Builder $builder, $status ='Published'){
        $builder->where('status', '=', $status);
    }
    //Inverse of One-to-Many (Post belongs to only one category)
    public function category(){
        return $this->belongsTo(
            category::class,  //Related Model
            'category_id',//FK for the realated in current modedl
            'id'          // PK in the realated model
        )->withDefault(['name'=>'Null']);
        
    }

    //Many-to-Many (Post belong to many Tags)
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,  //Related Model
            'post_tag',  //Pivot table
            'post_id',   //FK in pivot table for current model
            'tag_id',    //FK in pivot table for Related model
            'id',        //PK for current model
            'id',        //PK for Related model
        );
    }
}
