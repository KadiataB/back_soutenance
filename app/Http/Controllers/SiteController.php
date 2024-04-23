<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites=Site::all();
        return response()->json([
          "data"=> [
          "message" => "Voici la liste des sites",
          "sites"=>SiteResource::collection($sites)
          ]
        ], Response::HTTP_OK);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return DB::transaction(function()use($request) {
         $site=Site::create([
            "hote_id"=>$request->hote_id,
            "localisation"=>$request->localisation,
            "prix"=>$request->prix,
            "latitude"=>$request->latitude,
            "longitude"=>$request->longitude,
         ]);


        $site->details()->attach($request->details);
        return response([
            "message"=>"Ajout réussi",
            "data"=>$site
         ], Response::HTTP_CREATED);

    });
}

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}
