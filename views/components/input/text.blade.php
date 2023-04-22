<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}" step="any"
       value="{{$field_value}}"
       @if($field["required"]) required @endif
/>
