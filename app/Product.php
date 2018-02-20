<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName', 'image1', 'image2', 'image3', 'image4', 'description', 'materials', 'dimensions', 'category', 'price'];
    
    public function images(){
        return $this->hasMany('App\Image', 'foreign_key');
    }
    
}
