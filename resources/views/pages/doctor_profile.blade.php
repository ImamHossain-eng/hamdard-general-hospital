@extends('layouts.home')
@section('content')
<body>
    <div class="row bg-dark pb-2 pt-2" style="">
        <div class="" style="margin-left: 15em;">
          <a href="/login" class="p-2 btn btn-primary">Login</a>
          <a href="/register" class="p-2 btn btn-success">Register</a>
                      
        </div>
      </div>

      <section class="bg-info" style="min-height: 100vh;">
          <div class="container pt-4">
              <div class="card">
                  <div class="card-header">

                    <div class="row">
                        <div class="col-md-3">
                            @if($doctor->user->image == null)
                                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="rounded w-50 ml-4" alt="">
                            @else 
                                <img src="{{asset('images/user/'.$doctor->user->image)}}" class="rounded w-50 ml-4" alt="">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="card-title mt-3">
                                <h3 class="text-info">{{$doctor->user->name}}</h3>
                            </div>
                            <div class="card-subtitle">
                                {{$doctor->degree}}
                            </div>
                            <p class="card-text text-primary">
                                {{$doctor->speciality}}
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        {!!$doctor->details!!}
                    </div>
                    <div class="card-footer">
                        Since: {{\Carbon\Carbon::parse($doctor->user->created_at)->format('F d, Y')}}
                    </div>

                      
                  </div>
              </div>
          </div>
      </section>
</body>
@endsection