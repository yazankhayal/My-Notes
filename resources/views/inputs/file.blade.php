<div class="col-6">
    <div class="mb-3">
        <label class="form-label" for="{{$id}}">{{$name}}</label>
        <input type="file" class="form-control" name="{{$id}}" id="{{$id}}">
        @if(isset($value))
            <hr>
            <a href="{{path().$value}}" class="btn btn-primary" download>
                Download {{$name}}
            </a>
        @endif
    </div>
</div>
