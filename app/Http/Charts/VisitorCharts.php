<?php

namespace App\Http\Charts;

use App\Models\AnalisisPengunjung;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class VisitorCharts
{
    protected $chart;
    protected $month;


    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
        $this->month = function () {
            $record = AnalisisPengunjung::select(DB::raw("(COUNT(*)) as count"), DB::raw("MONTHNAME(created_at) as monthname"))
                ->whereYear('created_at', date('Y'))
                ->groupBy('monthname')
                ->get();

            $data = [];

            $bulan = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            foreach ($record as $row) {
                for ($i = 0; $i <= 11; $i++) {
                    $data['label'][$i] = $bulan[$i];
                    $data['data'][$i] =  $row->monthname == $bulan[$i] ? $row->count : 0;
                }
            }
            return $data;
        };
    }

    public function build()
    {

        $pengunjung = AnalisisPengunjung::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $labels = [];
        $data = [];

        for ($i = 1; $i < 13; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($pengunjung as $visitor) {
                if ($visitor->month == $i) {
                    $count = $visitor->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        return $this->chart->lineChart()
            ->setTitle('Visitor Website ' . env('APP_URL'))
            ->addData('Real Visitor', $data)
            ->setXAxis($labels)
            ->setHeight(280)
            ->toVue();
    }
}
