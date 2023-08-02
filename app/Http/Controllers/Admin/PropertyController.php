<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PictureFormRequest;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::Recent()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'sold' => false
        ]);
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request, PictureFormRequest $pictureRequest)
    {
        $propertyData = $request->validated();
        $pictureData = $pictureRequest->validated('pictures');
        $property = Property::create($propertyData);
        $property->options()->sync($request->validated('options'));
        $this->processPictures($property, $pictureData);
        return redirect()->route('admin.property.index')->with('success', "Le bien est ajouté avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, PictureFormRequest $pictureRequest, Property $property)
    {
        $propertyData = $request->validated();
        $pictureData = $pictureRequest->validated('pictures');
        $property->update($propertyData);
        $property->options()->sync($request->validated('options'));
        $this->processPictures($property, $pictureData);
        return to_route('admin.property.index')->with('success', "Le bien est modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $pictures = $property->pictures()->get();
        foreach ($pictures as $picture) {
            Storage::disk('public')->delete($picture->path);
        }
        $property->delete();
        return to_route('admin.property.index')->with('success', "Le bien est supprimé avec succès");
    }

    private function processPictures(Property $property, $picturesData)
    {
        if ($picturesData) {
            foreach ($picturesData as $picture) {
                $picturePath = $picture->store('images/properties', 'public');
                $property->pictures()->create([
                    'path' => $picturePath,
                ]);
            }
        }
    }


}
