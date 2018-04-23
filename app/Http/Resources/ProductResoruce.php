<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResoruce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock === 0 ? 'out of Stock' : $this->stock,
            'price' => $this->price,
            'discount' => $this->discount,
            'totalPrice' => round( (1- ($this->discount/100))*$this->price),
            'rating' => $this->Reviews->count() > 0 ? round($this->Reviews->sum()/$this->Reviews->count(),2) : 'No Reviews',
            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ]
        ];
    }
}
