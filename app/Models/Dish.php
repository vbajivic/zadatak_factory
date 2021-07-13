<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;
    protected $hidden = ['category_id','created_at', 'updated_at','translations'];
    public $translatedAttributes = ['title', 'description'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function ingredients(){
        return $this->belongsToMany('App\Models\Ingredient');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
