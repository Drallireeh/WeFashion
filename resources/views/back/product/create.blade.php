@extends('layouts.master')
@section('content')
<div class="admin-ctn">
    <div>
        <h1>Ajouter un produit : </h1>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Nom du produit" required>
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="reference">Référence :</label> <br>
                    <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="reference" placeholder="référence de l'objet" required>
                    @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif
                </div>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea class="form-control" type="text" name="description" required>{{old('description')}}</textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input type="number" step=".01" pattern="^\d*(\.\d{0,2})?$" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="00.00" required>
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
                <div>
                    <label for="category">Catégorie :</label>
                    <div class="select">
                        <select id="category" name="category_id" required>
                            <option value="0" {{ is_null(old("category_id")) ? 'selected' : '' }}>Pas de catégorie</option>
                            @foreach($categories as $id => $gender)
                            <option {{ old('category_id') ==$id? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="radios-ctn">
                    <label>Tailles :</label>
                    <div id='div-sizes'>
                        @foreach ($sizes as $id => $size)
                        <label> {{$size}}
                            <input type="checkbox" name="sizes[]" value="{{$id}}" id="sizes{{$id}}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) )? 'checked' : '' }}>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="radios-ctn">
                    <label>Status :</label>
                    <div>
                        <label>
                            <input type="radio" {{old('published_state') == 1 ? "checked" : ""}} name="published_state" value="1" checked> Publié
                        </label>
                        <label>
                            <input type="radio" {{old('published_state') == 0 ? "checked" : ""}} name="published_state" value="0"> Non publié
                        </label>
                    </div>
                    @if($errors->has('published_state')) <span class="error">{{$errors->first('published_state')}}</span>@endif
                </div>
                <div class="radios-ctn">
                    <label>Status de l'offre: </label>
                    <div>
                        <label>
                            <input type="radio" {{old('discount') == 1 ? "checked" : ""}} name="discount" value="1"> Soldé
                        </label>
                        <label>
                            <input type="radio" {{old('discount') == 0 ? "checked" : ""}} name="discount" value="0"> Non Soldé
                        </label>
                    </div>
                    @if($errors->has('discount')) <span class="error">{{$errors->first('discount')}}</span>@endif
                </div>
                <div class="input-file">
                    <label>File :</label>
                    <input class="file" type="file" name="picture" >
                    @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                </div>
            <div>
                <button class="btn btn-primary" type="submit">Ajouter un produit</button>
            </div>
        </form>
    </div>
</div>
@endsection