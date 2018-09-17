@extends('layouts.app')

@section('content')
<div class="container">
<div class="row mt-4">
    @foreach($annonces as $val)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
    <div class="card mb-5 shadow-sm" style="width: 18rem;">
        <div class="card-header">
            <span>
            <h5>{{ $val->title }}</h5> by {{ $val->user_id }}
            </span>
        </div>
        <div>
            <img src="{{ $val->imgurl }}" alt="{{ $val->title }}" class="img-fluid">
        </div>
        <div class="card-body">
            {{ $val->content }}<br>
        </div>
        <span class="text-right mr-2"><a class="btn btn-sm btn-outline-secondary mb-1" href="/annonce/showone/{{ $val->id }}" >Show</a>

        @if(Auth::check())
            @if ($val->user_id ==  Auth::user()->id )
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/edit/{{ $val->id }}">Edit</a>
                <a class="btn btn-sm btn-outline-secondary mb-1" href="/remove/{{ $val->id }}">Delete</a></span>
            @endif
        @endif
    </div>
    </div>
    @endforeach
</div>
    {{ $annonces->appends(['sort' => 'created_at'])->links() }}
</div>
@endsection