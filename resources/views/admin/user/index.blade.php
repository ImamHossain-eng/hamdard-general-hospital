@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">All Users</h3>
            <a href="/admin/user/create" title="Insert a new user" class="btn btn-primary">Add New User</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                            @if(auth()->user()->id != $user->id)
                            <a href="/admin/user/{{$user->id}}/edit" title="Edit this user" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
                            <form action="{{route('admin.user.destroy', $user->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Removed this user">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif

                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="5">No User Role</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection