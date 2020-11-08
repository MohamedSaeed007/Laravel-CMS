@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
           @if($posts->count() > 0)
                <table class="table text-center">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('storage/'.$post->image)}}" width="100px" height="100px" alt=""></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>
                                @if($post->trashed())
                                    <form action="{{route('posts.restore',$post)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success" type="submit">Restore</button>
                                    </form>
                                @else
                                    <a href="{{route('posts.edit',$post)}}" class="btn btn-info text-light">Edit</a>
                                @endif
                            </td>
                            <td>
                                <button onclick="handleDelete({{$post->id}})" class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteModal">
                                    {{$post->trashed() ? 'Delete' : 'Trashed'}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
               @else
               <h3 class="text-center">No Posts Yet</h3>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this category ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No , Go back</button>
                        <button type="submit" class="btn btn-danger">Yes , Delete</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/posts/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
