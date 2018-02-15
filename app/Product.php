<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName', 'id_images', 'description', 'materials', 'dimensions', 'category', 'price', 'keywords'];
}
