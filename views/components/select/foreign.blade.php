<div class="col-md-3 mb-3">
    <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
    <select name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
            @if($field["required"]) required @endif >
        <option value="">@lang('Choose')</option>
        @foreach($field['foreignOptions'] as $option)
            <option
                @if(old($field["name"]) and old($field["name"]==$option[$field["foreignKey"]]))
                    selected
                @elseif($data and $data[$field["name"]]==$option[$field["foreignKey"]])
                    selected
                @endif
                value="{{$option[$field["foreignKey"]]}}">{{$option[$field["foreignName"]]}}</option>
        @endforeach
    </select>
</div>
