@extends('layouts.master')
<!-- @section('title')
Articles
@endsection -->
@section('contenu')
    <!-- <h2>Articles</h2>
    <div>
        The best way to take care of the future is to take care of the present moment. Thich Nhat Hanh
    </div> -->
    @if ($articles)
        @foreach ($articles as $index => $article)
            <article>
                <h2>{{ $article["title"] }}</h2>
                <p>{{ $article["body"] }}</p>
            </article>
        @endforeach
        @else
        <p>Aucun article trouvé 😥</p>
    @endif
<!-- <pre>{{ dd($articles) }}</pre> -->
@endsection