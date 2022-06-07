<div>
    Because she competes with no one, no one can compete with her.
    {{$special}}

    <form action="#" method="POST">
        <div class="form-group">
            <select wire:model="special" class="form-control">
                <option value="null">Choose Speciality/Category</option>
                @foreach($specials as $sp)
                    <option value="{{$sp->id}}">{{$sp->speciality}}</option>
                @endforeach
            </select>
        </div>
    </form>

    
</div>
