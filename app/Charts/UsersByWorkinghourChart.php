<?php

namespace App\Charts;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsersByWorkinghourChart
{
    protected $chart;
    protected $allData = [];
    protected $labels = [];

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $this->getData();
        return $this->chart->donutChart()
            ->setTitle('Usuário por Horário')
            ->setSubtitle('Toda a seccional')
            ->addData($this->allData)
            ->setFontFamily('Courier')
            ->setLabels($this->labels);
    }

    protected function getData(){
        $workinghours = DB::table('workinghours')->select(['id','slug'])->distinct()->orderBy('slug')->get();
        $byUser = User::toBase();
        foreach ($workinghours as $item) {
            array_push($this->labels, $item->slug);
            $byUser->selectRaw("count(case when workinghour_id = " .$item->id." then 1 end) as h_".$item->slug);
        }
        $this->allData = array_values( (array)($byUser->first()) );
    }
}
