<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_is','first_name','last_name','birthday'
    ];
        //Inverse of One-to-one (profile  belongs to one user)
        public function user(){
            return $this->belongsTo(
                User::class, //Related model
                'user_id',      //FK for current model in the related
                'id'            //PK in the current model
            );
        }
}
