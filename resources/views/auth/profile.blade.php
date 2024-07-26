<div>
    If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius
</div>
<h2 class="card mt-3">
    {{Auth::user()->name}}
</h2>
<form action="{{route('logout')}}">
    @csrf
    <input type="submit" value="Me déconnecter" class="btn btn-primary">
</form>
<!-- <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}">Se déconnecter</a>
</li> -->