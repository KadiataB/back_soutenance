<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Client;
use App\Models\Hote;
use App\Models\Reservation;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reversations=Reservation::all();
        return response([
            "message" => "Voici la liste des réservations",
            "data"=>$reversations
        ], Response::HTTP_OK);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {

        $site= Site::where("id",$request->site_id)->first();
        $existingReservation = Reservation::where('site_id', $site->id)
        ->where('date_debut','<',$request->date_fin)
        ->where('date_fin','>',$request->date_debut)
        ->first();
        // ->where(function ($query) use ($request) {
        //     $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
        //         ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
        //         ->orWhere(function ($query) use ($request) {
        //             $query->where('date_debut', '<=', $request->date_debut)
        //                 ->where('date_fin', '>=', $request->date_fin);
        //         });
        // })->exists();

        if ($existingReservation) {
            return response([
                "message" => "Ce site est déjà réservé pendant la période spécifiée.",

            ], Response::HTTP_BAD_REQUEST);
        }

        $date_debut=Carbon::parse($request->date_debut);
        $date_fin=Carbon::parse($request->date_fin);
        $date_actuelle=Carbon::now();

        $duree= $date_fin->diffInDays($date_debut);

        $prix_total= $duree * $site->prix;

        $user=User::where('id', $request->user_id)->first();
        $client=$user->role;
        if($client!= "client") {
            return response([
                "message" => "Ce client n'existe pas"
            ], Response::HTTP_BAD_REQUEST);
        }
        $hote=User::where('id', $request->user_id)->first();

        if($hote!= "hote") {
            return response([
                "message" => "Ce hote n'existe pas"
            ], Response::HTTP_BAD_REQUEST);
        }

        if(!($request->date_debut < $date_actuelle && $request->date_fin < $date_actuelle)) {
            $reservation =Reservation::create([
               "date_debut"=>$request->date_debut,
               "date_fin"=>$request->date_fin,
               "user_id"=>$request->user_id,
               "nbre_voyageurs"=>$request->nbre_voyageurs,
               "prix_total"=>$prix_total,
               "site_id"=>$site->id
            ]);
            return response([
               "message" => "Réservation réussie",
               "data"=>$reservation
           ], Response::HTTP_CREATED);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {

    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
