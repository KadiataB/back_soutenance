<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Medias;
use Illuminate\Http\Request;
use App\Http\Resources\mediasResource;
use Symfony\Component\HttpFoundation\Response;

class MediasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias=Medias::all();

        return response()->json([
          "data"=> [
          "message" => "Voici la liste des medias",
          "medias"=>mediasResource::collection($medias)
          ]
        ], Response::HTTP_OK);
    }

    public function getMediasBySiteId(Request $request, $siteId){
        $site = Site::find($siteId);

        if (!$site) {
            return response()->json(['message' => 'Site non trouvé'], 404);
        }

        // Récupérer tous les médias associés à ce site
        $medias = Medias::where('site_id', $siteId)->get();

        return response()->json(['message' => 'Liste des médias du site récupérée avec succès', 'data' => $medias], 200);
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
   // Assurez-vous d'importer le modèle Medias en haut de votre fichier si ce n'est pas déjà fait


public function store(Request $request)
{
    $request->validate([
            'site_id' => 'required|exists:sites,id',
            // 'path' => 'required|array|min:1',
            'path' => 'required|array|min:1',
        ]);
    

        $paths = $request->path; // Récupérer le tableau de chemins depuis la requête
        $createdMedias = []; // Initialiser un tableau pour stocker les nouveaux médias créés
        
        foreach ($paths as $path) {
            $media = Medias::create([
                'site_id' => $request->site_id,
                'path' => $path
            ]);
        
            $createdMedias[] = $media; // Ajouter le média créé au tableau
        }
        
        return response()->json([
            'message' => 'Ajout réussi',
            'data' => $createdMedias 
        ]);
        
    // $request->validate([
    //     'site_id' => 'required|exists:sites,id',
    //     // 'path.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    // ]);

    // $medias = []; // Initialisez l'array $medias

    // foreach($request->path as $image) {
    //     return $image;
    //     // Traitement du chemin de l'image (s'il y a lieu)
    //     $path = str_replace('data:image/jpeg;base64,', '', $image['photo_name']);
    //     $image = base64_decode($path);
    //     // Création d'une nouvelle instance de Medias avec les valeurs à insérer
    //     $media = new Medias([
    //         "path" => $path,
    //         "site_id" => $request->site_id
    //     ]);

    //     // Sauvegarde de l'instance dans la base de données
    //     $media->save();

    //     // Ajoutez le média créé à l'array $medias
    //     $medias[] = $media;
    // }

    // return response()->json([
    //     'message' => 'Ajout réussi',
    //     'data' => $medias // Retournez l'array $medias contenant tous les médias créés
    // ]);
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
