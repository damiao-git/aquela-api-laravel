<?php

namespace Database\Factories;

use App\Models\Sabor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaborFactory extends Factory
{
    protected $model = Sabor::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
        ];
    }
}
