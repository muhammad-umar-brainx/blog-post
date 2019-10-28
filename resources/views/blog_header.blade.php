<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Blogger</a>
        </div>
        <ul class="nav navbar-nav">

            @if(isset($name))
                <li class="active"><a href="#">{{$name}}</a></li>
            @else
                <li class="active"><a href="#">Home</a></li>
            @endif
            {{--                <li><a href="#">Add</a></li>--}}
            {{--                <li><a href="#">Page 2</a></li>--}}
            {{--                <li><a href="#">Page 3</a></li>--}}
        </ul>
    </div>
</nav>
