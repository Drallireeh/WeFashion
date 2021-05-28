@extends('layouts.master')
@section('content')
<div class="admin-ctn">
        <h1>Modifier un produit : </h1>
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
                <div>
                    <label for="name">Nom :</label> <br>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name" placeholder="Nom du produit">
                    @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
                </div>
                <div>
                    <label for="price">Prix :</label> <br>
                    <input type="number" step=".01" pattern="^\d*(\.\d{0,2})?$" name="price" value="{{$product->price}}" class="form-control" id="price" placeholder="00.00" required>
                    @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                </div>
                <div>
                    <label for="description">Description :</label> <br>
                    <textarea class='form-control' type="text" name="description">{{$product->description}}</textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
                <div>
                    <label for="category">Catégorie :</label>
                    <div class="select">
                        <select id="category" name="category_id" required>
                            <option value="0" {{ is_null($product->category_id) ? 'selected' : '' }}>Pas de catégorie</option>
                            @foreach($categories as $id => $gender)
                            <option {{ $product->category_id==$id? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="radios-ctn">
                    <label>Tailles :</label>
                    <div id='div-sizes'>
                        @foreach ($sizes as $id => $size)
                        <label> {{$size}}
                            <input type="checkbox" name="sizes[]" value="{{$id}}" id="sizes{{$id}}" @if( is_null($product->sizes) == false and in_array($id, $product->sizes()->pluck('id')->all())) 
                                checked @endif>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="radios-ctn">
                    <label>Status :</label>
                    <div>
                        <label>
                            <input type="radio" {{$product->published_state == 1 ? 'checked' : ''}}  name="published_state" value="1"> Publié<br>
                        </label>
                        <label>
                            <input type="radio" {{$product->published_state == 0 ? 'checked' : ''}}  name="published_state" value="0"> Non publié<br>
                        </label>
                    </div>
                    @if($errors->has('published_state')) <span class="error">{{$errors->first('published_state')}}</span>@endif
                </div>
                <div class="radios-ctn">
                    <label>Status de l'offre: </label>
                    <div>
                        <label>
                            <input type="radio" {{$product->discount == 1 ? 'checked' : ''}} name="discount" value="1"> Soldé<br>
                        </label>
                        <label>
                            <input type="radio" {{$product->discount == 0 ? 'checked' : ''}} name="discount" value="0"> Non Soldé<br>
                        </label>
                    </div>
                    @if($errors->has('discount')) <span class="error">{{$errors->first('discount')}}</span>@endif
                </div>
                <div class="input-file">
                    <label>File :</label>
                    <input class="file" type="file" name="picture" >
                    @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                </div>
                @if($product->picture)
                <div>
                    <img width="300" src="{{url('images', $product->picture->link)}}" alt="image du produit">
                </div>
                @endif
                <div>
                    <button class="btn btn-primary" type="submit">Modifier le produit</button>
                </div>
    </form>
</div>
@endsection