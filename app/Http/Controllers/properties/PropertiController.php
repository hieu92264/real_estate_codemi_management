<?php

namespace App\Http\Controllers\properties;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePropertiesRequest;
use App\Models\Location;
use App\Models\Properties;
use App\Models\PropertiesDescription;
use App\Models\PropertyImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function __construct()
    {

    }
//     public function index()
//     {
//         $properties = Properties::with(['hasImages', 'hasLocation'])
//             ->latest()
//             ->paginate(6);
//         return view('properties.index', compact('properties'));
//     }

    public function create()
    {
        return view('properties.create');
    }
    //
    public function store(CreatePropertiesRequest $request)
    {
        $validatedData = $request->validated();

        $property = Properties::create([
            'type' => $validatedData['type'],
            'status' => $validatedData['status'],
            'created_by_id' => Auth::id(),
        ]);

        $property->hasDescription()->create([
            'owner' => $validatedData['owner'],
            'phone_number' => $validatedData['phone_number'],
            'gmail' => $validatedData['gmail'],
            'acreage' => $validatedData['acreage'],
            'price' => $validatedData['price'],
            'frontage' => $validatedData['frontage'],
            'house_direction' => $validatedData['house_direction'],
            'floors' => $validatedData['floors'],
            'bedrooms' => $validatedData['bedrooms'],
            'toilets' => $validatedData['toilets'],
            'legality' => $validatedData['legality'],
            'furniture' => $validatedData['furniture'],
            'other_description' => $validatedData['other_description'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('property_images', 'public'); // Lưu vào thư mục public/property_images
                $propertyImage = new PropertyImages([
                    'image_url' => 'property_images/' . basename($imagePath), // Lưu đường dẫn tương đối trong cơ sở dữ liệu
                ]);
                $property->hasImages()->save($propertyImage);
            }
        }
        $property->hasLocation()->create([
            'city' => $validatedData['city'],
            'district' => $validatedData['district'],
            'ward' => $validatedData['ward'],
            'street' => $validatedData['street'],
            'full_address' => $validatedData['full_address'],
        ]);

        return redirect()->route('bat-dong-san.index');
    }
    public function show($id)
    {
        $property = Properties::findOrFail($id);
        $property->load(['hasImages', 'hasLocation', 'hasDescription']);

        return view('properties.view', compact('property'));
        // return $property;
    }
}
