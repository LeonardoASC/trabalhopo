<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->addData('Published posts', [4, 9, 5, 2, 1, 8])
            ->setSparkline();
    }
}
