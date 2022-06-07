@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Your Appoinment List
            </h3>
            <a href="/user/appoinment/new" title="Doctor Appoinment" class="btn btn-primary">Doctor Appoinment</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appoinments as $key => $app)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$app->user->name}}</td>
                        <td>{{$app->doctor->user->name}}</td>
                        <td>{{$app->date}}</td>
                        <td>Option</td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="5" class="pb-4">No Appoinment Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection