@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Your Appointment List
            </h3>
            <a href="{{route('user.appoinment.create')}}" title="Doctor Appointment" class="btn btn-primary">Doctor Appointment</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appoinments as $key => $app)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$app->user->name}}</td>
                        <td>{{$app->doctor->user->name}}</td>
                        <td>
                            {{$app->schedule->day}}:
                            {{$app->schedule->start_time->format('g:ia')}} to 
                            {{$app->schedule->end_time->format('g:ia')}}
                        </td>
                        <td>
                            @if($app->check == 0)
                                Pending
                            @else 
                                Confirmed
                            @endif
                        </td>
                        <td>@if($app->payment_id == 0) Pending @else Confirmed @endif</td>
                        <td>
                            <a href="{{route('user.appoinment.show', $app->id)}}" class="btn btn-primary" title="Show this Appointment Details">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if($app->check == 0)
                                <form action="{{route('user.appoinment.destroy', $app->id)}}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete this appointment">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6" class="pb-4">No Appoinment Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection