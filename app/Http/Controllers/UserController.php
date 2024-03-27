<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return response([
            "message" => "Voici la liste des users",
            "data"=>$users
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated_data = $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'num_tel' => 'required|string|unique:users|max:255',
            'CNI' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'role' => 'required|in:hote,client,admin',
            'password' => 'required|string|min:8',
            'description' => 'string'

        ]);

        $validated_data['password'] = Hash::make($validated_data['password']);

        $user =User::create($validated_data);

        return response([
            "message" => "Ajout réussie",
            "data"=>$user
        ], Response::HTTP_CREATED);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
