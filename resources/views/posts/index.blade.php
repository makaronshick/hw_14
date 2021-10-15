@extends('layout')

@section('title', 'Посты')

@section('body')

    <a href="/">Back to menu</a><br>

    <a href="/posts/create">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->body }}</td>

                <td>@isset($post->category){{ $post->category->title }}@endisset</td>

                <td>@foreach($post->tags as $tag)
                        {{ $tag->title }} <br>
                    @endforeach
                </td>
                <td>
                    <a href="/posts/update/{{ $post->id }}">Edit</a> |
                    <a href="/posts/delete/{{ $post->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
