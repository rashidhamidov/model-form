@foreach($field["values"] as $key=>$value)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{$field["name"]}}"
               @if($field["required"]) required @endif
               @if($field_value==$value)
                   checked
               @endif
               value="{{$value}}">
        <label for="id_{{$key}}" class="form-check-label text-capitalize">{{$key}}</label>
    </div>
@endforeach
