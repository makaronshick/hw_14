@extends('layout')

@section('title', 'Категории')

@section('body')

    <a href="/">Back to menu</a><br>

    <a href="/categories/create">Add</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="/categories/update/{{ $category->id }}">Edit</a> |
                    <a href="/categories/delete/{{ $category->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
