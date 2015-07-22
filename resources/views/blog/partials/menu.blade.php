<nav>
    <ul>
        <li><a href="{{url('/')}}">Accueil</a></li>
        <li><a href="#">A Propo</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
        @if(!Auth::guest())
            <li><a href="admin">Dashboard</a></li>
            <li><a href="{{url('auth/logout')}}">Deconnexion</a></li>
        @endif
    </ul>

</nav>