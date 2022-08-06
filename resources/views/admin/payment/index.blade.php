@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                All Payments
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Mobile</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Received at</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $key => $payment)
                    <tr @if($payment->status == false) class="table-warning" @endif>
                        <td> {{$key+1}} </td>
                        <td> {{$payment->mobile}} </td>
                        <td> {{$payment->transaction_id}} </td>
                        <td> {{$payment->amount}} </td>
                        <td> {{$payment->method}} </td>
                        <td> {{$payment->created_at->diffForHumans()}} </td>
                        <td>
                            @if($payment->status == false)
                                Pending
                            @else 
                                Confirm 
                            @endif
                        </td>
                        <td>
                            @if($payment->status == false && $payment->appoinment->check == false)
                            <form action="{{route('admin.appointment.update', $payment->appoinment->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method('PUT')
                                <button type="submit" class="btn btn-success" title="Confirm this appointment">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6">No Message</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$payments->links()}}
    </div>
</div>
@endsection