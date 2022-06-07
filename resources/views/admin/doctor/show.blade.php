@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    @if($doctor->user->image == null)
                        <img src="{{asset('admin/img/undraw_profile.svg')}}" class="rounded w-75" alt="">
                    @else 
                        <img src="{{asset('images/user/'.$doctor->user->image)}}" class="rounded w-75" alt="">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-title mt-4">
                        <h3 class="text-dark">
                            {{$doctor->user->name}}
                        </h3>  
                    </div>
                    <hr>
                    <h6 class="card-text">{{$doctor->special->speciality}}</h6>
                    <h5 class="card-subtitle">{{$doctor->degree}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!!$doctor->details!!}
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-6">
                    {{$doctor->created_at->format('F d, Y - g:ia')}}
                </div>
                <div class="col-md-6">
                    @if($doctor->created_at != $doctor->updated_at)
                        {{$doctor->updated_at->format('F d, Y - g:ia')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
@endsection