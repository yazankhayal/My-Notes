<div class="{{isset($col) ? $col : "col-6"}}">
    <div class="mb-3">
        <label class="form-label" for="{{$id}}">{{$name}}</label>
        <input type="password" class="form-control" name="{{$id}}" id="{{$id}}"
               value="{{isset($value) ? $value : null}}"
               placeholder="{{$name}}">
    </div>
</div>
