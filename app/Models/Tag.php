<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable;
    protected $hidden = ['pivot','created_at', 'updated_at','translations'];
    public $translatedAttributes = ['title'];
    
    public function dishes(){
        return $this->belongsToMany(Dish::class);
    }
}
