<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $client =  Client::create([
    //         "nom" => $request->nom,
    //         "prenom" => $request->prenom,
    //         "tel" => $request->tel,
    //         "adresse" => $request->adresse,
    //         "cni" => $request->cni,
    //         "email" => $request->email,
    //         'password' => $request->password
    //     ]);
    //     return response([
    //         "message" => "insertion client réussie",
    //         "data" => $client
    //     ], Response::HTTP_CREATED);
    // }

    
    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
