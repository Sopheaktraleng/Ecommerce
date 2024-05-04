<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slideshow;   
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slideshow>
 */
class SlideshowFactory extends Factory
{

    protected $model = Slideshow::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        return [
            "title" => $this->faker->sentence(1),
            "subtitle" => $this->faker->sentence(1),
            "text" => $this->faker->sentence(3),
            "enable" =>'1',
            "img" => $this->faker->randomElement(['girl1.jpg','girl2.jpg','girl3.jpg']),
            "ssorder" => $this->faker->numberBetween(1,100),
        ];
    }
}

