<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">AbeomeHD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="dropdown">
                    <a href="/projects" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Overview<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($projects as $project)
                            <li><a href="{{action('ProjectController@show', [$project->id])}}">{{$project->name}}</a></li>
                        @endforeach
                        <li role="separator" class="divider"></li>
                        <li><a href="{{action('MouseController@index')}}">Mice</a></li>
                        <li><a href="{{action('PlatesController@index')}}">Plates</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::User())
                    <li><a href="#">{{$user->name}}</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                @else
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/auth/register">Register</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>