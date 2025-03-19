<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(3);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'body' => $this->faker->paragraph(3, true),
            'published_at' => $this->faker->optional()->dateTimeBetween('-5 years', 'now'),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'author_id' => Author::inRandomOrder()->first()->id ?? Author::factory(),
        ];
    }
}
