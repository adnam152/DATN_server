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
            'created_by' => $this->createdBy->full_name,
            'updated_by' => $this->updatedBy->full_name,
            'media' => $this->media->pluck('file_path'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];  
    }
}
