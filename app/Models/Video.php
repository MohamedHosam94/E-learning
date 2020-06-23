<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Video extends Model
{
    protected $fillable = [
        'name' , 
        'des' , 
        'meta_des' , 
        'meta_keywords',
        'youtube',
        'published',
        'image',
        'cat_id',
        'user_id'
         
    ];

    public function user() {
   
         return $this->belongsTo( User::class , 'user_id' );
    }


    public function cat() {
   
        return $this->belongsTo( Category::class , 'cat_id' );
   }

   public function comments() {
   
    return $this->hasMany( Comment::class );
   }


   public function skills() {
   
    return $this->belongsToMany( Skill::class , 'skill_video' );
   }


   public function tags() {
   
    return $this->belongsToMany( Tag::class , 'tag_video' );
   }


    public function scopePublished() 
    { 
        return $this->where('published' , 1);
    } 
}
