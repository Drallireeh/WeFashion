@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Modifier un produit : </h1>
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name" placeholder="Nom du produit">
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <textarea type="text" name="price">{{$product->price}}</textarea>
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea type="text" name="description">{{$product->description}}</textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
            </div>
            <div>
                <label for="category">Catégorie :</label>
                <select id="category" name="category_id">
                    <option value="0" {{ is_null($product->category_id) ? 'selected' : '' }}>Pas de catégorie</option>
                    @foreach($categories as $id => $gender)
                    <option {{ $product->category_id==$id? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="size">Taille :</label>
                <select id="size" name="size">
                    <option @if($product->size == 'XS') selected @endif value="XS">XS</option>
                    <option @if($product->size == 'S') selected @endif value="S">S</option>
                    <option @if($product->size == 'M') selected @endif value="M">M</option>
                    <option @if($product->size == 'L') selected @endif value="L">L</option>
                    <option @if($product->size == 'XL') selected @endif value="XL">XL</option>
                </select>
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" {{$product->published_state == 1 ? 'checked' : ''}}  name="published_state" value="1"> Publié<br>
            <input type="radio" {{$product->published_state == 0 ? 'checked' : ''}}  name="published_state" value="0"> Non publié<br>
            @if($errors->has('published_state')) <span class="error">{{$errors->first('published_state')}}</span>@endif
        </div>
        <div>
            <h2>Status de l'offre</h2>
            <input type="radio" {{$product->discount == 1 ? 'checked' : ''}} name="discount" value="1"> Soldé<br>
            <input type="radio" {{$product->discount == 0 ? 'checked' : ''}} name="discount" value="0"> Non Soldé<br>
            @if($errors->has('discount')) <span class="error">{{$errors->first('discount')}}</span>@endif
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