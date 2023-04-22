<div class="col-md-6 mb-3">
    <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
    <textarea name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
              @if($field["required"]) required @endif >@if(old($field["name"]))
            {{old($field["name"])}}
        @elseif($data)
            {{$data[$field["name"]]}}
        @endif</textarea>
</div>
