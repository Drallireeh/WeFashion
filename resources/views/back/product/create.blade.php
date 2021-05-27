@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter un produit : </h1>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
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
                <h2>Taille :</h2>
                {{-- <select id="size" name="size" required>
                    <option @if(old("size") == 'XS') selected @endif value="XS">XS</option>
                    <option @if(old("size") == 'S') selected @endif value="S">S</option>
                    <option @if(old("size") == 'M') selected @endif value="M">M</option>
                    <option @if(old("size") == 'L') selected @endif value="L">L</option>
                    <option @if(old("size") == 'XL') selected @endif value="XL">XL</option>
                </select> --}}
                @foreach ($sizes as $id => $size)
                <label> {{$size}}
                    <input type="checkbox" name="sizes[]" value="{{$id}}" id="sizes{{$id}}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) )? 'checked' : '' }}>
                </label>
                @endforeach
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" {{old('published_state') == 1 ? "checked" : ""}} name="published_state" value="1" checked> publier<br>
            <input type="radio" {{old('published_state') == 0 ? "checked" : ""}} name="published_state" value="0"> Non publié<br>
            @if($errors->has('published_state')) <span class="error">{{$errors->first('published_state')}}</span>@endif
        </div>
        <div>
            <h2>Status de l'offre</h2>
            <input type="radio" {{old('discount') == 1 ? "checked" : ""}} name="discount" value="1"> Soldé<br>
            <input type="radio" {{old('discount') == 0 ? "checked" : ""}} name="discount" value="0"> Non Soldé<br>
            @if($errors->has('discount')) <span class="error">{{$errors->first('discount')}}</span>@endif
        </div>
        <div class="input-file">
            <h2>File :</h2>
            <input class="file" type="file" name="picture" >
            @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
        </div>
    </div> <br>
    <button class="btn btn-primary" type="submit">Ajouter un produit</button>
    </form>
</div>
@endsection