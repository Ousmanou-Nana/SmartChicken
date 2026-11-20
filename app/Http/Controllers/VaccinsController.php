<?php

namespace App\Http\Controllers;

use App\Models\Vaccins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VaccinsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Vaccins::all());
    }

    public function store(Request $request): JsonResponse
    {
        $vaccin = Vaccins::create($request->validate([
            'label_vaccin' => ['required', 'string', 'max:255'],
            'prix_vaccin' => ['required', 'integer', 'min:0'],
        ]));

        return response()->json($vaccin, 201);
    }

    public function show(Vaccins $vaccin): JsonResponse
    {
        return response()->json($vaccin);
    }

    public function update(Request $request, Vaccins $vaccin): JsonResponse
    {
        $vaccin->update($request->validate([
            'label_vaccin' => ['sometimes', 'required', 'string', 'max:255'],
            'prix_vaccin' => ['sometimes', 'required', 'integer', 'min:0'],
        ]));

        return response()->json($vaccin->refresh());
    }

    public function destroy(Vaccins $vaccin): JsonResponse
    {
        $vaccin->delete();

        return response()->json(null, 204);
    }
}
