@extends('layouts.app')
@section('content')
<body>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Upload Patient Test Documents</div>
        </div>
        <div class="card-body">
            <form action="{{route('user.appoinment.test')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group mb-4">
                    <label for="file">Select PDF File</label>
                    <input type="file" name="file" placeholder="Select your PDF File.">
                </div>
               <input type="hidden" name="appoinment_id" value="{{$app->id}}">
                   <input type="submit" value="Next" class="btn btn-primary w-100"> 
                </div>
            </form>
        </div>
    </div>
</body>
@endsection