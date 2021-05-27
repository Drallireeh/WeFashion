@extends('layouts.master')
@section('content')
<div style="width: 80%; margin: 0 auto;">
    <div>
        <h1>Ajouter une catégorie : </h1>
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div>
                    <label for="gender">Nom :</label> <br>
                    <input type="text" name="gender" value="{{old('gender')}}" class="form-control" id="gender" placeholder="Nom de la catégorie" required>
                    @if($errors->has('gender')) <span class="error">{{$errors->first('gender')}}</span>@endif
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ajouter une catégorie</button>
        </form>
    </div>
</div>
@endsection