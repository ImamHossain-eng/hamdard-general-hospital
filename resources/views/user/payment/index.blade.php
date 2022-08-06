@extends('layouts.app')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Your Payment List 
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Mobile</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Paid</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $key => $payment)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment->mobile}}</td>
                        <td>{{$payment->transaction_id}}</td>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->method}}</td>
                        <td>@if($payment->status == false) Pending @else Confirmed @endif</td>
                        <td>{{$payment->created_at->diffForHumans()}}</td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="7">No Payment Yet <br> <br></td>
                    </tr>
                @endforelse
            </tbody>
        </table>        
    </div>
</div>
@endsection