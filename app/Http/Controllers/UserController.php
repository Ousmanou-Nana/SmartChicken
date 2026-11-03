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
        $user = Users::create($request->all());
        if ($user) {
            return response()->json(['message' => 'User created successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to create user'], 500);
        }

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
        $user = Users::find($id);

        if ($user) {
            $resp = $user->update($request->all());
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
