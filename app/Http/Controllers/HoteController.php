<?php

namespace App\Http\Controllers;

use App\Models\Hote;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hote =  Hote::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            'cni' => $request->cni,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response([
            "message" => "insertion hote réussie",
            "data" => $hote
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hote $hote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hote $hote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hote $hote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hote $hote)
    {
        //
    }
}
