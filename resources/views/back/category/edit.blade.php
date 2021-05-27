@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Modifier un produit : </h1>
        <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="gender">Nom :</label> <br>
                    <input type="text" name="gender" value="{{$category->gender}}" class="form-control" id="gender" placeholder="Titre de la catégorie">
                    @if($errors->has('gender')) <span class="error">{{$errors->first('gender')}}</span>@endif
                </div>
            </div>
    </div>
    <button class="btn btn-primary" type="submit">Modifier la catégorie</button>
    </form>
</div>
@endsection