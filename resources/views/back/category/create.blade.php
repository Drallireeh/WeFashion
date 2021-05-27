@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter une catégorie : </h1>
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Titre du produit" required>
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="reference">Référence :</label> <br>
                    <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="reference" placeholder="référence de l'objet" required>
                    @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif
                </div>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea type="text" name="description" required>{{old('description')}}</textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input type="number" step=".01" pattern="^\d*(\.\d{0,2})?$" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="00.00" required>
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
            </div>
            <div>
                <label for="category">Catégorie :</label>
                <select id="category" name="category_id" required>
                    <option value="0" {{ is_null(old("category_id")) ? 'selected' : '' }}>Pas de catégorie</option>
                    @foreach($categories as $id => $gender)
                    <option {{ old('category_id') ==$id? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="size">Taille :</label>
                <select id="size" name="size" required>
                    <option @if(old("size") == 'XS') selected @endif value="XS">XS</option>
                    <option @if(old("size") == 'S') selected @endif value="S">S</option>
                    <option @if(old("size") == 'M') selected @endif value="M">M</option>
                    <option @if(old("size") == 'L') selected @endif value="L">L</option>
                    <option @if(old("size") == 'XL') selected @endif value="XL">XL</option>
                </select>
            </div>
    </div>
    <br>
    <button class="btn btn-primary" type="submit">Ajouter un produit</button>
    </form>
</div>
@endsection