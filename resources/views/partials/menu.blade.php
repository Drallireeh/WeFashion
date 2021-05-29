<nav>
    <ul>
        <div>
            @if(Route::is('product.*') == false && Route::is('category.*') == false)
            <li>
                <a class="logo" href="/">WE FASHION</a>
            </li>
            <li><a href="/discount">Soldes</a></li>
            @if(count($categories) > 2)
            <li class="dropdown">
                <button class="dropBtn" onclick="displayDropdown()">Catégories <i class="fas fa-angle-down"></i></button>
                <div class="dropdown-content" id="dropdown">
                    @foreach($categories as $id => $category)
                    <a href="{{url('category/' . $id)}}">{{$category}}</a>
                    @endforeach
                </div>
            </li>
            @else
            @foreach($categories as $id => $category)
            <li><a href="{{url('category/' . $id)}}">{{$category}}</a></li>
            @endforeach
            @endif
            @else
            <li>
                <p class="logo">WE FASHION</p>
            </li>
            <li><a href="{{route('product.index')}}">Produits</a></li>
            <li><a href="{{route('category.index')}}">Catégories</a></li>
            @endif
        </div>
        <div>
            @if(Auth::check())
            @if($isAdmin)
            @if(Route::is('product.*') == false && Route::is('category.*') == false)
            <li><a href="{{route('product.index')}}">Dashboard</a></li>
            @else
            <li>
                <a href="/">Retour</a>
            </li>
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
</nav>

<script>
    function displayDropdown(e) {
        document.getElementById("dropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropBtn')) {
            let dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                let openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>