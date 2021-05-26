<p style="margin: 0;">WeFashion</p>
<ul style="display: flex; list-style: none; margin: 0;width: 100%; justify-content: space-between">
    <div style="display: flex">
        <li><a href="/" style="color: white">Accueil</a></li>
    </div>
    @if($isAdmin)
        <li><a href="{{route('book.index')}}">Dashboard</a></li>
    @endif
    @if(Auth::check())
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
    @else
    <li><a href="{{route('login')}}">Login</a></li>
    @endif
</ul>