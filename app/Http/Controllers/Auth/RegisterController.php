<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        // retour de la vue du formulaire d'inscription 
        //  se toruvant dans le fichier register.blade.php dans le dossier auth
        return view("auth.register");
    }
    // protected function validator(array $data)
    // {
    //     $this->validated($data, [
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'name' => 'required|string',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     */
    
    public function create(RegisterRequest $request)
    {
        // validation des informations d'inscription de l'utilisateur
        $validated = $request->validated();
        // création d'un utilisateur ayant un nom, un email et un mot de passe crypté
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $user = User::where('email', $request['email'])->firstOrFail();
        // connexion de l'utilisateur automatiquement après la saisie des informations validées
        Auth::login($user);
        // affichage d'un message de succès
        session()->flash('success', 'Bienvenu(e) dans votre compte');
        // redirection vers la page de l'ensemble des articles
        return redirect('/articles');
        // public function store(RegisterRequest $request){
        //     // récupère les données déjà validées par le formulaire
        //     $validated = $request->validated();

        //    // création du nouvel utilisateur
        //     // User::create([
        //     //     "name"=> $validated["name"],
        //     //     "email"=> $validated["email"],
        //     //     "password"=> bcrypt($validated["password"]),
        //     // ]);
        //     User::create($validated);
        //    // connexion immédiate de l'utilisateur
        //    $user = User::where('email', $validated["email"])->firstOrFail();
        //    Auth::login($user);
        // //    dd($validated);
        //     // redirection de l'utilisateur sur la page des articles
        //    return redirect()->route('articles.index');
    }
}
