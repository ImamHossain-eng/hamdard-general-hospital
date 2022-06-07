@extends('layouts.doctor')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">My Profile Info</h3>
        </div>
        <a href="/doctor/auth_profile" class="btn btn-primary" title="Edit auth profile">Edit Authentication Info</a>
    </div>
    <div class="card-body">
        <form action="{{route('doctor.profile.update')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Your Name" class="form-control" disabled>
            </div>
            <div class="form-group mb-3">
                <select name="special_id" class="form-control">
                    <option value="">Choose your speciality...</option>
                    @php($specials = Special::all())
                    @foreach($specials as $special)
                        <option value="{{$special->id}}">{{$special->speciality}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="text" name="degree" value="{{auth()->user()->doctor ? auth()->user()->doctor->degree : ''}}" placeholder="Your Degree" class="form-control">
            </div>
            <div class="form-group mb-3">
                <textarea name="details" class="form-control">
                    {{auth()->user()->doctor ? auth()->user()->doctor->details : ''}}
                </textarea>
            </div>
            <input type="submit" value="Update" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection