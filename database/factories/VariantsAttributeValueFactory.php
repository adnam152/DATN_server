<?php

namespace Database\Factories;

use App\Http\Traits\PairHelper;
use App\Models\AttributeValue;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variants_attribute_value>
 */
class VariantsAttributeValueFactory extends Factory
{
    use PairHelper;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniquePair = $this->generateUniquePair('variants_attribute_values', 'variant_id', 'attribute_value_id', Variant::class, AttributeValue::class);

        return [
            'variant_id' => $uniquePair['variant_id'],
            'attribute_value_id' => $uniquePair['attribute_value_id'],
        ];
    }
}
