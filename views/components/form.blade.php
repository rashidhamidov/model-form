<form
    @if(!$data)
        action="{{route($route_name.'.store')}}"
    @else
        action="{{route($route_name.'.update',['id'=>$data->id])}}"
    @endif
    enctype="multipart/form-data"
    method="post">
    @csrf
    @foreach($fields as $name=>$field)
        @if($field["element"]=="input")
            <div class="mb-3">
                <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
                @if($field["type"]=="checkbox")
                    @foreach($field["values"] as $key=>$value)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="{{$field["name"]}}"
                                   @if($field["required"]) required @endif
                                   value="{{$value}}">
                            <label for="id_{{$key}}" class="form-check-label text-capitalize">{{$key}}</label>
                        </div>
                    @endforeach
                @elseif($field["type"]=="radio")
                    @foreach($field["values"] as $key=>$value)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$field["name"]}}"
                                   @if($field["required"]) required @endif
                                   value="{{$value}}">
                            <label for="id_{{$key}}" class="form-check-label text-capitalize">{{$key}}</label>
                        </div>
                    @endforeach
                @else
                    <input type="{{$field["type"]}}" id="id_{{$field["name"]}}" name="{{$field["name"]}}"
                           class="{{$field["className"]}}"
                           value="@if(old($field["name"])) {{old($field["name"])}}
                   @elseif($data) {{$data[$field["name"]]}} @endif"
                           @if($field["required"]) required @endif
                    />
                @endif
                @error($field["name"])
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        @elseif($field["element"]=="textarea")
            <div class="mb-3">
                <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
                <textarea name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
                          @if($field["required"]) required @endif >@if(old($field["name"]))
                        {{old($field["name"])}}
                    @elseif($data)
                        {{$data[$field["name"]]}}
                    @endif</textarea>
            </div>
        @elseif($field["element"]=="select")
            <div class="mb-3">
                <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang($name)</label>
                <select name="{{$field["name"]}}" id="id_{{$field["name"]}}" class="{{$field["className"]}}"
                        @if($field["required"]) required @endif >
                    <option value="">@lang('Choose')</option>
                    @foreach($field['selectOptions'] as $option)
                        <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
            </div>
        @endif

    @endforeach

    <button type="submit" class="btn btn-primary">@lang('Send')</button>
</form>
<script>
    $(document).ready(function () {
        $('.richtext').summernote();
    });
</script>
