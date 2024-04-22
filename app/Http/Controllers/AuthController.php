<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


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
    public function store(UserRequest $request)
    {
        $user = User::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "num_tel" => $request->num_tel,
            "description" => $request->description,
            "CNI" => $request->CNI,
            "img" => $request->img,
            "email" => $request->email,
            'password' => $request->password
        ]);
        return response([
            "message" => "insertion client réussie",
            "data" => $user
        ], Response::HTTP_CREATED);
    }

    //   $user=User::where(['num_tel'=>$request->num_tel,'password'=>$request->password])->get();
    //     return response([
    //         "prenom"=>$user->prenom,
    //         "message" => "Invalid credentials"
    //   ]);

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("num_tel", "password"))) {
            return response()->json([
                "success" => "true",
                "message" => "Identifiant(s) incorrects"

            ]);
        }
        /** @var User $user */

        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;
        $tok = cookie('myToken', $token);

        
        return response([
            "message" => "Connexion réussie!",
            "token" => $token,
            "nom" => $user->nom,
            "prenom" => $user->prenom,
            "role"=>$user->role->libelle

        ])->withCookie($tok);
    }

    // public function logout(Request $request)
    // {

    //     $tokenDel = Auth::user()->token()->delete();
    //     return response([
    //         "message" => "Deconnexion réussie",
    //     ]);
    // }
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }
        return response()->json(['message' => 'Déconnexion réussie'], 200);
        
    }
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
