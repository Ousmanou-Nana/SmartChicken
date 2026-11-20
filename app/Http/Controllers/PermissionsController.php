<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Permissions::all());
    }

    public function store(Request $request): JsonResponse
    {
        $permission = Permissions::create($request->validate([
            'label_permission' => ['required', 'string', 'max:255'],
        ]));

        return response()->json($permission, 201);
    }

    public function show(Permissions $permission): JsonResponse
    {
        return response()->json($permission);
    }

    public function update(Request $request, Permissions $permission): JsonResponse
    {
        $permission->update($request->validate([
            'label_permission' => ['sometimes', 'required', 'string', 'max:255'],
        ]));

        return response()->json($permission->refresh());
    }

    public function destroy(Permissions $permission): JsonResponse
    {
        $permission->delete();

        return response()->json(null, 204);
    }
}
