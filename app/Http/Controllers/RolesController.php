<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $roles = Roles::create($request->all());

        return response()->json($roles, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Roles::find($id);
        if ($role) {
            return response()->json(["message" => "", "data" => $role],200);
        }else{
            return response()->json(null,404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $role = Roles::find($id);
        if ($role) {
            $resp = $role->update($request->all());
            if ($resp) {
                return response()->json(["message"=> "Role updated successfully","data"=> $role],201);
            }else {
                return response()->json(null,500);
            }
        }else{
            return response()->json(null,404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        $roles->delete();
        return response()->json(null, 204);
    }
}
