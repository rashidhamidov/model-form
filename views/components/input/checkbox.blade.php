@foreach($field["values"] as $key=>$value)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="{{$field["name"]}}"
               @if($field["required"]) required @endif
               @if($data and $data[$field["name"]]==$value)
                   checked
               @endif
               @if(old($field["name"]) and old($field["name"])==$value)
                   checked
               @endif
               value="{{$value}}">
        <label for="id_{{$key}}" class="form-check-label text-capitalize">{{$key}}</label>
    </div>
@endforeach
