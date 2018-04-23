<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    public function Product()
    {
        return
            $this
                ->belongsTo(Product::class);
    }
}
