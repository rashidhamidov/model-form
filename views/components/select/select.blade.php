<div class="col-md-3 mb-3">
    <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang("form.".$name)</label>
    <select name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
            @if($field["required"]) required @endif >
        <option value="">@lang('Choose')</option>
        @foreach($field['selectOptions'] as $key=>$value)
            <option
                    @if($field_value==$value)
                        selected
                    @endif
                    value="{{$value}}">{{$key}}</option>
        @endforeach
    </select>
</div>
