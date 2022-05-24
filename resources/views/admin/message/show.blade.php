@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Message Details Page
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Sender Information</strong>
                <hr>
                <p style="border-left: 1px solid #3f3333; padding-left: 1em;">
                    <strong>Name: </strong> {{$message->name}} <br>
                    <strong>Email: </strong> {{$message->email}} <br>
                    <strong>Mobile: </strong> {{$message->mobile}} <br>
                    <strong>Received: </strong> {{$message->created_at->diffForHumans()}} / {{\Carbon\Carbon::parse($message->created_at)->format('F d, Y - g:ia')}} <br>
                    <strong>Seen: </strong> {{$message->updated_at->diffForHumans()}} / {{\Carbon\Carbon::parse($message->updated_at)->format('F d, Y - g:ia')}} <br>
                </p>
            </div>
            <div class="col-md-6">
                <strong>Sender Message</strong>
                <hr>
                <p style="border-left: 1px solid #3f3333; padding-left: 1em;">
                    {!!$message->body!!}
                </p>
            </div>
        </div>       
    </div>
</div>
@endsection