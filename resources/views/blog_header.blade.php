<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/blog">Blogger</a>
        </div>
        <ul class="nav navbar-nav">
            @if(isset($name))
                <li class="active"><a href="/blog">{{$name}}</a></li>
            @else
                <li class="active"><a href="/blog">Home</a></li>
            @endif
        </ul>
    </div>
</nav>
