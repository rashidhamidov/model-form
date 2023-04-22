<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}"
       value="@if($field["defaultValue"]) {{$field["defaultValue"]}}
                   @elseif($data) {{$data[$field["name"]]}} @elseif(old($field["name"])) {{old($field["name"])}} @endif"
       @if($field["required"]) required @endif
/>
