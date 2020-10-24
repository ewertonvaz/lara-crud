<?php

namespace Database\Factories;

use App\Models\Equipamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fabricantes = ['Asus', 'Itautec', 'Lenovo', 'Epson', 'HP'];
        $tipos = ['Computador', 'Impressora', 'Scanner', 'Notebook'];
        $tipo = $tipos[rand(0,3)];
        $modelo = strtoupper($this->faker->bothify('??-###?'));
        $fabricante = $fabricantes[rand(0,4)];
        return [
          'tipo' => $tipo,
     	  'modelo' => $modelo,
     	  'fabricante' => $fabricante
        ];
    }
}
