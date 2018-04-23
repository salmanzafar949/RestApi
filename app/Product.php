<?php

namespace App;
use App\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function Reviews()
    {
        return
            $this
                ->hasMany(Review::class);
    }
}
