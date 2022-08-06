@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Payment for your appointment with {{$app->doctor->user->name}}
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="alert alert-info">Send Money to the Following Number then submit this payment form:
            <ul>
                <li>01903154003 : Bkash | Upay | Nagad </li>
            </ul>
        </div>

        <form action="{{route('user.appoinment.payment.store', $app->id)}}" method="POST">
            @csrf 
            <div class="row">
                <div class="col-md-6 form-group mb-4">
                    <input type="number" name="mobile" class="form-control" placeholder="Enter sender mobile number" value="{{old('mobile')}}">
                </div>
                <div class="col-md-6 form-group mb-4">
                    <input type="text" name="transaction_id" class="form-control" placeholder="Enter Transaction ID" value="{{old('transaction_id')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group mb-4">
                    <input type="hidden" step="any" name="amount" class="form-control" placeholder="Enter Amount" value="{{$app->doctor->price}}">
                    
                    <input type="number" step="any" name="amountView" class="form-control" placeholder="Enter Amount" value="{{$app->doctor->price}}" disabled>
                </div>
                <div class="col-md-6 form-group mb-4">
                    <select name="method" class="form-control">
                        <option value="">Choose Payment Mobile Banking</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Upay">Upay</option>
                        <option value="Nagad">Nagad</option>
                    </select>
                </div>

            </div>
            
           <input type="submit" value="Submit" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection