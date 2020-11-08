@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table text-center">
                    <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{Gravatar::src($user->email)}}" width="80px" height="80px" style="border-radius: 50%"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{route('users.make-admin',$user->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Make Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Users Yet</h3>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

@endsection
