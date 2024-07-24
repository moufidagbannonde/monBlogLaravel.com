<article class="card mb-3">
    <!-- <p>{{$article["id"]}}</p> -->
    <img src="{{ asset('storage/' . $article->image)}}" alt="" class="card-img-toc">
    <div class="card-body">
        <h2 class="card-title">
            <u>Article {{$article["id"]}}</u> created at
            <span class="badge text-bg-primary">
                 <i>{{ $article->created_at->format('j F Y')}}</i>
            </span> by {{$article->user->name}}<br>
            <a href="/articles/{{$article["id"]}}">{{ $article["title"] }}</a>
        </h2>
        <p class="card-text text-truncate">{{ $article["body"] }}</p>
    </div>
</article>