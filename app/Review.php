<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['product_id','customer','comment','rating'];

    public function Product()
    {
        return
            $this
                ->belongsTo(Product::class);
    }
}
