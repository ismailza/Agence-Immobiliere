<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index (SearchPropertiesRequest $request) {
        $query = Property::query();
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.index', [
            'properties' => $query->Available()->Recent()->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show (string $slug, Property $property) {
        $propertySlug = $property->getSlug();
        if ($slug != $propertySlug) {
            return to_route('property.show', [
                'slug' => $propertySlug,
                'property' => $property
            ]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }
    
    public function contact (Property $property, PropertyContactRequest $request) {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', "Votre demande de contact a bien été envoyée");
    }

}
