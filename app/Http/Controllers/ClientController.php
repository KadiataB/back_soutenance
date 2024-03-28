<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    // public function login(Request $request)
    // {
    // //   $user=User::where(['email'=>$request->email,'password'=>$request->password])->get();
    // //   return $user;
    //     if (!Auth::attempt($request->only("email", "password"))) {

    //         return response()->json([
    //             "success" => "true",
    //             "message" => "Invalid credentials"

    //         ]);
    //     }
    //     $user = Auth::user();
    //     $token = $user->createToken("token")->plainTextToken;

    //     $tok=cookie('myToken',$token);
        
    //     return response([
    //         "token" => $token,
    //         "name" => $user->name,
    //         "role" => $user->role,
    //         "email" => $user->email
           
    //     ])->withCookie($tok);
    // }
    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
