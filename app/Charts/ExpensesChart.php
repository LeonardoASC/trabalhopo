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
        $labels = ['Variável 1', 'Variável 2', 'Variável 3'];
        $values = [2, 1000, 3];

        // return $this->chart->lineChart()
        // ->setTitle('Sales during 2021.')
        // ->setSubtitle('Physical sales vs Digital sales.')
        // ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
        // ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
        // ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

    //     $chart = new LarapexChart;
    //     $chart->barChart()
    //       ->setTitle('Gráfico do Método Simplex')
    //       ->setLabels($labels)
    //       ->setDataset([$values]);

    // return view('expenses', compact('chart'));
    }

    public static function simplexChart($values)
    {
        $chart = (new LarapexChart)
            ->setTitle('Gráfico do Método Simplex')
            ->setLabels(range(0,20))
            ->setDataset([$values])
            ->setDataset([
                [
                    'name' => 'Restrição 1',
                    'data' => [
                        ['x' => 2, 'y' => 0],
                        ['x' => 2, 'y' => 4]
                    ],
                    'color' => 'red',
                    'lineWidth' => 2,
                ],
                [
                    'name' => 'Restrição 2',
                    'data' => [
                        ['x' => 0, 'y' => 3],
                        ['x' => 5, 'y' => 3]
                    ],
                    'color' => 'blue',
                    'lineWidth' => 2,
                ],
                [
                    'name' => 'Restrição 3',
                    'data' => [
                        ['x' => -1, 'y' => -3],
                        ['x' => -1, 'y' => 8]
                    ],
                    'color' => 'blue',
                    'lineWidth' => 2,
                ],

                ])
            ->setType('line');


        return $chart;
    }

}
