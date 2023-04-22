<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}"
       value="@if($field["defaultValue"]) {{$field["defaultValue"]}} @endif
                   @if($data) {{$data[$field["name"]]}} @endif @if(old($field["name"])) {{old($field["name"])}} @endif"
       @if($field["required"]) required @endif
/>
