@extends('layouts.app')

@section('content')
<div class="container">

    <div class="border border-default p-4 mb-4 shadow-sm rounded">
    <form action="/annonce/create" method="post">
        @csrf
        <div class="form-group mb-1">
            <label for="title">Title</label>
            <input class="form-control" name="title" type="text" value="RECHERCHE" disabled>
        </div>

        <div class="form-group mb-1">
            <label for="inlineFormCustomSelect">Categorie</label>
            <select name="categorie_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                <option value="" selected>Choisir la categorie</option>
                @foreach($cat as $val)
                    <option value="{{ $val->id }}">{{$val->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-1">
            <label for="content">Décrivez l'objet recherché</label>
            <textarea class="form-control" name="content" type="textarea" rows="10" required></textarea>
        </div>
        <div class="form-group mb-1">
            <label for="title">Image link</label>
            <input class="form-control" name="imgurl" type="text">
        </div>
        <div class="form-group mb-1">
            <label for="content">Price (optionnal)</label>
            <input class="form-control" name="price" type="number">
        </div>

        

        <div class="form-group mb-1">
            <button class="btn btn-sm btn-outline-secondary mt-1" type="submit">Ok</button>
        </div>
    </form>
    </div>
 
</div>
@endsection
