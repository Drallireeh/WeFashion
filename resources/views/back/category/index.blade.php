@extends('layouts.master')

@section('content')
<div class="admin-ctn">
    <h1>Administration des catégories</h1>

    <div class='btn-add-ctn'>
        <a class="btn btn-success add-product" href="{{route('category.create')}}">Ajouter une catégorie</a>
    </div>
    
    @include('back.partials.flash')
    
    <div class="product-admin-ctn">
        <div class="back-titles">
            <h2>Nom</h2>
            <h2>Modification</h2>
            <h2>Suppression</h2>
        </div>
        @forelse($categories as $category)
            <div class="lines">
                <div><a href="{{route('category.edit', $category->id)}}">{{$category->gender}}</a></div>
                <div class="btn-ctn"><a class="btn btn-primary" href="{{route('category.edit', $category->id)}}">Modifier</a></div>
                <div class="btn-ctn">
                    <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="lines no-result">Désolée pour l'instant aucune catégorie n'est disponible</div>
            @endforelse
    </div>
    
    <div class="paginate-ctn">
        {{$categories->links()}}
    </div>
</div>

@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

<style>
    tr>th,
    tr>td {
        padding: 10px 20px;
    }
</style>