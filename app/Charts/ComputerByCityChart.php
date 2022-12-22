<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\PieChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
use App\Models\Computer;

class ComputerByCityChart
{
    protected $chart;
    protected $allData = [];
    protected $labels = [];

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($cities) : PieChart
    {
        $this->getData($cities);
        return $this->chart->pieChart()
            ->setTitle('Total de Computadores')
            ->setSubtitle('Equipamento por Cidade')
            ->addData($this->allData)
            ->setFontFamily('Courier')
            ->setLabels($this->labels);
    }

    protected function getData($cities){
        $byCity = Computer::toBase();
        foreach ($cities as $city) {
            array_push($this->labels, $city);
            $byCity->selectRaw("count(case when city = '" .$city."' then 1 end) as ".strtolower($city));
        }
        $this->allData = array_values( (array)($byCity->first()) );
    }
}
