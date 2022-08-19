@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    @if ($post['is_new'])
        <div>A new blog post! Using if</div>
    @else
        <div>An old blog post! Using elseif</div>
    @endif

    @unless($post['is_new'])
        <div>An old blog post! Using unless</div>
    @endunless
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>

    @isset($post['has_comments'])
        <div>A blog post with comments! Using isset</div>
    @endisset
@endsection
