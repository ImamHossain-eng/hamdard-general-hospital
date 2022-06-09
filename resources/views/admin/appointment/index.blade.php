@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">All Appointments</h3>
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
                        <th>Created at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $key => $app)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$app->user->name}}</td>
                            <td>{{$app->doctor->user->name}}</td>
                            <td>{{$app->schedule->day}}</td>
                            <td>
                                @if($app->check == false)
                                    Pending
                                @else 
                                    Confirmed
                                @endif
                            </td>
                            <td>{{$app->created_at->diffForHumans()}}</td>
                            <td>
                                @if($app->check == false)
                                    <form action="{{route('admin.appointment.update', $app->id)}}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success" title="Confirm this appointment">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <a href="/admin/appointments/{{$app->id}}" title="Show this appointment details" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty 
                        <tr class="table-warning text-center">
                            <td colspan="7">No Appointments</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection