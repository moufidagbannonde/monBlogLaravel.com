<h3 class="mt-3">
    Very little is needed to make a happy life. - Marcus Aurelius
</h3>
@extends('layouts.auth')
@section('title', 'Register')
@section('contenu')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Se connecter</h3>
        <form action="/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                     required>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    required>
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <input href="{{route('articles.index')}}" class="btn btn-primary w-100" value="Me connecter" type="submit">
        </form>
        <p class="mt-3">
            Vous n'aviez pas de compte ?
            <a href="{{route('register')}}"> S'inscrire </a>
        </p>
    </div>
</div>

@endsection
