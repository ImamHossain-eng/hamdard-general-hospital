@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">All Doctors</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Speciality</th>
                    <th>Created at</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $key => $doctor)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$doctor->user->name}}</td>
                        <td>{{$doctor->user->email}}</td>
                        <td>{{$doctor->special->speciality}}</td>
                        <td>{{$doctor->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/admin/doctors/{{$doctor->id}}" title="Show this doctor details" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
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