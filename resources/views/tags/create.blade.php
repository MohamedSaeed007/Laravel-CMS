@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card card-default">
            <div class="card-header">
                {{isset($tag) ? 'Edit Tag' : 'Create Tag'}}
            </div>
            <div class="card-body">
                @include('partials.errors')

                <form action="{{isset($tag)? route('tags.update',$tag) : route('tags.store')}}" method="post">
                    @csrf
                    @if(isset($tag))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{isset($tag) ? $tag->name : ''}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{isset($tag) ? 'Edit Tag' : 'Add Tag'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
