<?php

namespace Database\Factories;

use App\Models\Setor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SetorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sigla = strtoupper($this->faker->word());
        $descricao = $this->faker->sentence(10, true);
        $secao = $this->faker->streetAddress();
        $subsecao = $this->faker->numerify('#º andar');
        return [
          'sigla' => $sigla,
     	  'descricao' => $descricao,
          'secao' => $secao,
     	  'subsecao' => $subsecao
        ];
    }
}
