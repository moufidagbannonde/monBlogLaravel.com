<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;


// ICSSEUD
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les articles
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
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
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stocker l'article créé dans la base de données
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        // récupère les données validées
        // Gérer la sauvegarde de l'image (s'il y en a )
        if ($request->hasFile("image")) {
            $path = $request->file('image')
                ->store('image', 'public');
            $validated['image'] = $path;
        }
        $validated['user_id'] = 1;

        // Sinon envoi de l'article dans la base de données
        Article::create($validated);
        // retourne   sur la page des articles
        return redirect('/articles')->with('success', 'Article créé avec succès');

    }

    /**
     * Display the specified resource.
     * Afficher un article spécifique 
     */
    public function show($id)
    {
        $article = Article::where("id", $id)
            ->with('comments.user')
            ->first();
        return view('articles.show', ['article' => $article]);
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
