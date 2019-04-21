@extends('layouts.app')

@section('content')
    <article>
        <h1>{{$article->title}}</h1>
        <div class="text-center">
            <img src="/storage/articles/{{$article->photo}}">
        </div>
        <div>{{$article->body}}</div>
    </article>
    <div id="app">
        <comment-box
                :user-id="{{ $userId  }}"
                :article-id="{{ $articleId  }}">

        </comment-box>
    </div>

@endsection

