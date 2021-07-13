<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;
    
    protected $hidden = ['created_at', 'updated_at','translations'];
    public $translatedAttributes = ['title'];
    
    public function dishes(){
        return $this->hasMany(Dish::class);
    }
}
