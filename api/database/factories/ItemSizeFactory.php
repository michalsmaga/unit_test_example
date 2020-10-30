<?php


namespace Database\Factories;


use App\Models\ItemSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemSize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'size' => ['small', 'medium', 'large', 'extra',][rand(0, 2)],
        ];
    }
}
