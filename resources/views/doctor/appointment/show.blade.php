@extends('layouts.doctor')
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
                <strong>User Name: </strong> {{$app->user->name}} <br>
                <strong>Patient Name: </strong> {{$app->patient_name}} <br>
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
        @if($app->test == true)
        <div class="row justify-content-center mt-4 border">
            <div>
                <h3 class="bg-info text-dark texxt-center p-4">Previous Test Report</h3>
            
                <iframe src="{{asset('files/patient/test/'.$app->app_test->file)}}" class="w-100 mt-2" height="500"></iframe>   
           

            </div>
            
        </div>
        @endif
    </div>
    <div class="card-footer text-center">
        <strong>Prescriped at: </strong>{{$app->updated_at->format('F d, Y')}} at {{$app->updated_at->format('g:ia')}} / {{$app->updated_at->diffForHumans()}} 
    </div>
</div>
@endsection