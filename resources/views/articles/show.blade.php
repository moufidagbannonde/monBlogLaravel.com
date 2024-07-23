@extends('layouts.master')
<!-- <div>
    The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk
</div> -->
@section('contenu')
<article class="card mb-3">
    <img src="{{$article["image"]}}" alt="" class="card-img-toc">
    <div class="card-body">
        <h1><u>Article {{$article["id"]}} </u>du {{$article["created_at"]}} créé par {{$article->user->name}}</h1>
        <h2 class="card-title mb-3 mt-3">
            <i>{{ $article["title"] }}</i>
        </h2>
        <p class="card-text">{{ $article["body"] }}</p>
    </div>
</article>
<section class=" mb-5">
    <div class="form-floating">

        <h2>
            <label for="comment-input">Commentaires</label>
        </h2>
        <form action="">
            <textarea name="comment" id="comment-input" class="form-control" placeholder="Commentez cet article">
            </textarea>
            <button type="submit" class="mt-3 btn btn-primary">Envoyer</button>
            <p>{{ $article["name"]}}</p>
        </form>
        <div>
            @forelse($article->comments as $comment)
                <div class="mt-2">
                    <small class="mt-1">{{$comment["comment"]}}</small>
                    <p>
                         <span class="badge text-primary">
                            {{$comment->user->name}}
                        </span>
                        <span class="badge text-bg-secondary">
                           commented  <i>{{ $comment->created_at->diffForHumans()  }}</i>
                        </span>
                    </p>
                </div>
            @empty
                <p>Aucun commentaire trouvé</p>
            @endforelse
        </div>
    </div>
</section>
@endsection