<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getBarChartData(Request $request)
    {
        $request->validate([
            'from' => 'date',
            'to' => 'date',
        ]);
        $startDate = $request->input('from');
        $endDate = $request->input('to');
        // if(isset($startDate) )
        $priceRanges = [
            '2' => [0, 500000000],
            '3' => [500000001, 800000000],
            '4' => [800000001, 1000000000],
            '5' => [1000000001, 2000000000],
            '6' => [2000000001, 3000000000],
            '7' => [3000000001, 5000000000],
            '8' => [5000000001, 7000000000],
            '9' => [7000000001, PHP_INT_MAX],
        ];

        $data = [];
        foreach ($priceRanges as $key => $values) {
            $count = Properties::join('properties_descriptions', 'properties.id', '=', 'properties_descriptions.property_id')
                ->whereBetween('properties_descriptions.price', $values)
                ->count();
            $data[] = [
                'label' => $values,
                'value' => $count
            ];
        }

        return view('layouts.dashboard', [
            'data' => $data
        ]);
        // return response()->json($data);
    }
}
