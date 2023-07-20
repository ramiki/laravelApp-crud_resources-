<?php

namespace Database\Factories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * Generate feke data 
     * Don't forget to : use App\Models\Form , befor
     * 
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1 , 5),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'age' => $this->faker->numberBetween(18, 21),
            'note' => $this->faker->numberBetween(1, 20),
            'image' => $this->faker->randomElement(['image/image_b.jpg', 'image/image_g.jpg'])
        ];
    }
}
