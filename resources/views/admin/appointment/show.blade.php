@extends('layouts.admin')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Show {{$app->user->name}} Appointment</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <strong>Patient Name: </strong> {{$app->user->name}} <br>
                <strong>Doctor Name: </strong> {{$app->doctor->user->name}} <br>
                <strong>Schedule Day: </strong> {{$app->schedule->day}} <br>
                <strong>Time Slot: </strong> {{$app->schedule->start_time->format('g:ia')}} to {{$app->schedule->end_time->format('g:ia')}} <br>
                <strong>Status: </strong> @if($app->check == true) Confirmed @else Pending @endif <br>  
            </div>
            <div class="col-md-8">
                <strong>Prescription</strong>
                {!!$app->prescription!!}  
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <strong>Prescriped at: </strong>{{$app->updated_at->format('F d, Y')}} at {{$app->updated_at->format('g:ia')}} / {{$app->updated_at->diffForHumans()}} 
    </div>
</div>
@endsection