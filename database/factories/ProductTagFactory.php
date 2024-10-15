<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_tag>
 */
class ProductTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Lấy danh sách tất cả các sản phẩm và thẻ
        $productIds = Product::all()->pluck('id')->toArray();
        $tagIds = Tag::all()->pluck('id')->toArray();

        // Chọn ngẫu nhiên product_id và tag_id từ các danh sách đã lấy
        $productId = $this->faker->randomElement($productIds);
        $tagId = $this->faker->randomElement($tagIds);

        return [
            'product_id' => $productId,
            'tag_id' => $tagId,
        ];
    }
}
