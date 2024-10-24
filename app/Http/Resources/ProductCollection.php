<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function($product) {

                $averageRating = $product->reviews->pluck('rating')->when(
                    $product->reviews->count() > 0, 
                    fn($ratings) => $ratings->avg(),
                    fn() => null 
                );
                $price = $product->variants->map(function($variant) {
                    return [     
                        'selling_price' => $variant->selling_price,
                    ];
                });

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'thumbnail' => $product->thumbnail,
                    'description' => $product->description,
                    'short_description' => $product->short_description,
                    'sale_count' => $product->sale_count,
                    'view_count' => $product->view_count,
                    'wish_count' => $product->wish_count,
                    'brand_name' => $product->brand->brand,
                    'catalogue' => $product->catalogue->catalogue,
                    'created_by' => $product->createdBy->full_name,
                    'updated_by' => $product->updatedBy->full_name,
                    'media' => $product->media->pluck('file_path'),
                    'is_reviewed' => $product->reviews->isNotEmpty(),
                    'reviews' => $averageRating,
                    'price' => $price,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                ];
            }),
            'meta' => [
                'total' => $this->total(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
            ],
            'links' => [
                'first' => $this->url(1),
                'last' => $this->url($this->lastPage()),
            ],
        ];
    }
}
