<?php

namespace App\Charts;

use App\Models\User;
use App\Models\Computer;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsersByCityChart
{
    protected $chart;
    protected $allData = [];
    protected $labels = [];

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($cities): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $this->getData($cities);
        $chart = $this->chart->barChart()
            ->setTitle('Usuários por Localidade')
            //->setSubtitle('Wins during season 2021.')
            ->setFontFamily('Courier')
            ->setXAxis(['Quantidade de Usuários']);
        for ($i = 0; $i < count($this->allData); ++ $i){
            $chart->addData($this->labels[$i], [$this->allData[$i]]);
        }
        return $chart;
    }

    protected function getData($cities){
        $byCity = User::toBase();
        foreach ($cities as $city) {
            array_push($this->labels, $city);
            $byCity->selectRaw("count(case when last_login_city = '" .$city."' then 1 end) as ".strtolower($city));
        }
        $this->allData = array_values( (array)($byCity->first()) );
    }
}
