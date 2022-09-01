@extends('layouts.app')

@section('title', '')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div><input type="text" name="title"></div>
        <div>
            <textarea name="content" id="" cols="" rows=""></textarea>
        </div>
        <div><input type="submit" value="Create"></div>
    </form>
@endsection
