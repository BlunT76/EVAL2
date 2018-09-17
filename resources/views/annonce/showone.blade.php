@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Show post -->
    <div class="card mb-3 shadow-sm">
        <div class="card-header"><span><h5>{{ $annonces->title }}</h5>  by {{ $annonces->user_name }}</span></div>
        <div>
            <img src="{{ $annonces->imgurl }}" alt="{{ $annonces->title }}">
        </div>
        <div class="card-body">
            {{ $annonces->content }}
        </div>
        <span class="text-right mr-2"><a class="btn btn-sm btn-outline-secondary m-1" href="/annonce/show">Back</a>
        <span class="text-right mr-2"><a class="btn btn-sm btn-outline-primary m-1" href="mailto:{{ $email->email }}">Contact {{ $annonces->user_name }} </a>
            @if(Auth::check())
                @if ($annonces->user_name == Auth::user()->name )
                    <a class="btn btn-sm btn-outline-secondary m-1" href="/annonce/edit/{{ $annonces['id'] }}">Edit</a>
                    <a class="btn btn-sm btn-outline-secondary m-1" href="/annonce/remove/{{ $annonces['id'] }}">Delete</a>
                @endif
            @endif
        </span>
    </div>
    <!-- Add comment -->
    @if(Auth::check())
    <div class="border border-default p-4 mb-4 shadow-sm rounded">
    
    <form action="/addcomment" method="post">
        @csrf
        <div class="form-group mb-1">
        <label for="content">Ask a question</label>
        <textarea class="form-control" name="content" type="textarea" rows="3"></textarea>
        </div>
        <button class="btn btn-sm btn-outline-secondary mt-1" name="id" value="{{ $annonces->id }}" type="submit">Ok</button>

    </form>
    </div>
    @endif

    <!-- Show comments -->
    <div class="border border-default p-4 shadow-sm rounded">
    <h5 class="text-center">Questions</h5>
    @foreach($comments as $val)
    <div class="card mt-3 mb-3 border border-default">
    <div class="card-header">{{ $val->user_name }}</div>
    <div class="card-body">
        {{ $val->content }}
    </div>
    </div>
    @endforeach
    {{ $comments->links() }}
    </div>
</div>

@endsection
