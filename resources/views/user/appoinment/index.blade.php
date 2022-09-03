@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Your Appointment List
            </h3>
            <div class="d-md-flex justify-content-between">
                <a href="{{route('user.appoinment.create')}}" title="Doctor Appointment" class="btn btn-primary">Doctor Appointment</a>
                @php($ap = Appoinment::where('user_id', auth()->user()->id)->first())
                <a href="/user/appointment/{{$ap->id}}/e-prescription" title="Generate E-Prescription" class="btn btn-danger">Generate E-Prescription</a>


            </div>
            
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
                        <td>@if($app->payment == 0) Pending @else Confirmed @endif</td>
                        <td>
                            <a href="{{route('user.appoinment.show', $app->id)}}" class="btn btn-primary" title="Show this Appointment Details">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if($app->prescription != null)
                                    <a href="/user/appointment/{{$app->id}}/e-prescription" title="E-Prescription" class="btn btn-warning">
                                        <i class="fa fa-user-md"></i>
                                    </a> 
                                @endif

                            @if($app->payment == 0)
                                <a href="/user/appoinment/{{$app->id}}/payment" title="Pay for this appointment" class="btn btn-success">
                                    <i class="fa fa-credit-card"></i>
                                </a>
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
                        <td colspan="7" class="pb-4">No Appoinment Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection