<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}" step="any"
       value="@if($field["defaultValue"]) {{$field["defaultValue"]}} @endif
                   @if($data) {{$data[$field["name"]]}} @endif @if(old($field["name"])) {{old($field["name"])}} @endif"
       @if($field["required"]) required @endif
/>
