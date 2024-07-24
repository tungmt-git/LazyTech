<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'cost'=>rand(10000,30000),
            'img'=> '',
            'quantity'=>rand(100,200),
            'mota'=>fake()->text(),
            'comp_id'=>rand(1,10)
        ];
    }
}
