@extends('layouts.master')
@section('titre')
Créer un article
@endsection
@section('contenu')

<h2>
    Be present above all else. -Naval Ravikant
</h2><br>
<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
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
        <label for="title">Nouveau titre:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
            placeholder="Entrez un titre" name="title" value="{{old('title', $article->title)}}">
    </div>
    @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <div class="form-group mb-3">
        <label for="body">Nouveau contenu:</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"
            placeholder="Entrez le contenu de l'article">{{old('body', $article->body)}}</textarea>
    </div>
    @error('body')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror

    <div class="form-group mb-3">
        <label for="image">Ajouter une nouvelle image</label>
        @if ($article->image)
            <img src="{{asset('storage/' . $article->image)}}" alt="image de l'article" class="img-thumbnail mb-3"
                width="200">

        @endif
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="img" name="image">
    </div>
    @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    <button type="submit" class="btn btn-primary">Sauvegarder mes modifications</button>
</form>
@endsection