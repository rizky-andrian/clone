<?php

namespace Database\Factories;

use App\Models\StaticPages;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StaticPagesFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => $this->faker->imageUrl(640, 480, 'pages', true, 'Static Page'),
            'type' => $this->faker->randomElement(['main-konten', 'konten']),
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}
