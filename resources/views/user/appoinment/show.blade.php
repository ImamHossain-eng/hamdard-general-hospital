@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Your Appointment</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <strong>User Name: </strong> {{$app->user->name}} <br>
                <strong>Doctor Name: </strong> {{$app->doctor->user->name}} <br>
                <strong>Schedule Day: </strong> {{$app->schedule->day}} <br>
                <strong>Time Slot: </strong> {{$app->schedule->start_time->format('g:ia')}} to {{$app->schedule->end_time->format('g:ia')}} <br>
                <strong>Status: </strong> @if($app->check == true) Confirmed @else Pending @endif <br>  
                
            </div>
            <div class="col-md-3">
                <strong>Patient Name:</strong> {{$app->patient_name}} <br>
                <strong>Patient Age:</strong> {{$app->patient_age}} <br>
                <strong>Patient Weight:</strong> {{$app->patient_weight}} <br>
                <strong>Previous Test:</strong> @if($app->test == true) Yes @else No @endif  <br>
                @if($app->payment == false)
                        <form action="#" method="POST" style="display:inline;">
                                        @csrf 
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success" title="Confirm this appointment">
                                            <i class="fa fa-credit-card"></i>
                                        </button>
                                    </form>
                @endif
            </div>
            <div class="col-md-6">
                @if($app->test == true)
                    <strong>Test Reports:</strong>
                    <iframe src="{{asset('files/patient/test/'.$app->app_test->file)}}" class="w-100 h-40"></iframe>
                    
                @endif
            </div>
        </div>
        <strong>Prescription</strong>
        {!!$app->prescription!!}  
    </div>
    <div class="card-footer text-center">
        <strong>Prescriped at: </strong>{{$app->updated_at->format('F d, Y')}} at {{$app->updated_at->format('g:ia')}} / {{$app->updated_at->diffForHumans()}} 
    </div>
</div>
@endsection