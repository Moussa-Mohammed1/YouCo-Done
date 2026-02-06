<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $userRestaurant = [];
        if (auth()->user()->hasRole('restaurant_owner')) {
            $userRestaurant = Restaurant::with('photos', 'typeCuisine', 'menus', 'horaires')
                ->where('user_id', '=', auth()->user()->id)
                ->get();
        }

        $restaurants = Restaurant::with('photos', 'typeCuisine', 'menus', 'horaires')
            ->withExists(['favoris as isFavoris' => function ($q) {
                $q->where('user_id', auth()->id());
            }]);

        if ($request->filled('query')) {
            $query = $request->input('query');
            $restaurants->where(function ($q) use ($query) {
                $q->where('nom', 'iLIKE', "%{$query}%")
                  ->orWhere('localisation', 'iLIKE', "%{$query}%")
                  ->orWhereHas('typeCuisine', function ($q) use ($query) {
                      $q->where('nom', 'iLIKE', "%{$query}%");
                  });
            });
        }

        if ($request->filled('horaire')) {
            $horaire = $request->input('horaire');
            $heureOuverture = explode('-', $horaire)[0] . ':00';
            $heureFermeture = explode('-', $horaire)[1] . ':00';

            $restaurants->whereHas('horaires', function ($q) use ($heureOuverture, $heureFermeture) {
                $q->whereRaw('"heureOuverture"::time <= ?::time', [$heureOuverture])
                  ->whereRaw('"heureFermeture"::time >= ?::time', [$heureFermeture]);
            });
        }

        $restaurants = $restaurants->paginate(8);

        return view('user.home', compact('restaurants', 'userRestaurant'));
    }
}
