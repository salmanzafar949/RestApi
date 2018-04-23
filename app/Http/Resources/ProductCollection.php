<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'discount' => $this->discount,
            'totalPrice' => round( 1- ($this->discount/100)*$this->price),
            'rating' => $this->Reviews->count() > 0 ? round($this->Reviews->sum()/$this->Reviews->count(),2) : 'No Reviews',
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
