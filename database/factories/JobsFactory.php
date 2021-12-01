<?php

namespace Database\Factories;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // title, 
        // description
        // amount
        // code
        // closing_date
        // user_id
        // category_id 
        // status
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'amount' => $this->faker->numberBetween(10000, 1000000),
            'code' => Str::random(8),
            'state' => $this->faker->state,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl($width = 360, $height = 240),
            'closing_date' => $this->faker->dateTimeInInterval('now','+ 30 days','Africa/Lagos'),
            'user_id'=> $this->faker->numberBetween(1, 3),
            'category_id' => $this->faker->numberBetween(1,3)
        ];
    }
}
