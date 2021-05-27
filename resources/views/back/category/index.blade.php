@extends('layouts.master')

@section('content')
<button><a href="{{route('category.create')}}">Ajouter une catégorie</a></button>

{{$categories->links()}}
@include('back.partials.flash')

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td><a href="{{route('category.edit', $category->id)}}">{{$category->gender}}</a></td>
            <td><a href="{{route('category.edit', $category->id)}}">Update</a></td>
            <td>
                <form class="delete" method="POST" action="{{route('category.destroy', $category->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="delete" >
                </form>
            </td>
        </tr>
        @empty
        <tr>Désolée pour l'instant aucune catégorie n'est disponible</tr>
        @endforelse
    </tbody>
</table>
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