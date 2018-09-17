@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($annonces as $val)
    <div >
    @if ($val->title == "RECHERCHE")
    <div class="card mb-5 shadow-sm border border-warning">
    @else
    <div class="card mb-5 shadow-sm">
    @endif
        <div class="card-header">
            <span>
            <h5>{{ $val->title }}</h5> by {{ $val->user_name }}
            </span>
        </div>
        @if ($val->imgurl != "")
            <div>
                <img src="{{ $val->imgurl }}" alt="{{ $val->title }}" class="img-fluid">
            </div>
        @endif
        
        <div class="card-body">
            {{ $val->content }}<br>
        </div>
        <span class="text-right mr-2"><a class="btn btn-sm btn-outline-secondary mb-1" href="/annonce/showone/{{ $val->id }}" >Show</a>

        @if(Auth::check())
            @if ($val->user_id ==  Auth::user()->id )
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/annonce/edit/{{ $val->id }}">Edit</a>
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/annonce/destroy/{{ $val->id }}">Delete</a></span>
            @endif
        @endif
    </div>
    </div>
    @endforeach

    {{ $annonces->appends(['sort' => 'created_at'])->links() }}
</div>
@endsection