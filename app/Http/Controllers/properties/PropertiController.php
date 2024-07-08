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
use Illuminate\Support\Facades\Http;

class PropertiController extends Controller
    {
    public function __construct()
    {
    }

    public function index()
    {
        // $properties = Cache::remember('properties_cache', now()->addHours(1), function () {
        //     return Properties::with(['hasImages', 'hasLocation'])
        //         ->latest()
        //         ->paginate(9);
        // });
        $properties = Properties::with(['hasImages', 'hasLocation'])
            ->latest()
            ->paginate(9);
        $types = Properties::distinct()->pluck('type')->toArray();
        $statuses = Properties::distinct()->pluck('status')->toArray();
        $locations = Location::pluck('district')
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