<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->sentence(3),
            'info'  => $this->faker->sentence(5),
            'order'  => $this->faker->unique()->numberBetween(1,25),
            'box_id'    => $this->faker->numberBetween(1,2)
        ];
    }
}