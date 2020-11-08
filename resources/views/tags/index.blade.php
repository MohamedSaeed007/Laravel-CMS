@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            @if($tags->count() > 0)
            <table class="table">
                <thead>
                <th>Name</th>
                <th>Posts Count</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{$tag->name}}
                        </td>
                        <td>
                            {{$tag->posts->count()}}
                        </td>
                        <td>
                            <a href="{{route('tags.edit',$tag)}}" class="btn btn-info text-light">Edit</a>
                            <button  onclick="handleDelete({{$tag->id}})" class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#deleteModal">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @else
                <h3 class="text-center">No Tags Yet</h3>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteTagForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this tag ?
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
            var form = document.getElementById('deleteTagForm')
            form.action = '/tags/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
