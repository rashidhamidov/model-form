<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}"
       value="@if(old($field["name"])) {{old($field["name"])}}
                   @elseif($data) {{$data[$field["name"]]}} @endif"
       @if($field["required"]) required @endif
/>
