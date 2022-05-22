@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">All User Roles</h3>
            <a href="/admin/role/create" title="Insert a new user role" class="btn btn-primary">Add New Role</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>DB ID</th>
                    <th>User Role</th>
                    <th>No of Users</th>
                    <th>Created at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $key => $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->users->count()}}</td>
                        <td>{{$role->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/admin/role/{{$role->id}}/edit" title="Edit this role title" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
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