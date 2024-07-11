<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Properties;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view("map.map");
    }
    public function search(Request $request)
    {
        $query = Location::query();

        // Check for the presence of 'city' in the request and apply the filter
        if ($request->has("city") && $request->input("city") != "") {
            $query->where("city", $request->input("city"));
        }

        // Check for the presence of 'district' in the request and apply the filter
        if ($request->has("district") && $request->input("district") != "") {
            $query->where("district", $request->input("district"));
        }

        // Check for the presence of 'ward' in the request and apply the filter
        if ($request->has("ward") && $request->input("ward") != "") {
            $query->where("ward", $request->input("ward"));
        }

        return response()->json($query->get());
    }
}
