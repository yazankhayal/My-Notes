<div class="col-12">
    <div class="mb-3">
        <label class="form-label" for="{{$id}}">{{$name}}</label>
        <textarea rows="6" class="form-control summernote" id="{{$id}}"
                  name="{{$id}}"
                  placeholder="{{$name}}">{{isset($value) ? $value : null}}</textarea>
    </div>
</div>
