<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use Illuminate\Http\Request;

class MediasController extends Controller
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
        $request->validate([
            'site_id' => 'required|exists:sites,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $imagePath = str_replace('data:image/jpeg;base64,', '', $request->photo_name);
        // $fileName = $request->photo;

        // Storage::disk('public')->put($fileName, base64_decode($imagePath));
        foreach($request->images as $image) {
            $path = str_replace('data:image/jpeg;base64,', '', $image['photo_name']);
            $image = base64_decode($path);


         $media=   Medias::create([
                "path"=>$path,
                "site_id"=>$request->site_id
            ]);
        }
        return response()->json([
            'message'=>'Ajout réussi',
            'data'=>$media
        ]);


    }
    public function ajouterImages(Request $request)
    {
        // Valider la requête pour vous assurer que vous avez reçu les données correctement
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Exemple de validation pour les images
        ]);

        // Parcourir chaque fichier téléchargé et les enregistrer dans la base de données
        foreach ($request->file('images') as $image) {
            $media = new Medias();
            $media->site_id = $request->site_id; // Supposons que vous avez un champ "site_id" dans votre table medias
            $media->path = base64_encode(file_get_contents($image)); // Convertit l'image en base64 et enregistre-la
            $media->save();
        }

        // Faites quelque chose après l'insertion, par exemple, redirigez l'utilisateur ou renvoyez une réponse JSON
        return response()->json(['success' => true, 'message' => 'Images ajoutées avec succès']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Medias $medias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medias $medias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medias $medias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medias $medias)
    {
        //
    }
}
