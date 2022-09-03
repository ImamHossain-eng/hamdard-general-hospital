@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">
                Available Beds and OT Information
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-warning">
                    Available Number of Beds: {{Bed::where('type', 'Bed')->where('booked', false)->get()->count()}} of {{Bed::where('type', 'Bed')->get()->count()}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-danger">Available Number of OT Beds: {{Bed::where('type', 'OT')->where('booked', false)->get()->count()}} of {{Bed::where('type', 'OT')->get()->count()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection