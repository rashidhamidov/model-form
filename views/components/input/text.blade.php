<?php
$field_value = null;
if ($field["defaultValue"]) {
    $field_value = $field["defaultValue"];
}
if ($data) {
    $field_value = $data[$field["name"]];
}
if (old($field["name"])) {
    $field_value = old($field["name"]);
}
?>
<input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
       class="{{$field["className"]}}" step="any"
       value="{{$field_value}}"
       @if($field["required"]) required @endif
/>
