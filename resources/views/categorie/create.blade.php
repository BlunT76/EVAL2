@extends('layouts.app')

@section('content')
<div class="container">

    <div class="border border-default p-4 mb-4 shadow-sm rounded">
    <h3>Ajouter des categories</h3>
    <form action="/categorie/create" method="post">
        @csrf
        <div class="form-group mb-1">
            <label for="title">Title</label>
            <input class="form-control" name="title" type="text" >
        </div>
        

        <div class="form-group mb-1">
            <button class="btn btn-sm btn-outline-secondary mt-1" type="submit">Ok</button>
        </div>
    </form>
    </div>
 
</div>
@endsection
