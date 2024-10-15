<?php

namespace Database\Factories;

use App\Http\Traits\PairHelper;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog_tag>
 */
class BlogTagFactory extends Factory
{
    use PairHelper;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniquePair = $this->generateUniquePair('blog_tags', 'blog_id', 'tag_id', Blog::class, Tag::class);


        return [
            'blog_id' => $uniquePair['blog_id'],
            'tag_id' => $uniquePair['tag_id'], 
        ];
    }
}
