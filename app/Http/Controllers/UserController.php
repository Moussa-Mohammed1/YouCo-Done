<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getById($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json([
                'success' => false,
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function getByEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json([
                'success' => false,
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:user,restaurant_owner,admin'
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json([
                'success' => false,
            ], 404);
        }

        
        $user->syncRoles([$request->role]);

       
        $roleNames = [
            'client' => 'Client',
            'restaurant_owner' => 'Restaurateur',
            'admin' => 'Administrateur'
        ];

        return response()->json([
            'success' => true,
        ], 200);
    }
}
