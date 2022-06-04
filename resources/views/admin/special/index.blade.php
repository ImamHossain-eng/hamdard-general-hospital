@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">All Doctors' Category</h3>
            <a href="/admin/speciality/create" title="Insert a new user role" class="btn btn-primary">Add New Category</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>DB ID</th>
                    <th>Category/Speciality</th>
                    <th>No of Doctors</th>
                    <th>Created at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($specials as $key => $special)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$special->id}}</td>
                        <td>{{$special->name}}</td>
                        <td>ll</td>
                        <td>{{$special->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/admin/speciality/{{$special->id}}/edit" title="Edit this role title" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6">No User Role</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection