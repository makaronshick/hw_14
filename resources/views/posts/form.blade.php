@extends('layout')

@section('title', 'Посты')

@section('body')
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   @isset($post) value="{{ $post->title }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   @isset($post) value="{{ $post->slug }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" name="body" class="form-control" id="body"
                   @isset($post) value="{{ $post->body }}" @endisset>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tag" class="form-label">Tags</label><br>
            @if(isset($post))
                @foreach($tags as $tag)
                    <input type="checkbox" name="tags[]"
                           value={{$tag->id}} @if(in_array($tag->id, $post->tags->pluck('id')->toArray() )) checked @endif>{{$tag->title}}
                    <br>
                @endforeach
            @else
                @foreach($tags as $tag)
                    <input type="checkbox" name="tags[]" value={{$tag->id}}>{{$tag->title}}<br>
                @endforeach
            @endif
        </div>

        @isset($post)
            <input type="hidden" name="id" value="{{ $post->id }}">
        @endisset

        <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
@endsection
