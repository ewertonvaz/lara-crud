<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Charts\ComputerByCityChart;
// use App\Charts\UsersByCityChart;
// use App\Charts\UsersByWorkinghourChart;
use App\Charts\EventByPeriodChart;
use App\Models\Computer;

class HomeController extends Controller
{
    public function __construct()
    {
        if (env('APP_DEBUG', false)) {
            $this->middleware('guest');
        } else {
            $this->middleware('auth');
        }
    }

    public function index(
        // ComputerByCityChart $chart1,
        // UsersByCityChart $chart2,
        // UsersByWorkinghourChart $chart3,
        EventByPeriodChart $chart4
    ) {
        // \App\Jobs\ProcessTest::dispatch();
        //$cities = Computer::listCityNames();
        return view('index', [
            // 'chart1' => $chart1->build($cities),
            // 'chart2' => $chart2->build($cities),
            // 'chart3' => $chart3->build(),
            'chart4' => $chart4->build()
        ]);
    }
}
