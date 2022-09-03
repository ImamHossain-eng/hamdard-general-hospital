@extends('layouts.admin')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">
                List of All Beds
            </h3>
        </div>
        <a href="/admin/beds/create" class="btn btn-primary">Add New OT and Bed</a>
    </div>
        <div class="card-body">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Room No</th>
                        <th>Bed No</th>
                        <th>Type</th>
                        <th>Available</th>
                        <th>Inserted at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beds as $key => $bed)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$bed->room_number}}</td>
                            <td>{{$bed->bed_number}}</td>
                            <td>{{$bed->type}}</td>
                            <td>{{$bed->booked}}</td>
                            <td>{{$bed->created_at->diffForHumans()}}</td>
                            <td>
                                <form action="{{route('admin.bed.destroy', $bed->id)}}" title="Remove this Bed Information" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty 
                        <tr class="table-warning text-center">
                            <td colspan="6">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
       
    </div>
</div>
@endsection