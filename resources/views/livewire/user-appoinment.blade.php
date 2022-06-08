<div>
    
    <form wire:submit.prevent="saveAppointment">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="special_id">Select Category</label>
                    <select wire:model="special_id" wire:change="loadDoctors" class="form-control">
                        <option value="null">Choose....</option>
                        @foreach($specials as $sp)
                            <option value="{{$sp->id}}">{{$sp->speciality}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group mb-4">
                    <label for="doctor_id">Select Doctor</label>
                    <select wire:model="doctor_id" wire:change="loadSchedules" class="form-control">
                        <option value="null">Choose ...</option>
                        @if($doctors != null)
                            @foreach($doctors as $doc)
                                <option value="{{$doc->id}}">{{$doc->user->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="date">Choose a schedule</label>
                    <select wire:model="schedule_id" class="form-control">
                        <option value="null">Choose ...</option>
                        @if($schedules != null)
                            @foreach($schedules as $schedule)
                                <option value="{{$schedule->id}}">
                                    {{$schedule->day}} - 
                                    {{$schedule->start_time->format('g:ia')}} to 
                                    {{$schedule->end_time->format('g:ia')}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary w-100 mt-4" value="Get Appointment">
                </div>
            </div>
        </div>
    </form>
</div>
