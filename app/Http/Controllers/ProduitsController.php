<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProduitsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Produits::all());
    }

    public function store(Request $request): JsonResponse
    {
        $produit = Produits::create($request->validate([
            'label_produit' => ['required', 'string', 'max:255'],
            'description_produit' => ['required', 'string'],
            'type_produit' => ['sometimes', 'required', Rule::in(['OEUF', 'POULE', 'DECHET', 'NUTRITION'])],
            'quantite_produit' => ['required', 'integer', 'min:0'],
            'prix_produit' => ['required', 'numeric', 'min:0'],
            'id_user' => ['required', 'integer', 'exists:user,id_user'],
            'id_bloc' => ['required', 'integer', 'exists:blocs,id_bloc'],
        ]))->refresh();

        return response()->json($produit, 201);
    }

    public function show(Produits $produit): JsonResponse
    {
        return response()->json($produit);
    }

    public function update(Request $request, Produits $produit): JsonResponse
    {
        $produit->update($request->validate([
            'label_produit' => ['sometimes', 'required', 'string', 'max:255'],
            'description_produit' => ['sometimes', 'required', 'string'],
            'type_produit' => ['sometimes', 'required', Rule::in(['OEUF', 'POULE', 'DECHET', 'NUTRITION'])],
            'quantite_produit' => ['sometimes', 'required', 'integer', 'min:0'],
            'prix_produit' => ['sometimes', 'required', 'numeric', 'min:0'],
            'id_user' => ['sometimes', 'required', 'integer', 'exists:user,id_user'],
            'id_bloc' => ['sometimes', 'required', 'integer', 'exists:blocs,id_bloc'],
        ]));

        return response()->json($produit->refresh());
    }

    public function destroy(Produits $produit): JsonResponse
    {
        $produit->delete();

        return response()->json(null, 204);
    }
}
