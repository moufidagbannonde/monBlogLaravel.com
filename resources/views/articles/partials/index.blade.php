<article class="card mb-3">
    <!-- <p>{{$article["id"]}}</p> -->
    <img src="{{$article["image"]}}" alt="" class="card-img-toc">
    <div class="card-body">
        <h2 class="card-title">
            <a href="/article/{{$article["id"]}}">{{ $article["title"] }}</a>
        </h2>
        <p class="card-text text-truncate">{{ $article["body"] }}</p>
    </div>
</article>