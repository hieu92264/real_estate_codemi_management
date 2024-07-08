<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.dashboard', [
            'barChartData' => $this->getBarChartData($request),
            'pieChartData' => $this->getPieChartData(),
            'doughnutChartData' => $this->getDoughnutChartData(),
        ]);
    }

    public function getBarChartData(Request $request)
    {
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
        $query = Properties::with('hasDescription');
        if ($request->input('from') == '' || $request->input('to') == '') {
            foreach ($priceRanges as $key => $values) {
                $query->whereHas('hasDescription', function ($q) use ($values) {
                    $q->whereBetween(DB::raw('CAST(price AS UNSIGNED)'), $values);
                });
                // $count = Properties::join('properties_descriptions', 'properties.id', '=', 'properties_descriptions.property_id')
                //     ->whereBetween('properties_descriptions.price', $values)
                //     ->count();
                $count = $query->count();
                $data[] = [
                    'label' => $values,
                    'value' => $count
                ];
            }
        } else {
            $toEndOfDay = $request->input('to') . ' 23:59:59';
            foreach ($priceRanges as $key => $values) {
                $count = Properties::join('properties_descriptions', 'properties.id', '=', 'properties_descriptions.property_id')
                    ->whereBetween('properties_descriptions.created_at', [$request->input('from'), $toEndOfDay])
                    ->whereBetween('properties_descriptions.price', $values)
                    ->count();
                $data[] = [
                    'label' => $values,
                    'value' => $count
                ];
            }
        }
        // <<<<<<< hkd
        //         return view('layouts.dashboard', [
        //             'data' => $data
        //         ]);
        //         // return response()->json($data);
        // =======
        return $data;
    }

    public function getPieChartData()
    {
        $data = [];
        $labels = Properties::distinct()->pluck('status');
        foreach ($labels as $label) {
            $count = Properties::where('status', $label)->count();
            $data[] = [
                'label' => $label,
                'value' => $count
            ];
        }
        return $data;
    }
    public function getDoughnutChartData()
    {
        $data = [];
        $labels = Properties::distinct()->pluck('type');
        foreach ($labels as $label) {
            $count = Properties::where('type', $label)->count();
            $data[] = [
                'label' => $label,
                'value' => $count
            ];
        }
        return $data;
    }
}
