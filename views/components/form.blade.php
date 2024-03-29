<form
        @if(!$data)
            action="{{route($route_name.'.store')}}"
        @else
            action="{{route($route_name.'.update',['id'=>$data->id])}}"
        @endif
        enctype="multipart/form-data"
        method="post">
    @if($data)
        @method('PUT')
    @endif
    @csrf
    <div class="row">
        @foreach($fields as $name=>$field)
                <?php
                $field_value = null;
                if ($field["defaultValue"] != null) {
                    $field_value = $field["defaultValue"];
                }
                if ($data != null) {
                    $field_value = $data[$field["name"]];
                }
                if (old($field["name"]) != null) {
                    $field_value = old($field["name"]);
                }
                ?>

            @if($field["element"]=="input")
                <div class="col-md-6 mb-3">
                    <label for="id_{{$field["name"]}}" class="form-label text-capitalize">@lang("form.".$name)</label>
                    @if($field["type"]=="checkbox")
                        @include('model-form::components.input.checkbox')
                    @elseif($field["type"]=="radio")
                        @include('model-form::components.input.radio')
                    @elseif($field["type"]=="file")
                        @include('model-form::components.input.file')
                        @if($data)
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <img class="w-100" src="{{$field["defaultValue"]}}">
                                </div>
                            </div>
                        @endif
                    @else
                        @include('model-form::components.input.text')
                    @endif
                    @error($field["name"])
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            @endif
            @if($field["element"]=="textarea")
                @include('model-form::components.textarea.textarea')
            @endif
            @if($field["element"]=="select")
                @include('model-form::components.select.select')
            @endif
            @if($field["element"]=="foreign")
                @include('model-form::components.select.foreign')
            @endif

        @endforeach
    </div>
    <button type="submit" class="btn btn-primary">@lang('Send')</button>
</form>
