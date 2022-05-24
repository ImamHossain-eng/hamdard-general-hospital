@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                All Messages
            </h3>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Received at</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $key => $msg)
                    <tr @if($msg->seen == false) class="table-warning" @endif>
                        <td> {{$key+1}} </td>
                        <td> {{$msg->name}} </td>
                        <td> {{$msg->email}} </td>
                        <td> {{$msg->created_at->diffForHumans()}} </td>
                        <td>
                            @if($msg->seen == false)
                                New
                            @else 
                                Seen 
                            @endif
                        </td>
                        <td>
                            <a href="/admin/messages/{{$msg->id}}" title="Show Details" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <form action="{{route('admin.message.destroy', $msg->id)}}" method="POST" style="display:inline;">
                                @csrf 
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" title="Delete this message">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
        {{$messages->links()}}
    </div>
</div>
@endsection