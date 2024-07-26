@extends('layouts.master')
@section('titre')
Créer un article
@endsection
@section('contenu')
<h2 class="mt-3">
    Happiness is not something readymade. It comes from your own actions. - Dalai Lama
</h2><br>
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::id() }}">
    {{-- Cross Site Resource Forgery --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group mb-3">
        <label for="title">Titre:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
            placeholder="Entrez un titre" name="title">
    </div>
    @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <div class="form-group mb-3">
        <label for="body">Ajouter le contenu:</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"
            placeholder="Entrez le contenu de l'article" {{old('body')}}></textarea>
    </div>
    @error('body')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <div class="form-group mb-3">
        <label for="author" class="form-label mt-4">Auteur</label>
        <input type="text" name="author" class="form-control" id="">
        <div class="text-danger">
            @error('author')
                {{$message}}
            @enderror
        </div>
    </div>
    {{--<div class="form-group mb-3">
        <label for="image">Ajouter une image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="img" name="image">
    </div>
    @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror--}}
    <button type="submit" class="btn btn-primary">Ajouter mon article</button>
</form>
@endsection