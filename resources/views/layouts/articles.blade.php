@extends('layouts.master')

@section('title')
Articles
@endsection

@section('contenu')
<h1>Articles</h1>
<p>
    <a href="/article/create" class="btn btn-primary">
        Créer un article
    </a>
</p>
{{-- <div>
    The best way to take care of the future is to take care of the present moment. Thich Nhat Hanh
</div> --}}
@each('articles.partials.index', $articles, 'article', 'articles.partials.no-articles')
{{-- @forelse ($articles as $index => $article)
@include('articles.index')
@empty
@include('articles.no-articles')
@endforelse
<pre>{{ dd($articles) }}</pre> --}}
@endsection