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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PropertiController extends Controller
{
    public function search(Request $request)
    {

        $types = Properties::distinct()->pluck('type');
        $statuses = Properties::distinct()->pluck('status');
        $locations = Location::distinct()->pluck('district');

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
                    ->orWhere("properties.id", "LIKE", "%$search%");
            });
        }

        if ($type != '1') {
            $query->where('properties.type', $type);
        }
        if ($local != '1') {
            $query->where('locations.district', $local);
        }
        switch ($price) {
            case "2":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [0, 500000000]);
                break;
            case "3":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [500000001, 800000000]);
                break;
            case "4":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [800000001, 1000000000]);
                break;
            case "5":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [1000000001, 2000000000]);
                break;
            case "6":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [2000000001, 3000000000]);
                break;
            case "7":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [3000000001, 5000000000]);
                break;
            case "8":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [5000000001, 7000000000]);
                break;
            case "9":
                $query->whereBetween(DB::raw('CAST(properties_descriptions.price AS UNSIGNED)'), [7000000001, PHP_INT_MAX]);
                break;
        }
        switch ($area) {
            case "2":
                $query->where('properties_descriptions.acreage', '<', '30');
                $query->whereBetween('properties_descriptions.acreage', [0, 30]);
                break;
            case "3":
                $query->whereBetween('properties_descriptions.acreage', [31, 50]);
                break;
            case "4":
                $query->whereBetween('properties_descriptions.acreage', [51, 80]);
                break;
            case "5":
                $query->whereBetween('properties_descriptions.acreage', [81, 100]);
                break;
            case "6":
                $query->whereBetween('properties_descriptions.acreage', [101, 150]);
                break;
            case "7":
                $query->whereBetween('properties_descriptions.acreage', [151, 200]);
                break;
            case "8":
                $query->whereBetween('properties_descriptions.acreage', [201, 250]);
                break;
            case "9":
                $query->whereBetween('properties_descriptions.acreage', [251, PHP_INT_MAX]);
                break;
        }
        if ($status != '1') {
            $query->where('properties.status', $status);
        }
        // // switch
        return view('properties.index', [
            'types' => $types,
            'statuses' => $statuses,
            'locations' => $locations,
            'properties' => $query->paginate(6),

        ]);
    }
    public function __construct()
    {
    }

    public function index()
    {
        $properties = Cache::remember('properties_cache', now()->addHours(1), function () {
            return Properties::with(['hasImages', 'hasLocation'])
                ->latest()
                ->paginate(9);
        });
        $types = Properties::distinct()->pluck('type')->toArray();
        $statuses = Properties::distinct()->pluck('status')->toArray();
        $locations = $properties->pluck('hasLocation.district')
            ->filter()
            ->unique()
            ->toArray();

        // return compact('properties', 'types', 'statuses', 'locations');
        return view('properties.index', compact('properties', 'types', 'statuses', 'locations'));
    }


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
            'full_address' => $validatedData['full_address']
        ]);
        Cache::forget('properties_cache');
        return redirect()->route('bat-dong-san.index')->with('success', 'Bạn đã thêm thành công 1 bất động sản');
    }
    public function show($id)
    {
        $property = Properties::findOrFail($id);
        $property->load(['hasImages', 'hasLocation', 'hasDescription']);

        return view('properties.view', compact('property'));
        // return $property;
    }

    public function destroy(Properties $bat_dong_san)
    {
        $bat_dong_san->delete();
        Cache::forget('properties_cache');
        return redirect()->route('bat-dong-san.index')->with('success', 'Bạn đã xóa thành công 1 bất động sản');
    }
    public function edit(Properties $bat_dong_san)
    {
        $properties = $bat_dong_san->load(['hasDescription', 'hasLocation', 'hasImages']);
        return view('properties.update', compact('properties'));
    }
    public function update(CreatePropertiesRequest $request, $id)
    {
        $validatedData = $request->validated();

        $property = Properties::findOrFail($id);

        $property->update([
            'type' => $validatedData['type'],
            'status' => $validatedData['status'],
            'updated_by_id' => Auth::id(),
        ]);


        if ($property->hasDescription) {
            $property->hasDescription()->update([
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
        } else {
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
        }

        if ($request->hasFile('images')) {
            $property->hasImages()->delete();

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('property_images', 'public'); // Lưu vào thư mục public/property_images
                $propertyImage = new PropertyImages([
                    'image_url' => 'property_images/' . basename($imagePath), // Lưu đường dẫn tương đối trong cơ sở dữ liệu
                ]);
                $property->hasImages()->save($propertyImage);
            }
        }


        if ($property->hasLocation) {
            $property->hasLocation()->update([
                'city' => $validatedData['city'],
                'district' => $validatedData['district'],
                'ward' => $validatedData['ward'],
                'street' => $validatedData['street'],
                'full_address' => $validatedData['full_address']

            ]);
        } else {
            $property->hasLocation()->create([
                'city' => $validatedData['city'],
                'district' => $validatedData['district'],
                'ward' => $validatedData['ward'],
                'street' => $validatedData['street'],
                'full_address' => $validatedData['full_address']

            ]);
        }
        Cache::forget('properties_cache');
        return redirect()->route('bat-dong-san.index')->with('success', 'Bạn đã cập nhật thành công bất động sản');
    }
}
