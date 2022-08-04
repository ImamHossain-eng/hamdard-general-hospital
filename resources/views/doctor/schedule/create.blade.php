@extends('layouts.doctor')
@section('content')
<body>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">Add your schedule of duty</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('doctor.schedule.store')}}" method="POST">
                @csrf 
                <div class="form-group mb-4">
                    <label for="day">Choose your working day</label>
                    <select name="day" class="form-control">
                        <option value="">Choose day...</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="start_time">Choose your Starting Time of Duty</label>
                    <input type="time" name="start_time" class="form-control" placeholder="Starting Time">
                </div>
                <div class="form-group mb-4">
                    <label for="end_time">Choose your Ending Time of Duty</label>
                    <input type="time" name="end_time" class="form-control" placeholder="Ending Time">
                </div>
                <input type="submit" value="Save" class="btn btn-primary w-100">
            </form>
        </div>
    </div>
</body>
@endsection