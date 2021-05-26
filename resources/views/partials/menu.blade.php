<div>
    <ul>
        <div class="left">

            @if(Route::is('product.*') == false && Route::is('category.*') == false)
            <li>
                <a class="logo" href="/">WE FASHION</a>
            </li>
            <li><a href="/soldes">Solde</a></li>
            @foreach($categories as $id => $category)
            <li><a href="{{url('category/' . $id)}}">{{$category}}</a></li>
            @endforeach
            @else
            <li>
                <p class="logo">WE FASHION</p>
            </li>
            <li><a href="{{route('product.index')}}">Produits</a></li>
            {{-- <li><a href="{{route('category.index')}}" >Catégorie</a></li> --}}
            @endif
        </div>
        <div class="right">

            @if(Auth::check())
            @if(Route::is('product.*') == true)
            <li>
                <a href="/">Retour</a>
            </li>
            @endif
            @if($isAdmin)
            @if(Route::is('product.*') == false)
            <li><a href="{{route('product.index')}}">Dashboard</a></li>
            @endif
            @endif
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST">{{csrf_field()}}</form>
            </li>
            @else
            <li><a href="{{route('login')}}">Login</a></li>
            @endif
        </div>
    </ul>
</div>