<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku',
            'thumbnail' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:255',
            'catalogue_id' => 'required|exists:catalogues,id',
            'brand_id' => 'required|exists:brands,id',
            'sale_count' => 'integer|min:0',
            'view_count' => 'integer|min:0',
            'wish_count' => 'integer|min:0',
            'created_by' => 'required|exists:accounts,id',
            'updated_by' => 'nullable|exists:accounts,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'sku.required' => 'SKU là bắt buộc.',
            'sku.unique' => 'SKU đã tồn tại.',
            'thumbnail.required' => 'Ảnh đại diện là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'short_description.required' => 'Mô tả ngắn là bắt buộc.',
            'catalogue_id.required' => 'Danh mục là bắt buộc.',
            'catalogue_id.exists' => 'Danh mục không hợp lệ.',
            'brand_id.required' => 'Thương hiệu là bắt buộc.',
            'brand_id.exists' => 'Thương hiệu không hợp lệ.',
            'sale_count.integer' => 'Số lượng bán phải là số nguyên.',
            'sale_count.min' => 'Số lượng bán phải lớn hơn hoặc bằng 0.',
            'view_count.integer' => 'Số lượt xem phải là số nguyên.',
            'view_count.min' => 'Số lượt xem phải lớn hơn hoặc bằng 0.',
            'wish_count.integer' => 'Số lượt yêu thích phải là số nguyên.',
            'wish_count.min' => 'Số lượt yêu thích phải lớn hơn hoặc bằng 0.',
            'created_by.required' => 'Người tạo là bắt buộc.',
            'created_by.exists' => 'Người tạo không hợp lệ.',
            'updated_by.exists' => 'Người cập nhật không hợp lệ.',
        ];
    }
}
