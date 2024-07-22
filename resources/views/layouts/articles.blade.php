@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('contenu')
    <h1>Articles</h1>
    {{-- <div>
     The best way to take care of the future is to take care of the present moment. Thich Nhat Hanh
    </div> --}}
 @each('articles.index', $articles, 'article', 'articles.no-articles') 
    {{-- @forelse ($articles as $index => $article)
        @include('articles.index')
    @empty
       @include('articles.no-articles')
    @endforelse 
 <!-- <pre>{{ dd($articles) }}</pre>  --}}
@endsection