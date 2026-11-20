<?php

namespace App\Http\Controllers;

use App\Models\Blocs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlocsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Blocs::all());
    }

    public function store(Request $request): JsonResponse
    {
        $bloc = Blocs::create($request->validate([
            'label_bloc' => ['required', 'string', 'max:255'],
        ]));

        return response()->json($bloc, 201);
    }

    public function show(Blocs $bloc): JsonResponse
    {
        return response()->json($bloc);
    }

    public function update(Request $request, Blocs $bloc): JsonResponse
    {
        $bloc->update($request->validate([
            'label_bloc' => ['sometimes', 'required', 'string', 'max:255'],
        ]));

        return response()->json($bloc->refresh());
    }

    public function destroy(Blocs $bloc): JsonResponse
    {
        $bloc->delete();

        return response()->json(null, 204);
    }
}
