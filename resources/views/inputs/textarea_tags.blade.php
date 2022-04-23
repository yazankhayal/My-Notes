<div class="{{isset($col) ? $col : "col-6"}}">
    <div class="mb-3">
        <label class="form-label" for="{{$id}}">{{$name}}</label>
        <textarea rows="5" class="form-control input_tags" name="{{$id}}" id="{{$id}}"
               data-role="tagsinput"
               placeholder="{{$name}}">{!! isset($value) ? $value : null !!}</textarea>
    </div>
</div>
