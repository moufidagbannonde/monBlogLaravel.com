<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;


// ICSSEUD
class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     * Affiche toutes les articles
     */
    public function index()
    {
        Auth::user()->name;
        $articles = Article::latest()->paginate(1);
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
        // $validated['user_id'] = 1;

        // Sinon envoi de l'article dans la base de données
        Article::create($validated);
        // retourne   sur la page des articles
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès');

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
        // $validated = $request->validated();
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     * Modifier un article spécifique dans la base de données
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // Les données validéés sont déjà disponibles via le UpdateArticle
        $validated = $request->validated();
        // gestion de l'image 
        if ($request->hasFile("image")) { // si on a une image
            // supprimer l'ancienne image si elle existe
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            // stocker la nouvelle image à la place  de l'ancienne
            $path = $request->file('image')
                ->store('images', 'public');
            $validated['image'] = $path;
        } else {
            // garder l'image existante 
            $validated['image'] = $article->image;
            // si aucune nouvelle image n'est téléchargée
        }
        // mise à jour de l'article
        $article->update($validated);
        // redirection avec un message de succès
        return redirect()->route('articles.show', $article->id)->with('success', 'Article modifié avec succès');

        // $article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer  un article spécifique dans la base de données
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        // supprimer l'article de la base de données
        $article->delete();
        // rediriger avec un message de succès
        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé avec succès');
    }
}
