<?php

namespace App\Http\Controllers\properties;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index(Request $request)
    {
        $types = Properties::distinct()->pluck('type');
        $locals = Location::distinct()->pluck('district');
        $statuses = Properties::distinct()->pluck('status');

        $search = $request->input('search');
        $type = $request->input('type');
        $local = $request->input('local');
        $price = $request->input('price');
        $area = $request->input('area');
        $status = $request->input('status');

        $query = Properties::query();
        $query->join('properties_descriptions', 'properties.id', '=', 'properties_descriptions.property_id')
            ->join('locations', 'properties.id', '=', 'locations.property_id')
            ->join('property_images', 'properties.id', '=', 'property_images.property_id');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('properties_descriptions.owner', 'LIKE', "%$search%")
                    ->orWhere("properties_descriptions.phone_number", "LIKE", "%$search%")
                    ->orWhere("properties_descriptions.gmail", "LIKE", "%$search%")
                    ->orWhere("locations.district", "LIKE", "%$search%")
                    ->orWhere("locations.ward", "LIKE", "%$search%")
                    ->orWhere("locations.street", "LIKE", "%$search%")
                    ->orWhere("Properties.id", "LIKE", "%$search%");
            });
        }

        if ($type !== 1) {
            $query->where('properties.type', $type);
        }
        if ($local !== 1) {
            $query->where('locations.district', $local);
        }
        switch ($price) {
            case "2":
                $query->where('properties.price', '<', '500000000');
                break;
            case "3":
                $query->where('properties.price', '>', '500000000')->where('properties.price', '<', '800000000');
                break;
            case "4":
                $query->where('properties.price', '>', '800000000')->where('properties.price', '<', '1000000000');
                break;
            case "5":
                $query->where('properties.price', '>', '1000000000')->where('properties.price', '<', '2000000000');
                break;
            case "6":
                $query->where('properties.price', '>', '2000000000')->where('properties.price', '<', '3000000000');
                break;
            case "7":
                $query->where('properties.price', '>', '3000000000')->where('properties.price', '<', '5000000000');
                break;
            case "8":
                $query->where('properties.price', '>', '5000000000')->where('properties.price', '<', '7000000000');
                break;
            case "9":
                $query->where('properties.price', '>', '7000000000');
                break;
        }
        switch($area) {
            case "2":
                $query->where('properties.area', '<', '30');
                break;
            case "3":
                $query->where('properties.area', '>', '30')->where('properties.area', '<', '50');
                break;
            case "4":
                $query->where('properties.area', '>', '50')->where('properties.area', '<', '80');
                break;
            case "5":
                $query->where('properties.area', '>', '80')->where('properties.area', '<', '100');
                break;
            case "6":
                $query->where('properties.area', '>', '100')->where('properties.area', '<', '150');
                break;
            case "7":
                $query->where('properties.area', '>', '150')->where('properties.area', '<', '200');
                break;
            case "8":
                $query->where('properties.area', '>', '200')->where('properties.area', '<', '250');
                break;
            case "9":
                $query->where('properties.area', '>', '250');
                break;
        }
        if ($status !== 1) {
            $query->where('properties.status', $status);
        }
        // // switch
        return view('properties.index', [
            'types' => $types,
            'locals' => $locals,
            'statuses' => $statuses,
            'properties' => $query,
        ]);
        // return response()->json([
        //     "properties"=> $query->paginate(10),
        // ]);
    }


    public function create()
    {
        return view('properties.create');
    }
    //
}
