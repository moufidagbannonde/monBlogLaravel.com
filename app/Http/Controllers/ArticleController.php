<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


// ICSSEUD
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les articles
     */
    public function index()
    {
        $articles = [
            [
                "title" => "Titre article 1",
                "body" => "Contenu de l'article 1"
            ],
            [
                "title" => "Titre article 2",
                "body" => "Contenu de l'article 2"
            ],
            [
                "title" => "Titre article 3",
                "body" => "Contenu de l'article 3"
            ]
        ];
        return view(
            'layouts.articles', 
            ['articles' => $articles]
        );
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un article
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Stocker l'article créé dans la base de données
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Afficher un article spécifique 
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Afficher le formulaire pour la modification d'un article spécifique
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Modifier un article spécifique dans la base de données
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer  un article spécifique dans la base de données
     */
    public function destroy(Article $article)
    {
        //
    }
}
