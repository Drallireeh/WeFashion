@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter un Livre : </h1>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="title">Titre :</label> <br>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Titre du livre">
                    @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                </div>
                <div>
                    <label for="price">Description :</label> <br>
                    <textarea type="text" name="description">{{old('description')}}</textarea>
                    @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                </div>
            </div>
            <div>
                <label for="genre">Genre :</label>
                <select id="genre" name="genre_id">
                    <option value="0" {{ is_null(old('genre_id'))? 'selected' : '' }}>No genre</option>
                    @foreach($genres as $id => $name)
                    <option {{ old('genre_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <h1>Choisissez un ou plusieurs Auteurs</h1>
            <div>
                @forelse($authors as $id => $name)
                <label class="control-label" for="author{{$id}}">{{$name}}</label>
                <input name="authors[]" value="{{$id}}" {{ ( !empty(old('authors')) and in_array($id, old('authors')) )? 'checked' : ''  }} type="checkbox" class="form-control" id="author{{$id}}">
                @empty
                @endforelse
                @if($errors->has('authors')) <span class="error">{{$errors->first('authors')}}</span>@endif
            </div>
    </div>
    <div>
        <div>
            <h2>Status</h2>
            <input type="radio" @if(old('status')=='published' ) checked @endif name="status" value="published" checked> publier<br>
            <input type="radio" @if(old('status')=='unpublished' ) checked @endif name="status" value="unpublished"> dépulier<br>
            @if($errors->has('status')) <span class="error">{{$errors->first('status')}}</span>@endif
        </div>
        <div class="input-file">
            <h2>File :</h2>
            <label for="genre">Title image :</label>
            <input type="text" name="title_image" value="{{old('title_image')}}">
            <input class="file" type="file" name="picture" >
            @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
        </div>
    </div> <br>
    <button class="btn btn-primary" type="submit">Ajouter un livre</button>
    </form>
</div>
@endsection