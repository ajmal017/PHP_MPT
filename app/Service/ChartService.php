<?php

namespace App\Service;

class ChartService
{
    public function printChart($data)
    {
        $osOverview = \Lava::DataTable();  // Lava::DataTable() if using Laravel
        $osOverview->addStringColumn('Parts')
                    ->addNumberColumn('Percent');
        foreach ($data as $key => $value) {
            \Log::info($key . " : " . $value[0]);
            $osOverview->addRow([(string)$key, (int)$value[0]]);
        }

        \Lava::PieChart("OS", $osOverview, [
            'width' => 600,
            'height' => 480,
        ]);
    }
}
