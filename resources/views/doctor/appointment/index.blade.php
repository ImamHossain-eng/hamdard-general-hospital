@extends('layouts.doctor')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Your Appointments</h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Patient Name</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $key => $app)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$app->patient_name}}</td>
                        <td>
                            {{$app->schedule->day}}:
                            {{$app->schedule->start_time->format('g:ia')}} - 
                            {{$app->schedule->end_time->format('g:ia')}}
                        </td>
                        <td>
                            @if($app->check == false)
                                Pending
                            @else 
                                Confirmed
                            @endif
                        </td>
                        <td>
                            <a href="/doctor/appointments/{{$app->id}}" class="btn btn-primary" title="Show this Appointment Details">
                                <i class="fa fa-eye"></i>
                            </a> 
                            @if($app->check != false)
                                @if($app->prescription == null)
                                <a href="/doctor/appointments/{{$app->id}}/edit" title="Compose E-Prescription for this appointment" class="btn btn-success">
                                    <i class="fa fa-user-md"></i>
                                </a> 
                                    
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="5">No Appointment</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection