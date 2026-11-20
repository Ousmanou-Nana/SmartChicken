<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Users::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom_user' => ['required', 'string', 'max:128'],
            'prenom_user' => ['nullable', 'string', 'max:128'],
            'email_user' => ['required', 'email', 'max:50', 'unique:user,email_user'],
            'phone_user' => ['required', 'string', 'max:12'],
            'sexe' => ['sometimes', 'required', Rule::in(['M', 'F'])],
            'login_user' => ['required', 'string', 'max:50', 'unique:user,login_user'],
            'statut_user' => ['sometimes', 'required', Rule::in(['ACTIF', 'SUSPENDU'])],
            'password_user' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        return response()->json(Users::create($validated)->refresh(), 201);
    }

    public function show(Users $user): JsonResponse
    {
        return response()->json($user);
    }

    public function update(Request $request, Users $user): JsonResponse
    {
        $validated = $request->validate([
            'nom_user' => ['sometimes', 'required', 'string', 'max:128'],
            'prenom_user' => ['sometimes', 'nullable', 'string', 'max:128'],
            'email_user' => ['sometimes', 'required', 'email', 'max:50', Rule::unique('user', 'email_user')->ignore($user->getKey(), 'id_user')],
            'phone_user' => ['sometimes', 'required', 'string', 'max:12'],
            'sexe' => ['sometimes', 'required', Rule::in(['M', 'F'])],
            'login_user' => ['sometimes', 'required', 'string', 'max:50', Rule::unique('user', 'login_user')->ignore($user->getKey(), 'id_user')],
            'statut_user' => ['sometimes', 'required', Rule::in(['ACTIF', 'SUSPENDU'])],
            'password_user' => ['sometimes', 'required', 'string', 'min:8', 'max:255'],
        ]);

        $user->update($validated);

        return response()->json($user->refresh());
    }

    public function destroy(Users $user): JsonResponse
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
