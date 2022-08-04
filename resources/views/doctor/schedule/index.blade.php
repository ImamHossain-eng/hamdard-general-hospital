@extends('layouts.doctor')
@section('content')
<body>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">Your Schedule List</h3>
            </div>
            <a href="/doctor/schedule/create" title="Add your schedule" class="btn btn-primary">
                Add Schedule
            </a>
        </div>
        <div class="card-body">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Day</th>
                        <th>Starting Time</th>
                        <th>Ending Time</th>
                        <th>Inserted at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $key => $schedule)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$schedule->day}}</td>
                            <td>{{$schedule->start_time->format('g:ia')}}</td>
                            <td>{{$schedule->end_time->format('g:ia')}}</td>
                            <td>{{$schedule->created_at->diffForHumans()}} / 
                                {{$schedule->created_at->format('F d, Y')}} at 
                                {{$schedule->created_at->format('g:ia')}}
                            </td>
                            <td>
                                <form action="{{route('doctor.schedule.destroy', $schedule->id)}}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete this schedule">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty 
                        <tr class="table-warning text-center">
                            <td colspan="6">
                                No Schedule Added <br><br>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection