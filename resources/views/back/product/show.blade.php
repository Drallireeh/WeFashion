@extends('layouts.master')

@section('content')
<div>
    <h1>Title : {{$product->title}}</h1>
    @if(!empty($product->picture))
    <div>
        <h2>Image</h2>
        <img src="{{asset('images/'.$product->picture->link)}}" alt="cover product">
    </div>
    @endif
    Genre : {{$product->genre->name}}
    Date de création : {{$product->created_at}}
    Date de mise à jour : {{$product->updated_at}}
    Status : TODO
    <h2>Les auteurs : </h2>
    <ul>
        <li>Nombre d'auteurs : {{count($product->authors)}}</li>
        @forelse($product->authors as $author)
        <li>{{$author->name}}</li>
        @empty
        <li>Aucun auteur</li>
        @endforelse
    </ul>
</div>
@endsection