@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{url('select2/dist/css/select2.min.css')}}">

@endsection

@section('content')

    <div class="container">
        <div class="card card-default">
            <div class="card-header">
                {{isset($post) ? 'Edit Post' : 'Create Post'}}
            </div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{isset($post)? route('posts.update',$post) : route('posts.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @if(isset($post))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" name="title"
                               value="{{isset($post) ? $post->title : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="5" rows="5"
                                  class="form-control">{{isset($post) ? $post->description : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="hidden" name="content" id="content" value="{{isset($post) ? $post->content : ''}}">
                        <trix-editor input="content"></trix-editor>
                    </div>
                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input type="text" id="published_at" class="form-control" name="published_at"
                               value="{{isset($post) ? $post->published_at : ''}}">
                    </div>
                    @if(isset($post))
                        <div class="form-group">
                            <img src="{{asset('storage/'.$post->image)}}" width="100%">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(isset($post)) {{$category->id==$post->category_id?'selected':''}} @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" class="tags-selector form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if(isset($post)) {{$post->hasTag($tag->id) ? 'selected' : ''}} @endif>
                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-success">{{isset($post) ? 'Edit post' : 'Add post'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{url('select2/dist/js/select2.min.js')}}"></script>

    <script>
        flatpickr('#published_at', {
            enableTime: true
        })

        $(document).ready(function() {
            $('.tags-selector').select2();
        })

    </script>
@endsection
