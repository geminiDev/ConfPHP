<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('admin/')}}">Admin ConfPHP</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="{{url('/admin')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li class="dropdown"><a href="/"><i class="fa fa-fw fa-chevron-circle-left"></i> Retour au site</a></li>
        <li class="dropdown"><a href="{{url('auth/logout')}}">Deconnexion</a></li>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{url('/post/create')}}"><i class="fa fa-fw fa-plus"></i> Ajouter une conférence</a>
            </li>
            <li>
                <a href="{{url('admin/')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('comment/')}}"><i class="fa fa-fw fa-comment-o"></i> Commentaires</a>
            </li>
        </ul>
    </div>
</nav>

