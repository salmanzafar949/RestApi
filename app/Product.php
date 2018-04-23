<?php

namespace App;
use App\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    protected $fillable = ['name','description','price','discount','stock'];

    public function Reviews()
    {
        return
            $this
                ->hasMany(Review::class);
    }
}
