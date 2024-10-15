<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Tiêu đề ngẫu nhiên
            'description' => $this->faker->optional()->sentence, // Mô tả ngẫu nhiên hoặc rỗng
            'page' => $this->faker->randomElement(array_values(\App\Models\Slider::PAGE)), // Trang ngẫu nhiên
            'width' => $this->faker->randomElement(['1920px', '1280px', '1024px']), // Chiều rộng ngẫu nhiên
            'height' => $this->faker->randomElement(['1080px', '720px', '600px']), // Chiều cao ngẫu nhiên
            'object_fit' => $this->faker->randomElement(array_values(\App\Models\Slider::OBJECT_FIT)), // Object fit ngẫu nhiên
            'delay' => $this->faker->numberBetween(1, 10) * 1000, // Delay ngẫu nhiên từ 1 đến 10 giây
            'is_active' => $this->faker->boolean, // Trạng thái ngẫu nhiên (kích hoạt hoặc không)
            'created_by' => \App\Models\Account::inRandomOrder()->first()->id,
            'updated_by' => \App\Models\Account::inRandomOrder()->first()->id,
        ];
    }
}
