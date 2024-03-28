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
