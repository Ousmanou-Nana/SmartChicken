<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_user' => 'required|string|max:255',
            'prenom_user' => 'required|string|max:255',
            'email_user' => 'required|email',
            'phone_user' => 'required|string|max:20',
            'sexe' => 'required|string',
            'login_user' => 'required|string',
            'statut_user' => 'required|string',
            'password_user' => 'required|string|min:8',
        ]);

        $validated['password_user'] = bcrypt($validated['password_user']);

        $user = Users::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Users::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom_user' => 'sometimes|required|string|max:255',
            'prenom_user' => 'sometimes|required|string|max:255',
            'email_user' => 'sometimes|required|email',
            'phone_user' => 'sometimes|required|string|max:20',
            'sexe' => 'sometimes|required|string',
            'login_user' => 'sometimes|required|string',
            'statut_user' => 'sometimes|required|string',
            'password_user' => 'sometimes|required|string|min:8',
        ]);
        $user = Users::find($id);

        if ($user) {
            $resp = $user->update($validated);
            if ($resp) {
                return response()->json(['message' => 'User updated successfully']);
            } else {
                return response()->json(['message' => 'Failed to update user'], 500);
            }
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Users::find($id);

        if ($user) {
            $resp = $user->delete();
            if ($resp) {
                return response()->json(['message' => 'User deleted successfully']);
            } else {
                return response()->json(['message' => 'Failed to delete user'], 500);
            }
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
