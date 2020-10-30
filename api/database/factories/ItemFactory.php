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
            'name' => substr($this->faker->name, 0, 10),
            'status' => ['active', 'hold', 'deleted',][rand(0,2)],
            'amount' => rand(1, 999),
        ];
    }
}
