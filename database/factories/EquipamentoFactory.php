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
        $fabricante = $fabricantes[rand(0, count($fabricantes)-1)];
        $tipo = $tipos[rand(0, count($tipos)-1)];
        $modelo = strtoupper($this->faker->bothify('??-###?'));
        return [
          'tipo' => $tipo,
     	  'modelo' => $modelo,
     	  'fabricante' => $fabricante,
        ];
    }
}
