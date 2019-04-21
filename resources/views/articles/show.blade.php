@extends('layouts.app')

@section('content')
    <article>
        <h1>{{$article->title}}</h1>
        <div class="text-center">
            <img src="/storage/articles/{{$article->photo}}">
        </div>
        <div>{{$article->body}}</div>
    </article>

    <article-comment></article-comment>
@endsection

