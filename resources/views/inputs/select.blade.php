<div class="{{isset($col) ? $col : "col-6"}}">
    <div class="mb-3">
        <label class="form-label" for="{{$id}}">{{$name}}</label>
        <select class="form-control" name="{{$id}}" id="{{$id}}">
            @if(isset($lists))
                @foreach($lists as $key => $val)
                    <option value="{{$key}}" {{isset($active) ? $active == $key ? 'selected' : '' : ''}}>{{$val}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
