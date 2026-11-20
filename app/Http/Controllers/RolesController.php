<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Roles::all());
    }

    public function store(Request $request): JsonResponse
    {
        $role = Roles::create($request->validate([
            'label' => ['required', 'string', 'max:255'],
        ]));

        return response()->json($role, 201);
    }

    public function show(Roles $role): JsonResponse
    {
        return response()->json($role);
    }

    public function update(Request $request, Roles $role): JsonResponse
    {
        $role->update($request->validate([
            'label' => ['sometimes', 'required', 'string', 'max:255'],
        ]));

        return response()->json($role->refresh());
    }

    public function destroy(Roles $role): JsonResponse
    {
        $role->delete();

        return response()->json(null, 204);
    }
}
