<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $averageRating = $this->reviews->pluck('rating')->when(
            $this->reviews->count() > 0,
            fn($ratings) => $ratings->avg(),
            fn() => null
        );
        $price = $this->variants
            ->flatMap(function ($variant) {
                // Lấy tất cả selling_price của các variants, bỏ qua null
                return $variant->productsOnSales->pluck('selling_price')->filter();
            })
            ->max(); // Lấy giá cao nhất
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'thumbnail' => $this->thumbnail,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'sale_count' => $this->sale_count,
            'view_count' => $this->view_count,
            'wish_count' => $this->wish_count,
            'brand_name' => $this->brand->brand,
            'catalogue' => $this->catalogue->catalogue,
            'created_by' => $this->when($this->isAdmin(), $this->createdBy->full_name),
            'updated_by' => $this->when($this->isAdmin(), $this->updatedBy->full_name),
            'media' => $this->media->pluck('file_path'),
            'is_reviewed' => $this->reviews->isNotEmpty(),
            'reviews' => $averageRating,
            'price' => $price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    
    protected function isAdmin()
    {
        return auth()->check() && auth()->user()->role->when('role_name' ==  'Administrator');
    }
}
