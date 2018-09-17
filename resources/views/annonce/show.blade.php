@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($annonces as $val)
    <div class="card mb-5 shadow-sm" style="width: 18rem;">
        <div class="card-header">
            <span>
            <h5>{{ $val->title }}</h5> by {{ $val->user_id }}
            </span>
        </div>
        <div>
            <img src="{{ $val->imgurl }}" alt="{{ $val->title }}" style="width: 18rem;">
        </div>
        <div class="card-body">
            {{ $val->content }}<br>
        </div>
        <span class="text-right mr-2"><a class="btn btn-sm btn-outline-secondary mb-1" href="/show/{{ $val->id }}" >Show</a>

        @if(Auth::check())
            @if ($val->user_id ==  Auth::user()->id )
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/edit/{{ $val->id }}">Edit</a>
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/remove/{{ $val->id }}">Delete</a></span>
            @endif
        @endif
    </div>
    @endforeach

    {{ $annonces->appends(['sort' => 'created_at'])->links() }}
</div>
@endsection