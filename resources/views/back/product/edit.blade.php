@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter un Livre : </h1>
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name" placeholder="Titre du livre">
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <textarea type="text" name="price">{{$product->price}}</textarea>
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
            </div>
            <div>
                <label for="category">Catégorie :</label>
                <select id="category" name="category_id">
                    <option value="0" {{ is_null($product->category_id) ? 'selected' : '' }}>Pas de catégorie</option>
                    @foreach($categories as $id => $name)
                    <option {{ $product->category_id==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" @if($product->published_status)=='published' ) checked @endif name="status" value="published" checked> publier<br>
            <input type="radio" @if($product->published_status)=='unpublished' ) checked @endif name="status" value="unpublished"> dépublier<br>
            @if($errors->has('status')) <span class="error">{{$errors->first('status')}}</span>@endif
        </div>
        <div class="input-file">
            <h2>File :</h2>
            <input class="file" type="file" name="picture" >
            @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
        </div>
        @if($product->picture)
        <div class="form-group">
        <img width="300" src="{{url('images', $product->picture->link)}}" alt="image du produit">
        </div>
        @endif
    </div> <br>
    <button class="btn btn-primary" type="submit">Modifier le produit</button>
    </form>
</div>
@endsection