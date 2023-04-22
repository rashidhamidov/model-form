<div class="col-md-6 mb-3">
    <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang("form.".$name)</label>
    <textarea name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
              @if($field["required"]) required @endif
    >{{$field_value}}</textarea>
</div>
