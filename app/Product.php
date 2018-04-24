<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    
    protected $fillable = ['productName', 'image1', 'image2', 'image3', 'image4', 'description', 'materials', 'dimensions', 'category', 'price', 'status'];
    
//    public function scopeMightLike($query) {
//        return $query->inRandomOrder()->take(4);
//    }
    
    public function toSearchableArray()
    {
        $record = $this->toArray();

        $record['_tags'] = explode(';', $this->tags);

        $record['added_month'] = substr($record['created_at'], 0, 7);

        unset($record['tags'], $record['created_at'], $record['updated_at']);

        return $record;
    }
}
