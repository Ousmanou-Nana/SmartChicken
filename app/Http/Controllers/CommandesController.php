<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommandesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Commandes::all());
    }

    public function store(Request $request): JsonResponse
    {
        $commande = Commandes::create($request->validate([
            'date_commande' => ['required', 'date'],
            'total_commande' => ['required', 'integer', 'min:0'],
            'statut_commande' => ['sometimes', 'required', Rule::in(['EN_COURS', 'LIVREE', 'ANNULEE'])],
            'id_user' => ['required', 'integer', 'exists:user,id_user'],
        ]))->refresh();

        return response()->json($commande, 201);
    }

    public function show(Commandes $commande): JsonResponse
    {
        return response()->json($commande);
    }

    public function update(Request $request, Commandes $commande): JsonResponse
    {
        $commande->update($request->validate([
            'date_commande' => ['sometimes', 'required', 'date'],
            'total_commande' => ['sometimes', 'required', 'integer', 'min:0'],
            'statut_commande' => ['sometimes', 'required', Rule::in(['EN_COURS', 'LIVREE', 'ANNULEE'])],
            'id_user' => ['sometimes', 'required', 'integer', 'exists:user,id_user'],
        ]));

        return response()->json($commande->refresh());
    }

    public function destroy(Commandes $commande): JsonResponse
    {
        $commande->delete();

        return response()->json(null, 204);
    }
}
