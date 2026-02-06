<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\TypeCuisine;
use App\Models\Plat;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create()
    {
        $typeCuisines = TypeCuisine::all();
        $plats = Plat::all();
        return view('user.createRestaurant', compact('typeCuisines', 'plats'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'typeCuisine_id' => 'required|exists:types_cuisine,id',
            'localisation' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'status' => 'nullable|in:ACTIVE,INACTIVE',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|url',
            'horaires' => 'nullable|array',
            'horaires.*.jourSemaine' => 'required|string',
            'horaires.*.heureOuverture' => 'required|date_format:H:i',
            'horaires.*.heureFermeture' => 'required|date_format:H:i',
            'plats' => 'nullable|array',
            'plats.*' => 'exists:plats,id',
        ]);

        $restaurant = Restaurant::create([
            'user_id' => auth()->id(),
            'nom' => $validated['nom'],
            'typeCuisine_id' => $validated['typeCuisine_id'],
            'localisation' => $validated['localisation'],
            'capacite' => $validated['capacite'],
            'status' => $validated['status'] ?? 'ACTIVE',
        ]);

        if (!empty($validated['photos'])) {
            foreach ($validated['photos'] as $photo) {
                if (!empty($photo)) {
                    $restaurant->photos()->create(['contenu' => $photo]);
                }
            }
        }

        if (!empty($validated['horaires'])) {
            foreach ($validated['horaires'] as $horaire) {
                $restaurant->horaires()->create($horaire);
            }
        }
        if (!empty($validated['plats'])) {
            $menu = $restaurant->menus()->create([]);
            
            $selectedPlats = Plat::whereIn('id', $validated['plats'])->get();
            foreach ($selectedPlats as $plat) {
                $menu->plats()->create([
                    'contenu' => $plat->contenu,
                    'prix' => $plat->prix,
                ]);
            }
        }

        return redirect()->route('myrestaurants')->with('success', 'Restaurant créé avec succès!');
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant->load(['photos', 'typeCuisine', 'user', 'menus.plats', 'horaires']);
        return view('user.restaurant', compact('restaurant'));
    }


    public function owner()
    {
        $owner_id = auth()->user()->id;
        $restaurants = Restaurant::with(['menus.plats', 'photos', 'horaires', 'typeCuisine'])
                        ->where('user_id', '=', $owner_id)
                        ->get();
        return view('user.myrestaurants', compact('restaurants'));
    }

    public function edit(Restaurant $restaurant)
    {
        $restaurant->load(['photos', 'typeCuisine', 'user', 'menus.plats', 'horaires']);
        return view('user.editRestaurant', compact('restaurant'));
    }
}
