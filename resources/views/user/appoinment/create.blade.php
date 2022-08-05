@extends('layouts.app')
@section('content')
<body>
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">Doctor Appoinment</div>
        </div>
        <div class="card-body">
            @livewire('user-appoinment')
        </div>
    </div>
</body>
@endsection